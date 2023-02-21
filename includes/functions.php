<?php 

/**
 * This file contains the functions used to make the template work.
 * 
 * This is an internal file, do not modify unless you know what
 * you are doing!
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// This line prevents from loading directly this page. Do not modify.

if( !defined("origin") ) { die("<h1>Access denied</h1>"); }



////////// MISCELLANEOUS FUNCTIONS ////////////////////////////////////////////


/**
 * Adds a language suffix to the given URL.
 * 
 * The suffix ?lang=xx corresponding to the current global $lang
 * is added to the given $url (just before the possible inner
 * link), so
 *      https://www.blah.com/index.php#section
 * is transformed into
 *      https://www.blah.com/index.php?lang=xx#section
 * 
 * @param   string  $url    The URL to be suffixed
 * @return  string          The suffixed URL
 */
function print_langurl($url) {
    global $lang, $op_mainlang;
    if ( ($url == "" or $url[0] != "#")
    and  ($lang != $op_mainlang)        ) {
        $tmp = explode('#', $url);
        $tmp[0] .= "?lang=" . $lang;
        echo implode('#', $tmp);
    } else {
        echo $url;
    }
}


/**
 * Prints the given source code without interpreting it.
 * 
 * The $code is supposed to be some HTML. This function formats it as pure
 * text, remove all interpretable symbols. This is mostly used in the demo. 
 * 
 * @param   string  $code   Source code to be printed
 * @param   boolean $break  Whether <br>'s should be inserted around the code
 * @return  void
 */
function print_code($code, $break = false) {
    if ( $break ) { echo '<br>'; }
    echo '<span class="code">';
    echo htmlentities($code);
    echo '</span>';
    if ( $break ) { echo '<br>'; }
}


/**
 * Returns the date and time of the last edition of the current page.
 * 
 * The time format is DD/MM/YYYY, HH:MM.
 * This is intended for the footer.
 * 
 * @return  string      Formatted date and time.
 */
function last_edit() {
    return strftime(
        '%d/%m/%Y, %R',
        filemtime(constant("origin"))
    );
}



////////// PUBLICATION AND TALK LISTS /////////////////////////////////////////

/**
 * This sections defines the main function print_list() that prints a list of
 * publications or taks.
 * 
 * It defines intermediate functions according to the following dependency
 * tree:
 * 
 *                             format_authors     get_links
 *                                     |___________|    |
 *                                            |         |
 *  comparison_internal             print_pub_inner   print_talk_inner
 *         |                                  |_________|
 *         |                                       |
 *    comparison        print_subhead        print_item_outer
 *         |___________________|___________________|
 *                             |
 *                        print_list
 * 
 * The choice has been made to use (almost) no object-oriented programming, so 
 * that the algorithms remain the clearest for users not used to this style of
 * programming. So everything here is based upon good old loops and arrays, as
 * we learnt at school. :-)
 */


/**
 * Compares two list items according to the parameters.
 * 
 * This (primitive) recursive function compares items $a and $b (publications
 * or talks). Its curryfied version will be returned as comparator by the
 * following comparison(), and then used by usort().
 * 
 * @param   string  $sortby         Index to be used for sorting
 *                                  (should be 'date' or 'type')
 * @param   boolean $rev            Whether the ordering of dates should be 
 *                                  decreasing
 * @param   array   $types_order    An array sorting the possible indices
 *                                  (in increasing order)
 * @param   array   $a              The first item to compare
 * @param   array   $b              The second item to compare
 * @return  int                     Positive iff $a < $b
 */
function comparison_internal($sortby, $rev, $types_order, $a, $b) {
    if ( $sortby == 'date' ) {
        // Uses DateTime and DateInterval objects, see the docs:
        // https://www.php.net/manual/en/class.datetime.php
        // https://www.php.net/manual/fr/class.dateinterval.php
        $adate = new DateTime($a['date']);
        $bdate = new DateTime($b['date']);
        $difference = date_diff($bdate, $adate);
        $out = $difference->days;
        if ( $difference->invert ) { $out = -$out; }
        if ( $rev ) { $out = -$out; }
    } elseif ( $sortby == 'type' ) {
        // $atype and $btype are integers associated to the types
        // of $a and $b uniquely.
        $atype = array_search($a['type'], $types_order);
        $btype = array_search($b['type'], $types_order);
        // If the items have the same type, compare their dates
        // by a recursive call.
        // Otherwise, compare the types.
        if ($atype == $btype) {
            $out = comparison_internal('date', $rev, $types_order, $a, $b);
        } else {
            $out = $atype - $btype;
        }
    }
    return $out;
}


/**
 * Creates a comparator used to sort list items.
 * 
 * This performed by curryfying the previous function:
 * comparison($sortby, $rev, $listtype) :=
 * λ$a. λ$b. comparison_internal(
 *               $sortby,
 *               $rev,
 *               the $op_xxx_order corresponding to $listtype,
 *               $a,
 *               $b
 *           ).
 * 
 * @param   string  $sortby     Index to be used for sorting
 *                              (should be 'date' or 'type')
 * @param   boolean $rev        Whether the ordering of dates should be 
 *                              decreasing
 * @param   string  $listtype   Should be 'pubs' or 'talks'
 * @return  function            Comparator
 */
function comparison($sortby, $rev, $listtype) {
    return function($a, $b) use($sortby, $rev, $listtype) {
        if ( $listtype == 'pubs' ) {
            global $op_pubtypes_order;
            return comparison_internal($sortby, $rev, $op_pubtypes_order,
                $a, $b);
        } elseif ( $listtype == 'talks' ) {
            global $op_talktypes_order;
            return comparison_internal($sortby, $rev, $op_talktypes_order,
                $a, $b);
        }
    };
}


/**
 * Prints a (sub)heading in the list, if necessary.
 * 
 * If the user asked for subheadings in the list (depending on the ordering
 * — by date or by publication/talk type —, these divide the list by year or by
 * type), print it if it is the right time.
 * To check this, the year (resp. type) of the next item is compared to the one
 * of the current item.
 * In addition, if the $hide option is activated (and the $hidefst for the
 * first subheading), only the subheading will be showed at first, and the
 * corresponding publications or talks will be wrapped into an HTML <details>
 * tag.
 * Finally, the function returns the updated current subheading.
 * 
 * @param   string  $current    The date or type of the previous item
 *                              (depending on $sortby), ie. the current
 *                              subheading
 * @param   array   $item       The next item to be displayed
 * @param   string  $listtype   The type of the list (should be 'pubs' or
 *                              'talks')
 * @param   string  $sortby     Index to be used for sorting (should be 'date'
 *                              or 'type')
 * @param   boolean $hide       Whether the items should be hided
 * @param   boolean $hidefst    Whether the items under the first subheading
 *                              should be hided
 * @return  string              The updated current subheading.
 */
function print_subhead($current, $item, $listtype, $sortby, $hide, $hidefst) {
    // Define $next, a string containing the subheading that corresponds to the
    // next $item, depending on $sortby.
    if ( $sortby == 'date' ) {
        $nextdate = new DateTime($item['date']);
        $next = $nextdate->format('Y');
    } elseif ( $sortby == 'type' ) {
        $next = $item['type'];
    }
    // If $next different from $current, we have to print the subheading.
    // Otherwise we're still in the same subsection, there's nothing to do.
    if ( $current != $next ) {
        // If we want to $hide the content of the section, wrap it with
        // <details> and use the subheading as a <summary>.
        // If this is the first subheading (ie. $current is null) and we want
        // to display the first section, add an 'open' property to <details>.
        if ( $hide ) {
            if ( !is_null($current) ) { echo '</details>'; }
            echo '<details'; 
            if ( is_null($current) and !$hidefst ) { echo ' open'; } 
            echo '><summary';
        } else {
            echo '<div';
        }
        echo ' class="subdivision">';
        // Then, display the subheading.
        if ( $sortby == 'date' ) {
            echo $next;
        } elseif ( $sortby == 'type' ) {
            global $lang;
            if ( $listtype == 'pubs' ) {
                global $op_pubtypes;
                echo $op_pubtypes[$next][$lang . 'pl'];
            } elseif ( $listtype == 'talks' ) {
                global $op_talktypes;
                echo $op_talktypes[$next][$lang . 'pl'];
            }
        }
        // Finally, close the tags.
        if ( $hide ) { echo '</summary>'; } else { echo '</div>'; }
    }
    // In any case, return $next so that it can be used in the main loop (as
    // the $current argument of the next execution of this function...).
    return $next;
}


/**
 * Formats an author list (with commas and a final 'and').
 * 
 * If there is only one author, returns:
 *      John Doe
 * If there are two authors or more, returns:
 *      John Doe, Jane Doe, Jack Doe and Janis Doe
 * 
 * @param   array   $authors    A list of authors (strings)
 * @return  string              The formatted list
 */
function format_authors($authors) {
    global $op_translations, $lang;
    // All authors but the least (in an array)
    $nminusone = array_slice($authors, 0, -1);
    // All authors but the least (in a string, separated with commas)
    $out = implode(", ", $nminusone);
    // If this wasn't empty, add the last author; otherwise, just return them.
    if ( $out ) {
        return $out
        . " " . $op_translations['and'][$lang] . " "
        . end($authors);
    } else {
        return end($authors);
    }
}


/** 
 * Returns the links associated to a publication or a talk.
 * 
 * Searches for all $op_linktypes in the data of the given $item, and
 * returns the HTML code of the links found (separated by $separator).
 * 
 * @param   array   $item       Item (talk or publication)
 * @param   string  $separator  Separator between the links
 * @return  string              HTML code for the (separated) links
 */
function get_links($item, $separator) {
    global $op_linktypes, $lang;
    // $out will contain the HTML codes (strings) for each link.
    $out = array();
    // For each $op_linktype, search for a link in $item. If found, add the
    // corresponding HTML to $out.
    foreach ( $op_linktypes as $linktype => $details ) {
        if ( !empty($item[$linktype]) ) {
            $cur = '<a href="';
            if ( isset($details['prefix']) ) {
                $cur .= $details['prefix'];
            }
            $cur .= $item[$linktype] . '" target="_blank">' . 
            $details[$lang] . '</a>';
            $out[] = $cur;
        }
    }
    // Concatenate the strings of $out with the given $separator.
    return implode($separator, $out);
}


/**
 * Prints the inner HTML (citation and links) for a publication.
 * 
 * This function prints all what comes at the right of the icon when a
 * publication is cited: the citation (authors, title, date, publication
 * state), the details, the links and the (initially hidden) abstract.
 * 
 * @param   array   $item       Publication to be printed
 * @param   string  $itemid     Unique identifier of the publication (will be
 *                              used in HTML 'id' properties)
 * @param   boolean $printdates Whether the dates should be printed in the
 *                              citations (false when the date is also printed
 *                              as a subheading)
 * @return  void
 */
function print_pub_inner($item, $itemid, $printdates) {
    global $op_pubstates, $op_translations, $lang;

    // First line (authors, title, date or publication state)
    echo '<div class="pubtete">';
    echo '<span class="pubauteurs">' 
        . format_authors($item['authors'])
        . '</span>, ';
    echo '<span class="pubtitre">' . $item['title'] . '</span>';
    if ( $printdates or $item['state'] ) {
        echo ' (<span class="pubdate">';
        // If the publication state is not null (ie. not published), it should
        // be printed instead of the date.
        if ( $item['state'] ) {
            echo $op_pubstates[ $item['state'] ][$lang];
        } else {
            $itemdate = new DateTime($item['date']);
            echo $itemdate->format('Y');
        }
        echo '</span>).';
    } else {
        echo ".";
    }
    echo '</div>';

    // Second line (details)
    if ( !empty($item['info'.$lang]) or !empty($item['info']) ) {
        echo '<div class="pubdetails">';
        if ( array_key_exists('info'.$lang, $item) ) {
            echo $item['info'.$lang];
        } else {
            echo $item['info'];
        }
        echo '</div>';
    }

    // Third line (links)
    $liens = get_links($item, "");
    if ( !empty($item['abstract'.$lang])
    or   !empty($item['abstract'])
    or   $liens ) {
        echo '<div class="publiens">';
        if ( !empty($item['abstract'.$lang])
        or   !empty($item['abstract']) ) {
            echo '<span class="lien" '
            . "onclick=\"resume('" . $itemid . "')\">"
            . $op_translations['Abstract'][$lang]
            . '</span>';
        }
        echo $liens;
        echo '</div>';
    }

    // Abstract
    if ( !empty($item['abstract'.$lang])
    or   !empty($item['abstract']) ) {
        echo '<div id="resume-' . $itemid . '" class="pubresume" '
            . 'style="display: none;">';
        if ( !empty($item['abstract'.$lang]) ) {
            echo $item['abstract'.$lang];
        } else {
            echo $item['abstract'];
        }
        echo '</div>';
    }

}


/**
 * Prints the inner HTML (citation and links) for a talk.
 * 
 * This function prints all what comes at the right of the icon when a
 * talk is cited: the citation (title, date, event), the details, the links.
 * 
 * @param   array   $item       Talk to be printed
 * @param   string  $itemid     Unique identifier of the talk (will be
 *                              used in HTML 'id' properties)
 * @return  void
 */
function print_talk_inner($item, $itemid) {
    global $lang;

    echo '<span class="pubtitre">' . $item['title'] . '</span>, ';

    echo '<span class="talkloc">' . $item['event'];
    if ( !empty($item['location']) ) {
        echo ' (' . $item['location'] . ')';
    }
    echo '</span>, ';

    $date = new DateTime($item['date']);
    $timefmt = new IntlDateFormatter($lang, IntlDateFormatter::MEDIUM, 
        IntlDateFormatter::NONE);
    echo $timefmt->format($date) . '. ';

    if ( !empty($item['info'.$lang]) ) {
        echo '<span class="talkinfo">' . $item['info'.$lang] . '</span> ';
    } elseif ( !empty($item['info']) ) {
        echo '<span class="talkinfo">' . $item['info'] . '</span> ';
    }

    // Links
    $liens = get_links($item, ", ");
    if ( $liens ) {
        echo '<span class="talkliens">';
        echo $liens;
        echo '.</span>';
    }
}


/**
 * Prints a list item (publication or talk).
 * 
 * This function prints the outer structure of the item, the icon introducing
 * it, and then calls the print_xxx_inner() function according to $listtype.
 * 
 * @param   array   $item       Item to be printed
 * @param   string  $itemid     Unique identifier of the item (will be
 *                              used in HTML 'id' properties)
 * @param   string  $listtype   Type of the list (should be 'pubs' or 'talks')
 * @param   boolean $printdates Whether the dates should be printed in the
 *                              citations (false when the date is also printed
 *                              as a subheading)
 * @return  void
 */
function print_item_outer($item, $itemid, $listtype, $printdates) {
    echo '<div id="' . $itemid . '" class="publi';
    if ( !empty($item['important']) ) { echo ' importante'; }
    echo '">';

    if ( $listtype == 'pubs' ) {
        global $op_pubtypes, $lang;
        $type = $op_pubtypes[ $item['type'] ][ $lang ];
        $icon = $op_pubtypes[ $item['type'] ][ 'icon' ];
    } elseif ( $listtype == 'talks' ) {
        global $op_talktypes, $lang;
        $type = $op_talktypes[ $item['type'] ][ $lang ];
        $icon = $op_talktypes[ $item['type'] ][ 'icon' ];
    }
    echo '<div class="pubicone" title="' . $type  . '">';
    echo '<img src="' . $icon . '" />';
    echo "</div>";

    echo '<div class="pubcorps">';
    if ( $listtype == 'pubs' ) {
        print_pub_inner($item, $itemid, $printdates);
    } elseif ( $listtype == 'talks' ) {
        print_talk_inner($item, $itemid);
    }
    echo '</div>';

    echo '</div>';
}


/**
 * Prints a list of publications or talks.
 * 
 * The data should be stored in an array called $data, defined in the given
 * $file. It is identified by a unique $id. The possible parameters are stored
 * in $param, the following parameters (indices) are defined:
 * 'listtype'   string      Type of the list.
 *                          Possible values: 'pubs' (default), 'talks'.
 * 'sortby'     string      Key of the items used for sorting.
 *                          Possible values: 'date' (default), 'type'.
 * 'rev'        boolean     Whether the ordering of dates should be decreasing.
 *                          Default: true.
 * 'subheads'   boolean     Whether subheadings (corresponding to $sortby)
 *                          should be printed. Default: false.
 * 'hide'       boolean     Whether the items under a subheading should be
 *                          hidden in a <details> tag.
 *                          No effect if $subhead is false. Default: false.
 * 'hidefst'    boolean     Same as $hide, for the first subheading of the
 *                          list.
 *                          No effect if $subhead or $hide is false.
 *                          Default: false.
 * 
 * @param   string  $id     Unique identifier of the item (will be used in
 *                          HTML 'id' properties)
 * @param   string  $file   Path to the file containing the data
 * @param   array   $param  Parameters
 * @return  void
 */
function print_list($id, $file, $param) {
    // Read the parameters and set the default values if needed.
    if ( isset($param['listtype']) and $param['listtype'] == 'talks' ) {
        $listtype = 'talks';
    } else {
        $listtype = 'pubs';
    }
    if ( isset($param['sortby']) and $param['sortby'] == 'type' ) {
        $sortby = 'type';
    } else {
        $sortby = 'date';
    }
    $rev      = isset($param['rev'])      ? $param['rev']      : true ;
    $subheads = isset($param['subheads']) ? $param['subheads'] : false;
    $hide     = isset($param['hide'])     ? $param['hide']     : false;
    $hidefst  = isset($param['hidefst'])  ? $param['hidefst']  : false;

    // Import and sort the data.
    include($file);
    if ( !isset($data) ) {
        throw new InvalidArgumentException(
            'File ' . $file . ' does not contain any $data array.'
        );
    }
    $comparator = comparison($sortby, $rev, $listtype);
    usort($data, $comparator);

    // Print the data.
    echo '<!-- List of publications (or talks).' . "\n"
        . 'The icons are from the Twemoji project by Twitter, Inc. and other '
        . 'contributors. See https://twemoji.twitter.com/. -->';
    echo '<div id="' . $id . '" class="pliste '.  $listtype .'">';
    $curr_subhead = null;
    $printdates = !$subheads || ($sortby != 'date');
    foreach ($data as $i => $item) {
        if ( $subheads ) { 
            $curr_subhead = print_subhead(
                $curr_subhead, $item, $listtype, $sortby, $hide, $hidefst
            );
        }
        print_item_outer($item, $id . '-it' . $i, $listtype, $printdates);
    }
    if ( $hide ) { echo '</details>'; }
    echo '</div>';
}

?>

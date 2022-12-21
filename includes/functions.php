<?php // This is an internal file, do not modify unless you know
      // what you are doing!

// Prevents from loading directly this page.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


////////// MISCELLANOUS FUNCTIONS /////////////////////////////////

// Prints the title of a page, including the title of the website.
// Intended for the <title> tag.
function print_title(...$strings) {
      echo implode(' | ', array_filter($strings));
}

// Prints the given URL, with an additional parameter ?lang=xx 
// requiring the current language.
// The parameter is not added to inner links (starting with a #).
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

// Returns the date and time of the last edition of the current
// page. Intended for the footer.
function last_edit() {
      return strftime(
            '%d/%m/%Y, %R',
            filemtime(constant("origin"))
      );
}


////////// PUBLICATION AND TALK LISTS //////////////////////////

// Generates a comparison function (that will be used to sort
// the array of publications).
// $sortby (string) is 'date' or 'type'.
// $rev (boolean) sets decreasing (true) or increasing order.
// $listtype (string) is 'pubs' or 'talks';
// An internal function serves as the recursive core, then it
// is just curryfied in the main function.
function comparison_internal($sortby, $rev, $a, $b, $types_order) {
      if ( $sortby == 'date' ) {
            $adate = new DateTime($a['date']);
            $bdate = new DateTime($b['date']);
            $difference = date_diff($bdate, $adate);
            $out = $difference->days;
            if ( $difference->invert ) { $out = -$out; }
            if ( $rev ) { $out = -$out; }
      } elseif ( $sortby == 'type' ) {
            $atype = array_search($a['type'], $types_order);
            $btype = array_search($b['type'], $types_order);
            if ($atype == $btype) {
                  $out = comparison_internal('date', $rev, $a, $b);
            } else {
                  $out = $atype - $btype;
            }
      } else {
            throw new InvalidArgumentException("Argument sortby should be 'date' or 'type'.");
      }
      return $out;
}
function comparison($sortby, $rev, $listtype) {
      return function($a, $b) use($sortby, $rev, $listtype) {
            if ( $listtype == 'pubs' ) {
                  global $op_pubtypes_order;
                  return comparison_internal($sortby, $rev, $a, $b, $op_pubtypes_order);
            } elseif ( $listtype == 'talks' ) {
                  global $op_talktypes_order;
                  return comparison_internal($sortby, $rev, $a, $b, $op_talktypes_order);
            } else {
                  throw new InvalidArgumentException("Argument listtype should be 'pubs' or 'talks'.");  
            }
      };
}

// Prints a subheading if necessary.
// $current (string) is the identifier of the current subheading.
// $p (array) is the next publication to be printed.
// $sortby is 'date' or 'type'.
// $hide and $hidefst (booleans) ask to hide the sections in the
// publication list, with HTML <details> tags.
function print_subhead($current, $p, $listtype, $sortby, $hide, $hidefst) {
      if ( $sortby == 'date' ) {
            $pdate = new DateTime($p['date']);
            $next = $pdate->format('Y');
      } elseif ( $sortby == 'type' ) {
            $next = $p['type'];
      } else {
            throw new InvalidArgumentException("Argument sortby should be 'date' or 'type'.");
      }
      if ( $current != $next ) {
            if ( $hide ) {
                  if ( !is_null($current) ) { echo '</details>'; }
                  echo '<details'; 
                  if ( is_null($current) and !$hidefst ) { echo ' open'; } 
                  echo '><summary';
            } else {
                  echo '<div';
            }
            echo ' class="subdivision">';
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
                  } else {
                        throw new InvalidArgumentException("Argument listtype should be 'pubs' or 'talks'."); 
                  }
            }
            if ( $hide ) { echo '</summary>'; } else { echo '</div>'; }
      }
      return $next;
}

// Formats an author list (with commas and "and").
function format_auteurs($list) {
      global $op_translations, $lang;
      $nmoinsun = array_slice($list, 0, -1);
      $out = implode(", ", $nmoinsun);
      if ( $out ) {
            return $out
            . " " . $op_translations['and'][$lang] . " "
            . end($list);
      } else {
            return end($list);
      }
}

// Returns the links associated to a publication or a talk.
function get_links($item, $separator) {
      global $op_linktypes, $lang;
      $out = array();
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
      return implode($separator, $out);
}

// Prints a single publication.
// $id (string) is the identifier of the item.
// $p (array) contains the data of the publication.
function print_pub($id, $p, $printdate) {
      global $lang, $op_translations, $op_pubtypes, $op_pubstates;
      
      // Opening <div>
      echo '<div id="' . $id . '" class="publi';
      if ( !empty($p['important']) ) { echo ' importante'; }
      echo '">';
      
      // Icon
      echo '<div class="pubicone" title="'
            . $op_pubtypes[ $p['type'] ][$lang]
            . '">';
      echo '<img src="'
            . $op_pubtypes[ $p['type'] ]['icon']
            . '" />';
      echo "</div>";
      
      echo '<div class="pubcorps">';
      
            // First line (authors, title, date)
            echo '<div class="pubtete">';
            echo '<span class="pubauteurs">'
                  . format_auteurs($p['authors'])
                  . '</span>, ';
            echo '<span class="pubtitre">'
                  . $p['title']
                  . '</span>';
            if ( $printdate or $p['state'] ) {
                  echo ' (<span class="pubdate">';
                  if ( $p['state'] ) {
                        echo $op_pubstates[ $p['state'] ][$lang];
                  } else {
                        $pdate = new DateTime($p['date']);
                        echo $pdate->format('Y');
                  }
                  echo '</span>).';
            } else {
                  echo ".";
            }
            echo '</div>';
            
            // Second line (details)
            if ( !empty($p['info'.$lang]) or !empty($p['info']) ) {
                  echo '<div class="pubdetails">';
                  if ( array_key_exists('info'.$lang, $p) ) {
                        echo $p['info'.$lang];
                  } else {
                        echo $p['info'];
                  }
                  echo '</div>';
            }
            
            // Third line (links)
            $liens = get_links($p, "");
            if ( !empty($p['abstract'.$lang])
            or   !empty($p['abstract'])
            or   $liens ) {
                  echo '<div class="publiens">';
                  if ( !empty($p['abstract'.$lang])
                  or   !empty($p['abstract']) ) {
                        echo '<span class="lien" '
                              . "onclick=\"resume('" . $id . "')\">"
                              . $op_translations['Abstract'][$lang]
                              . '</span>';
                  }
                  echo $liens;
                  echo '</div>';
            }

            // Abstract
            if ( !empty($p['abstract'.$lang])
            or   !empty($p['abstract']) ) {
                  echo '<div id="resume-' . $id . '" class="pubresume" '
                        . 'style="display: none;">';
                  if ( !empty($p['abstract'.$lang]) ) {
                        echo $p['abstract'.$lang];
                  } else {
                        echo $p['abstract'];
                  }
                  echo '</div>';
            }
      
      // Closing </div>'s
      echo '</div>';
      echo '</div>';
}

// Prints a single talk.
// $id (string) is the identifier of the item.
// $p (array) contains the data of the publication.
function print_talk($id, $p, $printdate) {
      global $lang, $op_translations, $op_talktypes;
      
      // Opening <div>
      echo '<div id="' . $id . '" class="publi';
      if ( !empty($p['important']) ) { echo ' importante'; }
      echo '">';
      
      // Icon
      echo '<div class="pubicone" title="'
            . $op_talktypes[ $p['type'] ][$lang]
            . '">';
      echo '<img src="'
            . $op_talktypes[ $p['type'] ]['icon']
            . '" />';
      echo "</div>";
      
      // Body of the item
      echo '<div class="pubcorps">';
      echo '<span class="pubtitre">'
            . $p['title']
            . '</span>, ';
      
            echo '<span class="talkloc">' . $p['event'];
      if ( !empty($p['location']) ) {
            echo ' (' . $p['location'] . ')';
      }
      echo '</span>, ';
      
      $date = new DateTime($p['date']);
      $timefmt = new IntlDateFormatter($lang, IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE);
      echo $timefmt->format($date) . '. ';

      if ( !empty($p['info'.$lang]) ) {
            echo '<span class="talkinfo">' . $p['info'.$lang] . '</span> ';
      } elseif ( !empty($p['info']) ) {
            echo '<span class="talkinfo">' . $p['info'] . '</span> ';
      }

      // Links

      $liens = get_links($p, ", ");
      if ( $liens ) {
            echo '<span class="talkliens">';
            echo $liens;
            echo '.</span>';
      }

      // Closing </div>'s
      echo '</div>';
      echo '</div>';
}

// Prints a publication list.
// $id (string) is the identifier of the list (should be unique).
// $file (string) is the file where the data is stored.
// $param (array) is an array of parameters that can be:
// - list should be 'pubs' (default) or 'talks'.
// - sortby should be 'date' (default) or 'type'.
// - rev (boolean, defaults to true) sets decreasing (true) or
//   increasing order on dates (not on publication types!).
// - subheads (boolean, defaults to false) adds subheadings for
//   years or types, depending on sortby.
// - hide (boolean, defaults to false) uses HTML tag <details> to
//   hide the publications under sub-headings (ony works if
//   suhead is set to true).
// - hidefst (boolean, defaults to false) asks (not to) hide the
//   publications of the first sub-heading (only works if subhead
//   and hide are set to true).
function print_pubs($id, $file, $param) {
      // Read the parameters.
      if ( isset($param['list']) and $param['list'] == 'talks' ) {
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
      $comp = comparison($sortby, $rev, $listtype);
      usort($data, $comp);
      
      // Print the data.
      echo '<div id="' . $id . '" class="publis">';
      $shead = null;
      $printdates = !$subheads or ($sortby != 'date');
      foreach ($data as $i => $p) {
            if ( $subheads ) { 
                  $shead = print_subhead($shead, $p, $listtype, $sortby, $hide, $hidefst);
            }
            if ( $listtype == 'pubs' ) {
                  print_pub($id . '-it' . $i, $p, $printdates);
            } elseif ( $listtype == 'talks' ) {
                  print_talk($id . '-it' . $i, $p, $printdates);
            }
      }
      if ( $hide ) { echo '</details>'; }
      echo '</div>';
}

?>
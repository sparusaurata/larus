<?php

/**
 * This is the configuration file of the template, where the customisation
 * options can be set.
 * 
 * Modify it carefully to change the behaviour and the appearance of the
 * website. Each option is documented.
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// This line prevents from loading directly this page. Do not modify.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


/**
 * Contents:
 *  - Language options
 *  - Information about you and the website
 *  - Main menu
 *  - External components
 *  - Styling
 *  - Lists of publications or talks
 *  - Additional stuff
 */


////////// LANGUAGE OPTIONS ///////////////////////////////////////////////////


/**
 * (De)activates the support for multiple languages.
 * 
 * Beware, setting this (back) to true can result in bugs. Make sure all the
 * translations needed are defined (below in this file).
 * 
 * @global  boolean $op_multilingual
 */
$op_multilingual = true;


/**
 * Main and other languages of the website.
 * 
 * The main language should always be defined (even if $op_multilingual is
 * false). Add as many other languages as you want.
 * 
 * The data should be provided as ISO 639-1 codes. For details, see:
 * https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes.
 * 
 * Beware, translations must be provided for all the languages defined here
 * (in particular, it should be the case for the main language). If you modify
 * the languages, make sur all the translations needed are defined (below in
 * this file). Missing translations will result in (possibly huge) bugs.
 * 
 * @global  string  $op_mainlang
 * @global  array   $op_otherlangs      _ => string
 */
$op_mainlang = "en";
$op_otherlangs = ["fr"];


/** 
 * Additional translations, used somewhere in the website.
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * Beware, there are capitalised strings. This was the best option to make 
 * sure capitalising does not mess up with some languages.
 * 
 * @global  array   $op_translations    string => array( string => string )

 */
$op_translations = array(
    'Abstract' => array(
        'fr' => "Résumé",
        'en' => "Abstract"
    ),
    'and' => array(
        'fr' => "et",
        'en' => "and"
    )
);


/**
 * Other mandatory translations are defined in the following options:
 *  - $op_title
 *  - $op_subtitle
 *  - $op_description
 *  - $op_nav_content
 *  - $op_pubtypes
 *  - $op_pubstates
 *  - $op_talktypes
 *  - $op_linktypes
 * 
 * You might also want to translate the additional HTML (using the lang
 * attribute) in the following options:
 *  - $op_addleft
 *  - $op_addright
 *  - $op_footer
 * 
 * All these options can be modified below.
 */



////////// INFORMATION ABOUT YOU AND THE WEBSITE //////////////////////////////


/**
 * Your name.
 * 
 * Write it as it should be displayed, but without any (HTML) formatting.
 * 
 * @global  string  $op_name
 */
$op_name = "Larus Michahellis";


/**
 * The title of the website.
 * 
 * This should be a very short text. Two reasonable values are:
 *  - just your name
 *  - something like "John Doe's website".
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_title           string => string
 */
$op_title = array(
    'fr' => "Larus",
    'en' => "Larus"
);


/**
 * The subtitle of the website.
 * 
 * This should again be rather short. It can be set to null (in that case, the 
 * subtitle is disabled).
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_subtitle        string => string
 */
$op_subtitle = array(
    'fr' => "Un modèle de site web académique",
    'en' => "A template for academic websites"
);


/**
 * A description of the website.
 * 
 * This will not be displayed in the wbesite, but can be used by search engines
 * or when a page is shared in social networks.
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_description     string => string
 */
$op_description = array(
    'fr' => "Larus est un modèle de site web léger et simple pour créer des \
        sites personnels académiques.",
    'en' => "Larus is a lightweight, easy-to-use template for creating \
        academic personal websites."
);


/**
 * The path to the favicon of the website.
 * 
 * The favicon is the little icon displayed in the web browser, e.g. next to
 * the title of the tab containing the webpage.
 * 
 * It can be set to null. In that case, the favicon is disabled — this can be
 * useful if a favicon is already defined by the server containing your
 * website.
 * 
 * @global  string  $op_favicon
 */
$op_favicon = "includes/larus-favicon.png";



////////// MAIN MENU //////////////////////////////////////////////////////////


/**
 * (De)activate the main menu at the top of each page.
 * 
 * @global  boolean $op_nav
 */
$op_nav = true;


/**
 * Content of the main menu.
 * 
 * This should be an array of menu items.
 * Each menu item is itself an array, and must contain:
 * - an element indexed by 'link' containing the link associated to the menu
 *   item (this could be another page, like "research.php", or the reference
 *   of a 'id' HTML property, like "#research"),
 * - elements indexed by each language defined in $op_mainlang and in
 *   $op_otherlangs, containing the text of the link in each language.
 * 
 * @global  array   $op_nav_content     _ => array( string => string )
 */
$op_nav_content = [
    array(
        'link' => "index.php",
        'fr'   => "Page d'accueil",
        'en'   => "Homepage"
    ),
    array(
        'link' => "lists.php",
        'fr'   => "Publications et exposés",
        'en'   => "Publications and talks"
    ),
    array(
        'link' => "https://github.com/sparusaurata/larus",
        'out'  => true, 
        'fr'   => "Projet GitHub",
        'en'   => "GitHub project"
    ),
    array(
        'link' => "index.php#heading",
        'fr'   => "(exemple)",
        'en'   => "(example)"
    ),
];



////////// EXTERNAL COMPONENTS ////////////////////////////////////////////////


/**
 * (De)activate the loading of some Google fonts.
 * 
 * By default, the fonts Work Sans from Google fonts are
 * loaded. See:
 * https://fonts.google.com/specimen/Work+Sans
 * This is performed when $op_gfonts is true.
 * 
 * You can also load other Google fonts (or any fonts contained in a CSS
 * stylesheet). To do so, set $op_othergfonts to a string containing the URL
 * to this stylesheet — for Google fonts, this is the link starting by:
 * https://fonts.googleapis.com/css2?.
 * Otherwise, set $op_othergfonts to null.
 * 
 * @global  boolean $op_gfonts
 * @global  string  $op_othergfonts
 */
$op_gfonts = true;
$op_othergfonts = null;


/**
 * Fonts used in the website.
 * 
 * These are the main font (used in the text) and the heading font (used... in
 * the headings) of the website.
 * Note that 'sans-serif' is always defined as a fallback font, in case these
 * options are left empty or the fonts aren't found.
 * 
 * @global  string  $op_mainfont
 * @global  string  $op_headfont
 */
$op_mainfont = "Work Sans";
$op_headfont = "Work Sans";


/**
 * (De)activate the loading of MathJax.
 * 
 * MathJax is a library that enables you to write mathematical formulæ using
 * the TeX syntax.
 * See https://www.mathjax.org/.
 * 
 * @global  boolean $op_mathjax
 */
$op_mathjax = true;



////////// STYLING ////////////////////////////////////////////////////////////


/**
 * Base colors of the website.
 * 
 * All colors should be valid CSS color specifications, see:
 * https://developer.mozilla.org/fr/docs/Web/CSS/color.
 * 
 * $op_bgcolor is the background color of the pages.
 * $op_fgcolor is the foreground color, ie. the color of the text.
 * $op_color1 is used to highlight some elements (main title, h1).
 * $op_color2 is used to highlight some elements (list bullets and numberings,
 *   h2). By default it is lighter than $op_color1.
 * $op_color3 is used to highlight some elements (h3). By default it is darker
 *   than $op_color1.
 * $op_linkcolor is the color of the (hovered) hyperlinks.
 * 
 * @global  string  $op_bgcolor
 * @global  string  $op_fgcolor
 * @global  string  $op_color1
 * @global  string  $op_color2
 * @global  string  $op_color3
 * @global  string  $op_linkcolor
 */
$op_bgcolor     = "hsl(  0,   0%,  20%)";
$op_fgcolor     = "white";
$op_color1      = "hsl(340,  90%,  50%)";
$op_color2      = "hsl(340,  90%,  70%)";
$op_color3      = "hsl(340,  30%,  40%)";
$op_linkcolor   = "hsl( 50, 100%,  50%)";


/**
 * Additional CSS.
 * 
 * CSS rules to be added to the styling of the website.
 * These will be put after the default styling, so that you can override some
 * existing rules.
 * 
 * @global  string  $op_addcss
 */
$op_addcss = <<<EndOfCode
    /* Put here any CSS style you want to add to the website. */
EndOfCode;



////////// LISTS OF PUBLICATIONS OR TALKS /////////////////////////////////////


/**
 * Types of publications.
 * 
 * This array is used when you want to print a list of publications.
 * 
 * Each of its element is a type of publication, containing:
 * - an element indexed by 'icon', that should be a string containing the path
 *   to an image,
 * - for each language xx, two elements indexed py 'xx' and 'xxpl', that should
 *   be strings containing the singular and plural descriptions of the
 *   publication type in the language xx.
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_pubtypes        string => array( string => string )
 */
$op_pubtypes = array(
    'book' => array(
        'icon' => "includes/icones/1f4d8.svg",
        'fr'   => "Livre",
        'frpl' => "Livres",
        'en'   => "Book",
        'enpl' => "Books"
    ),
    'journal' => array(
        'icon' => "includes/icones/1f4c4.svg",
        'fr'   => "Article dans une revue",
        'frpl' => "Articles dans une revue",
        'en'   => "Journal article",
        'enpl' => "Journal articles"
    ),
    'bookchapter' => array(
        'icon' => "includes/icones/1f4d6.svg",
        'fr'   => "Chapitre d'ouvrage",
        'frpl' => "Chapitres d'ouvrages",
        'en'   => "Book chapter",
        'enpl' => "Book chapters"
    ),
    'conference' => array(
        'icon' => "includes/icones/1f4ac.svg",
        'fr'   => "Article dans les actes d'une conférence",
        'frpl' => "Actes de conférences",
        'en'   => "Conference article",
        'enpl' => "Conference proceedings"
    ),
    'unpublished' => array(
        'icon' => "includes/icones/1f4dd.svg",
        'fr'   => "Non publié",
        'frpl' => "Travaux non publiés",
        'en'   => "Unpublished",
        'enpl' => "Unpublished work"
    ),
    'thesis' => array(
        'icon' => "includes/icones/1f393.svg",
        'fr'   => "Mémoire",
        'frpl' => "Mémoires",
        'en'   => "Thesis",
        'enpl' => "Theses"
    )
);


/**
 * The order of the (indices of the) publication types.
 * 
 * This array should contain the indices of $op_pubtypes (the previous one).
 * Order them as you would want them to appear when the list of publications
 * is sorted by publication type.
 * 
 * To keep the order given in $op_pubtypes above, set:
 *      $op_pubtypes_order = array_keys($op_pubtypes);
 * 
 * @global  array   $op_pubtypes_order  int => string
 */
$op_pubtypes_order = array_keys($op_pubtypes);


/**
 * The possible states of a publication.
 * 
 * Notice that you should not defined a 'published' state: published 
 * publications will just have null as a state.
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_pubstates       string => array( string => string )
 */
$op_pubstates = array(
    'draft' => array(
        'fr' => "brouillon",
        'en' => "draft"
    ),
    'submitted' => array(
        'fr' => "soumis",
        'en' => "submitted"
    ),
    'review' => array(
        'fr' => "en révision",
        'en' => "under review"
    ),
    'accepted' => array(
        'fr' => "à paraître",
        'en' => "to appear"
    )
);


/**
 * Types of talks.
 * 
 * This array is used when you want to print a list of talks.
 * 
 * Each of its element is a type of talk, containing:
 * - an element indexed by 'icon', that should be a string containing the path
 *   to an image,
 * - for each language xx, two elements indexed py 'xx' and 'xxpl', that should
 *   be strings containing the singular and plural descriptions of the
 *   talk type in the language xx.
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_talktypes       string => array( string => string )
 */
$op_talktypes = array(
    'conference' => array(
        'icon' => "includes/icones/1f399.svg",
        'fr'   => "Conférence ou colloque",
        'frpl' => "Conférences et colloques",
        'en'   => "Conference or workshop",
        'enpl' => "Conferences and workshops"
    ),
    'seminar' => array(
        'icon' => "includes/icones/1f6e0.svg",
        'fr'   => "Séminaire",
        'frpl' => "Séminaires",
        'en'   => "Seminar",
        'enpl' => "Seminars"
    ),
    'poster' => array(
        'icon' => "includes/icones/1f5fa.svg",
        'fr'   => "Poster",
        'frpl' => "Présentations de posters",
        'en'   => "Poster",
        'enpl' => "Poster sessions"
    ),
    'dissemination' => array(
        'icon' => "includes/icones/1f37f.svg",
        'fr'   => "Exposé grand public",
        'frpl' => "Exposés pour non-spécialistes",
        'en'   => "Non-specialist talk",
        'enpl' => "Non-specialist talks"
    )
);


/**
 * The order of the (indices of the) talk types.
 * 
 * This array should contain the indices of $op_talktypes (the previous one).
 * Order them as you would want them to appear when the list of talks
 * is sorted by talk type.
 * 
 * To keep the order given in $op_talktypes above, set:
 *      $op_talktypes_order = array_keys($op_talktypes);
 * 
 * @global  array   $op_talktypes_order int => string
 */
$op_talktypes_order = array_keys($op_talktypes);


/**
 * Types of links that may be associated to a publication or a talk.
 * 
 * Each of the elements of this array should contain:
 *  - for each language xx, an element indexed by 'xx' containing the text of
 *    the link type in the language xx,
 *  - an optional element indexed by 'prefix' containing the prefix of the URLs
 *    of the links of this type.
 * 
 * For instance, arXiv links may have text "arXiv" (in each language), and URL
 * prefix "https://arxiv.org/abs/" — so that one just has to write the arXiv
 * identifier of the item when writing its data, e.g. 
 *      'arxiv' => "2200.1234"
 * instead of:
 *      'arxiv' => "https://arxiv.org/abs/2200.1234"
 * 
 * Translations must be provided for all languages defined in $op_mainlang and
 * in $op_otherlangs.
 * 
 * @global  array   $op_linktypes       string => array( string => string )
 */
$op_linktypes = array(
    'pdf' => array(
        'fr' => "PDF",
        'en' => "PDF"
    ),
    'arxiv' => array(
        'prefix' => "https://arxiv.org/abs/",
        'fr' => "arXiv",
        'en' => "arXiv"
    ),
    'hal' => array(
        'prefix' => "https://hal.archives-ouvertes.fr/",
        'fr' => "HAL",
        'en' => "HAL"
    ),
    'slides' => array(
        'fr' => "Diapos",
        'en' => "Slides"
    ),
    'code' => array(
        'fr' => "Code",
        'en' => "Code"
    ),
    'video' => array(
        'fr' => "Vidéo",
        'en' => "Video"
    )
);



////////// ADDITIONAL STUFF ///////////////////////////////////////////////////


/**
 * Additional content in the left and right areas of the pages.
 * 
 * $op_addleft (resp. $op_addright) is HTML code that will be inserted in the
 * area at the left (resp. at the right) of the body of the webpages.
 * 
 * However, it is reasonable to leave these empty: don't forget that these
 * areas shrink on smaller screens (or when the borwser is displayed in
 * half-screen). You might want to use the @media CSS selector to handle this.
 * 
 * @global  string  $op_addleft
 * @global  string  $op_addright
 */
$op_addleft = <<<EndOfCode
    <!-- Insert HTML code to be added in the left margin. -->
EndOfCode;

$op_addright = <<<EndOfCode
    <!-- Insert HTML code to be added in the right margin. -->
EndOfCode;


/**
 * Content of the footer of the pages.
 * 
 * This is the HTML code displayed in the footer of the pages. Please consider
 * keeping a link to https://github.com/sparusaurata/larus here. :-)
 * 
 * @global  string  $op_footer
 */
$op_footer = "<p>
    <span lang=\"fr\">Dernière modification&nbsp;:</span>
    <span lang=\"en\">Last edit:</span>
    " . last_edit() . ".
    <br>
    <span lang=\"fr\">Site construit à l'aide du modèle</span>
    <span lang=\"en\">Website build using the template</span>
    <a href=\"https://github.com/sparusaurata/larus\" target=\"_blank\">
    Larus</a>.
</p>";

?>

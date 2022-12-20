<?php // This is where you can configure some options for the
      // website. Further customisation can be done by modifying
      // the internal code in the includes/ folder.

// Prevent from loading directly this page.
// Do not modify this line.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


// Modify the options below to custom the webpage.
// Do not modify the global structure of this file unless you 
// know what you are doing.


////////// LANGUAGE OPTIONS ////////////////////////////////////////

// (De)activates the support for multiple languages.
$op_multilingual = true;

// Main (default) and other languages of the webpage.
// These should be 2-letter ISO 639-1 codes, see:
// https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes.
// Beware, changing these can result in some bugs! Make sure you
// update all the translations below, and check that the website
// works correctly before uploading it.
$op_mainlang = "fr";
$op_otherlangs = ["en"];

// Additional translations, used somewhere in the website.
// Beware, there are capitalised versions. This was the best option
// to make sure capitalising does not mess up with some languages.
$op_translations = array(
      'Abstract' => array(
            'fr' => "Résumé",
            'en' => "Abstract"
      ),
      'and' => array(
            'fr' => "et",
            'en' => "and"
      ),
      'Code' => array(
            'fr' => "Code",
            'en' => "Code"
      ),
      'PDF' => array(
            'fr' => 'PDF',
            'en' => 'PDF'
      ),
      'Slides' => array(
            'fr' => "Diapos",
            'en' => "Slides"
      ),
      'Video' => array(
            'fr' => 'Vidéo',
            'en' => 'Video'
      )
);


////////// INFORMATION ABOUT YOU AND THE WEBSITE ///////////////////

// Your name, as it should be displayed (without formatting).
$op_name = "John Doe";

// The title of the website: this should be a very short text.
// By default it is just your name, but it could also be something
// like 'John Doe's website'.
$op_title = array(
      'fr' => $op_name,
      'en' => $op_name
);

// The subtitle of the website. This can be set to null (in that
// case, the subtitle is disabled).
$op_subtitle = array(
      'fr' => "Ma page personnelle",
      'en' => "My personal webpage"
);

// A description of the website: this should remain quit short. It
// is displayed in search engines, or when sharing a link in some
// social network.
$op_description = array(
      'fr' => "La page personnelle de " . $op_name,
      'en' => $op_name . "'s personal webpage"
);

// The favicon of the website (this is the little icon displayed
// in the web browser tabs).
// Set this to null if you want to disable the favicon (or if it
// is already set by the server).
$op_favicon = "includes/larus-favicon.png";


////////// MAIN MENU ///////////////////////////////////////////////

// (De)activate the main menu at the top of each page.
$op_nav = true;

// Content of the main menu.
// For each menu item, specify a link (you probably want to link to
// other pages, like "research.php", or to headings in the same
// page, like "#research") and a title for each declared language.
$op_nav_content = [
      array(
            'link' => "#recherche",
            'fr'   => "Recherche",
            'en'   => "Research"
      ),
      array(
            'link' => "#enseignement",
            'fr'   => "Enseignement",
            'en'   => "Teaching"
      ),
      array(
            'link' => "#contact",
            'fr'   => "Contact",
            'en'   => "Contact"
      )
];


////////// EXTERNAL FUNCTIONALITIES ////////////////////////////////

// (De)activate the loading of the 'Roboto' font (from Google 
// fonts) as a default: https://fonts.google.com/specimen/Roboto.
$op_gfonts = true;

// If you want to load another set of Google fonts (or any fonts
// contained in a CSS stylesheet), set this to a string containing
// the link https://fonts.googleapis.com/css2?... provided by
// Google fonts.
$op_othergfonts = null;
// In case you want to modify the main font, this is where you
// should specify it.
$op_mainfont = "Roboto";
// Same for the font of the headings.
$op_headfont = $op_mainfont . " Condensed";

// (De)activate the loading of MathJax: https://www.mathjax.org/.
// This tool enables writing TeX formulæ.
$op_mathjax = true;


////////// STYLING /////////////////////////////////////////////////

// All colours should be valid CSS colour specifications, see:
// https://developer.mozilla.org/fr/docs/Web/CSS/color.

// Background colour of the website.
$op_bgcolour = "hsl(0, 3%, 23%)";

// Foreground colour of the website (default colour of the text).
$op_fgcolour = "white";

// Three colours for the styling of the pages.
// By default, similar colours are chosen; colour2 is lighter,
// colour3 is darker.
$op_colour1 = "hsl(0, 100%,  50%)";
$op_colour2 = "hsl(0, 100%,  70%)";
$op_colour3 = "hsl(0,  30%,  40%)";

// Colour for hovered hyperlinks.
$op_linkcolour = "#fd2";

// Additional CSS.
$op_addcss = <<<EndOfCode
      /* Put here any CSS style you want to add to the website. */
EndOfCode;


////////// PUBLICATION AND TALK LISTS //////////////////////////////

// List the types of publications. 
// An icon (link to an image) should be provided. By default, choose
// one of the existing.
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

// Give the order of the publication types. By default, this is just
// the order given below.
$op_pubtypes_order = array_keys($op_pubtypes);

// List the possible states of a publication.
// A 'published' option is not needed, this is the default state.
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
            'fr' => "to appear",
            'en' => "à paraître"
      )
);

// List the types of talks.
// An icon (link to an image) should be provided. By default, choose
// one of the existing.
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

// Give the order of the talk types. By default, this is just
// the order given below.
$op_talktypes_order = array_keys($op_talktypes);


////////// ADDITIONAL STUFF ////////////////////////////////////////

// If you want to add some content in the left an right margins of
// the pages, you can insert it here.
// Notice that you should also insrt the corresponding CSS in some
// way.
// Also, don't forget that the margins shrink on smaller screens,
// or when the web browser is displayed in half-screen. You might
// want to use the @media CSS selector to handle this.
$op_addleft = <<<EndOfCode
      <!-- Insert HTML code to be added in the left margin. -->
EndOfCode;
$op_addright = <<<EndOfCode
      <!-- Insert HTML code to be added in the right margin. -->
EndOfCode;

// Content of the footer.
// Please consider keeping a link to this website template if you
// modify this option.
$op_footer = array(
      'fr' => 
            "<p>
            Dernière modification&nbsp;: " . last_edit() . ".
            <br>
            Site construit à partir du modèle
            <a href=\"https://github.com/sparusaurata/larus\"
            target=\"_blank\">Larus</a>.
            </p>",
      'en' => 
            "<p>
            Last edit: " . last_edit() . ".
            <br>
            Website built upon the
            <a href=\"https://github.com/sparusaurata/larus\"
            target=\"_blank\">Larus</a>
            template.
            </p>"
);

?>

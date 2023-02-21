<?php 

/**
 * This file displays the header of the pages.
 * 
 * This is an internal file, do not modify unless you know what
 * you are doing!
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// This line prevents from loading directly this page. Do not modify.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }

// Load a set of useful functions, and the user's options.
require_once("functions.php");
require_once("config.php");

// Check the language requested in the URL.
if ( $op_multilingual
and array_key_exists('lang', $_GET)
and in_array($_GET['lang'], $op_otherlangs) ) {
    $lang = htmlspecialchars($_GET['lang']);
} else {
    $lang = $op_mainlang;
}

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <!---------- Metadata ---------------------------------------------------->
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>
        <?php 
        /**
         * Prints the title of the page together with the website title.
         * 
         * @param  array $strings The titles to be printed together
         * @return void
         */
        function print_title(...$strings) {
            echo implode(' | ', array_filter($strings));
        }

        print_title($page_title[$lang], $op_title[$lang]);
        ?>
    </title>
    
    <meta name="author" content="<?php echo $op_name; ?>" />
    
    <meta name="description" content="<?php echo $op_description[$lang]; ?>" />
    
    <?php if ( $op_favicon ):?>
    <link rel="icon" href="<?php echo $op_favicon; ?>" />
    <?php endif; ?>
    
    <!---------- Loading fonts ----------------------------------------------->

    <?php if ( $op_gfonts ): ?>
    <!-- The Work Sans fonts are imported from Google fonts,
    where they are distributed under the Open Font License. -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,500;0,900;1,300;1,500&display=swap" rel="stylesheet"> 
    <?php endif; ?>
    
    <?php if ( $op_othergfonts ): ?>
    <link href="<?php echo $op_othergfonts; ?>" rel="stylesheet">
    <?php endif; ?>
    
    <!---------- Loading styles ---------------------------------------------->
    
    <!-- Styles depending on the options set in `config.php`-->
    <style>
        :root{
            --bg: <?php echo $op_bgcolor; ?>;
            --fg: <?php echo $op_fgcolor; ?>;
            --c1: <?php echo $op_color1; ?>;
            --c2: <?php echo $op_color2; ?>;
            --c3: <?php echo $op_color3; ?>;
            --lk: <?php echo $op_linkcolor; ?>;
            --font: '<?php echo $op_mainfont; ?>';
            --hfont: '<?php echo $op_headfont; ?>';
        }

        :not(:lang(<?php echo $lang; ?>)) {
            display: none !important;
        }
    </style>

    <!-- Main stylesheet -->
    <link rel='stylesheet' type='text/css' href="includes/style.css" >

    <!-- Custom styles specified in `config.php` -->
    <style>
        <?php echo $op_addcss; ?>
    </style>

    <!---------- Javascript -------------------------------------------------->

    <!-- Loading JS internal to the template -->
    <script type="text/javascript" src="includes/js.js"></script>

    <?php if ( $op_mathjax ): ?>
    <!-- Loading MathJax, see https://www.mathjax.org. -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  	<script id="MathJax-script" async
        src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
    <?php endif; ?>

</head>

<!------------ THE PAGE STARTS HERE ------------------------------------------>

<body>

<!-- Area at the left of the body of the page. -->
<div id="gauche">
    <?php echo $op_addleft; ?>
</div>

<!-- Body of the page, wrapping header, text and footer -->
<div id="milieu">

    <header>

        <?php if ($op_multilingual): ?>
        <!-- Language selection links -->
        <div id="lang">
            <?php 
            /**
             * Prints a language link (or a span for the active language).
             * 
             * @param   string $l    Identifier of the language
             * @return  string       HTML code
             */
            function print_lang_link($l) {
                global $lang, $op_mainlang;
                if ($l == $lang) {
                    echo "<span>" . strtoupper($l) . "</span>";
                } else {
                    echo "<a href=\"" . $_SERVER['PHP_SELF'];
                    if ($l != $op_mainlang) {
                        echo "?lang=" . $l;
                    }
                    echo "\">" . strtoupper($l) . "</a>";
                }
            }

            // Print the link for the main language
            print_lang_link($op_mainlang);

            // Print the links for the other languages,
            // with separators.
            foreach ($op_otherlangs as $l) {
                echo " | ";
                print_lang_link($l);
            }
            ?>
        </div>
        <?php endif; ?>
        
        <!-- The main title of the wbesite -->
        <div id="titre">
            <a href="<?php print_langurl("index.php"); ?>#">
                <?php echo $op_title[$lang]; ?>
            </a>
        </div>

        <?php if ($op_subtitle): ?>
        <!-- The subtitle of the website -->
        <div id="soustitre">
            <?php echo $op_subtitle[$lang]; ?>
        </div>
        <?php endif; ?>

        <?php if ($op_nav): ?>
        <!-- The main menu of the website -->
        <nav>
            <?php foreach ($op_nav_content as $item): ?>
                <a
                    href="<?php print_langurl($item['link']); ?>"
                    <?php if ( !empty($item['out']) ): ?>
                        target="_blank"
                    <?php endif; ?> >
                    <?php echo $item[$lang]; ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>

    </header>
    
    <!-- Wrapper for the text (between header and footer) -->
    <div id="corps">

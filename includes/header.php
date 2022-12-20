<?php // This is an internal file, do not modify unless you know
      // what you are doing!

// Prevent from loading directly this page.
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
	<meta http-equiv="Content-Type"
        content="text/html; charset=utf-8" />
    <title>
        <?php print_title($page_title[$lang], $op_title[$lang]); ?>
    </title>
    <meta name="author" content="<?php echo $op_name; ?>" />
    <meta name="description"
        content="<?php echo $op_description[$lang]; ?>" />
    <?php if ( $op_favicon ):?>
    <link rel="icon" href="<?php echo $op_favicon; ?>" />
    <?php endif; ?>
    
    <!-- Loading fonts -->
    <?php if ( $op_gfonts ): ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i%7CRoboto:400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <?php endif; ?>
    <?php if ( $op_othergfonts ): ?>
    <link href="<?php echo $op_othergfonts; ?>" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Loading styles -->
    <style>
        :root{
            --bg: <?php echo $op_bgcolour; ?>;
            --fg: <?php echo $op_fgcolour; ?>;
            --c1: <?php echo $op_colour1; ?>;
            --c2: <?php echo $op_colour2; ?>;
            --c3: <?php echo $op_colour3; ?>;
            --lk: <?php echo $op_linkcolour; ?>;
            --font: '<?php echo $op_mainfont; ?>';
            --hfont: '<?php echo $op_headfont; ?>';
        }

        :not(:lang(<?php echo $lang; ?>)) {
            display: none !important;
        }
    </style>
    <link rel='stylesheet' type='text/css'
        href="includes/style.css" >
    <style>
        <?php echo $op_addcss; ?>
    </style>

    <!-- Loading JS -->
    <script type="text/javascript" src="includes/js.js"></script>

    <?php if ( $op_mathjax ): ?>
    <!-- Loading MathJax -->
    <script
        src="https://polyfill.io/v3/polyfill.min.js?features=es6">
    </script>
  	<script id="MathJax-script" async
        src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
    <?php endif; ?>

</head>

<body>

<div id="gauche">
    <?php echo $op_addleft; ?>
</div>

<div id="milieu">

    <header>

        <?php if ($op_multilingual): ?>
        <div id="lang">
            <?php 
            // First a function to display the language links
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
            // Then the link for the main language
            print_lang_link($op_mainlang);
            // Finally the links for the other languages,
            // with separators.
            foreach ($op_otherlangs as $l) {
                echo " | ";
                print_lang_link($l);
            }
            ?>
        </div>
        <?php endif; ?>

        <div id="titre">
            <a href="<?php print_langurl("index.php"); ?>#">
                <?php echo $op_title[$lang]; ?>
            </a>
        </div>

        <?php if ($op_subtitle): ?>
        <div id="soustitre">
            <?php echo $op_subtitle[$lang]; ?>
        </div>
        <?php endif; ?>

        <?php if ($op_nav): ?>
        <nav>
            <?php foreach ($op_nav_content as $item): ?>
                <a href="<?php print_langurl($item['link']); ?>">
                    <?php echo $item[$lang]; ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>

    </header>

    <div id="corps">

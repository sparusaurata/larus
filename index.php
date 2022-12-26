<?php

/**
 * This file is the home page of your website.
 * 
 * Modify it according to the instructions below!
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// The title of this page (in all the languages of the website).
// For the home page, this is usually left empty.
$page_title = array(
    'fr' => "",
    'en' => ""
);

// Do not modify these two lines.
define("origin", __FILE__);
require_once("includes/header.php");
///////////////////////////////////////////////////////////////////////////////
?>

<p class="topelement" lang="en">
    <img class="myself" src="includes/larus-michahellis.png"
    title="Larus Michahellis in the Farnese gardens (cc) Krzysztof Golik">
    This is a demo for the Larus template. It also serves as a basic user 
    documentation.
</p>

<p lang="en">
    If you read this to understand how the template works, you should have had
    a look to the
    <a href="https://github.com/sparusaurata/larus/blob/main/README.md" 
        target="_blank">README</a>
    first. Then, the user documentation is divided into two files:
</p>

<ul lang="en">
    <li>
        <b>index.php</b> presents the global architecture of the template and
        the writing of a simple HTML page (it generates the page you are 
        currently reading);
    </li><li>
        <b>lists.php</b> presents our tool for creating lists of publications
        or talks (it generates <a href="lists.php">this page</a>).
    </li>
</ul>

<p lang="en">
    You should probably keep an eye on the source code of these files 
    (available <a href="https://github.com/sparusaurata/larus/" 
    target="_blank">on GitHub</a>)
    while reading the generated webpages, to see what happens.
</p>


<!---------------------------------------------------------------------------->

<!-- Text between these weird tags will not be displayed:
it is intended for comments -->

<h1 lang="en">Basic HTML writing</h1>


<p lang="en">
    The syntax of HTML is based on <i>tags</i>. Most elements have an opening 
    and a closing tag:
    <?php print_code('<tag attribute1="value" attribute2="value" ... >
    content </tag>', true); ?>
    and some only have an opening tag. The most useful tags are listed below.
</p>


<h2 lang="en">Vertical elements</h2>


<p lang="en">
    Vertical elements are defined with the following tags:
</p>

<ul lang="en">
    <li>
        Paragraphs are wrapped into
        <?php print_code('<p>...</p>'); ?> tags.
    </li><li>
        Unordered lists (like this one) are wrapped into
        <?php print_code('<ul>...</ul>'); ?> tags.
    </li><li>
        Ordered lists are wrapped into
        <?php print_code('<ol>...</ol>'); ?> tags.
    </li><li>
        List items inside an (un)ordered list (like these four items)
        are wrapped into <?php print_code('<li>...</li>'); ?> tags.
    </li><li>
        Headings of level 1 (resp. 2, 3) are wrapped into
        <?php print_code('<h1>...</h1>'); ?> (resp. 
        <?php print_code('<h2>'); ?>, <?php print_code('<h3>'); ?>) tags.<br>
        The HTML syntax accepts up to six levels of headings, yet this
        template supports only the first three (but why would you use more?).
    </li>
</ul>

<p lang="en">
    The first vertical element of a page should have an attribute
    <?php print_code('class="topelement"'); ?>
    so that its vertical margin is set correctly (otherwise, the margin
    between it and the header could be too small or too big).
    See the first paragraph of this page, for example.
</p>

<p lang="en">
    If you want to put a skip above a paragraph (to separate it from the 
    previous paragraph), add the following attribute:
    <?php print_code('class="skipabove"'); ?>. 
</p>


<h2 lang="en">Horizontal elements</h2>


<p lang="en">
    Horizontal elements are defined with the following tags:
</p>

<ul lang="en">
    <li>
        <b>Bold</b> and <i>italic</i> text are wrapped into
        <?php print_code('<b>...</b>'); ?> and
        <?php print_code('<i>...</i>'); ?> tags respectively.
    </li><li>
        <span>An element</span> (without specific formatting) can be isolated
        with the <?php print_code('<span>...</span>'); ?> tag. We'll see why
        this can be useful below.
    </li><li>
        A <a href="" target="_blank">
        hyperlink</a> is written with the following syntax:
        <?php print_code('<a href="url">text</a>'); ?>.<br>
        To open the link in a new tab, add the 
        <?php print_code('target="_blank"'); ?> attribute
        (see the example above).
    </li>
</ul>


<h2 lang="en">Multilingual writing</h2>


<p lang="en">
    Each of these tags can have a
    <?php print_code('lang="..."'); ?> attribute,
    where the value should be a two-character language code (for instance,
    <?php print_code('en'); ?> or <?php print_code('fr'); ?>).
</p>

<p lang="en">
    If your website is supposed to support several languages, each element 
    should be translated in each language. When a page is loaded in some
    language, for instance in English, the elements will only be displayed if:
</p>
<ul lang="en">
    <li>they have an attribute <?php print_code('lang="en"'); ?>, </li>
    <li>they have no <?php print_code('lang'); ?> attribute. </li>
</ul>

<p lang="en">
    To choose the language(s) of your website, and to further customise
    the language support, you can have a look at the options in the file 
    <a href="https://github.com/sparusaurata/larus/blob/main/config.php" 
    target="_blank"><b>config.php</b></a>.
</p>


<!---------------------------------------------------------------------------->

<h1 lang="en">Structure of the website</h1>


<h2 lang="en">Single page vs. multiple pages</h2>




<h2>
    <span lang="en">The main menu</span>
</h2>




<h2 lang="en">More options</h2>




<?php
// Do not modify these lines.
require_once("includes/footer.php");
?>

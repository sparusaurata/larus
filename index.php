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

<p class="topelement" lang="fr">
    La documentation n'est pas encore traduite en français, désolé...
</p>

<!---------------------------------------------------------------------------->

<!-- Text between these weird tags will not be displayed:
it is intended for comments -->


<!-- This paragraph has class "topelement" because it is the first of the
page (for English language), so its spacing must be adapted. -->
<p class="topelement" lang="en">
    <!-- This tag inserts an image. The class "myself" automatically puts the
    image on the right of the paragraph and resizes it. -->
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
        List items inside an (un)ordered list (like these five items)
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
    As an example, see the following...
</p>

<p lang="en" class="skipabove">
    ... paragraph.
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

<p lang="en">
    If MathJax is enabled (this is the case by default),
    you can also write mathematical formulæ by putting some TeX code inside
    <!-- Don't worry if you don't understand the line below -->
    <span class="code"><span>\(</span>...<span>\)</span></span>
    delimiters.
    Let's try: \( \int_0^{+\infty} e^{-x^2} \mathrm{d}x = \frac{\sqrt{\pi}}2 \).
</p>


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
    language, for instance in English (<?php print_code('en'); ?>),
    the elements will only be displayed if:
</p>

<ul lang="en">
    <li>they have an attribute <?php print_code('lang="en"'); ?>, </li>
    <li>they have no <?php print_code('lang'); ?> attribute. </li>
</ul>

<p lang="en">
    Again, see the source code of this page as an example!
    Notice that there are two possible ways to organise a multiplingual webpage:
    either you write all the paragraphs in language 1, then all the paragraphs 
    in language 2, etc.; or you write the first paragraph in each language,
    then the second paragraph in each language, etc.
</p>

<p lang="en">
    To choose the language(s) of your website, and to further customise
    the language support, you can have a look at the options in the file 
    <a href="https://github.com/sparusaurata/larus/blob/main/config.php" 
    target="_blank"><b>config.php</b></a>.
</p>


<!---------------------------------------------------------------------------->

<h1 lang="en">Structure of the website</h1>


<h2 lang="en">Single page vs. multiple pages</h2>


<p lang="en">
    Two main architectures are possible:
</p>

<ul lang="en">
    <li>
        a <b>single-page</b> website, which means that it only has one page
        and that the links in the main menu (if there is a main menu)
        point to different sections of this page;
    </li><li>
        a <b>multiple-pages</b> website, which means that it contains several
        webpages and the links in the main menu points to these different pages.
    </li>
</ul>

<p lang="en">
    If you want to keep the website short, you should consider the first option.
    Otherwise, you could prefer the second one and divide your website into 
    several pages (usual pages are “Research”, “Teaching”, etc.).
</p>

<p lang="en">
    For each of these pages, create a file <b>name.php</b>
    (you should take this <b>index.php</b> as a model).
    Leave all the pages in the home directory of the server if you want to 
    avoid some bugs!
    Notice that the home page should always be <b>index.php</b>.
    For example, this demo website contains two pages, <b>index.php</b>
    and <b>lists.php</b>. 
</p>


<h2 id="heading">
    <span lang="en">The main menu</span>
</h2>

<p lang="en">
    Let us have a look to the configuration of the main menu
    (that will only be displayed if the option 
    <?php print_code('$op_nav'); ?>
    is set to <?php print_code('true'); ?>
    in <b>config.php</b>).
    This is the menu you see at the top of the page, under the title of the 
    website.
</p>

<p lang="en">
    The links of the menu are contained in the option 
    <?php print_code('$op_nav_content'); ?> in <b>config.php</b>.
    Let us describe the default value of this option, that generates the menu 
    of this demo.
</p>

<ul lang="en">
    <li>
        The first two links point to <?php print_code('index.php'); ?>
        and <?php print_code('lists.php'); ?>.
        These are <b>inner links</b>, they point to other pages of the website.
        <br>
        The URL should be the (relative) path to the webpages,
        but since all the webpages are stored in the same folder,
        the path is just the name of the file.
    </li><li>
        The third link points to
        <?php print_code('https://github.com/sparusaurata/larus'); ?>.
        This is an <b>outer link</b>, it points to somewhere outside the
        website.
        <br>
        Even if this is not very recommended in the main menu,
        this can be achieved by providing the whole URL of the destination.
        Notice that the corresponding item in
        <?php print_code('$op_nav_content'); ?>
        contains a parameter <?php print_code("'out' => true"); ?>:
        this makes the link open in a new tab.
    </li><li>
        The last link points to <?php print_code('#heading'); ?>.
        This is an <b>anchor link</b>, it points to somewhere <i>inside</i>
        the page you are reading
        (in this example, it points to the title “The main menu” above).
        <br>
        To achieve this, you must first place an <i>anchor</i> somewhere in 
        the webpage, so that you can link to it.
        This is done by adding an attribute <?php print_code('id="anchor"'); ?>
        to the HTML element you want to link to.
        Then, the URL pointing to this anchor is just
        <?php print_code('#anchor'); ?>.
        <br>
        Notice that <?php print_code('id'); ?>'s must be <i>unique</i>,
        so you cannot write:
        <?php print_code('<h1 id="anchor" lang="en">Heading</h1>', true); ?>
        <?php print_code('<h1 id="anchor" lang="fr">Titre</h1>'); ?>
        <br>
        Instead, you should write:
        <?php print_code('<h1 id="anchor">', true); ?>
        <?php print_code('<span lang="en">Heading</span>'); ?><br>
        <?php print_code('<span lang="fr">Titre</span>'); ?><br>
        <?php print_code('</h1>'); ?><br>
        as it is done in the example given in this page!
    </li>
</ul>

<p lang="en">
    Basically you should use anchor links for the menu of a single-page website,
    and inner links for the menu of a multiple-pages website.
</p>


<h2 lang="en">More options</h2>

<p lang="en">
    Additional options to customise the website are available in the file 
    <b>config.php</b>.
</p>

<!---------------------------------------------------------------------------->

<?php
// Do not modify these lines.
require_once("includes/footer.php");
?>

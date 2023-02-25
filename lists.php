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
    'fr' => "Listes de publications et d'exposés",
    'en' => "Lists of publications and talks"
);

// Do not modify these two lines.
define("origin", __FILE__);
require_once("includes/header.php");
///////////////////////////////////////////////////////////////////////////////
?>

<p class="topelement" lang="en">
    This is the documentation for the main feature of this template:
    the generation of lists of publications or talks.
</p>

<p lang="en">
    The general functioning of this generation is divided into two steps 
    (just like a simplified BibTeX-like system):
</p>

<ol lang="en">
    <li>
        The writing of a <b>database</b> containing the publications (or the 
        talks).
        <br>
        This is done in a dedicated file; you can find examples in 
        <a href="https://github.com/sparusaurata/larus/blob/main/data-publications.php" target="_blank"><b>data-publications.php</b></a>
        and <a href="https://github.com/sparusaurata/larus/blob/main/data-talks.php" target="_blank"><b>data-talks.php</b></a>.
        These files are thoroughly documented and should be
        self-explanatory. 
    </li><li>
        The generation of a list of publications (or talks) inside one of your 
        webpages.
        <br>
        This is done by calling a specific PHP function, which will be described
        in the many examples of this page (these examples rely on the two 
        aforementioned example databases).
    </li>
</ol>

<!---------------------------------------------------------------------------->

<h1 lang="en">The <?php print_code('print_list'); ?> function</h1>

<p lang="en">
    Generating a list of publications is done with a PHP function called 
    <?php print_code('print_list'); ?>. It takes three parameters:
    a string containing a unique identifier,
    a string containing the path to the database,
    an array of customisation options.
</p>

<p lang="en">
    Let's first try the function with no customisation,
    by writing the following line of code:
    <br>
    <?php print_code('<?php print_list("example1", "data-publications.php", 
    array()); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example1", "data-publications.php", array()); ?>
</div>

<p lang="en">
    Have a look to <a href="https://github.com/sparusaurata/larus/blob/main/data-publications.php" target="_blank"><b>data-publications.php</b></a>
    to see how each publication is rendered.
    Notice that the publications are sorted in chronological, decreasing order. 
</p>

<!---------------------------------------------------------------------------->

<h1 lang="en">Reversed order (<?php print_code('rev'); ?>)</h1>

<p lang="en">
    The <?php print_code('rev'); ?> option tells whether the ordering of the 
    publications should be increasing or decreasing. It is set to 
    <?php print_code('true'); ?> by default, so let's disable it:
    <br>
    <?php print_code('<?php print_list("example2", "data-publications.php", 
    array( "rev" => false )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example2", "data-publications.php", array(
    "rev" => false 
)); ?>
</div>

<p lang="en">
    Now the publications are sorted in increasing order.
    Notice that we changed the identifier
    from <?php print_code('example1'); ?> to <?php print_code('example2'); ?> 
    to keep it unique.
</p>

<!---------------------------------------------------------------------------->

<h1 lang="en">Sub-headings (<?php print_code('subheads'); ?>)</h1>

<p lang="en">
    The <?php print_code('subheads'); ?> option divides the publication list 
    into subsections (depending on the ordering of the publications, as we 
    will see later). Let's see what this means:
    <br>
    <?php print_code('<?php print_list("example3", "data-publications.php", 
    array( "subheads" => true )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example3", "data-publications.php", array(
    "subheads" => true 
)); ?>
</div>

<!---------------------------------------------------------------------------->

<h1 lang="en">
    Hiding subsections
    (<?php print_code('hide'); ?> and <?php print_code('hidefst'); ?>)
</h1>

<p lang="en">
    The <?php print_code('hide'); ?> option has an effect only if
    <?php print_code('subheads'); ?> is enabled, and its effect is to 
    hide the subsections (but the first one). To show a subsection,
    one just has to click on the corresponding sub-heading: 
    <br>
    <?php print_code('<?php print_list("example4", "data-publications.php", 
    array( "subheads" => true, "hide" => true )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example4", "data-publications.php", array(
    "subheads" => true,
    "hide" => true  
)); ?>
</div>

<p lang="en">
    In addition, the <?php print_code('hidefst'); ?> also hides the first 
    subsection:
    <?php print_code('<?php print_list("example5", "data-publications.php", 
    array( "subheads" => true, "hide" => true, "hidefst => true )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example5", "data-publications.php", array(
    "subheads" => true,
    "hide" => true,
    "hidefst" => true
)); ?>
</div>

<!---------------------------------------------------------------------------->

<h1 lang="en">
    Ordering by publication type
    (<?php print_code('sortby'); ?>)
</h1>

<p lang="en">
    The <?php print_code('sortby'); ?> option takes two possible values:
    <?php print_code('"date"'); ?> (this is the default behaviour) and
    <?php print_code('"type"'); ?>. This second value sorts the publications 
    by type instead of year, and should be used in combination with 
    <?php print_code('subheads'); ?>:
    <br>
    <?php print_code('<?php print_list("example6", "data-publications.php", 
    array( "sortby" => "type", "subheads" => true )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example6", "data-publications.php", array(
    "sortby" => "type",
    "subheads" => true 
)); ?>
</div>

<!---------------------------------------------------------------------------->

<h1 lang="en">
    Lists of talks
    (<?php print_code('listtype'); ?>)
</h1>

<p lang="en">
    The <?php print_code('listtype'); ?> option takes two possible values:
    <?php print_code('"pubs"'); ?> (this is the default behaviour) and
    <?php print_code('"talks"'); ?>. This second value generates a list of talks
    instead of a list of publications. The database should be formatted a bit 
    differently, see <a href="https://github.com/sparusaurata/larus/blob/main/data-talks.php" target="_blank"><b>data-talks.php</b></a>.
    <br>
    <?php print_code('<?php print_list("example7", "data-talks.php", 
    array( "listtype" => "talks" )); ?>'); ?>.
</p>

<div lang="en">
<?php print_list("example7", "data-talks.php", array(
    "listtype" => "talks"
)); ?>
</div>

<!---------------------------------------------------------------------------->

<p class="topelement" lang="fr">
    La documentation n'est pas encore traduite en français, désolé...
</p>

<?php
// Do not modify these lines.
require_once("includes/footer.php");
?>

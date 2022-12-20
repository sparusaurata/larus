<?php // This is the home page of your website.
      // Here, you can modify what the user first sees when
      // they load your wbesite.

// The title of this page (in all the languages of the website).
// For the home page, this is usually left empty.
$page_title = array(
    'fr' => "",
    'en' => ""
);

// Do not modify these lines.
define("origin", __FILE__);
require_once("includes/header.php");

// Write some HTML code below.
// A few instructions if you are new to HTML:
// - Paragraphs should be wrapped into <p>...</p> tags.
// - Lists can be writtend with the tags <ul>...</ul> (unordered) or
//   <ol>...</ol> (oredered). Inside a list, list items should be wrapped
//   into <li>...</li> tags.
// - Headings should be wrapped into <hN>...</hN> tags, were N is the level
//   of the heading (styling is predefined for h1, h2 and h3 only).
// - You can emphasize text with <em>...</em>.
// - You can write hyperlinks with <a href="https://url...">...</a>.
//   See: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a for
//   more details.
// - Add the option lang="xx" inside an opening tag (see examples below)
//   to show this element only if the current language is xx. For a
//   multilingual website, each element should be present once for each
//   language.
// - Add the option id="bla" inside an opening tag (see examples below) if
//   you want to be able to write links to this element. For a single-page
//   website, this is particularly useful for linking to the headings in the
//   main menu.
// - Add the option class="topelement" inside the opening tags of the first
//   element of the page (for each language), so that the margins adapt.
?>

<img class="myself" src="includes/larus-michahellis.png"
title="Larus Michahellis in the Farnese gardens (cc) Krzysztof Golik" />

<p class="topelement">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. <em>Cras hendrerit consectetur tincidunt.</em> Ut mauris magna, condimentum quis volutpat at, interdum nec dolor. Nunc ut cursus sapien. Aliquam nec rhoncus felis. Nam sollicitudin ante at erat blandit interdum. Mauris sed blandit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam id condimentum eros. Suspendisse rhoncus est ut nisl vehicula lacinia. Donec vitae accumsan sapien, vel gravida mi. Nam sit amet feugiat mauris.
</p><p>
    Quisque risus magna, hendrerit aliquam interdum sit amet, tempor ut elit. Phasellus quis efficitur nisi, ut eleifend eros. Proin vel placerat purus, ac pellentesque ante. Quisque vitae metus tincidunt, molestie nisi vitae, auctor magna. Mauris interdum erat eu eros molestie, sed mattis orci dapibus. Morbi suscipit non nisl vel egestas. Aliquam sit amet lacus ac nibh semper laoreet.
</p>

<h1 id="recherche" lang="fr">Recherche</h1>
<h1 id="recherche" lang="en">Research</h1>

<p>
    Donec egestas metus quis tincidunt volutpat. Morbi ac diam leo. Quisque consectetur dapibus tincidunt. Etiam ut felis in nisl facilisis suscipit. Morbi efficitur augue ac egestas vestibulum. Phasellus eget ipsum quis metus suscipit volutpat sit amet id arcu. 
</p><ul>
    <li>In cursus justo diam, vitae laoreet dolor blandit semper. Mauris erat turpis, cursus a felis condimentum, ultrices rutrum dolor.</li>
    <li>Vestibulum in vehicula nisi, et ultrices dolor. Proin eget laoreet diam, a lobortis nisl. Nullam mattis ipsum sed suscipit euismod. In blandit finibus fringilla.</li>
</ul><p>
    Quisque vitae metus tincidunt, molestie nisi vitae, auctor magna. Mauris interdum erat eu eros molestie, sed mattis orci dapibus. Morbi suscipit non nisl vel egestas. Aliquam sit amet lacus ac nibh semper laoreet.
</p>

<h2>Blou bli bla</h2>

<p>
    Sed dolor augue, tristique non pretium et, sodales at nisl. Sed a vestibulum neque. Nullam et enim ac velit lacinia fermentum eu sed purus. Cras sed lectus vestibulum, mattis lorem non, fermentum purus. In nec rhoncus justo. Vivamus nibh massa, pellentesque ac ullamcorper non, sodales ac nisl. Sed id consectetur libero. Etiam vulputate vel leo quis volutpat. Donec a mi vitae nibh auctor scelerisque at id quam. Morbi mattis lorem et leo gravida ornare. Sed elementum, leo at vehicula sollicitudin, risus orci hendrerit velit, ut interdum urna justo vitae orci. Donec consectetur mollis eros. Proin placerat aliquam hendrerit. Curabitur viverra sed mauris ut sagittis.
</p><p>
    Nunc luctus, turpis eu vestibulum lacinia, erat erat maximus odio, ac dictum dui velit et eros. Phasellus ac iaculis libero. In hac habitasse platea dictumst. Mauris et facilisis magna, vitae tempus arcu. In consectetur, velit sit amet dapibus sollicitudin, justo nisl porta metus, vel sollicitudin mauris arcu ultrices enim. Quisque sed malesuada dolor. Phasellus aliquet diam eu interdum semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer ex odio, tempus ut augue vitae, faucibus sodales dui. Nam sit amet egestas urna. Nullam molestie lectus id erat ornare dictum.
</p>

<h2>Publications</h2>

<?php print_pubs("pubs", "liste-travaux.php", array(
    'rev' => true,
    'subheads' => true,
    'hide' => false
)); ?>

<h2 lang="fr">Exposés</h2>
<h2 lang="en">Talks</h2>

<?php print_pubs("exp", "liste-exposés.php", array(
    'list' => 'talks'
)); ?>


<h1 id="enseignement" lang="fr">Enseignement</h1>
<h1 id="enseignement" lang="en">Teaching</h1>

<p>
    In venenatis augue ex, et sollicitudin est lobortis in. Vivamus scelerisque diam neque, at pretium dolor bibendum non. Nam tempor, arcu nec vestibulum interdum, leo mauris tristique eros, non sodales odio tellus at ante. In porttitor tincidunt nisl fringilla volutpat. Curabitur in posuere nisi. Ut lobortis quis odio non viverra. Suspendisse arcu sapien, dictum et neque non, volutpat tristique est.
</p><p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit consectetur tincidunt. Ut mauris magna, condimentum quis volutpat at, interdum nec dolor. Nunc ut cursus sapien. Aliquam nec rhoncus felis. Nam sollicitudin ante at erat blandit interdum. Mauris sed blandit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam id condimentum eros. Suspendisse rhoncus est ut nisl vehicula lacinia. Donec vitae accumsan sapien, vel gravida mi. Nam sit amet feugiat mauris. Quisque risus magna, hendrerit aliquam interdum sit amet, tempor ut elit. Phasellus quis efficitur nisi, ut eleifend eros. Proin vel placerat purus, ac pellentesque ante.
</p>


<h1 id="contact" lang="fr">Contact</h1>
<h1 id="contact" lang="en">Contact</h1>

<p>
    Sed dolor augue, tristique non pretium et, sodales at nisl. Sed a vestibulum neque. Nullam et enim ac velit lacinia fermentum eu sed purus. Cras sed lectus vestibulum, mattis lorem non, fermentum purus. In nec rhoncus justo. Vivamus nibh massa, pellentesque ac ullamcorper non, sodales ac nisl. Sed id consectetur libero. Etiam vulputate vel leo quis volutpat. Donec a mi vitae nibh auctor scelerisque at id quam. Morbi mattis lorem et leo gravida ornare. Sed elementum, leo at vehicula sollicitudin, risus orci hendrerit velit, ut interdum urna justo vitae orci. Donec consectetur mollis eros. Proin placerat aliquam hendrerit. Curabitur viverra sed mauris ut sagittis.
</p>

<?php
// Do not modify these lines.
require_once("includes/footer.php");
?>

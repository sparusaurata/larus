<?php 

/**
 * This file contains the data corresponding to a set of publications.
 * 
 * This is a sample file containing some publications, formatted in the 
 * specific format used by the website. Copy or modify it to store your own 
 * publications.
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// This line prevents from loading directly this page. Do not modify.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


/**
 * This file should only define an array $data, which will contain your 
 * publications (see an example below).
 * 
 * The different parameters of a publication are the following.
 * Mandatory parameters are indicated with M, optional ones with O.
 * 
 * - 'title'        (string)  (M)   The title of the publication.
 *                                  HTML code can be used here.
 * 
 * - 'authors'      (array)   (M)   An array containing strings, each string 
 *                                  being one of the authors.
 *                                  HTML code can be used here.
 * 
 * - 'type'         (string)  (M)   The type of the publication.
 *                                  This should be one of the identifiers 
 *                                  defined in the option $op_pubtypes.
 *                                  By default, types 'book', 'journal',
 *                                  'bookchapter', 'conference', 'thesis'
 *                                  and 'unpublished' are defined.
 * 
 * - 'state'        (string)  (M)   The state of the publication.
 *                                  This should be one of the identifiers 
 *                                  defined in the option $op_pubstates (by
 *                                  default, states 'draft', 'submitted',
 *                                  'review' and 'accepted' are defined),
 *                                  or null if the publication is published.
 * 
 * - 'date'         (string)  (M)   The date of the publication.
 *                                  The string should have format "YYYY-MM-DD".
 * 
 * - 'infoxx'       (strings) (O)   Some details about the publication 
 *   'info'                         (e.g. where it was published).
 *                                  HTML code can be used here.
 *                                  A parameter 'infoxx' can be provided for
 *                                  each language xx. The fallback parameter 
 *                                  'info' will be used if no 'infoxx' is found,
 *                                  so you might want to use 'info' instead of
 *                                  'infoen' to display the English details by
 *                                  default.
 * 
 * - 'abstractxx'   (strings) (O)   An abstract of the publication.
 *   'abstract'                     HTML code can be used here.
 *                                  Same remark as above for multilingual
 *                                  versions.
 * 
 * - 'important'    (boolean) (O)   Whether this publication is important and
 *                                  should be emphasized.
 * 
 * - 'pdf', etc.    (strings) (O)   The links associated to the publication.
 *                                  The possible parameters are defined in the
 *                                  option $op_linktypes (by default, the
 *                                  parameters 'pdf', 'arxiv', 'hal', 'slides',
 *                                  'code' and 'video' are defined).
 * 
 * You will find an example $data below.
 * At the bottom of the page, there is an empty publication that you can
 * copy-paste. 
 */

$data = [
    array(
        // Mandatory parameters
        'title'         => "A first publication",
        'authors'       => ["L.M.", "A. Coauthor"], // Array of strings
        'type'          => "bookchapter",
        'state'         => null,                    // Specify if not published
        'date'          => "2021-01-01",            // YYYY-MM-DD
        // Optional parameters (can be removed but let's fill them all!)
        'infofr'        =>
            "In A. Director, <i>Title of the book</i>, Some Publisher, Marseille. Du texte en français.",
        'info'          =>                          // Displayed by default
            "In A. Director, <i>Title of the book</i>, Some Publisher, Marseille. Some text in English.",
        'abstractfr'    =>
            "<p>
            Voici un résumé un peu long, dans lequel je peux insérer <b>des balises HTML</b> et même des maths : \(e^{i\pi}+1=0\).
            </p><p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac lacinia turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam in magna id sapien sodales pulvinar id ut leo. Sed consectetur viverra leo, quis consequat elit dignissim sit amet. Curabitur in venenatis nisi. Phasellus consectetur, purus pulvinar volutpat semper, nibh augue feugiat nisi, euismod commodo erat quam ut justo.
            </p>",
        'abstract'      =>                          // Displayed by default
            "<p>
            Here is a long-ish abstract, in which I may insert <b>HTML tags</b> or even some maths: \(e^{i\pi}+1=0\).
            </p><p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac lacinia turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam in magna id sapien sodales pulvinar id ut leo. Sed consectetur viverra leo, quis consequat elit dignissim sit amet. Curabitur in venenatis nisi. Phasellus consectetur, purus pulvinar volutpat semper, nibh augue feugiat nisi, euismod commodo erat quam ut justo.
            </p>",
        'important'     => true,
        'pdf'           => "files/publications/sample.pdf",
        'arxiv'         => "2012.00719",            // Only the arXiv identifier
        'hal'           => "hal-03174836",          // Only the HAL identifier
        'code'          => "files/publications/sample.pdf",
        'slides'        => "files/publications/sample.pdf",
    ),
    array(
        // Mandatory parameters
        'title'         => "A second publication",
        'authors'       => ["L.M."],                // Array of strings
        'type'          => "journal",
        'state'         => null,                    // Specify if not published
        'date'          => "2022-02-02",            // YYYY-MM-DD
        // Optional parameters (can be removed)
        'info'          =>                          // Displayed by default
            "<i>International Journal of Seagull Studies</i>, vol. 42, no. 1.",
        'abstract'      =>                          // Displayed by default
            "<p>
            Morbi ac volutpat nisl. Suspendisse potenti. Etiam nec orci nec nunc rutrum semper. Nullam at nisl erat. Praesent scelerisque ante ac velit aliquam, sed fringilla ex tempus. Nam et orci ex. Nulla consectetur pellentesque dolor, quis aliquet nunc condimentum quis. In nec mi eget diam condimentum mollis. Ut vitae dolor eget felis accumsan imperdiet in vel elit. Proin congue magna magna, feugiat rhoncus nisl scelerisque nec. Etiam bibendum elementum arcu sed faucibus. 
            </p>",
        'important'     => false,
        'pdf'           => "files/publications/sample.pdf",
    ),
    array(
        // Mandatory parameters
        'title'         => "A third publication",
        'authors'       => ["L.M.<i> et al.</i>"],  // Array of strings
        'type'          => "conference",
        'state'         => null,                    // Specify if not published
        'date'          => "2023-03-03",            // YYYY-MM-DD
        // Optional parameters (have all been removed!)
    ),
    array(
        // Mandatory parameters
        'title'         => "A fourth publication",
        'authors'       => ["L.M."],                // Array of strings
        'type'          => "journal",
        'state'         => "review",                // Specify if not published
        'date'          => "2023-04-04",            // YYYY-MM-DD
        // Optional parameters (can be removed)
        'info'          =>                          // Displayed by default
            "Submitted to the <i>International Journal of Seagull Studies</i>.",
        'abstract'      =>                          // Displayed by default
            "<p>
            Ut pulvinar, purus sit amet malesuada lacinia, nisi ex convallis tortor, sed ullamcorper est est et arcu. Donec tempus magna nisi. Donec vitae suscipit nulla. Sed nunc orci, posuere non magna sit amet, consectetur vestibulum tellus. Integer quis tellus ipsum. Proin facilisis ut nulla vel imperdiet. Ut faucibus nulla lacus, ultricies porta elit tincidunt vitae. Aenean vehicula sodales faucibus. Nullam porttitor justo sit amet pulvinar cursus.
            </p>",
        'important'     => false,
        'pdf'           => "files/publications/sample.pdf",
    ),
]

/* An empty item that you can copy-paste:

array(
    // Mandatory parameters
    'title'         => "",
    'authors'       => [""],    // Array of strings
    'type'          => "",
    'state'         => null,    // Specify if not published
    'date'          => "",      // YYYY-MM-DD
    // Optional parameters (can be removed)
    'infofr'        =>
        "",
    'info'          =>          // Displayed by default
        "",
    'abstractfr'    =>
        "<p>
        
        </p>",
    'abstract'      =>          // Displayed by default
        "<p>
        
        </p>",
    'important'     => false,
    'pdf'           => null,
    'arxiv'         => null,    // Only the arXiv identifier
    'hal'           => null,    // Only the HAL identifier
    'code'          => null,
    'slides'        => null,
),

*/

?>
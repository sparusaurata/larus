<?php 

/**
 * This file contains the data corresponding to a set of talks.
 * 
 * This is a sample file containing some talks, formatted in the specific
 * format used by the website. Copy or modify it to store your own talks.
 * 
 * @license GNU General Public License v3 or later, see LICENSE.md
 * @link    https://github.com/sparusaurata/larus
 */

// This line prevents from loading directly this page. Do not modify.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


/**
 * This file should only define an array $data, which will contain your 
 * talks (see an example below).
 * 
 * The different parameters of a talk are the following.
 * Mandatory parameters are indicated with M, optional ones with O.
 * 
 * - 'title'        (string)  (M)   The title of the talk.
 *                                  HTML code can be used here.
 * 
 * - 'event'        (string)  (M)   The event where the talk was given.
 *                                  HTML code can be used here.
 * 
 * - 'location'     (string)  (O)   The place where the event was held.
 *                                  HTML code can be used here.
 * 
 * - 'type'         (string)  (M)   The type of the talk.
 *                                  This should be one of the identifiers 
 *                                  defined in the option $op_talktypes.
 *                                  By default, types 'conference', 'seminar',
 *                                  'poster' and 'dissemination' are defined.
 * 
 * - 'date'         (string)  (M)   The date of the talk.
 *                                  The string should have format "YYYY-MM-DD".
 * 
 * - 'infoxx'       (strings) (O)   Some details about the talk.
 *                                  HTML code can be used here.
 *                                  A parameter 'infoxx' can be provided for
 *                                  each language xx. The fallback parameter 
 *                                  'info' will be used if no 'infoxx' is found,
 *                                  so you might want to use 'info' instead of
 *                                  'infoen' to display the English details by
 *                                  default.
 * 
 * - 'important'    (boolean) (O)   Whether this talk is important and
 *                                  should be emphasized.
 * 
 * - 'pdf', etc.    (strings) (O)   The links associated to the talk.
 *                                  The possible parameters are defined in the
 *                                  option $op_linktypes (by default, the
 *                                  parameters 'pdf', 'arxiv', 'hal', 'slides',
 *                                  'code' and 'video' are defined).
 * 
 * You will find an example $data below.
 * At the bottom of the page, there is an empty talk that you can
 * copy-paste. 
 */

$data = [
    array(
        // Mandatory parameters
        'title'         => "A first talk",
        'event'         => "3rd GULLS conference", 
        'type'          => "conference",
        'date'          => "2023-01-01",        // YYYY-MM-DD
        // Optional parameters (can be removed but let's fill them all!)
        'location'      => "Marseille, France", 
        'infofr'        => 
            "Exposé invité.",
        'info'          =>                      // Displayed by default
            "Invited talk.",
        'important'     => false,
        'pdf'           => "files/publications/sample.pdf",
        'video'         => "files/publications/sample.pdf",
        'slides'        => "files/publications/sample.pdf",
    ),
    array(
        // Mandatory parameters
        'title'         => "A second talk",
        'event'         => "LAB seminar", 
        'type'          => "seminar",
        'date'          => "2023-01-02",        // YYYY-MM-DD
        // Optional parameters (can be removed)
        'location'      => "Somewhere Else",
        'info'          =>                      // Displayed by default
            "Lorem ipsum dolor sit amet.",
        'important'     => false,
        'pdf'           => null,
        'video'         => null,
        'slides'        => "files/publications/sample.pdf",
    ),
    array(
        // Mandatory parameters
        'title'         => "A third talk",
        'event'         => "Science for Seagulls", 
        'type'          => "dissemination",
        'date'          => "2023-01-03",        // YYYY-MM-DD
        // Optional parameters (can be removed)
        'location'      => null,
        'info'          =>                      // Displayed by default
            "Dissemination talk intended for young seagulls.",
        'important'     => false,
        'pdf'           => null,
        'video'         => null,
        'slides'        => "files/publications/sample.pdf",
    ),
    array(
        // Mandatory parameters
        'title'         => "A fourth talk",
        'event'         => "Another Conference", 
        'type'          => "conference",
        'date'          => "2023-01-04",        // YYYY-MM-DD
        // Optional parameters (have all been removed!)
    ),
    
]

/* An empty item that you can copy-paste:

array(
    // Mandatory parameters
    'title'         => "",
    'event'         => "", 
    'type'          => "",
    'date'          => "",      // YYYY-MM-DD
    // Optional parameters (can be removed)
    'location'      => "", 
    'infofr'        => 
        "",
    'info'          =>          // Displayed by default
        "",
    'important'     => false,
    'pdf'           => null,
    'video'         => null,
    'slides'        => null,
),

*/

?>

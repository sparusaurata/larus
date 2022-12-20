<?php // This is a list of talks.

// Prevent from loading directly this page.
// Do not modify this line.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


// Add talks in this list. The possible fields if each
// publication are the following:
// - title (string)
// - event (string)
// - location (string)
// - type is the identifier of an item in $op_talktypes
// - date (date in YYYY-MM-DD format)
// - infoxx (string, where xx is a language code) is the publication
//   information in the language xx (where it was published, etc.) ;
//   a default string can be provided in the field info
// - important (boolean), to highlight important publications
// - pdf, video, slides (strings) for URLs

// This is a model you can copy:
/*
array(
    'title'         => "",
    'event'         => "",
    'location'      => "",
    'type'          => "",
    'date'          => "",
    'infofr'        => "",
    'info'          => "",
    'important'     => false,
    'pdf'           => null,
    'video'         => null,
    'slides'        => null
),
*/

$data = [
    array(
        'title'         => "A nice talk",
        'event'         => "42th GREAT conference",
        'location'      => "Marseille",
        'type'          => "conference",
        'date'          => "2019-01-01",
        'infofr'        => "Exposé invité.",
        'info'          => "Invited talk.",
        'important'     => false,
        'pdf'           => null,
        'video'         => "includes/larus-michahellis.png",
        'slides'        => null
    ),
    array(
        'title'         => "This talk is about easy things",
        'event'         => "Master student's seminar",
        'location'      => "Nice University",
        'type'          => "dissemination",
        'date'          => "2017-01-01",
        'infofr'        => "",
        'info'          => "",
        'important'     => false,
        'pdf'           => null,
        'video'         => null,
        'slides'        => null
    ),
    array(
        'title'         => "One more talk",
        'event'         => "Lab seminar",
        'location'      => "Mars",
        'type'          => "seminar",
        'date'          => "2022-01-01"
    ),
] ?>
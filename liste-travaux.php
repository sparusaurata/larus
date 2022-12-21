<?php // This is a list of publications.

// Prevent from loading directly this page.
// Do not modify this line.
if( !defined("origin") ) { die("<h1>Access denied</h1>"); }


// Add publications in this list. The possible fields if each
// publication are the following:
// - title (string)
// - authors (array of strings)
// - type is the identifier of an item in $op_pubtypes
// - state is null (published) or the identifier of an item in
//   $op_pubstates
// - date (date in YYYY-MM-DD format)
// - infoxx (string, where xx is a language code) is the publication
//   information in the language xx (where it was published, etc.) ;
//   a default string can be provided in the field info
// - abstractxx (string, where xx is a language code) is the
//   abstract in the language xx ;
//   a default string can be provided in the field abstract
// - important (boolean), to highlight important publications
// - lang (string) for the language of the publication
// - pdf, arxiv, hal, code, slides (strings) for URLs, and any other
//   link type defined in $op_linktypes.

// This is a model you can copy:
/*
array(
    'title'         => "",
    'authors'       => [""],
    'type'          => "",
    'state'         => "",
    'date'          => "",
    'infofr'        => "",
    'info'          => "",
    'abstractfr'    => "",
    'abstract'      => "",
    'important'     => false,
    'lang'          => "",
    'pdf'           => "",
    'arxiv'         => null,
    'hal'           => null,
    'code'          => null,
    'slides'        => null
),
*/

$data = [
    array(
        'title'         => "A first publication",
        'authors'       => ["J.D.", "A. Coauthor"],
        'type'          => "conference",
        'state'         => null,
        'date'          => "2022-12-01",
        'infofr'        => "Du texte, <em>Conference on
            things</em>.",
        'info'          => "Some default text, <em>Conference on
            things</em>.",
        'abstractfr'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit consectetur tincidunt. Ut mauris magna, condimentum quis volutpat at, interdum nec dolor. Nunc ut cursus sapien. Aliquam nec rhoncus felis.",
        'abstract'      => "Nam sollicitudin ante at erat blandit interdum. Mauris sed blandit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam id condimentum eros. Suspendisse rhoncus est ut nisl vehicula lacinia. Donec vitae accumsan sapien, vel gravida mi. Nam sit amet feugiat mauris.",
        'important'     => true,
        'lang'          => "en",
        'pdf'           => "includes/larus-michahellis.png",
        'arxiv'         => null,
        'hal'           => null,
        'code'          => null,
        'slides'        => null
    ),
    array(
        'title'         => "A second publication",
        'authors'       => ["J.D."],
        'type'          => "journal",
        'state'         => "submitted",
        'date'          => "2023-01-02",
        'infofr'        => "Soumis au <em>Journal of things</em>.",
        'info'          => "Submitted to <em>Journal of things</em>.",
        'abstract'      => null,
        'important'     => null,
        'lang'          => "fr",
        'pdf'           => null,
        'arxiv'         => null,
        'hal'           => null,
        'code'          => null,
        'slides'        => null
    ),
    array(
        'title'         => "A third publication",
        'authors'       => ["J.D."],
        'type'          => "journal",
        'state'         => "draft",
        'date'          => "2023-02-14",
        'info'          => "Vous allez voir ça va être super.",
        'abstract'      => null,
        'important'     => false,
        'lang'          => "fr",
        'pdf'           => null,
        'arxiv'         => null,
        'hal'           => null,
        'code'          => null,
        'slides'        => null
    ),
] ?>
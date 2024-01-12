<?php

return [
    'code' => 'de',
    'default' => true,
    'direction' => 'ltr',
    'locale' => [
        'LC_ALL' => 'de_DE'
    ],
    'name' => 'DE',
    'smartypants' => [
        'attr'                          => 1,
        'doublequote.open'              => '„',
        'doublequote.close'             => '“',
        'emdash'                        => '—',
        'endash'                        => '–',
        'ellipsis'                      => '…',
        'space'                         => '(?: | |&nbsp;|&#0*160;|&#x0*[aA]0;)',
        'skip'                          => 'pre|code|kbd|script|style|math',
        'apostrophe'                    => '&rsquo;', // or 'apostrophe' => '&#8217;'
    ],

    'translations' => [
        'client'        => 'Auftraggeber:in',
        'architecture'  => 'Architektur',
        'place'         => 'Ort',
        'value'         => 'Kosten',
        'timeframe'     => 'Termine',
        'size'          => 'Grösse',
        'built'         => 'Realisiert',
        'building'      => 'In Bau',
        'notbuilt'      => 'Nicht realisiert',

        'choiceone'     => 'Recherche',
        'choicetwo'     => 'Anderes',
        'choicethree'   => 'Wettbewerb',
        'choicefour'    => 'Wettbewerb gewonnen',
        'choicefive'    => 'Direktauftrag'
    ],
    'url' => NULL
];
<?php

return [
    'code' => 'fr',
    'default' => false,
    'direction' => 'ltr',
    'locale' => [
        'LC_ALL' => 'fr_FR'
    ],
    'name' => 'FR',
    'translations' => [
        'client'            => 'Maître de d’ouvrage',
        'architecture'      => 'Architecture',
        'place'             => 'Lieu',
        'value'             => 'Coûts estimés',
        'timeframe'         => 'Période',
        'size'              => 'Portée',
        'built'             => 'Réalisés',
        'building'          => 'En construction',
        'notbuilt'          => 'Non réalisées',

        'choiceone'         => 'Recherche',
        'choicetwo'         => 'Divers',
        'choicethree'       => 'Concours',
        'choicefour'        => 'Concours gagné',
        'choicefive'        => 'Mandat direct',

    ],
    'url' => NULL,

    'smartypants' => [
        'attr'                       => 1,
        'doublequote.open'           => '&#171;&#x2006;', // «
        'doublequote.close'          => '&#x2006;&#187;', // »
        'space.marks'                => '&#160;',
        'emdash'                     => '&#8212;', // —
        'endash'                     => '&#8211;', // –
        'ellipsis'                   => '&#8230;', // …
        'space'                      => '(?: | |&nbsp;|&#0*160;|&#x0*[aA]0;)',
        'skip'                       => 'pre|code|kbd|script|style|math',
        'apostrophe'                 => '&rsquo;', // or 'apostrophe' => '&#8217;'
    ],
];
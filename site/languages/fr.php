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
        'client' => 'Maître de d’ouvrage',
        'architecture' => 'Architecture',
        'place' => 'Lieu',
        'value' => 'Coûts estimés',
        'timeframe' => 'Période de l’étude',
        'size' => 'Portée',
        'built' => 'Réalisés',
        'building' => 'En construction',
        'notbuilt' => 'Non réalisées',

        'choiceone' => 'Recherche',
        'choicetwo' => 'Autre',
        'choicethree' => 'Concours',
        'choicefour' => 'Gagné concours',
        'choicefive' => 'Commande directe',

    ],
    'url' => NULL,

    'smartypants' => [
        'attr'                       => 1,
        'doublequote.open'           => '&#171;', // «
        'doublequote.close'          => '&#187;', // »
        'doublequote.low'            => '&#139;', // ‹
        'singlequote.open'           => '&#139;', // ‹
        'singlequote.close'          => '&#155;', // ›
        'backtick.doublequote.open'  => '&#171;', // «
        'backtick.doublequote.close' => '&#187;', // »
        'backtick.singlequote.open'  => '&#139;', // ‹
        'backtick.singlequote.close' => '&#155;', // ›
        'emdash'                     => '&#8212;', // —
        'endash'                     => '&#8211;', // –
        'ellipsis'                   => '&#8230;', // …
        'space'                      => '(?: | |&nbsp;|&#0*160;|&#x0*[aA]0;)',
        'space.emdash'               => '—',
        'space.endash'               => '-',
        'space.colon'                => '&#160;',
        'space.semicolon'            => '&#160;',
        'space.marks'                => '&#160;',
        'space.frenchquote'          => '&#160;',
        'space.thousand'             => '&#160;',
        'space.unit'                 => '&#160;',
        'guillemet.leftpointing'     => '&#171;', // «
        'guillemet.rightpointing'    => '&#187;', // »
        'geresh'                     => '&#1523;',
        'gershayim'                  => '&#1524;',
        'skip'                       => 'pre|code|kbd|script|style|math',
    ],
];

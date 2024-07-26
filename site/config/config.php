<?php

return [
    'languages'        => true,
    'languages.detect' => true,
    'smartypants'      => true,
    'panel'            => [
        'install' => false,
        'favicon' => [
            'apple-touch-icon' => [
                'type' => 'image/png',
                'url'  => '/apple-touch-icon.png',
            ],
            'shortcut icon'    => [
                'type' => 'image/svg+xml',
                'url'  => 'git/favicon.svg',
            ],
            'alternate icon'   => [
                'type' => 'image/png',
                'url'  => '/favicon.png',
            ]
        ]
    ],
    'auth'             => [
        'methods' => [
            'password' => ['2fa' => false]
        ]
    ],
    'thumbs'           => [
        'autoOrient' => true,
    ],
    'cache'            => [
        'pages' => [
            'active' => false,
        ]
    ],
    'routes'           => [
        [
            'pattern' => 'htmx-projects/(:any)',
            'method'  => 'GET',
            'action'  => function ($filter) {
                $projects = site()->page('projects')->children()->listed();
                if ($filter && $filter !== 'all') {
                    $projects = $projects->filterBy('tag', $filter);
                }

                return snippet('tagImages', [
                    "projects" => $projects,
                ], true);
            }
        ],
        [
            'pattern' => 'sitemap.xml',
            'action'  => function () {
                $pages = site()->pages()->index();

                // fetch the pages to ignore from the config settings,
                // if nothing is set, we ignore the error page
                $ignore = kirby()->option('sitemap.ignore', ['error']);

                $content = snippet('sitemap', compact('pages', 'ignore'), true);

                // return response with correct header type
                return new Kirby\Cms\Response($content, 'application/xml');
            }
        ],
        [
            'pattern' => 'sitemap',
            'action'  => function () {
                return go('sitemap.xml', 301);
            }
        ]
    ]
];

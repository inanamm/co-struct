<?php

return [
  'languages' => true,
  'languages.detect' => true,
  'smartypants' => true,
  'panel' => [
    'install' => true
  ],
  'panel' => [
    'favicon' => [
      'apple-touch-icon' => [
        'type' => 'image/png',
        'url'  =>  '/apple-touch-icon.png',
      ],
      'shortcut icon' => [
        'type' => 'image/svg+xml',
        'url'  => 'git/favicon.svg',
      ],
      'alternate icon' => [
        'type' => 'image/png',
        'url'  => '/favicon.png',
      ]
    ]
  ],
  'thumbs' => [
    'autoOrient' => true,
  ],
  'cache' => [
    'pages' => [
      'active' => true
    ]
  ],
  'routes' => [
    [
      'pattern' => 'ajax/projects',
      'method' => 'GET',
      'action'  => function () {
        $filter = get('filter');
        $data = [];

        // Fetch projects based on the filter
        $projects = site()->page('projects')->children()->listed();
        if ($filter) {
          $projects = $projects->filterBy('tag', $filter);
        }

        // Prepare data to be returned
        foreach ($projects as $project) {
          $thumbsData = [];
          foreach ($project->gallery()->toFiles() as $image) {
            $thumb = $image->thumb([
              'quality' => 60,
              'lazy' => true,
              'format' => 'webp',
            ])->html();
            $thumbsData[] = $thumb;
          }

          $data[] = [
            'title' => $project->title()->value(),
            'url' => $project->url(),
            'thumbs' => $thumbsData,
          ];
        }

        return [
          'statusCode' => 200,
          'body' => json_encode($data),
          'headers' => ['Content-Type' => 'application/json']
        ];
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

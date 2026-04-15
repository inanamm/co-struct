<?php
use Kirby\Toolkit\Str;
use Kirby\Data\Yaml;

return [
	'languages' => true,
	'languages.detect' => true,
	'smartypants' => true,
	'panel' => [
		'install' => false,
		'vue' => [
			'compiler' => false,
		],
		'favicon' => [
			[
				'rel' => 'apple-touch-icon',
				'type' => 'image/png',
				'href' => '/apple-touch-icon.png',
			],
			[
				'rel' => 'shortcut icon',
				'type' => 'image/svg+xml',
				'href' => 'git/favicon.svg',
			],
			[
				'rel' => 'icon',
				'type' => 'image/png',
				'href' => '/favicon.ico',
			],
		]
	],
	'auth' => [
		'methods' => [
			'password' => ['2fa' => false]
		]
	],
	'thumbs' => [
		'autoOrient' => true,
	],
	'cache' => [
		'pages' => [
			'active' => false,
		]
	],
	'zephir.cookieconsent' => [
		'guiOptions' => [
			'consentModal' => [
				'layout' => 'box inline',
				'position' => 'bottom right',
				'flipButtons' => true,
				'equalWeightButtons' => true
			],
			'preferencesModal' => [
				'layout' => 'box',
				// 'position' => 'left', // only relevant with the "bar" layout
				'flipButtons' => true,
				'equalWeightButtons' => true
			]
		],
		'categories' => [
			'necessary' => [
				'enabled' => true,
				'readOnly' => true
			],
			'measurement' => [],
			'functionality' => [],
			'experience' => [],
			'marketing' => []
		],
	],

	'routes' => [
		[
			'pattern' => 'sitemap.xml',
			'action' => function () {
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
			'action' => function () {
				return go('sitemap.xml', 301);
			}
		]
	],
	'page.update:after' => function (Kirby\Cms\Page $newPage, Kirby\Cms\Page $oldPage) {

		if ($newPage->intendedTemplate()->name() !== 'language-helper') {
			return;
		}

		static $running = false;
		if ($running) {
			return;
		}
		$running = true;

		$page = page($newPage->id());

		$structuresToUpdate = ['competencies', 'fields'];

		foreach ($structuresToUpdate as $fieldName) {

			if ($page->$fieldName()->isEmpty()) {
				continue;
			}

			$items = $page->$fieldName()->yaml();

			$usedKeys = [];

			foreach ($items as $i => $item) {

				if (!empty($item['key'])) {
					$usedKeys[] = $item['key'];
					continue;
				}

				$base = Str::slug($item['en_term'] ?? 'item');
				$key = $base;
				$n = 1;

				while (in_array($key, $usedKeys)) {
					$key = $base . '-' . $n;
					$n++;
				}

				$items[$i]['key'] = $key;
				$usedKeys[] = $key;
			}

			if ($items !== $page->$fieldName()->yaml()) {
				$page->update([
					$fieldName => $items
				]);
			}
		}

		$running = false;
	}
];

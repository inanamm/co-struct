<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 * @var Kirby\Cms\Pages $pages
 */

$filter = param("filter");
$homePage = $pages->get('home');

$otherPages = $pages->listed()->not($homePage)->filter(function ($item) {
  return !($item->id() === 'jobs' && $item->children()->listed()->isEmpty());
});

?>

  <ul id="home-nav">
    <li class="mb-2">
      <a
        href="<?= $homePage->url() ?>"
        class="<?= $homePage->isOpen() ? 'font-sansbold hover:text-cslightblue' : 'hover:text-cslightblue' ?>"
        <?php if ($homePage->isOpen()): ?>
          hx-get="<?= $homePage->url() ?>"
          hx-target="#project-images"
          hx-select="#project-images"
          hx-select-oob="#project-images-desktop,#home-nav"
          hx-swap="outerHTML"
          hx-push-url="true"
        <?php endif ?>
      >
        <?= $homePage->title()->html() ?>
      </a>
      <nav>
        <?php snippet('home-filter-nav', ['filter' => $filter]) ?>
      </nav>
    </li>

    <?php foreach ($otherPages as $item): ?>
      <li>
        <a
          <?= $item->isOpen() ? 'class="font-sansbold hover:text-cslightblue"' : null ?>
          href="<?= $item->url() ?>" class="hover:text-cslightblue"
        >
          <?= $item->title()->html() ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

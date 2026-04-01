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

<nav
  id="second"
  class="hidden lg:flex justify-between pt-2 pb-5 px-3 font-sans text-lg border-t border-csblack"
>
  <ul>
    <li class="mb-2">
      <a
        <?= $homePage->isOpen() ? 'class="font-sansbold hover:text-cslightblue"' : null ?>
        href="<?= $homePage->url() ?>" class="hover:text-cslightblue"
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
</nav>

<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 * @var Kirby\Cms\Pages $pages
 *
 * @var string | null $filter
 */
?>

<ul>
  <?php foreach (SlothieHelpers()->competency_options() as $option):
    $key = $option['key'];
    $term = $option['term'];
    if ($page->children()->filterBy('competencies', $key, '*=')->isEmpty()) continue; ?>
    <li class="hover:text-cslightblue <?= $filter === $key ? 'pl-3 text-cslightblue' : '' ?>">
      <button class="filter-btn" data-filter="<?= $key ?>">
        <?= $term ?>
      </button>
    </li>
  <?php endforeach ?>
</ul>

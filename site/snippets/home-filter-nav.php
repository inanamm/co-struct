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
  <?php
  $homePage = $pages->get('home');
  foreach (SlothieHelpers()->competency_options() as $option):
    $key  = $option['key'];
    $term = $option['term'];
    if ($homePage->children()->filterBy('competencies', $key, '*=')->isEmpty()) continue;
    $href = $filter === $key ? $homePage->url() : $homePage->url() . '/filter:' . $key;
  ?>
    <li class="hover:text-cslightblue <?= $filter === $key ? 'pl-3 text-cslightblue' : '' ?>">
      <a href="<?= $href ?>"
         @click="$dispatch('close-menu')"
         <?php if ($homePage->isOpen()): ?>
           hx-get="<?= $href ?>"
           hx-target="#project-images"
           hx-select="#project-images"
           hx-select-oob="#project-images-desktop,#home-nav"
           hx-swap="outerHTML"
           hx-push-url="true"
         <?php endif ?>
      >
        <?= $term ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>

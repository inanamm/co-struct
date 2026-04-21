<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 * @var Kirby\Cms\Pages $pages
 */

$projects = $pages->get('projects')->children()->listed()->filter(function ($page) {
  return $page->toggle_detailpage()->toBool();
});

$filteredProjects = param("filter")
  ? $projects->filterBy('competencies', param("filter"), '*=')
  : $projects;

$images = [];
foreach ($filteredProjects as $project) {
  foreach ($project->gallery()->toFiles() as $image) {
    if ($image->show_on_landing()->isNotEmpty() && $image->show_on_landing()->toBool() === true) continue;
    $images[] = (object)[
      'file' => $image,
      'title' => $project->title(),
      'url' => $project->url(),
    ];
  }
}

shuffle($images);

$snippetId = $snippetId ?? 'project-images';
?>
<div id="<?= $snippetId ?>" class="contents">
  <?php foreach ($images as $image): ?>
    <a href="<?= $image->url ?>" class="pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full">
      <?= $image->file->thumb(['quality' => 30, 'lazy' => true, 'format' => 'webp'])->html() ?>
      <p class="font-mono text-xs w-full"><?= $image->title ?></p>
    </a>
  <?php endforeach ?>
</div>

<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 * @var Kirby\Cms\Pages $pages
 */
?>

<?php
$projects = $pages->get('home')->children();
$filteredProjects = param("filter")
    ? $projects->filterBy('competencies', param("filter"), '*=')
    : $projects;

$images = [];
foreach ($filteredProjects as $project) {
    foreach ($project->gallery()->toFiles() as $image) {
        if ($image->show_on_landing()->isNotEmpty() && $image->show_on_landing()->toBool() === false) continue;
        $images[] = (object)[
            'file'  => $image,
            'title' => $project->title(),
            'url'   => $project->url(),
        ];
    }
}
?>
<?php foreach ($images as $image): ?>
    <a href="<?= $image->url ?>" class="pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full">
        <?= $image->file->thumb(['quality' => 30, 'lazy' => true, 'format' => 'webp'])->html() ?>
        <p class="font-mono text-xs w-full"><?= $image->title ?></p>
    </a>
<?php endforeach ?>

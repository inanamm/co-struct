<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 */
?>

<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="text-csblack flex flex-col h-screen">
    <div class="header pb-5">
        <?php snippet('header', slots: true) ?>
        <?php slot('dash') ?>
        <div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center"
            alt="logo"></div>
        <?php endslot() ?>
        <?php slot('struct') ?>
        <?= url('struct-csblack.svg') ?>
        <?php endslot() ?>
        <?php slot('co') ?>
        <?= url('co-csblack.svg') ?>
        <?php endslot() ?>

        <?php endsnippet() ?>
    </div>

    <main id="third" class="flex flex-col gap-4 font-mono text-sm pt-2 pb-5 lg:text-sm">
        <h1 class="sr-only">
            <?= $page->title() ?>
        </h1>

        <h2 class="font-sans px-3 pt-6">
            <?= t("projects") ?>
        </h2>

        <!-- PROJEKTLISTE -->
        <div class="flex flex-col font-sans text-base pt-2 pb-4 lg:px-0">
            <div class="flex flex-col px-3">

                <?php
                $projectsPage = $pages->get('projects');
                $projects = $projectsPage->children();
                $filteredProjects = $projects->filter(function ($project) {
                    return $project->categoryB()->value() !== 'choicethree' && $project->categoryB()->value() !== 'choicefour';
                })->sortBy('title', 'asc'); ?>

                <div class="font-mono text-xs grid grid-cols-12 gap-3 pb-1">
                    <p class="col-span-4"><?= t("projecttitle") ?></p>
                    <p class="col-span-4"><?= t("project") ?></p>
                    <p class="col-span-3"><?= t("collaboration") ?></p>
                    <p class="col-span-1 text-right"><?= t("timeframe") ?></p>
                </div>

                <?php foreach ($filteredProjects as $project): ?>
                    <?php
                    $name = $project->title();
                    $title = $project->listTitle();
                    $url = $project->url();
                    ?>

                    <a href=<?= $url ?>
                        class="grid grid-cols-12 py-1 border-t border-csblack last:border-b gap-3 hover:text-cslightblue group">

                        <div class="col-span-4 flex flex-row">
                            <p class="hidden group-hover:block pr-1">↗</p>
                            <?= $name->kt() ?>
                        </div>

                        <div class="col-span-4"><?= $title ?></div>
                        <div class="col-span-3"><?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                                <?php if ($projectDetail->projectDetails()->value() == "collaboration"): ?>
                                    <?= $projectDetail->value() ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>

                        <div class="col-span-1 text-right">
                            <?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                                <?php if ($projectDetail->projectDetails()->value() == "timeframe"): ?>
                                    <?= $projectDetail->value() ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <!-- WETTBEWERBE -->
        <?php if ($pages->get('projects')->children()->filterBy('choicethree' || 'choicefour')->isEmpty()): ?>

        <h2 class="font-sans px-3 pt-6">
            <?= t("competitions") ?>
        </h2>
        <div class="flex flex-col font-sans text-base pt-2">

            <div class="flex flex-col px-3">

                <?php
                $projectsPage = $pages->get('projects');
                $projects = $projectsPage->children();
                $filteredProjects = $projects->filter(function ($project) {
                    return $project->categoryB()->value() === 'choicethree' || $project->categoryB()->value() === 'choicefour';
                })->sortBy('title', 'asc'); ?>

                <div class="font-mono text-xs grid grid-cols-12 gap-3 pb-1">
                    <p class="col-span-4"><?= t("project") ?></p>
                    <p class="col-span-4"><?= t("competition result") ?></p>
                    <p class="col-span-3"><?= t("collaboration") ?></p>
                    <p class="col-span-1 text-right"><?= t("timeframe") ?></p>
                </div>

                <?php foreach ($filteredProjects as $project): ?>
                    <?php
                    $name = $project->title();
                    $title = $project->listTitle();
                    $url = $project->url();
                    ?>

                    <a href=<?= $url ?>
                        class="grid grid-cols-12 py-1 border-t border-csblack last:border-b gap-3 hover:text-cslightblue group">

                        <div class="col-span-4 flex flex-row">
                            <p class="hidden group-hover:block pr-1">↗</p>
                            <?= $name->kt() ?>
                        </div>

                        <div class="col-span-4"><?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                                <?php if ($projectDetail->projectDetails()->value() == "competition result"): ?>
                                    <?= $projectDetail->value() ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                        <div class="col-span-3"><?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                                <?php if ($projectDetail->projectDetails()->value() == "collaboration"): ?>
                                    <?= $projectDetail->value() ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>

                        <div class="col-span-1 text-right">
                            <?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                                <?php if ($projectDetail->projectDetails()->value() == "timeframe"): ?>
                                    <?= $projectDetail->value() ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
        <?php endif ?>


    </main>

    <div class="flex border-t border-csblack mt-auto">
        <?php snippet('footer') ?>
    </div>
    <?php snippet('seo/schemas'); ?>
    <?= vite()->js('index.js') ?>
</body>

</html>
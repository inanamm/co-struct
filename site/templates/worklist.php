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

    <main id="third" class="flex flex-col gap-4 font-mono text-sm pt-2 pb-6 lg:text-sm">
        <h1 class="sr-only">
            <?= $page->title() ?>
        </h1>

        <h2 class="font-sans px-3">
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

                <div class="font-mono text-xs grid grid-cols-2 lg:grid-cols-12 lg:gap-3 pb-1">
                    <p class="hidden lg:block lg:col-span-4"><?= t("projecttitle") ?></p>
                    <p class="row-start-2 lg:row-start-1 lg:col-span-4"><?= t("project") ?></p>
                    <p class="col-start-2 lg:col-span-2"><?= t("collaboration") ?></p>
                    <p class="col-start-2 lg:col-span-2 lg:text-right"><?= t("timeframe") ?></p>
                </div>

                <?php foreach ($filteredProjects as $project): ?>
                    <?php
                    $name = $project->title();
                    $title = $project->listTitle();
                    $url = $project->url();
                    ?>

                    <a href=<?= $url ?>
                        class="grid grid-cols-2 lg:grid-cols-12 py-1 border-t border-csblack last:border-b lg:gap-3 hover:text-cslightblue group">

                        <div class="hidden col-span-1 lg:col-span-4 lg:flex flex-row">
                            <p class="hidden lg:group-hover:block pr-1">↗</p>
                            <?= $name->kt() ?>
                        </div>

                        <div class="col-start-1 col-span-1 lg:col-span-4"><?= $title ?></div>

                        <?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                            <?php if ($projectDetail->projectDetails()->value() == "collaboration" && $projectDetail->value()->isNotEmpty()): ?>
                                <div class="col-start-2 col-span-1 lg:col-span-2">
                                    <?= $projectDetail->value() ?>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>


                        <div class="col-start-2 col-span-1 lg:col-span-2 lg:col-end-13 lg:text-right">
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

                    <div class="font-mono text-xs grid grid-cols-2 lg:grid-cols-12 lg:gap-3 pb-1">
                        <p class="lg:block lg:col-span-4"><?= t("project") ?></p>
                        <p class="row-start-2 lg:row-start-1 lg:col-span-4"><?= t("competition result") ?></p>
                        <p class="col-start-2 lg:col-span-2"><?= t("collaboration") ?></p>
                        <p class="col-start-2 lg:col-span-2 lg:text-right"><?= t("timeframe") ?></p>
                    </div>

                    <?php foreach ($filteredProjects as $project): ?>
                        <?php
                        $name = $project->title();
                        $title = $project->listTitle();
                        $url = $project->url();
                        $info = $project->information()->toStructure();
                        ?>

                        <a href=<?= $url ?>
                            class="grid grid-rows-2 auto-cols-fr grid-flow-col lg:grid-flow-row lg:grid-rows-1 lg:grid-cols-12 py-1 border-t border-csblack last:border-b lg:gap-3 hover:text-cslightblue group">

                            <div class="lg:col-span-4 lg:flex">
                                <p class="hidden lg:group-hover:block pr-1">↗</p>
                                <?= $name->kt() ?>
                            </div>

                            <div class="lg:col-span-4">
                                <?php $competitionResult = $info->findBy("projectdetails", "competition result") ?>
                                <?php if ($competitionResult): ?>
                                    <?= $competitionResult->value() ?>
                                <?php endif ?>
                            </div>

                            <?php $collab = $info->findBy("projectdetails", "collaboration") ?>
                            <?php if ($collab): ?>
                                <div class="lg:col-span-2">
                                    <?= $collab->value() ?>
                                </div>
                            <?php endif ?>

                            <div class="lg:col-span-2 lg:col-end-13 lg:text-right">
                            <?php $timeframe = $info->findBy("projectdetails", "timeframe") ?>
                                <?php if ($timeframe): ?>
                                    <?= $timeframe->value() ?>
                                <?php endif ?>
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
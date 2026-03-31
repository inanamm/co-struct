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

        <h2 class="px-3 font-sans text-lg">
            <?= t("projects") ?>
        </h2>

        <h3 class="px-3 font-mono text-sm">
            <?= t("filter") ?>
        </h3>

        <!-- PROJEKTLISTE -->
        <div class="flex flex-col font-sans text-base pt-2 pb-4 lg:px-0">
            <div class="flex flex-col px-3">

                <?php
                $projectsPage = $pages->get('home');
                $projects = $projectsPage->children()->published();
                $filteredProjects = $projects->sortBy('year', 'asc'); ?>

                <div class="font-mono text-sm grid gap-x-2 grid-cols-2 lg:grid-cols-12 lg:gap-1 pb-1">
                    <p class="lg:col-span-2"><?= t("projecttitle") ?></p>
                    <p class="lg:col-span-2"><?= t("project") ?></p>
                    <p class="lg:col-span-1"><?= t("location") ?></p>
                    <p class="lg:col-span-1"><?= t("status") ?></p>
                    <p class="lg:col-span-1"><?= t("collaboration") ?></p>
                    <p class="lg:col-span-1"><?= t("competency") ?></p>
                    <p class="lg:col-span-1"><?= t("material") ?></p>
                    <p class="lg:col-span-1"><?= t("field") ?></p>
                    <p class="lg:col-span-1"><?= t("competition_Result") ?></p>
                    <p class="lg:col-span-1 lg:text-right"><?= t("year") ?></p>
                </div>

                <?php foreach ($filteredProjects as $project): ?>
                    <?php
                    $name = $project->title();
                    $title = $project->listTitle();
                    $url = $project->url();
                    ?>

                    <a href=<?= $url ?>
                        class="grid grid-cols-2 gap-x-2 lg:grid-cols-12 py-1 border-t border-csblack last:border-b lg:gap-1 hover:text-cslightblue group">

                        <div class="lg:col-span-2">
                            <p class="hidden lg:group-hover:block pr-1">↗</p>
                            <?= $name->kt() ?>
                        </div>

                        <div class="lg:col-span-2"><?= $title ?></div>

                        <div class="lg:col-span-1"><?= $project->location()->kt() ?></div>

                        <div class="lg:col-span-1"><?= $project->project_Status() ?></div>

                        <div class="lg:col-span-1">
                            <?php foreach ($project->competencies()->tags()->split(',') as $competency): ?>
                                <?= get_tag_name($competency) ?>
                            <?php endforeach ?>
                        </div>

                        <div class="lg:col-span-1">
                            <?php foreach ($project->fields()->tags()->split(',') as $field): ?>
                                <?= get_tag_name($field) ?>
                            <?php endforeach ?>
                        </div>

                        <div class="lg:col-span-1">
                            <?php foreach ($project->material()->tags()->split(',') as $material): ?>
                                <?= get_tag_name($material) ?>
                            <?php endforeach ?>
                        </div>

                        <div class="lg:col-span-1"><?= $project->collaboration()->kt() ?></div>
                        

                        <?php if ($project->project_Status() == 'Competition'): ?>
                        <div class="lg:col-span-1"><?= $project->competition_Result()->kt() ?></div>
                        <?php endif ?>

                        <div class="lg:col-span-1"><?= $project->year()->kt() ?></div>

                    </a>
                <?php endforeach ?>
            </div>
        </div>

    </main>

    <div class="flex border-t border-csblack mt-auto">
        <?php snippet('footer') ?>
    </div>
    <?php snippet('seo/schemas'); ?>
    <?= vite()->js('index.js') ?>
</body>

</html>
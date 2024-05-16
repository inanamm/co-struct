<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="text-csblack flex flex-col h-screen">
    <div class="header pb-5">
        <?php snippet('header', slots: true) ?>
        <?php slot('dash') ?>
        <div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center"
            alt="logo"></div>
        <?php endslot('dash') ?>
        <?php slot('struct') ?>
        <?= url('struct-csblack.svg') ?>
        <?php endslot() ?>
        <?php slot('co') ?>
        <?= url('co-csblack.svg') ?>
        <?php endslot() ?>

        <?php endsnippet() ?>
    </div>

    <main id="third" class="flex flex-col gap-4 font-mono text-sm pt-2 pb-5 lg:text-sm">
        <h1 class="px-3">
            <?= $page->title() ?>
        </h1>
        <div class="sr-only">
            <h2>co–struct AG</h2>
        </div>

        <!-- WERKLISTE -->
        <div class="flex flex-col lg:gap-4 font-sans text-base pt-2 pb-5 lg:pb-6 lg:px-0">
            <div class="flex flex-col">

                <?php
                $projectsPage = $pages->get('projects');
                $projects = $projectsPage->children(); ?>

                <?php foreach ($projects as $project): ?>
                    <?php
                    $name = $project->title();
                    $title = $project->listTitle();
                    $url = $project->url();
                    ?>

                    <a href=<?= $url ?>
                        class="grid grid-cols-4 px-3 border-t border-csorange last:border-b gap-3 hover:text-cslightblue">
                        <?= $name->kt() ?>
                        <?= $title ?>
                        <?php foreach ($project->information()->toStructure() as $projectDetail): ?>
                            <?php if ($projectDetail->projectDetails()->value() == "collaboration"): ?>
                                <?= $projectDetail->value() ?>
                            <?php endif ?>
                            <?php if ($projectDetail->projectDetails()->value() == "timeframe"): ?>
                                <?= $projectDetail->value() ?>
                            <?php endif ?>
                            <?php endforeach ?>
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
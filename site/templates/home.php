<!DOCTYPE html>
<html class="bg-cswhite" lang="de">

<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    <main class="text-csblack">
        <div class=" border-b border-csblack">



            <div class="flex flex-col divide-y divide-csblack ">

                <div class="flex flex-col gap-4 font-sans text-base px-3 pt-2 pb-5">
                    <?= $site->intro() ?>
                </div>

                <div class="grid grid-cols-2 px-3 pt-3 pb-5 gap-1 w-full">
                    <?php foreach ($pages->get('projects')->children() as $project) : ?>
                        <?php if ($project->images()->findBy("template", "cover")) : ?>
                            <a href="<?= $project->url() ?>" class="pb-5">
                                <img src="<?= $project->images()->findBy("template", "cover")->url() ?>" />
                                <p class="font-mono text-xs"><?= $project->title() ?></p>
                            </a>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>


            </div>


        </div>
    </main>
    <div class="text-csblack">
        <?php snippet('footer') ?>
    </div>
    <?= vite()->js() ?>
</body>

</html>
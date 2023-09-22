<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="h-screen">

    <main class="text-csblack h-full flex flex-col lg:flex-row overflow-y-auto">
        <div class="flex flex-col h-full lg:w-1/2">
            <?php snippet('header', slots: true) ?>
            <?php slot('dash') ?>
            <div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
            <?php endslot('dash') ?>
            <?php slot('struct') ?>
            <?= url('struct-csblack.svg') ?>
            <?php endslot() ?>
            <?php slot('co') ?>
            <?= url('co-csblack.svg') ?>
            <?php endslot() ?>
            <?php endsnippet() ?>

            <div class="flex flex-col gap-4 font-sans text-base px-3 pt-2 pb-5 h-full lg:justify-end lg:text-lg">
                <?= $site->intro() ?>
            </div>

            <div class="grid grid-cols-2 px-3 pt-3 pb-5 gap-1 w-full border-y border-csblack lg:hidden">
                <?php displayProjectImages($pages); ?>
            </div>

            <div class="flex text-csblack lg:border-t border-csblack">
                <?php snippet('footer') ?>
            </div>
        </div>

        <div class="hidden divide-y divide-csgreen lg:grid flex-col lg:flex-wrap lg:w-1/2 lg:divide-none overflow-y-scroll h-full">
            <div class="flex flex-col">
                <div class="grid grid-cols-4 pb-6 gap-1 w-full">
                    <?php displayProjectImages($pages); ?>
                </div>
            </div>

        </div>
    </main>
    <?= vite()->js() ?>
</body>

</html>

<?php
function displayProjectImages($pages)
{
    $projects = $pages->get('projects')->children();
    $filteredProjects = param("filter") ? $projects->filterBy('tag', param("filter")) : $projects;

    $allProjectImagesWithUrl = [];
    foreach ($filteredProjects as $singleProject) {
        foreach ($singleProject->images() as $image) {
            array_push(
                $allProjectImagesWithUrl,
                (object)[
                    'imageUrl' => $image->url(),
                    'imageAlt' => $image->alt(),
                    'projectTitle' => $singleProject->title(),
                    'projectUrl' => $singleProject->url()
                ]
            );
        }
    }
    shuffle($allProjectImagesWithUrl);

    foreach ($allProjectImagesWithUrl as $image) : ?>
        <a href="<?= $image->projectUrl ?>" class="pb-5 hover:text-cslightblue">
            <img src="<?= $image->imageUrl ?>" alt="<?= $image->imageAlt ?>" class="hover:brightness-105" />
            <p class="font-mono text-xs"><?= $image->projectTitle ?></p>
        </a>
<?php endforeach;
}
?>
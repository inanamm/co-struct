<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="h-screen">

    <main class="text-csblack h-screen flex flex-col lg:flex-row">
        <div class="flex flex-col lg:w-1/2 h-screen overflow-auto">
            <div class="header bg-cswhite pb-5">
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
            </div>
            <div class="flex flex-col gap-4 font-sans text-base px-3 pt-2 pb-5 h-full lg:pr-5 lg:justify-end lg:text-lg">
                <?= $site->intro() ?>
            </div>
            
            <nav class="hidden lg:flex justify-between pt-2 pb-5 px-3 font-sans text-lg border-t border-csblack">
                <?php
                $items = $pages->listed();
                if ($items->isNotEmpty()) :
                ?>
                    <ul>
                        <?php foreach ($items as $item) : ?>
                            <?php if ($item->id() === "jobs" && $pages->get('jobs')->children()->listed()->count() < 1) : ?>
                            <?php else : ?>

                                <li <?php e($item->id() === 'news', ' class="mt-4 hover:text-cslightblue"') ?>>
                                    <a<?php e($item->isOpen(), ' class="font-sansbold mt-2 hover:text-cslightblue"') ?> href="<?= $item->url() ?>" class="hover:text-cslightblue"><?= $item->title()->html() ?></a>
                                        <?php
                                        $subitems = false;
                                        if ($item->id() === 'home') :
                                        ?>
                                            <nav>
                                                <?php if ($kirby->language()->code() === "de") : ?>
                                                    <ul>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "built")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/de/filter:built">Realisiert</a>
                                                            </li>
                                                        <?php endif ?>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "building")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/de/filter:building">In Bau</a>
                                                            </li>
                                                        <?php endif ?>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "notbuilt")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/de/filter:notbuilt">Nicht realisiert</a>
                                                            </li>
                                                        <?php endif ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <ul>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "built")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/fr/filter:built">Réalisés</a>
                                                            </li>
                                                        <?php endif ?>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "building")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/fr/filter:building">En construction</a>
                                                            </li>
                                                        <?php endif ?>
                                                        <?php if ($pages->get('projects')->children()->filterBy('tag', "notbuilt")->isNotEmpty()) : ?>
                                                            <li class="hover:text-cslightblue">
                                                                <a href="/fr/filter:notbuilt">Non réalisées</a>
                                                            </li>
                                                        <?php endif ?>
                                                    </ul>
                                                <?php endif ?>

                                            </nav>
                                        <?php endif ?>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </nav>

            <div class="grid grid-cols-2 px-3 pt-3 pb-5 gap-1 w-full border-y border-csblack lg:hidden">
                <?php displayProjectImages($pages); ?>
            </div>

            <div class="flex text-csblack lg:border-t border-csblack">
                <?php snippet('footer') ?>
            </div>
        </div>

        <div class="hidden divide-y divide-csgreen lg:grid flex-col lg:flex-wrap lg:w-1/2 lg:divide-none overflow-y-auto h-full">
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
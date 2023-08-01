<!DOCTYPE html>
<html class="bg-cswhite"  lang="de">

<?php snippet('head') ?>

<body class="text-csblack h-full">

    <?php snippet('header') ?>

    <main class="flex flex-col divide-y divide-csblack border-b border-csblack">

        <div class="swiper w-full h-[400px]">
            <div class="swiper-wrapper">
                <?php foreach ($page->images()->sortBy("sort") as $image) : ?>
                    <div class="swiper-slide h-full w-full flex items-center">
                        <img src="<?= $image->url() ?>">
                    </div>
                <?php endforeach ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>


        <h1 class="font-sansbold text-lg px-3 pt-2 pb-3">
            <?= $page->title()->escape() ?>
        </h1>

        <div class="font-mono text-sm px-3 pt-2 pb-3">
            <?php if ($info = $page->information()->toStructure()) : ?>
                <?php snippet(
                    'accordion',
                    ['buttonText' => 'Info'],
                    slots: true
                )
                ?>
                <?php slot() ?>
                <div class="flex flex-col gap-3 mt-3">
                    <?php foreach ($info as $detail) : ?>
                        <div class="flex flex-col">
                            <p class=><?= $detail->projectDetails()->escape() ?></p>
                            <p><?= $detail->value()->escape() ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php endslot() ?>
                <?php endsnippet() ?>
            <?php endif ?>
        </div>

        <article class="flex flex-col font-sans text-base px-3 pt-2 pb-5 gap-3">
            <p><?= $page->textTitle()->escape() ?></p>
            <?= $page->text()->kt() ?>
        </article>

    </main>

    <?php snippet('footer') ?>

    <?= vite()->js() ?>
</body>

</html>
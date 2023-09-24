<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="flex text-csblack relative h-screen">
    <div class="flex flex-col w-full relative lg:w-1/2 h-screen overflow-y-auto">
        <div class="header bg-cswhite pb-5 sticky top-0 z-40">
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

        <div class="glide lg:hidden pt-3">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($page->images()->sortBy("sort") as $image) : ?>
                        <li class="glide__slide">
                            <img src="<?= $image->url() ?>" class="w-full object-fill">
                        </li>
                    <?php endforeach ?>

                </ul>
            </div>
        </div>

        <main class="flex flex-col divide-y divide-csblack border-b border-csblack">

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

            <article class="flex flex-col h-full font-sans text-base px-3 pt-2 pb-5 gap-3">
                <p><?= $page->textTitle()->escape() ?></p>
                <?= $page->text()->kt() ?>
            </article>

        </main>
        <?php snippet('footer') ?>
    </div>

    <?= vite()->js() ?>
</body>

<div class="hidden lg:flex w-1/2 overflow-y-scroll">
    <div>
        <ul class="">
            <?php foreach ($page->images()->sortBy("sort") as $image) : ?>
                <li class="">
                    <img src="<?= $image->url() ?>" class="w-full object-fill">
                </li>
            <?php endforeach ?>

        </ul>
    </div>
</div>

</html>
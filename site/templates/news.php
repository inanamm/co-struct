<!DOCTYPE html>
<html class="bg-cswhite" lang="de">

<?php snippet('head') ?>

<body>
    <main class="text-csgreen">
        <div class=" border-b border-csgreen">
            <div class="flex flex-col lg:flex-row divide-y divide-csgreen lg:divide-none h-screen">
                <!-- <div class="flex flex-col lg:flex-row divide-y divide-csgreen lg:divide-none h-[100%]"> -->
                <div class="overflow-y-visible h-auto lg:w-1/2 lg:overflow-hidden">
                    <div>
                        <?php snippet('header') ?>
                    </div>

                    <div class="flex">
                        <?php if ($newsArticle = $page->news()->toStructure()->first()) : ?>

                            <div class="flex flex-col gap-1 pb-5 px-3 pt-3">
                                <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                    <img src="<?= $image->url() ?>" class="w-full h-auto">
                                <?php endforeach ?>

                                <div class="flex flex-col gap-2">
                                    <h2 class="text-lg mt-2"><?= $newsArticle->title()->toHtml() ?></h2>
                                    <div class="font-mono text-sm">
                                        <?= $newsArticle->date()->toDate('d.m.y') ?>
                                        <div class="flex flex-col gap-2">
                                            <?= $newsArticle->description()->text() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif ?>
                    </div>
                </div>

                <!-- <div class="flex lg:grid grid-cols-2 flex-col lg:flex-wrap lg:w-1/2 divide-y divide-csgreen lg:divide-none lg:overscroll-hidden"> -->
                <div class="flex lg:grid grid-cols-2 gap-1 flex-col lg:w-1/2 divide-y divide-csgreen lg:divide-none lg:overscroll-hidden overflow-y-visible h-auto lg:overflow-y-auto">

                    <?php if ($news = $page->news()->toStructure()->without(0)) : ?>
                        <?php foreach ($news as $newsArticle) : ?>

                            <div class="pb-5 px-3 pt-3 lg:px-0 lg:pb-6 lg:pt-0">
                                <div class="flex flex-col gap-1 lg:border-t border-csgreen lg:pt-0">
                                    <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                        <img src="<?= $image->url() ?>" class="w-full h-auto]">
                                    <?php endforeach ?>

                                    <div class="flex flex-col gap-2">
                                        <h2 class="text-lg mt-2"><?= $newsArticle->title()->toHtml() ?></h2>
                                        <div class="font-mono text-sm">
                                            <?= $newsArticle->date()->toDate('d.m.y') ?>
                                            <div class="flex flex-col gap-2">
                                                <?= $newsArticle->description()->text() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        <?php endforeach ?>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </main>


    <div class="text-csgreen lg:w-1/2">
        <?php snippet('footer') ?>
    </div>

    <?= vite()->js() ?>
</body>

</html>
<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="h-screen">
    <main class="text-csgreen h-full flex flex-col lg:flex-row divide-y divide-csgreen lg:divide-none overflow-y-auto">
        <div class="flex flex-col h-full lg:w-1/2">
            <?php snippet('header') ?>

            <?php if ($newsArticle = $page->news()->toStructure()->first()) : ?>
                <div class="hidden lg:flex flex-col gap-1 pb-5 px-3 pt-3 h-full">
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

            <?php if ($news = $page->news()->toStructure()) : ?>
                <?php foreach ($news as $newsArticle) : ?>

                    <div class="flex lg:hidden pb-5 px-3 pt-3 lg:px-0 lg:pb-6 lg:pt-0">
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

            <div class="flex text-csgreen border-t border-csgreen">
                <?php snippet('footer') ?>
            </div>
        </div>

        <div class="hidden lg:grid gap-x-2 grid-cols-2 flex-col lg:flex-wrap lg:w-1/2 divide-y divide-csgreen lg:divide-none overflow-y-scroll">
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

    </main>

    <?= vite()->js() ?>
</body>

</html>
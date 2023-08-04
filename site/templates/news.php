<!DOCTYPE html>
<html class="bg-cswhite" lang="de">

<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>

    <main class="text-csgreen">
        <div class=" border-b border-csgreen">

            <div class="flex flex-col divide-y divide-csgreen ">
                <?php if ($news = $page->news()->toStructure()) : ?>
                    <?php foreach ($news as $newsArticle) : ?>

                        <div class="flex flex-col gap-3 pb-5 px-3 pt-3">
                            <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                <img src="<?= $image->url() ?>" class="w-full h-auto">
                            <?php endforeach ?>

                            <div class="flex flex-col gap-2">
                                <h2 class="text-lg"><?= $newsArticle->title()->toHtml() ?></h2>

                                <div class="font-mono text-sm">
                                    <p>
                                        <?= $newsArticle->date()->toDate('d.m.y') ?> —
                                        <?= $newsArticle->description()->kt() ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </main>

    <div class="text-csgreen">
        <?php snippet('footer') ?>
    </div>

    <?= vite()->js() ?>
</body>

</html>
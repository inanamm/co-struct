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

                        <div class="flex flex-col gap-1 pb-6 px-3 py-3">
                            <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                <img src="<?= $image->url() ?>" class="aspect-[16/9] w-full h-auto pt-4">
                            <?php endforeach ?>

                            <div class="mb-1 flex justify-between">
                                <h2 class="text-lg"><?= $newsArticle->title()->toHtml() ?></h2>

                            </div>
                            <p class="font-mono text-sm">
                                <?= $newsArticle->date()->toHtml() ?> —
                                <?= $newsArticle->description()->toHtml() ?>
                            </p>
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
<!DOCTYPE html>
<html class="bg-cswhite" lang="de">

<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>

    <main class="text-csgreen">

        <div class="flex flex-col px-3">
            <?php if ($news = $page->news()->toStructure()) : ?>
                <?php foreach ($news as $newsArticle) : ?>

                    <div class="flex flex-col gap-1 pb-6 w-1/2">
                        <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                            <img src="<?= $image->url() ?>" class="aspect-[16/9] w-full h-auto">
                        <?php endforeach ?>

                        <div class="mb-1 flex justify-between">
                            <h2 class="text-xl"><?= $newsArticle->title()->toHtml() ?></h2>
                            <p><i><?= $newsArticle->date()->toHtml() ?></i></p>
                        </div>

                        <p><?= $newsArticle->description()->toHtml() ?></p>
                    </div>

                <?php endforeach ?>
            <?php endif ?>
        </div>

    </main>

    <div class="text-csgreen">
        <?php snippet('footer') ?>
    </div>

    <?= vite()->js() ?>
</body>

</html>
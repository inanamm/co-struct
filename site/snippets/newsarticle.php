<?php foreach ($news as $newsArticle) : ?>


    <div class="flex flex-col gap-1 pb-6 w-1/2">

        <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
            <img src="<?= $image->url() ?>" class="aspect-[16/9] w-full h-auto">
        <?php endforeach ?>

        <h2 class="mb-1 flex justify-between">
            <span class="text-lg"><?= $newsArticle->title()->toHtml() ?></span>
            <i><?= $newsArticle->date()->toHtml() ?></i>
        </h2>
        <p><?= $newsArticle->description()->toHtml() ?></p>


    </div>

<?php endforeach ?>
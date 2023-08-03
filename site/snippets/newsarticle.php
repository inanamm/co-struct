<?php foreach( $page->news()->toStructure() as $newsArticle) : ?>
    
    <?php snippet(
        'accordion',
        ['buttonText' => $newsArticle->title()],
        slots: true
    )
    ?>
    <?php slot() ?>
    <div class="flex flex-col gap-1 pb-6">
        <p class="mb-1"><?= $newsArticle->title() ?><br>
            <?= $newsArticle->description() ?>
            <?= $newsArticle->date() ?>
        </p>

        <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
            <img src="<?= $image->crop(400)->url() ?>" class="aspect-[4/5] w-1/4 h-auto">
        <?php endforeach ?>

    </div>
    <?php endslot() ?>
    <?php endsnippet() ?>
<?php endforeach ?>
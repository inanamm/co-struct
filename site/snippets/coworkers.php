<?php foreach ($coworkers as $worker) : ?>
    <?php snippet(
        'accordion',
        ['buttonText' => $worker->name()],
        slots: true
    )
    ?>
    <?php slot() ?>
    <div class="flex flex-col gap-1 pb-6">
        <p class="mb-1">
            <?= $worker->title() ?><br>
            <?= $worker->phone() ?><br>
            <a href="mailto:<?= $worker->email() ?>" class="underline underline-offset-2 hover:text-cslightblue "><?= $worker->email() ?></a>
        </p>

        <?php foreach ($worker->image()->toFiles() as $image) : ?>
            <div class="w-1/2 lg:w-1/2"><?php echo $image->thumb([
                                            'quality' => 80,
                                            'crop' => true,
                                            'width' => 400,
                                            'height' => 500,
                                            'format'  => 'webp',
                                        ])->html(); ?>
            </div>

        <?php endforeach ?>

        <div class="font-mono text-sm"><?= $worker->description()->kt()->smartypants() ?></div>
    </div>
    <?php endslot() ?>
    <?php endsnippet() ?>
<?php endforeach ?>

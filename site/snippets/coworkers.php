<?php foreach ($coworkers as $worker) : ?>
    <?php snippet(
        'accordion',
        ['buttonText' => $worker->name()],
        slots: true
    )
    ?>
    <?php slot() ?>
    <div class="flex flex-col gap-1 pb-6">
        <p class="mb-1"><?= $worker->phone() ?><br>
            <a href="mailto:<?= $worker->email() ?>" class="underline underline-offset-2 hover:text-cslightblue "><?= $worker->email() ?></a>
        </p>

        <?php foreach ($worker->image()->toFiles() as $image) : ?>
            <img src="<?= $image->crop(400)->url() ?>" class="aspect-[4/5] w-1/4 lg:w-1/2 h-auto">
        <?php endforeach ?>

        <div class="font-mono text-sm"><?= $worker->description() ?></div>
    </div>
    <?php endslot() ?>
    <?php endsnippet() ?>
<?php endforeach ?>
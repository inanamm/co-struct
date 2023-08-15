<?php foreach ($jobs as $job) : ?>
    <?php snippet(
        'accordion',
        ['buttonText' => $job->title()],
        slots: true
    )
    ?>
    <?php slot() ?>
    <div class="pb-6">
        <div class="flex flex-col gap-1 pt-1 font-mono text-sm">
            <p><?= $job->descriptionA() ?></p>
            <p><?= $job->responsabilities()->list() ?></p>
            <p><?= $job->profile()->list() ?></p>
            <p><?= $job->descriptionB()->list() ?></p>
            <p><?= $job->descriptionC() ?></p>
        </div>
    </div>
    <?php endslot() ?>
    <?php endsnippet() ?>
<?php endforeach ?>
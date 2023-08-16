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
            <p><?= $job->descriptionA()->kt() ?></p>
            <ul class="">
                <?php foreach ($job->responsabilities()->list() as $responsability) : ?>
                    <li>
                        <?= $responsability ?>
                    </li>
                <?php endforeach ?>
            </ul>
            <p><?= $job->profile()->kt() ?></p>
            <p><?= $job->descriptionB()->kt() ?></p>
            <p><?= $job->descriptionC()->kt() ?></p>
        </div>
    </div>
    <?php endslot() ?>
    <?php endsnippet() ?>
<?php endforeach ?>
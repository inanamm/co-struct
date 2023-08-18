<!DOCTYPE html>
<html class="bg-csblue" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite">
    <?php snippet('header') ?>

    <main class="flex flex-col divide-y divide-cswhite border-b border-cswhite">

        <article class="flex flex-col gap-5 font-sans text-lg px-3 pt-2 pb-5">
            <?= $page->Bueroprofil()->kt() ?>
        </article>

        <div class="font-sans text-xl px-3 pt-2 pb-5">
            <?php if ($jobs = $page->job()->toStructure()) : ?>
                <?php foreach ($jobs as $job) : ?>
                    <?php snippet(
                        'accordion',
                        ['buttonText' => $job->title()],
                        slots: true
                    )
                    ?>
                    <?php slot() ?>
                    <div class="pb-6">
                        <div class="flex flex-col gap-4 pt-1 font-mono text-sm list-disc">
                            <?= $job->descriptionA()->kt() ?>
                            <?= $job->profile()->kt() ?>
                            <?= $job->descriptionB()->kt()->inline() ?>
                            <?= $job->descriptionC()->kt() ?>
                        </div>
                    </div>
                    <?php endslot() ?>
                    <?php endsnippet() ?>
                <?php endforeach ?>
            <?php endif ?>
        </div>

    </main>

    <?php snippet('footer') ?>

    <?= vite()->js() ?>
</body>

</html>
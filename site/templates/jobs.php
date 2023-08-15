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
            <?php if ($jobs = $page->jobs()->toStructure() ) : ?>
                <?php snippet('jobs', ['jobs' => $jobs]) ?>
            <?php endif ?>
        </div>

    </main>

    <?php snippet('footer') ?>

    <?= vite()->js() ?>
</body>

</html>
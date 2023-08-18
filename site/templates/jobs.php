<!DOCTYPE html>
<html class="bg-csblue" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite">
    <?php snippet('header') ?>

    <main class="flex flex-col divide-y divide-cswhite border-b border-cswhite">

        <article class="flex flex-col gap-5 font-sans text-lg px-3 pt-2 pb-5">
            <?= $page->Bueroprofil()->kt() ?>
        </article>


        <div class="font-mono text-sm flex flex-col px-3 pt-2 pb-5">

            <?php if ($jobs = $page->children()) : ?>
                <?php foreach ($jobs as $job) : ?>
                    <?php snippet(
                        'accordion',
                        ['buttonText' => $job->title()],
                        slots: true
                    )
                    ?>
                    <?php slot() ?>
                    <div class="p-4">
                        <?= $job->generalDescription()->kt() ?>
                    </div>
                    <?php foreach ($job->list()->toStructure() as $jobListing) : ?>
                        <div class="pt-2">
                            <h3 class="font-sans text-lg mb-2">
                                <?= $jobListing->title()->escape() ?>
                            </h3>
                            <style>
                                ul {
                                    display: flex;
                                    flex-direction: column;
                                    gap: 5px;
                                    list-style-type: none;
                                    padding-left: 0;
                                }

                                ul li {
                                    padding-left: 25px;
                                    text-indent: -25px;
                                }

                                ul li::before {
                                    content: "—";
                                    margin-right: 15px;
                                }
                            </style>

                            <?= $jobListing->descriptionA()->kt() ?>
                        </div>
                    <?php endforeach ?>
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
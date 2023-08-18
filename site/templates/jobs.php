<!DOCTYPE html>
<html class="bg-csblue" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite">
    <?php snippet('header') ?>

    <main class="flex flex-col divide-y divide-cswhite border-b border-cswhite">

        <article class="flex flex-col gap-5 font-sans text-lg px-3 pt-2 pb-5">
            <?= $page->bueroprofil()->kt() ?>
        </article>


        <div class="font-sans text-lg flex flex-col px-3 pt-2 pb-5">

            <?php if ($jobs = $page->children()) : ?>
                <?php foreach ($jobs as $job) : ?>
                    <?php snippet(
                        'accordion',
                        ['buttonText' => $job->title()],
                        slots: true
                    )
                    ?>
                    <?php slot() ?>
                    <div class="font-mono text-sm pt-2 pb-5">
                        <?= $job->generalDescription()->escape() ?>
                    </div>
                    <?php foreach ($job->list()->toStructure() as $jobListing) : ?>
                        <div class="font-mono text-sm pt-2 pb-5">
                            <h3 class="font-sans text-base mb-1">
                                <?= $jobListing->title()->escape() ?>
                            </h3>
                            <style>
                                ul {
                                    display: flex;
                                    flex-direction: column;
                                    /* gap: 5px; */
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

        <article class="flex flex-col gap-5 font-mono text-sm px-3 pt-2 pb-5">
            <?= $page->endtext()->kt() ?>
        </article>
        
    </main>

    <?php snippet('footer') ?>

    <?= vite()->js() ?>
</body>

</html>
<!DOCTYPE html>
<html class="bg-csblue h-screen" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite flex flex-col overflow-y-auto h-full no-scrollbar">
    <div class="header pb-5">
        <?php snippet('header', slots: true) ?>
        <?php slot('dash') ?>
        <div id="dash" class="w-7 bg-cswhite h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
        <?php endslot('dash') ?>
        <?php slot('struct') ?>
        <?= url('struct-cswhite.svg') ?>
        <?php endslot() ?>
        <?php slot('co') ?>
        <?= url('co-cswhite.svg') ?>
        <?php endslot() ?>

        <?php endsnippet() ?>
    </div>
    <main class="flex flex-col mb-auto divide-y lg:flex-row lg:divide-none divide-cswhite">

        <article class="flex flex-col gap-5 font-sans text-lg lg:text-base px-3 pt-2 pb-5 lg:pr-5 lg:pb-6 lg:w-1/2 ">
            <?= $page->bueroprofil()->kt() ?>
        </article>

        <div class="lg:w-1/2 divide-y divide-cswhite lg:divide-none">

            <div class="font-sans text-lg flex flex-col px-3 pt-2 pb-5 overflow-y-auto lg:px-0 lg:pr-3">

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
                                <style scoped>
                                    #problematic-div>ul {
                                        display: flex;
                                        flex-direction: column;
                                        gap: 5px;
                                        list-style-type: none;
                                        padding-left: 0;
                                    }

                                    #problematic-div>ul li {
                                        padding-left: 25px;
                                        text-indent: -25px;
                                    }

                                    #problematic-div>ul li::before {
                                        content: "—";
                                        margin-right: 15px;
                                    }
                                </style>
                                <div id="problematic-div">
                                    <?= $jobListing->descriptionA()->kt() ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php endslot() ?>
                        <?php endsnippet() ?>

                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <article class="flex flex-col gap-5 font-mono text-sm px-3 pt-2 pb-5 lg:px-0 lg:pr-3">
                <?= $page->endtext()->kt() ?>
            </article>
        </div>

    </main>

    <div class="flex border-t border-cswhite mt-auto">
        <?php snippet('footer') ?>
    </div>

    <?= vite()->js() ?>
</body>

</html>
<!DOCTYPE html>
<html class="bg-csblue h-full" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite flex flex-col overflow-y-auto h-full">
    <?php snippet('header') ?>

    <main class="flex flex-col mb-auto divide-y lg:flex-row lg:divide-none divide-cswhite h-full">

        <article class="flex flex-col gap-5 font-sans text-lg lg:text-base px-3 pt-2 pb-5 lg:pb-6 lg:w-1/2 ">
            <?= $page->bueroprofil()->kt() ?>
        </article>

        <div class="lg:w-1/2 lg:divide-none">

            <div class="font-sans text-lg flex flex-col px-3 pt-2 pb-5 overflow-y-auto">

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

            <article class="flex flex-col gap-5 font-mono text-sm px-3 pt-2 pb-5">
                <?= $page->endtext()->kt() ?>
            </article>
        </div>

    </main>

	<div class="flex border-t border-cswhite">
		<?php snippet('footer') ?>
	</div>

    <?= vite()->js() ?>
</body>

</html>
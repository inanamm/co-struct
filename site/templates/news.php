<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="h-screen no-scrollbar">
    <main class="text-csgreen h-screen flex flex-col divide-y divide-csgreen lg:flex-row lg:divide-none">
        <div class="flex flex-col h-sreeen lg:w-1/2 overflow-auto no-scrollbar">
            <div class="header bg-cswhite pb-5">
                <?php snippet('header', slots: true) ?>
                <?php slot('dash') ?>
                <div id="dash" class="w-7 bg-csgreen h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
                <?php endslot('dash') ?>


                <?php slot('struct') ?>
                <?= url('struct-csgreen.svg') ?>
                <?php endslot() ?>
                <?php slot('co') ?>
                <?= url('co-csgreen.svg') ?>
                <?php endslot() ?>
                <?php endsnippet() ?>
            </div>

            <?php if ($newsArticle = $page->news()->toStructure()->sortby('date', 'desc')->first()) : ?>
                <div  id="four" class="hidden lg:flex flex-col gap-1 pb-5 px-3 pt-3 h-sreen">
                    <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                        <?php echo $image->thumb([
                            'quality' => 60,
                            'format'  => 'webp',
                        ])->html(); ?>
                    <?php endforeach ?>

                    <div class="flex flex-col gap-2">
                        <h2 class="text-lg mt-2"><?= $newsArticle->title()->smartypants()->toHtml() ?></h2>
                        <div class="font-mono text-sm">
                            <?= $newsArticle->date()->toDate('d.m.y') ?>
                            <div class="flex flex-col gap-2">
                                <?= $newsArticle->description()->text()->smartypants() ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <div class="divide-y divide-csgreen grow">
                <?php if ($news = $page->news()->toStructure()->sortby('date', 'desc')) : ?>
                    <?php foreach ($news as $newsArticle) : ?>

                        <div class="flex lg:hidden pb-5 px-3 pt-3 lg:px-0 lg:pb-6 lg:pt-0">
                            <div class="flex flex-col gap-1 lg:border-t border-csgreen lg:pt-0">
                                <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                    <?php echo $image->thumb([
                                        'quality' => 30,
                                        'format'  => 'webp',
                                    ])->html(); ?>
                                <?php endforeach ?>

                                <div class="flex flex-col gap-2">
                                    <h2 class="text-lg mt-2"><?= $newsArticle->title()->smartypants()->toHtml() ?></h2>
                                    <div class="font-mono text-sm">
                                        <?= $newsArticle->date()->toDate('d.m.y') ?>
                                        <div class="flex flex-col gap-2">
                                            <?= $newsArticle->description()->text()->smartypants() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>
            </div>


            <div class="flex text-csgreen border-t border-csgreen">
                <?php snippet('footer') ?>
            </div>
        </div>

        <div id="four" class="hidden divide-y divide-csgreen lg:grid gap-x-2 grid-cols-2 flex-col lg:flex-wrap lg:w-1/2 lg:divide-none overflow-auto h-screen no-scrollbar">
            <?php if ($news = $page->news()->toStructure()->without(0)->sortby('date', 'desc')) : ?>
                <?php foreach ($news as $newsArticle) : ?>

                    <div class="pb-5 px-3 pt-3 lg:px-0 lg:pb-6 lg:pt-0">
                        <div class="flex flex-col gap-1 lg:border-t lg:border-csgreen lg:pt-0">
                            <?php foreach ($newsArticle->image()->toFiles() as $image) : ?>
                                <?php echo $image->thumb([
                                        'quality' => 50,
                                        'format'  => 'webp',
                                    ])->html(); ?>
                            <?php endforeach ?>

                            <div class="flex flex-col gap-2">
                                <h2 class="text-lg mt-2"><?= $newsArticle->title()->smartypants()->toHtml() ?></h2>
                                <div class="font-mono text-sm">
                                    <?= $newsArticle->date()->toDate('d.m.y') ?>
                                    <div class="flex flex-col gap-2">
                                        <?= $newsArticle->description()->kt()->smartypants() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            <?php endif ?>

        </div>

    </main>
    <?php snippet('seo/schemas'); ?>
    <?= vite()->js('index.js') ?>
</body>

</html>

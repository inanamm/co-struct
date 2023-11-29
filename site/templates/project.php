<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="flex text-csblack relative h-screen no-scrollbar">

    <!--LEFT SIDE-->
    <div class="flex flex-col w-full relative lg:w-1/2 h-screen overflow-y-auto no-scrollbar">

        <div class="header bg-cswhite pb-5">
            <?php snippet('header', slots: true) ?>
            <?php slot('dash') ?>
            <div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
            <?php endslot('dash') ?>
            <?php slot('struct') ?>
            <?= url('struct-csblack.svg') ?>
            <?php endslot() ?>
            <?php slot('co') ?>
            <?= url('co-csblack.svg') ?>
            <?php endslot() ?>
            <?php endsnippet() ?>
        </div>

        <!--GLIDER MOBILE -->
        <div id="four" class="glide lg:hidden pt-3">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($page->images()->sortBy("sort") as $image) : ?>
                        <li class="glide__slide">
                            <?php echo $image->thumb([
                                'quality' => 50,
                                'format'  => 'webp',
                            ])->html(); ?>
                        </li>
                    <?php endforeach ?>

                </ul>
            </div>
        </div>

        <!--TEXT PROJECT-->
        <main id="four" class="flex flex-col divide-y divide-csblack grow">
            <div class="flex flex-row font-sansbold text-lg px-3 pt-2 pb-3 lg:justify-between hover-container relative">
                <h1><?= $page->title()->smartypants()->escape() ?></h1>
                <div class="hidden lg:flex font-mono text-sm self-end category absolute right-3" style="color: csblack; visibility: hidden;">
                    <?= t($page->categoryB()->smartypants()->escape()) ?>
                </div>
            </div>

            <div style="<?= calculateBarLength($page->categoryB()->escape()) ?>" class="bg-csblack h-[0.26rem] lg:hover:bg-csorange border-none lg:h-[0.40rem] self-left bar relative" onmouseover="document.querySelector('.category').style.color='#ff9900'; document.querySelector('.category').style.visibility='visible';" onmouseout="document.querySelector('.category').style.color='csblack'; document.querySelector('.category').style.visibility='hidden';">
            </div>

            <div class="font-mono text-sm px-3 pt-2 pb-3">
                <?php if ($info = $page->information()->smartypants()->toStructure()) : ?>
                    <?php snippet(
                        'accordion',
                        ['buttonText' => 'Information'],
                        slots: true
                    )
                    ?>
                    <?php slot() ?>
                    <div class="flex flex-col gap-3 mt-3">
                        <?php foreach ($info as $detail) : ?>
                            <div class="flex flex-col">
                                <p><?= t($detail->projectDetails()->smartypants()->escape()) ?></p>
                                <p><?= $detail->value()->smartypants()->escape() ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <?php endslot() ?>
                    <?php endsnippet() ?>
                <?php endif ?>
            </div>

            <article class="flex flex-col h-full font-sans text-base px-3 pt-2 pb-5 gap-3">
                <h2><?= $page->textTitle()->smartypants()->escape() ?></h2>
                <?= $page->text()->kt() ?>
            </article>

        </main>

        <div class="flex grow-0 justify-end border-t border-csblack">
            <?php snippet('footer') ?>
        </div>
    </div>
    <?php snippet('seo/schemas'); ?>
    <?= vite()->js('index.js') ?>
</body>

<!--RIGHT SIDE-->
<div id="four" class="hidden lg:flex w-1/2 overflow-y-scroll no-scrollbar">
    <div>
        <ul>
            <?php foreach ($page->images()->sortBy("sort") as $image) : ?>
                <li class="<?= $image->ratio() > 1 ? 'w-full' : 'w-full' ?> pb-0.5 last:p-0">
                    <?php echo $image->thumb([
                        'quality' => 90,
                        'format'  => 'webp',
                    ])->html(); ?>
                </li>
            <?php endforeach ?>
            <?php if ($page->credit()->kti()->isNotEmpty()) : ?>
                <li class="font-mono text-xs pb-0.5 last:p-0">
                    <?= $page->credit()->kti() ?>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>

</html>


<?php
function calculateBarLength($choice)
{
    $length = 0;

    switch ($choice) {
        case "choiceone":
            $length = 17;
            break;
        case "choicetwo":
            $length = 34;
            break;
        case "choicethree":
            $length = 51;
            break;
        case "choicefour":
            $length = 68;
            break;
        case "choicefive":
            $length = 85;
            break;
        default:
            $length = 100;
    }
    return "width:" . $length . "%";
}
?>
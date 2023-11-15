<!DOCTYPE html>
<html class="bg-csblack h-screen" lang="de">

<?php snippet('head') ?>

<body class="text-cswhite flex flex-col h-screen">
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
    <main id="third" class="flex flex-col gap-4 font-sans text-base px-3 pt-2 pb-5 lg:pr-5 lg:text-lg">
        <?= $page->privacyPolicyTitle()->kt() ?>
        <?= $page->privacyPolicy()->kirbytextinline() ?>
    </main>

    <div class="flex border-t border-cswhite mt-auto">
        <?php snippet('footer') ?>
    </div>
    <?php snippet('seo/schemas'); ?>
     <?= vite()->js('index.js') ?>
</body>

</html>
<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    <main class="text-csgreen">
        <div class="flex flex-col divide-y divide-csgreen">

            <?php snippet(
                'article',
                [
                    'articleTitle' => 'co–struct gewinnt den 1. Preis!'
                ],
                slots: true
            ) ?>
                <?php slot('article') ?>
                    <p>Hello you dumbo</p>
                <?php endslot() ?>
            <?php endsnippet() ?>
 
 
            <?php snippet(
                'article',
                [
                    'articleTitle' => 'co–struct gewinnt den 2. Preis!',
                ],
                slots: true
            ) ?>
                <?php slot('article') ?>
                    <p>Hello you dumbo nr 2</p>
                <?php endslot() ?>
            <?php endsnippet() ?>

        </div>
    </main>
    <div class="text-csgreen">
        <?php snippet('footer') ?>
    </div>
</body>

</html>
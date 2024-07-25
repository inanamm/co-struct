<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 */
?>

<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
    <main class="h-screen">
        <?php foreach ($site->images() as $image): ?>
            <img class="h-48" 
            src="<?= $image->thumbhashUri() ?>" data-src="<?= $image->url() ?>" loading="lazy"
                alt="<?= $image->alt() ?>" />
        <?php endforeach ?>
    </main>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.iife.js" defer init></script>
</body>

</html>
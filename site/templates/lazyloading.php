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
    <main>
        <?php foreach ($site->images() as $image): ?>
            <img alt="<?= $image->alt() ?>" class="lazy" data-src="<?= $image->url() ?>" />

        <?php endforeach ?>
    </main>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.iife.js"></script>
    <script>
        var lazyLoadInstance = new LazyLoad({
            // Your custom settings go here
        });
    </script>
</body>

</html>
<div class="flex flex-col gap-0">
    <?php if ($email) : ?>
        <?php snippet('link', [
            'url' => 'mailto:' . $email,
            'description' => $email,
            'blank' => false
        ]) ?>
    <?php endif ?>
    <a href="tel:<?= $phone ?>" class="underline-none hover:text-cslightblue">
        <?= $phone ?>
    </a>
</div>

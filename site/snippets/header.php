<header class="px-3 pt-2 pb-2">
    <a href="/">
        <div class="logo flex flex-col w-full">
            <div id="logoFirst" class="flex align-baseline">
                <?= $slots->dash() ?>
                <!-- <img src="<?= url('dash.svg') ?>" /> -->
                <img src="<?= $slots->struct() ?>" class="struct w-28 lg:w-40" alt="logo" />
            </div>
            
            <div class="logoSecond flex w-28 lg:w-40">
                <img src="<?= $slots->co() ?>" class="co" alt="logo" />
            </div>
        </div>
    </a>

</header>
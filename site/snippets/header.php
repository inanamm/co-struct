<header class="px-3 pt-2 pb-7">
    <?php snippet('menu') ?>
    <div class="logo flex flex-col w-full">
        <!-- opacity-0 -->
        <div id="logoFirst" class="flex align-baseline">
            <div id="dash" class="w-7 h-[0.405rem] bg-black mt-[0.44rem] self-center " alt="logo"></div>
            <!-- <img src="dash.svg"> -->
            <img src="<?= url('struct.svg') ?>" class="struct" alt="logo"/>
        </div>
        <div class="logoSecond flex">
            <img src="<?= url('co.svg') ?>" class="co" alt="logo"/>
        </div>
    </div>
</header>
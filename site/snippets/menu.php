<div class="relative z-40" x-data="{ menuOpen: false }">

    <div 
        class="h-screen w-full bg-csblack opacity-30 bg-blend-multiply fixed inset-0" 
        @click="menuOpen = false" 
        x-show="menuOpen" 
        :aria-expanded="menuOpen.toString()" 
        style="display: none;" 
        x-transition:enter="transition duration-500 ease-in-out" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-30" 
        x-transition:leave="transition ease-in-out duration-100" 
        x-transition:leave-start="opacity-30"
        x-transition:leave-end="opacity-0">
    </div>

    <button @click="menuOpen = !menuOpen" class="fixed bottom-3 right-3 z-50" :aria-expanded="menuOpen.toString()" aria-controls="navigation" aria-label="Navigation Menu">
        <svg class="h-8 w-8 lg:h-12 lg:w-12 text-csorange transition-transform origin-left hover:lg:text-cslightblue" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="4">
            <line x1="12.5" y1="0" x2="12.5" y2="25" x-show="!menuOpen" />
            <line x1="0" y1="12.5" x2="25" y2="12.5" />
        </svg>
    </button>

    <div id="navigation" x-show="menuOpen" class="h-auto w-full flex flex-col bg-cswhite border-t border-csorange divide-y divide-csorange text-csorange fixed bottom-0 left-0" x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full" role="navigation" style="display: none;">

        <nav class="flex justify-between pt-2 pb-5 px-3 font-sans text-lg">
            <?php
            $items = $pages->listed();
            if ($items->isNotEmpty()) : ?>
                <ul>
                    <?php foreach ($items as $item) : ?>
                        <?php if (!($item->id() === "jobs" && $pages->get('jobs')->children()->listed()->count() < 1)) : ?>
                            <li <?= e($item->id() === 'news', 'class="mt-4 hover:text-cslightblue"') ?>>
                                <a <?= e($item->isOpen(), 'class="font-sansbold mt-2 hover:text-cslightblue"') ?> href="<?= $item->url() ?>" class="hover:text-cslightblue"><?= $item->title()->html() ?></a>
                                <?php if ($item->id() === 'home') : ?>
                                    <nav>
                                        <?php
                                        $filter = param("filter");
                                        $languageCode = $kirby->language()->code();
                                        $projectPage = $pages->get('projects');
                                        $tags = ['built', 'building', 'notbuilt'];
                                        foreach ($tags as $tag) :
                                            if ($projectPage->children()->filterBy('tag', $tag)->isNotEmpty()) : ?>
                            <li class="hover:text-cslightblue <?= e($filter === $tag, 'pl-3 text-cslightblue') ?>">
                                <a href="<?= url($languageCode . '/filter:' . $tag) ?>" class="filter-btn" data-filter="<?= $tag ?>"><?= t($tag) ?></a>
                            </li>
                    <?php endif;
                                        endforeach; ?>
        </nav>
    <?php endif; ?>
    </li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<ul>
    <?php foreach ($kirby->languages() as $language) : ?>
        <li <?= e($kirby->language() == $language, 'class="font-sansbold"') ?>>
            <a href="<?= $page->url($language->code()) ?>" hreflang="<?= $language->code() ?>" class="hover:text-cslightblue">
                <?= html($language->name()) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</nav>

<div class="flex flex-col pt-2 pb-5 px-3 font-mono text-sm gap-3">
    <?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
    <?php if ($address = $site->addressZH()->toObject()) : ?>
        <?php snippet(
            'address',
            [
                'companyName' => $address->companyName(),
                'description' => $address->description(),
                'street' => $address->street(),
                'postalCode' => $address->postalCode(),
                'place' => $address->place(),
            ]
        ) ?>
    <?php endif ?>

    <?php if ($address = $site->addressVD()->toObject()) : ?>
        <?php snippet(
            'address',
            [
                'companyName' => $address->companyName(),
                'description' => $address->description(),
                'street' => $address->street(),
                'postalCode' => $address->postalCode(),
                'place' => $address->place(),
            ]
        ) ?>
    <?php endif ?>
</div>
    </div>

</div>
<div class="relative z-40" x-data="{ menuOpen: false }">

    <div class="h-screen w-full bg-csblack opacity-30 bg-blend-multiply absolute" @click="menuOpen = !menuOpen" x-show="menuOpen" :aria-expanded="menuOpen">
    </div>

    <button @click="menuOpen = !menuOpen" class="fixed bottom-3 right-3 z-50" :aria-expanded="menuOpen" aria-controls="navigation" aria-label="Navigation Menu">
        <svg class="h-5 w-5 lg:h-10 lg:w-10 text-csorange group-open:rotate-45 transition-transform origin-left hover:lg:text-cslightblue" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="4">
            <line x1="12.5" y1="0" x2="12.5" y2="25" x-show="!menuOpen" />
            <line x1="0" y1="12.5" x2="25" y2="12.5" />
        </svg>
    </button>


    <div id="navigation" x-show="menuOpen" class="h-auto w-full flex flex-col bg-cswhite border-t border-csorange divide-y divide-csorange text-csorange fixed bottom-0 left-0" x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full">

        <nav class="flex justify-between pt-2 pb-5 px-3 font-sans text-xl">
            <?php
            $items = $pages->listed();
            if ($items->isNotEmpty()) :
            ?>
                <ul>
                    <?php foreach ($items as $item) : ?>
                        <?php if ($item->id() === "jobs" && $pages->get('jobs')->children()->listed()->count() < 1) : ?>
                        <?php else : ?>

                            <li <?php e($item->id() === 'news', ' class="mt-4 hover:text-cslightblue"') ?>>
                                <a<?php e($item->isOpen(), ' class="font-sansbold mt-2 hover:text-cslightblue"') ?> href="<?= $item->url() ?>" class="hover:text-cslightblue"><?= $item->title()->html() ?></a>


                                    <?php
                                    $subitems = false;
                                    if ($item->id() === 'home') :

                                    ?>
                                        <nav>
                                            <?php if ($kirby->language()->code() === "de") : ?>
                                                <ul>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "built")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/de/filter:built">Realisiert</a>
                                                        </li>
                                                    <?php endif ?>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "building")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/de/filter:building">In Bau</a>
                                                        </li>
                                                    <?php endif ?>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "notbuilt")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/de/filter:notbuilt">Nicht realisiert</a>
                                                        </li>
                                                    <?php endif ?>
                                                </ul>
                                            <?php else : ?>
                                                <ul>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "built")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/fr/filter:built">Réalisés</a>
                                                        </li>
                                                    <?php endif ?>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "building")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/fr/filter:building">En construction</a>
                                                        </li>
                                                    <?php endif ?>
                                                    <?php if ($pages->get('projects')->children()->filterBy('tag', "notbuilt")->isNotEmpty()) : ?>
                                                        <li class="hover:text-cslightblue">
                                                            <a href="/fr/filter:notbuilt">Non réalisées</a>
                                                        </li>
                                                    <?php endif ?>
                                                </ul>
                                            <?php endif ?>

                                        </nav>
                                    <?php endif ?>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>

            <ul>
                <?php foreach ($kirby->languages() as $language) : ?>
                    <li<?php e($kirby->language() == $language, ' class="font-sansbold"') ?>>
                        <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>" class="hover:text-cslightblue">
                            <?= html($language->name()) ?>
                        </a>
                        </li>
                    <?php endforeach ?>
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
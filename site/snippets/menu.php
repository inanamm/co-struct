<div class="relative z-50" x-data="{ menuOpen: false }"> 
    <!-- there was a h-full in there, is it necessary? still works?-->

    <button @click="menuOpen = !menuOpen" class="fixed bottom-3 right-3 z-30" :aria-expanded="menuOpen" aria-controls="navigation" aria-label="Navigation Menu">
        <svg class="h-5 w-5 lg:h-10 lg:w-10 text-csorange group-open:rotate-45 transition-transform origin-left" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="4">
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

                            <li <?php e($item->id() === 'news', ' class="mt-4"') ?>>
                                <a<?php e($item->isOpen(), ' class="font-sansbold mt-2"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>


                                    <?php
                                    $subitems = false;
                                    if ($root = $pages->findOpen()) {
                                        // $subitems = $site->find('projects')->children();
                                        $subitems = ["Realisiert", "In Bau", "Nicht realisiert"];
                                    }
                                    // if ($subitems and $subitems->isNotEmpty() and $item->title()->value() === 'home') :
                                    if ($item->id() === 'home') :

                                    ?>
                                        <nav>
                                            <ul>
                                                <?php foreach ($subitems as $subitem) : ?>
                                                    <li>
                                                        <a><?= $subitem ?></a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
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
                        <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
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
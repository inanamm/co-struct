<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 * @var Kirby\Cms\Pages $pages
 *
 * @var string | null $filter
 */
?>

<div class="relative z-40" x-data="{ menuOpen: false }" @close-menu.window="menuOpen = false">
  <div class="h-screen w-full bg-csblack opacity-30 bg-blend-multiply fixed inset-0" @click="menuOpen = false"
       x-show="menuOpen" :aria-expanded="menuOpen.toString()" style="display: none;"
       x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-30" x-transition:leave="transition ease-in-out duration-100"
       x-transition:leave-start="opacity-30" x-transition:leave-end="opacity-0">
  </div>

  <button @click="menuOpen = !menuOpen" class="fixed bottom-3 right-3 z-50" :aria-expanded="menuOpen.toString()"
          aria-controls="navigation" aria-label="Navigation Menu">
    <svg class="h-8 w-8 lg:h-12 lg:w-12 text-csorange transition-transform origin-left hover:lg:text-cslightblue"
         viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="4">
      <line x1="12.5" y1="0" x2="12.5" y2="25" x-show="!menuOpen"/>
      <line x1="0" y1="12.5" x2="25" y2="12.5"/>
    </svg>
  </button>

  <div id="navigation" x-show="menuOpen"
       class="h-auto w-full flex flex-col bg-cswhite border-t border-csorange divide-y divide-csorange text-csorange fixed bottom-0 left-0"
       x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="translate-y-full"
       x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in-out duration-300"
       x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full" role="navigation"
       style="display: none;">

    <nav class="flex justify-between pt-2 pb-5 px-3 font-sans text-lg">
      <?php snippet('home-nav') ?>

      <ul>
        <?php foreach ($kirby->languages() as $language): ?>
          <li <?= e($kirby->language() == $language, 'class="font-sansbold"') ?>>
            <a href="<?= $page->url($language->code()) ?>" hreflang="<?= $language->code() ?>"
               class="hover:text-cslightblue">
              <?= html($language->name()) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="flex flex-col pt-2 pb-5 px-3 font-mono text-sm gap-3">
      <?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
			<?php
			$addresses = $site->addresses()->toStructure();
			$visibleAddresses = $addresses->filter(fn ($address) => $address->footer_toggle()->toBool())->limit(3);

			if ($visibleAddresses->isNotEmpty()): ?>
					<div class="grid gap-4">
						<?php foreach ($visibleAddresses as $address): ?>
							<div class="singleAddress">
								<?= $address->companyName() ?><br>
								<?= $address->description() ?><br>
								<?= $address->street() ?><br>
								<?= $address->place() ?><br>
								<a href="tel:<?= $address->phoneNumber() ?>" class="underline-none hover:text-cslightblue"><?= $address->phoneNumber() ?></a>
							</div>
						<?php endforeach ?>
					</div>
			<?php endif ?>		
    </div>
  </div>

</div>
<footer class="w-full flex">
	<div class="flex flex-col gap-3 font-mono text-sm lg:flex-row lg:gap-0 lg:text-xs px-3 pt-2 pb-5 grow">
		<div class="flex flex-col lg:flex-row gap-3 lg:gap-0 w-full">
			<div class="lg:w-1/2">
				<?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
			</div>
			<div class="lg:w-1/2">
			<?php
			$addresses = $site->addresses()->toStructure();
			$visibleAddresses = $addresses->filter(fn ($address) => $address->footer_toggle()->toBool())->limit(3);

			if ($visibleAddresses->isNotEmpty()): ?>
					<div class="grid lg:grid lg:grid-cols-[35%_1fr_1fr] gap-4">
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
  <?php snippet('cookieconsentJs') ?>
</footer>

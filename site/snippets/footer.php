<footer class="w-full flex">
	<div class="flex flex-col gap-3 font-mono text-sm lg:flex-row lg:gap-0 lg:text-xs px-3 pt-2 pb-5 grow">
		<div class="flex flex-col lg:flex-row gap-3 lg:gap-0 w-full">
			<div class="lg:w-1/2">
				<?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
			</div>
			<div class="lg:w-1/4">
				<?php if ($site->addresses()->toStructure()->first()->toggle()->toBool() === true): ?>
					<div class="flex flex-col gap-4">
						<?php if ($footerAddress = $site->addresses()->toStructure()->first()): ?>
							<?= $footerAddress->companyName() ?></br>
							<?= $footerAddress->description() ?></br>
							<?= $footerAddress->street() ?></br>
							<?= $footerAddress->place() ?></br>
						<?php endif ?>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</footer>
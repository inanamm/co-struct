<footer class="flex flex-col lg:flex-row lg:gap-0 lg:w-1/2 gap-4 font-mono text-sm lg:text-xs px-3 lg:px-0 lg:pl-3 pt-3 pb-5">
	<div class="lg:w-1/2">
		<?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
	</div>
	<div class="lg:w-1/4">
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
	</div>

	<div class="lg:w-1/4">
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

</footer>
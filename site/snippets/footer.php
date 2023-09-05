<footer class="flex flex-col gap-4 font-mono text-sm lg:flex-row lg:gap-0 lg:text-sm px-3 lg:px-0 lg:pl-3 pt-3 pb-5 grow">
	<div class="lg:w-[40%]">
		<?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
	</div>
	<div class="lg:w-[30%]">
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

	<div class="lg:w-[30%]">
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
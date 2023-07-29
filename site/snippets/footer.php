<footer>
	<div class="flex flex-col divide-y divide-black">
		<div></div>
		<div class="flex flex-col gap-4 font-mono text-sm px-3 pt-2 pb-5">
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
</footer>
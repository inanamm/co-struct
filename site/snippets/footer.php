<footer class="w-full flex">
	<div class="flex flex-col gap-4 font-mono text-sm lg:flex-row lg:gap-0 lg:text-xs px-3 pt-3 pb-5 grow">
		<div class="flex flex-col lg:flex-row gap-4 lg:gap-2 w-full">
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

			<div class="lg:w-1/4 ">
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
</footer>
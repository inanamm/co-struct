<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header') ?>
	<main class="text-csblue">
		<div class="flex flex-col divide-y divide-csblue last:divide-csblue">
			<div class="font-sans text-lg px-3 pt-2 pb-5">
				<p class="description">
					<?= $page->Bueroprofil() ?>
				</p>
			</div>
			<div class="flex flex-col gap-4 font-sans text-lg px-3 pt-2 pb-5">
				<?php if ($address = $page->addressZH()->toObject()) : ?>
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

				<?php if ($address = $page->addressVD()->toObject()) : ?>
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

				<div class="flex flex-col gap-0">

					<?php snippet('contact', ['phone' => $page->phone(), 'email' => $page->email()]) ?>
					<?php snippet('link', [
						'url' => 'https://www.instagram.com/co_struct/',
						'description' => 'Instagram',
						'blank' => true
					]) ?>
				</div>
			</div>

			<div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Mitarbeitende']) ?>

				<?php if ($coworkers = $page->coworkers()->toStructure()) : ?>
					<?php snippet('coworkers', ['coworkers' => $coworkers]) ?>
				<?php endif ?>

			</div>
			<div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Ehemalige']) ?>
				<ul>
					<li>Mathias Stefan Hürlimanner</li>
					<li>Alex Hanimann</li>
				</ul>
			</div>
			<div class="font-sans text-base px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Bewerbungen']) ?>
				<p>Momentan haben wir leider keine offenen Stellen.</p>
			</div>
			<div class="text-xs font-mono px-3 pt-2 pb-5">
				<?php snippet('copyright') ?>
			</div>
		</div>
	</main>
	<div class="text-csblue">
		<?php snippet('footer') ?>
	</div>

</body>


</html>
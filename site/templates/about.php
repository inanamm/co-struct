<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body class="text-csblue">
	<?php snippet('header') ?>

	<main class="flex flex-col divide-y divide-csblue border-b border-csblue">

		<article class="flex flex-col gap-5 font-sans text-lg px-3 pt-2 pb-5">
			<?= $page->Bueroprofil()->kt() ?>
		</article>

		<div class="flex flex-col gap-4 font-sans text-lg px-3 pt-2 pb-5">
			<?php if ($address = $site->addressZH()->toObject()) : ?>
				<?php snippet(
					'address',
					[
						'companyName' => $address->companyName()->escape(),
						'description' => $address->description()->escape(),
						'street' => $address->street()->escape(),
						'postalCode' => $address->postalCode()->escape(),
						'place' => $address->place()->escape(),
					]
				) ?>
			<?php endif ?>

			<?php if ($address = $site->addressVD()->toObject()) : ?>
				<?php snippet(
					'address',
					[
						'companyName' => $address->companyName()->escape(),
						'description' => $address->description()->escape(),
						'street' => $address->street()->escape(),
						'postalCode' => $address->postalCode()->escape(),
						'place' => $address->place()->escape(),
					]
				) ?>
			<?php endif ?>

			<div class="flex flex-col gap-0">
				<?php snippet('contact', ['phone' => $site->phone()->escape(), 'email' => $site->email()->escape()]) ?>
				<?php snippet('link', [
					'url' => $site->instagram(),
					'description' => 'Instagram',
					'blank' => true
				]) ?>
				<?php snippet('link', [
					'url' => $site->linkedin(),
					'description' => 'LinkedIn',
					'blank' => true
				]) ?>
			</div>
		</div>

		<div class="font-sans text-base px-3 pt-2 pb-5">
			<?php snippet('subtitle', ['subtitle' => 'Mitarbeitende']) ?>

			<?php if ($coworkers = $page->coworkers()->toStructure()) : ?>
				<?php snippet('coworkers', ['coworkers' => $coworkers]) ?>
			<?php endif ?>
		</div>

		<div class="font-sans text-base px-3 pt-2 pb-5">
			<?php snippet('subtitle', ['subtitle' => 'Ehemalige']) ?>
			<?= $page->oldcoworkers() ?>
		</div>

		<div class="font-sans text-base px-3 pt-2 pb-5">
			<?php snippet('subtitle', ['subtitle' => 'Bewerbungen']) ?>
			<p>Momentan haben wir leider keine offenen Stellen.</p>
		</div>
		
		<div class="text-xs font-mono px-3 pt-2 pb-5">
			<?php snippet('copyright') ?>
		</div>
	</main>

	<?php snippet('footer') ?>

</body>

</html>
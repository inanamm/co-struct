<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header') ?>
	<main class="text-csblue">
		<div class="flex flex-col divide-y divide-csblue last:divide-csblue">
			<div class="font-sans text-lg px-3 pt-2 pb-5">
				<article class="flex flex-col gap-5 description">
					<?= $page->Bueroprofil()->kt() ?>
				</article>
			</div>
			<div class="flex flex-col gap-4 font-sans text-lg px-3 pt-2 pb-5">
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

				<div class="flex flex-col gap-0">

					<?php snippet('contact', ['phone' => $site->phone(), 'email' => $site->email()]) ?>
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

			<div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Mitarbeitende']) ?>

				<?php if ($coworkers = $page->coworkers()->toStructure()) : ?>
					<?php snippet('coworkers', ['coworkers' => $coworkers]) ?>
				<?php endif ?>

			</div>
			<div class="font-base px-3 pt-2 pb-5">
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
		</div>
	</main>
	<div class="text-csblue">
		<?php snippet('footer') ?>
	</div>

</body>


</html>
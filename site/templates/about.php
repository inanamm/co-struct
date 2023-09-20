<!DOCTYPE html>
<html class="bg-cswhite h-full" lang="de">

<?php snippet('head') ?>

<body class="text-csblue flex flex-col h-full">
	<?php snippet('header', slots: true) ?>
		<?php slot('dash')?>
			<div id="dash" class="w-7 bg-csblue h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
		<?php endslot('dash')?>
		<?php slot('struct') ?>
			<?= url('struct-csblue.svg') ?>
		<?php endslot() ?>
		<?php slot('co') ?>
			<?= url('co-csblue.svg') ?>
		<?php endslot() ?>
	<?php endsnippet() ?>

	<main class="flex flex-col mb-auto lg:flex-row divide-y divide-csblue lg:divide-none ">
		<article class="flex flex-col gap-5 font-sans text-lg lg:text-base px-3 pt-2 pb-5 lg:w-1/2">
			<?= $page->Bueroprofil()->kt() ?>
		</article>

		<div class="lg:w-1/2 lg:divide-none divide-y divide-csblue">
			<div class="flex flex-col lg:flex-row lg:gap-0 gap-4 font-sans text-lg px-3 pt-2 pb-5 lg:pb-6">
				<div class="flex flex-col gap-4">
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
				</div>
				<div class="flex flex-col gap-0 lg:order-first lg:w-[35%]">
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

			<div class="flex flex-col lg:flex-row font-sans text-base px-3 pt-2 pb-5 lg:pb-6">
				<div class="flex-none lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->coworkersTitle()->escape()]) ?>
				</div>

				<div class="flex flex-col">
					<?php if ($coworkers = $page->coworkers()->toStructure()) : ?>
						<?php snippet('coworkers', ['coworkers' => $coworkers]) ?>
					<?php endif ?>
				</div>
			</div>

			<div class="flex flex-col lg:flex-row lg:gap-0 font-sans text-base px-3 pt-2 pb-5 lg:pb-6">
				<div class="lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->oldcoworkersTitle()->escape()]) ?>
				</div>
				<?= $page->oldcoworkers() ?>
			</div>

			<div class="flex flex-col lg:flex-row font-sans text-base px-3 pt-2 pb-5  lg:pb-6">
				<div class="lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->applicationsTitle()->escape()]) ?>
				</div>
				<?php if ($pages->get('jobs')->children()->listed()->count() > 0) : ?>
					<?php snippet('link', [
						'url' => "/jobs",
						'description' => $page->OpenPositionsLinkText()->escape(),
						'blank' => true
					]) ?>
				<?php else : ?>
					<p><?= $page->noOpenPositions()->escape() ?></p>
				<?php endif ?>
			</div>

			<div class="text-xs font-mono px-3 pt-2 pb-5">
				<?php snippet('copyright') ?>
			</div>
		</div>
	</main>

	<div class="flex border-t border-csblue">
		<?php snippet('footer') ?>
	</div>

	<?= vite()->js() ?>
</body>

</html>
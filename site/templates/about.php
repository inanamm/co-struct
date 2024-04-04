<!DOCTYPE html>
<html class="bg-cswhite h-screen" lang="de">

<?php snippet('head') ?>

<body class="text-csblue flex flex-col h-full overflow-y-auto no-scrollbar">
	<div class="header bg-cswhite pb-5">
		<?php snippet('header', slots: true) ?>
		<?php slot('dash') ?>
		<div id="dash" class="w-7 bg-csblue h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center"
			alt="logo"></div>
		<?php endslot('dash') ?>
		<?php slot('struct') ?>
		<?= url('struct-csblue.svg') ?>
		<?php endslot() ?>
		<?php slot('co') ?>
		<?= url('co-csblue.svg') ?>
		<?php endslot() ?>
		<?php endsnippet() ?>
	</div>

	<main class="flex flex-col lg:flex-row divide-y divide-csblue lg:divide-none no-scrollbar">
		<div class="sr-only">
			<h1>About</h1>
		</div>
		<article id="four" class="flex flex-col gap-5 font-sans text-lg lg:text-base px-3 pt-2 pb-5 lg:pr-5 lg:w-1/2">
			<?= $page->Bueroprofil()->kt()->smartypants() ?>
		</article>

		<!-- RECHTS -->
		<div id="four" class="lg:w-1/2 lg:divide-none divide-y divide-csblue no-scrollbar">
			<div class="flex flex-col lg:flex-row gap-4 font-sans text-lg px-3 pt-2 pb-5 lg:pb-6 lg:px-0 lg:pr-3">
				<div class="flex flex-col gap-4">
					<?php if ($address = $site->addressOffice()->toObject()): ?>
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

			<!-- ADRESSEN -->
			<div class="flex flex-col lg:flex-row font-sans text-lg px-3 pt-2 pb-5 lg:gap-4 lg:pb-6 lg:px-0 lg:pr-3">
				<div class="flex flex-col gap-4">
					<?php if ($address = $site->addressZH()->toObject()): ?>
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

					<?php if ($address = $site->addressVD()->toObject()): ?>
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
				<div class="flex flex-col gap-0 lg:order-first lg:w-[35%]"></div>
			</div>


			<!-- MITARBEITENDE -->
			<div class="flex flex-col lg:flex-row lg:gap-4 font-sans text-base px-3 pt-2 pb-5 lg:pb-6 lg:px-0 lg:pr-3">
				<div class="flex-none lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->coworkersTitle()->smartypants()]) ?>
				</div>

				<div class="flex flex-col w-full">
					<?php if ($coworkers = $page->coworkers()->toStructure()): ?>
						<?php snippet('coworkers', ['coworkers' => $coworkers]) ?>
					<?php endif ?>
				</div>
			</div>

			<?php if ($page->oldcoworkers()->list()->isNotEmpty()): ?>
				<div class="flex flex-col lg:flex-row lg:gap-4 font-sans text-base px-3 pt-2 pb-5 lg:pb-6 lg:px-0 lg:pr-3">
					<div class="lg:w-[35%]">
						<?php snippet('subtitle', ['subtitle' => $page->oldcoworkersTitle()->smartypants()]) ?>
					</div>
					<?= $page->oldcoworkers() ?>

				</div>
			<?php endif ?>

			<!-- JOBS -->
			<div class="flex flex-col lg:flex-row lg:gap-4 font-sans text-base px-3 pt-2 pb-5 lg:pb-6 lg:px-0 lg:pr-3">
				<div class="flex-none lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->applicationsTitle()->smartypants()]) ?>
				</div>
				<div class="lg:w-full">
					<?php if ($pages->get('jobs')->children()->listed()->count() > 0): ?>
						<?php snippet('link', [
							'url' => "/jobs",
							'description' => $page->OpenPositionsLinkText()->smartypants(),
							'blank' => false
						]) ?>
					<?php else: ?>
						<p>
							<?= $page->noOpenPositions()->smartypants() ?>
						</p>
					<?php endif ?>
				</div>
			</div>

			<!-- WERKLISTE -->
			<div class="flex flex-col lg:flex-row lg:gap-4 font-sans text-base px-3 pt-2 pb-5 lg:pb-6 lg:px-0 lg:pr-3">
				<div class="flex-none lg:w-[35%]">
					<?php snippet('subtitle', ['subtitle' => $page->worklistTitle()->smartypants()]) ?>
					<!-- <?php var_dump($pages->get('projects')->content()->timeframe()) ?> -->
				</div>
				<div class="flex flex-col text_with_link font-mono text-sm lg:text-base lg:pr-5">
					<div class="flex flex-col">

						<?php
						$projectsPage = $pages->get('projects');
						$projects = $projectsPage->children(); ?>

						<?php foreach ($projects as $project): ?>
							<?php
							$title = $project->listTitle();
							$url = $project->url();
							?>

							<?php foreach ($project->information()->toStructure() as $projectDetail): ?>
								<?php if ($projectDetail->projectDetails()->value() == "timeframe"): ?>

									<div class="flex flex-row gap-3">
										<?= $projectDetail->value() ?><a href=<?= $url ?>><?= $title ?></a>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<!-- IMPRESSUM -->
			<div class="flex flex-col text_with_link gap-2 text-xs font-mono px-3 pt-2 pb-5 lg:px-0 lg:pr-3">
				<?php snippet('copyright') ?>
				<?php snippet('link', [
					'url' => "/privacy",
					'description' => $pages->find('privacy')->privacyPolicyTitle()->escape(),
					'blank' => true
				]) ?>
			</div>
		</div>
	</main>

	<div class="flex border-t border-csblue mt-auto">
		<?php snippet('footer') ?>
	</div>

	<?php snippet('seo/schemas'); ?>
	<?= vite()->js('index.js') ?>
</body>

</html>
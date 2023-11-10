<!DOCTYPE html>
<html class="bg-csyellow h-screen" lang="de">

<?php snippet('head') ?>

<body class="flex flex-col overflow-y-auto h-screen text-csblack">
	<div class="header pb-5">
		<?php snippet('header', slots: true) ?>
		<?php slot('dash') ?>
		<div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center" alt="logo"></div>
		<?php endslot('dash') ?>
		<?php slot('struct') ?>
		<?= url('struct-csblack.svg') ?>
		<?php endslot() ?>
		<?php slot('co') ?>
		<?= url('co-csblack.svg') ?>
		<?php endslot() ?>
		<?php endsnippet() ?>
	</div>
	<main class="flex flex-col h-screen">
		<article class="flex flex-col gap-2 font-mono text-sm px-3 pt-2 pb-5 lg:pr-5 lg:w-1/2">
			<p>Whoops, looks like the page you're looking for doesn't exist!</p>
			<?php snippet('link', [
				'url' => $site->url($kirby->language()->code()),
				'description' => 'Go back to the home page',
				'blank' => false
			]) ?>
		</article>
	</main>

	<div class="flex flex-col border-t border-csblack">
		<?php snippet('footer') ?>
	</div>

	<?php snippet('seo/schemas'); ?>
	<?= vite()->js('index.js') ?>
</body>

</html>
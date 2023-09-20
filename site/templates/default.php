<!DOCTYPE html>
<html class="bg-cswhite" lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header', slots: true) ?>
		<?php slot('dash')?>
			<div id="dash" class="w-7 h-[0.40rem] bg-csblack mt-[0.44rem] self-center " alt="logo"></div>
		<?php endslot('dash')?>


		<?php slot('struct') ?>
			<?= url('struct-csblack.svg') ?>
		<?php endslot() ?>
		<?php slot('co') ?>
			<?= url('co-csblack.svg') ?>
		<?php endslot() ?>

	<?php endsnippet() ?>

	<main>
		<h1>Home</h1>
	</main>
	<?php snippet('footer') ?>
	
	<?= vite()->js() ?>
</body>

</html>
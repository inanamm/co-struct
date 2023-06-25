<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header') ?>
	<main>
		<?php foreach ($page->myBlocksField()->toBlocks() as $block) : ?>
			<div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
				<?= $block ?>
			</div>
		<?php endforeach ?>
	</main>
	<?php snippet('footer') ?>
</body>


</html>
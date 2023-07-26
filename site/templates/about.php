<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header') ?>
	<?php snippet('menu') ?> 
	<main class="text-csblue">
		<div class="flex flex-col divide-y divide-csblue last:divide-csblue">
			<div class="font-sans text-lg px-3 pt-2 pb-5">
				<p class="description">
					co–struct ist ein inhabergeführtes Büro für Tragwerksplanung in Zürich und Aubonne, gegründet von Fabrice Meylan und Sam Bouten.
					Das Ziel ist, innovative Tragsysteme von der Entstehung des Projekts an zu planen und dabei ein besonderes Augenmerk auf ästhetische Aspekte zu legen. Die enge Zusammenarbeit mit den verschiedenen Partner:innen, sowie die proaktive Optimierung der erdachten Strukturen liegen co–struct am Herzen. Die Ökologie im Bauwesen regt unsere Kreativität an, um für jedes Bauwerk die am besten geeigneten Materialien zu finden.
				</p>
			</div>
			<div class="flex flex-col gap-4 font-sans text-lg px-3 pt-2 pb-5">
				<?php snippet(
					'address',
					[
						'companyName' => 'co–struct AG',
						'description' => 'Tragwerksplanung',
						'street' => 'Förrlibuckstrasse 225',
						'postalCode' => 'CH—8005',
						'place' => 'Zürich'
					]
				) ?>
				<?php snippet(
					'address',
					[
						'companyName' => 'co–struct AG',
						'description' => 'Ingénierie structurale',
						'street' => 'Chemin des Clos 17',
						'postalCode' => 'CH—1170',
						'place' => 'Aubonne'
					]
				) ?>
				<div class="flex flex-col gap-0">
					<?php snippet('contact') ?>
					<?php snippet('link', [
						'url' => 'https://www.instagram.com/co_struct/',
						'description' => 'Instagram',
						'blank' => true
					]) ?>
				</div>
			</div>

			<!-- <div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Hello!']) ?>
				<?php snippet('link', [
					'url' => 'https://google.com',
					'description' => 'googleus',
					'blank' => true
				]) ?>
			</div> -->

			<div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Mitarbeitende']) ?>
				<?php snippet('coworkers') ?>
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
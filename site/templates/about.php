<!DOCTYPE html>
<html lang="de">

<?php snippet('head') ?>

<body>
	<?php snippet('header') ?>
	<main class="text-csblue">
		<h1 class="mb-8">logo co–struct</h1>
		<div class="flex flex-col divide-y divide-csblue">
			<div class="font-sans text-base px-3 pt-2 pb-5">
				<p class="description">
					co–struct ist ein inhabergeführtes Büro für Tragwerksplanung in Zürich und Aubonne, gegründet von Fabrice Meylan und Sam Bouten.
					Das Ziel ist, innovative Tragsysteme von der Entstehung des Projekts an zu planen und dabei ein besonderes Augenmerk auf ästhetische Aspekte zu legen. Die enge Zusammenarbeit mit den verschiedenen Partner:innen, sowie die proaktive Optimierung der erdachten Strukturen liegen co–struct am Herzen. Die Ökologie im Bauwesen regt unsere Kreativität an, um für jedes Bauwerk die am besten geeigneten Materialien zu finden.
				</p>
			</div>
			<div class="font-sans text-lg px-3 pt-2 pb-5">
				<?php snippet('address_ZH') ?><br>
				<?php snippet('address_VD') ?><br>
				<?php snippet('contact') ?>

			</div>

			<div class="px-3 pt-2 pb-5">
				<?php snippet('subtitle', ['subtitle' => 'Hello!']) ?>
			</div>

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
			<div class="px-3 pt-2 pb-5">
			<?php snippet('subtitle', ['subtitle' => 'Bewerbungen']) ?>
				Momentan haben wir leider keine offenen Stellen.
			</div>
			<div class="text-xs font-mono px-3 pt-2 pb-5">
				<?php snippet('copyright') ?>
			</div>
			<div class="text-xs font-mono px-3 pt-2 pb-5">hello</div>
		</div>
	</main>
	<?php snippet('footer') ?>
</body>


</html>
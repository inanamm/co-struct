<footer>
	<div class="flex flex-col divide-y divide-black">
		<div></div>
		<div class="flex flex-col gap-4 font-mono text-sm px-3 pt-2 pb-5">
			<?php snippet('contact', ['phone' => $page->phone(), 'email' => $page->email()]) ?>
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
		</div>
	</div>
</footer>
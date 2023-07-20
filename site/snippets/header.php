<header class="px-3 pt-2 pb-5">
	<h1 class="font-mono text-sm text-csyellow"><?= $page->title() ?></h1>

	<div class="logo">
		<div class="logoFirst">
			<div class="dash" alt="logo"></div>
			<!-- <img src="logo/dash.svg"> -->
			<img src="/content/logo/struct.svg" class="struct" alt="logo">
		</div>
		<div class="logoSecond">
			<img src="/content/logo/co.svg" class="co" alt="logo">
		</div>
	</div>
	<script>
		const timeLine = anime.timeline()
			.add({
				targets: '.logo',
				opacity: '100%',
				duration: 800,
				easing: 'easeInOutCubic'
			})
			.add({
				targets: '.dash',
				width: '100%',
				duration: 3000,
				easing: 'easeInOutCubic'
			}, '-=100')
			.add({
				targets: 'footer',
				opacity: '100%',
				duration: 400,
				easing: 'easeInOutCubic'
			}, '-=800')
	</script>
</header>
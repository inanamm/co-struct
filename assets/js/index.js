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
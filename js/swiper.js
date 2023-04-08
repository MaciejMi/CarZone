const swiper = new Swiper('.slide-container', {
	slidesPerView: 4,
	spaceBetween: 20,
	sliderPerGroup: 4,
	loop: true,
	centerSlide: 'true',
	fade: 'true',
	grabCursor: 'true',
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
		dynamicBullets: true,
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	autoplay: {
		delay: 5000,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		1000: {
			slidesPerView: 3,
		},
		1400: {
			slidesPerView: 4,
		},
	},
});

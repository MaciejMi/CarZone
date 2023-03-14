const navMenu = document.querySelector('.nav__menu');
const navLinks = document.querySelector('.nav__links');

navMenu.addEventListener('click', () => {
	navMenu.classList.toggle('open');
	navLinks.classList.toggle('visible');
});

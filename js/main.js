const navMenuBtn = document.querySelector('nav button.nav__menu');
const navLinksMb = document.querySelector('.nav__links--mobile');

navMenuBtn.addEventListener('click', () => {
	navMenuBtn.classList.toggle('active');
	navLinksMb.classList.toggle('active');
});

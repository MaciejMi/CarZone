const navMenuBtn = document.querySelector('nav button.nav__menu');
const navLinksMb = document.querySelector('.nav__links--mobile');
const navItemsMb = navLinksMb.querySelectorAll('.nav__item');

const removeActiveHandler = () => {
	navMenuBtn.classList.toggle('active');
	navLinksMb.classList.toggle('active');
};

navMenuBtn.addEventListener('click', removeActiveHandler);

document.addEventListener('scroll', () => {
	navMenuBtn.classList.remove('active');
	navLinksMb.classList.remove('active');
});

for (const item of navItemsMb) {
	item.addEventListener('click', removeActiveHandler);
}

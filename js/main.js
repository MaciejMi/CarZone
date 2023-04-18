const navMenuBtn = document.querySelector('nav button.nav__menu');
const navLinksMb = document.querySelector('.nav__links--mobile');
const navItemsMb = navLinksMb.querySelectorAll('.nav__item');

const tankCapacityInput = document.querySelector('.tank_capacity_input');
const tankCapacityOutput = document.querySelector('.tank_capacity_output');
const minimumCostInput = document.querySelector('.minimum_cost_input');
const minimumCostOutput = document.querySelector('.minimum_cost_output');
const maximumCostInput = document.querySelector('.maximum_cost_input');
const maximumCostOutput = document.querySelector('.maximum_cost_output');

const body = document.querySelector('body');
const carImages = document.querySelectorAll('.card__img');
const promptElement = document.querySelector('.prompt');
const promptImage = promptElement.querySelector('img');
const promptCancel = promptElement.querySelector('button');

promptCancel.addEventListener('click', () => {
	promptElement.classList.add('d-none');
	body.classList.remove('prompt-body');
});

for (const image of carImages) {
	image.addEventListener('click', () => {
		promptElement.classList.remove('d-none');
		window.scrollTo(0, 0);
		body.classList.add('prompt-body');
		const src = image.getAttribute('src');
		promptImage.setAttribute('src', src);
	});
}
tankCapacityOutput.textContent = 'Tank Capacity: ' + tankCapacityInput.value + ' L';
minimumCostOutput.textContent = 'Minimum cost: ' + minimumCostInput.value + ' ' + '000' + '€';
maximumCostOutput.textContent = 'Maximum cost: ' + maximumCostInput.value + ' ' + '000' + '€';

tankCapacityInput.addEventListener('input', () => {
	tankCapacityOutput.textContent = 'Tank Capacity: ' + tankCapacityInput.value + ' L';
});
minimumCostInput.addEventListener('input', () => {
	minimumCostOutput.textContent = 'Minimum cost: ' + minimumCostInput.value + ' ' + '000' + ' €';
});
maximumCostInput.addEventListener('input', () => {
	maximumCostOutput.textContent = 'Maximum cost: ' + maximumCostInput.value + ' ' + '000' + ' €';
});

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

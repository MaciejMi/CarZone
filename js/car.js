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

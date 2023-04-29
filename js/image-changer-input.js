const img = document.querySelector('.image-input img');
const input = document.querySelector("input[type='file']");

input.addEventListener('input', () => {
	if (input.files[0]) {
		img.src = URL.createObjectURL(input.files[0]);
	}
});

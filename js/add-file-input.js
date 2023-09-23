const numberOfFilesInput = document.getElementById('number-of-files');
const fileInputContainer = document.querySelector('.file-container');

numberOfFilesInput.addEventListener('input', () => {
	fileInputContainer.textContent = '';
	if (numberOfFilesInput.value >= 1 && numberOfFilesInput.value <= 10) {
		for (let i = 0; i < numberOfFilesInput.value; i++) {
			const inputFile = document.createElement('input');
			inputFile.type = 'file';
			inputFile.name = `file${i}`;
			inputFile.required = true;
			fileInputContainer.append(inputFile);
		}
	}
});

const minimumCostInput = document.querySelector('.minimum_cost_input');
const minimumCostOutput = document.querySelector('.minimum_cost_output');
const maximumCostInput = document.querySelector('.maximum_cost_input');
const maximumCostOutput = document.querySelector('.maximum_cost_output');

minimumCostOutput.textContent = 'Minimum cost: ' + minimumCostInput.value + ' ' + '000' + '€';
maximumCostOutput.textContent = 'Maximum cost: ' + maximumCostInput.value + ' ' + '000' + '€';

minimumCostInput.addEventListener('input', () => {
	minimumCostOutput.textContent = 'Minimum cost: ' + minimumCostInput.value + ' ' + '000' + ' €';
});
maximumCostInput.addEventListener('input', () => {
	maximumCostOutput.textContent = 'Maximum cost: ' + maximumCostInput.value + ' ' + '000' + ' €';
});

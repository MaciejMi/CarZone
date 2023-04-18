const tankCapacityInput = document.querySelector('.tank_capacity_input');
const tankCapacityOutput = document.querySelector('.tank_capacity_output');
const minimumCostInput = document.querySelector('.minimum_cost_input');
const minimumCostOutput = document.querySelector('.minimum_cost_output');
const maximumCostInput = document.querySelector('.maximum_cost_input');
const maximumCostOutput = document.querySelector('.maximum_cost_output');

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

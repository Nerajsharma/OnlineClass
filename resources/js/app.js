import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const addButton = document.getElementById('addButton');
const dynamicForm = document.getElementById('dynamicForm');
const cancelButton = document.getElementById('cancelButton');

// Show form when "Add" button is clicked
addButton.addEventListener('click', () => {
  dynamicForm.classList.remove('hidden'); // Show form
});
// Hide form when "Cancel" button is clicked
cancelButton.addEventListener('click', () => {
  dynamicForm.classList.add('hidden'); // Hide form
});
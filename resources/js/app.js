import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// const addButton = document.getElementById("addButton");
// const dynamicForm = document.getElementById("dynamicForm");
// const cancelButton = document.getElementById("cancelButton");

// Show form when "Add" button is clicked
// addButton.addEventListener("click", () => {
//     dynamicForm.classList.remove("hidden"); // Show form
// });
// Hide form when "Cancel" button is clicked
// cancelButton.addEventListener("click", () => {
//     dynamicForm.classList.add("hidden"); // Hide form
// });

const modelbtns = document.querySelectorAll(".modelbtn");

if (modelbtns) {
    modelbtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const modelId = btn.getAttribute("modeltarget");
            const modal = document.getElementById(modelId);
            if (modal) {
                modal.style.display = "flex";
            }
        });
    });
}
document.querySelectorAll(".closeModal").forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.closest("div[id]").style.display = "none";
    });
});

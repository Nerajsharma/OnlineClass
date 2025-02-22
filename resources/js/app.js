import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

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

// function toaster(type, title, text) {
//     var icon;
//     if (type == "success") {
//         console.log("type sucess");
//         icon = "nb nb_checkmark1";
//     } else if (type == "error") {
//         icon = "nb nb_exclamation1";
//     } else if (type == "info") {
//         icon = "nb nb_info3";
//     }
//     let notification = document.querySelector(".notification");
//     let newtoaste = document.createElement("div");
//     newtoaste.innerHTML = `<div class="toaster ${type} rounded px-4 py-2 mb-5 flex items-center justify-between gap-4">
//             <i class="${icon}"></i>
//             <div class="">
//                 <p class="text-base font-bold">${title}</p>
//                 <p class="text-md">${text}</p>
//             </div>
//             <i class="nb nb_cross text-sm" onclick="this.parentElement.remove()"></i>
//     </div>`;

//     notification.insertBefore(newtoaste, notification.firstChild);

//     let existingToasters = notification.querySelectorAll(
//         ".toaster:not(:first-child)"
//     );
//     existingToasters.forEach((toast) => {
//         toast.classList.add("slide-down");
//     });

//     newtoaste.timeOut = setTimeout(() => {
//         newtoaste.classList.add("slide-down");
//         setTimeout(() => {
//             newtoaste.remove();
//         }, 300);
//     }, 5000);
// }
// setInterval(() => {
//     toaster("success", "sucess", "Form has submitted Sucessfully");
//     toaster("error", "sucess", "i am good");
//     toaster("info", "Invilit Alet", "Please check email box");
// }, 3000);

// hamburger
const hamburger = document.getElementById("hamburger");
const slide_navbar = document.getElementById("side_navbar");
if (hamburger) {
    hamburger.addEventListener("click", (e) => {
        if (slide_navbar.style.display === "block") {
            slide_navbar.style.display = "none";
        } else {
            slide_navbar.style.display = "block";
        }
    });
}
// preloader
window.onload = function () {
    document.getElementById("preloader").style.display = "none";
};
document.querySelectorAll('button[type="submit"]').forEach((submitBtn) => {
    submitBtn.addEventListener("click", (event) => {
        document.getElementById("preloader").style.display = "flex"; // Show preloader
    });
});
document.querySelectorAll(".projectcopylink").forEach((button) => {
    button.addEventListener("click", function () {
        var linkToCopy = this.getAttribute("copydata");

        navigator.clipboard
            .writeText(linkToCopy)
            .then(() => {
                toaster("success", "link Copied", "Link Copied Sucessfully..");
            })
            .catch((err) => {
                toaster("error", "link Copied Failed", "Link Copied Failed..");
            });
    });
});

// check user kun them select
if (localStorage.getItem("dark-thems") === "enable") {
    document.documentElement.classList.add("dark-them");
    document.querySelector("#themsbtn i").classList.remove("nb_moon");
    document.querySelector("#themsbtn i").classList.add("nb_sun");
}
document.getElementById("themsbtn").addEventListener("click", () => {
    document.documentElement.classList.toggle("dark-them");

    if (document.documentElement.classList.contains("dark-them")) {
        localStorage.setItem("dark-thems", "enable");
        document.querySelector("#themsbtn i").classList.remove("nb_moon");
        document.querySelector("#themsbtn i").classList.add("nb_sun");
    } else {
        localStorage.setItem("dark-thems", "disable");
        document.querySelector("#themsbtn i").classList.add("nb_moon");
        document.querySelector("#themsbtn i").classList.remove("nb_sun");
    }
});

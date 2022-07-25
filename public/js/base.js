"use strict";

const profileButton = document.querySelector("#profileButton");

document.addEventListener("click", function (event) {
    if (event.target.closest("#profileButton")) {
        document.querySelector("#profileMenu").classList.remove("hidden");
    } else {
        const profileMenu = document.querySelector("#profileMenu");
        if(event.target.closest("#profileMenu")) {
            return;
        }
        if (!profileMenu.classList.contains("hidden")) {
            profileMenu.classList.add("hidden");
        }
    }
});

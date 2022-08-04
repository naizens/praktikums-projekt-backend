"use strict";
const department = document.querySelector("#departmentBg");
const profilePicture = document.querySelector("#profilePicture");
let bg,
    ring,
    font;
if(currentUser.department === "web"){
    bg = "bg-web"
    ring = "ring-web"
    department.innerHTML = "[NF]-Web"
} else if(currentUser.department === "app"){
    bg = "bg-app"
    ring = "ring-app"
    department.innerHTML = "[NF]-App"
} else if (currentUser.department === "network"){
    bg = "bg-network"
    ring = "ring-network"
    font = "text-slate-100"
    department.innerHTML = "[NF]-Net"
} else if (currentUser.department === "media"){
    bg = "bg-media"
    ring = "ring-media"
    font = "text-slate-100"
    department.innerHTML = "[NF]-Media"
} else{
    bg = "bg-netzfactor"
    ring = "ring-netzfactor"
    font = "text-slate-100"
    department.innerHTML = "[NF]"
}
department.classList.add(bg);
profilePicture.classList.add(ring);
department.classList.add(font);


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

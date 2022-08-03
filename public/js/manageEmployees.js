// Language: javascript
"use strict";

// Modal Part ---------------------------------------------------------------
let openModal = document.querySelectorAll(".addUser");
openModal.forEach((entry) =>{
    entry.addEventListener("click", function (event) {
        event.preventDefault();
        toggleModal();
    });
});
// Select the modal-overlay and add the eventlistener to it
const overlay = document.querySelector('.modal-overlay');
overlay.addEventListener('click', toggleModal);
// Select the modal-close buttons and add a eventlistener to them
const closeModal = document.querySelectorAll('.modal-close')
for (let i = 0; i < closeModal.length; i++) {
    closeModal[i].addEventListener('click', toggleModal);
}
// Toggle the modal when the user clicks on the button or anywhere outside of it
document.onkeydown = function(evt) {
    evt = evt || window.event
    let isEscape = false
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
    } else {
        isEscape = (evt.keyCode === 27);
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal();
    }
    if (isEscape && document.body.classList.contains('overflow-hidden')) {
        toggleModal();
    }
};
// Function for the toggling of the modal
function toggleModal (clickedDate, clickEvent) {
    const body = document.querySelector('body');
    const modal = document.querySelector('.modal');
    modal.classList.toggle('opacity-0');
    modal.classList.toggle('pointer-events-none');
    body.classList.toggle('modal-active');
    body.classList.toggle('overflow-hidden');
    if(clickEvent){
        document.querySelector("[name='startDate']").value = clickedDate;
    }
}
//Show Radio Buttons for which time of the halfDay
const halfDayRadio = document.querySelectorAll("#halfDayRadio, #fullDayRadio");
halfDayRadio.forEach((input) =>{
    input.addEventListener("click", function(event) {
        if(input.checked && input.value === "halfDay") {
            document.querySelectorAll(".halfDayRadios").forEach((entry) =>{
                entry.classList.add("flex");
                entry.classList.remove("hidden");
            });
        }
        else {
            document.querySelectorAll(".halfDayRadios").forEach((entry) =>{
                entry.classList.remove("flex");
                entry.classList.add("hidden");
            })
        }
    })
});
// End of Modal Part ---------------------------------------------------------
// Select the add button and add the eventlistener to it
const addButton = document.querySelector("#addButton");
addButton.addEventListener("click", addUser);

function addUser() {
    let form = document.getElementById("userForm");
    let formData = new FormData(form)

    if(formData.get("maxAmountOfHolidays") < 0){
        alert("Die Urlaubsanzahl darf nicht negativ sein!");
        return;
    } 

    form.submit();   
}

}
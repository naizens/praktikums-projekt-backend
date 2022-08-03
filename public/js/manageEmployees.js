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

placeEmployees()

function placeEmployees(){
    const webContent = document.querySelector("#webContent");
    const appContent = document.querySelector("#appContent");
    const networkContent = document.querySelector("#netContent");
    const mediaContent = document.querySelector("#mediaContent");

    let outputWeb = [];
    let outputApp = [];
    let outputNetwork = [];
    let outputMedia = [];

    allPersons.forEach((person) => {
        const firstName = person.firstName;
        const lastName = person.lastName;
        const userName = person.userName;
        const birthDate = convertDate(person.birthDate);
        const eMail = person.eMail;
        const department = person.department;
        const maxAmountOfHolidays = person.maxAmountOfHolidays;
        const restHolidays = person.restHolidays;
        const holidaysOfPreviousYear = person.holidaysOfPreviousYear;

        let output = 
        `
            <div id="person1" class="grid grid-cols-8 text-center divide-x">
                <div class="">
                    ${firstName}
                </div>
                <div>
                    ${lastName}
                </div>
                <div>
                    ${userName}
                </div>
                <div>
                    ${eMail}
                </div>
                <div>
                    ${birthDate}
                </div>
                <div>
                    ${maxAmountOfHolidays} Tag(e)
                </div>
                <div>
                    ${restHolidays} Tag(e)
                </div>
                <div>
                    ${holidaysOfPreviousYear} Tag(e)
                </div>
            </div>
        `

        if(department === "web"){
            console.log("web");
            outputWeb.push(output);
        }
        else if(department === "app"){
            outputApp.push(output);
        }
        else if(department === "network"){
            outputNetwork.push(output);
        }
        else if(department === "media"){
            outputMedia.push(output);
        }
    });

    webContent.innerHTML = outputWeb.join("");
    appContent.innerHTML = outputApp.join("");
    networkContent.innerHTML = outputNetwork.join("");
    mediaContent.innerHTML = outputMedia.join("");
}

function convertDate(date){
    let dateArray = date.split("-");
    let newDate = dateArray[2] + "." + dateArray[1] + "." + dateArray[0];
    return newDate;
}
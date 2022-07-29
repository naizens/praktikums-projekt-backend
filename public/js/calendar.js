// Language: javascript
"use strict";
// Ignore the following lines, they are just for adding the custom colors
function getClassName(department) {
    return {
        "netzfactor-light": "bg-netzfactor-light",
        "netzfactor-dark": "bg-netzfactor-dark",
        "netzfactor": "bg-netzfactor",
        "web": "bg-web",
        "media": "bg-media",
        "network": "bg-network",
        "app": "bg-app"
    }[department];
}
async function getHolidays(url) {
    return await fetch(url, {
        method: "GET",
    })
        .then(response => response.json())
}
//List of Months that exist in the year
const months = ["Januar","Februar","März","April",
                "Mai","Juni","Juli","August","September",
                "Oktober","November","Dezember"];
const currentUser = window.currentUser.firstName + " " + window.currentUser.lastName;
// Create a new Date object
let date = new Date();
// Get the Current year
let currentYear = date.getFullYear();
//get the current month
let monthIndex = date.getMonth();
//get the string for the current month
let currentMonth = months[monthIndex];
// create initials variable for the initials of the employees
let initials;
let schoolHolidays = null;
let localHolidays = null;
// Place everything in the DOM
render(monthIndex, currentYear)
// Select everything in the DOM within the buttoncontainer
let buttonContainer = document.querySelectorAll(".buttoncontainer");
// Loop through the buttoncontainer and add the eventlistener to each button
buttonContainer.forEach((entry) =>{
    entry.querySelector('.viewButton').addEventListener('click', () => {
        let menu = entry.querySelector(".viewMenu");
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
        } else {
            menu.classList.add("hidden");
        }
    });
});
//Select the today button and add the eventlistener to it
const thisMonthButton = document.querySelectorAll(".thisMonth");
thisMonthButton.forEach((entry) =>{
    entry.addEventListener("click", () => {
        if(monthIndex !== date.getMonth() || currentYear !== date.getFullYear()) {
            console.log("Month changed");
            monthIndex = date.getMonth();
            currentYear = date.getFullYear();
            document.querySelector("#days").innerHTML = "";
            document.querySelector("#month").innerHTML = currentMonth + " " + currentYear;
            placeDays(monthIndex, currentYear);
        } else {
            console.log("Month not changed");
            /// Alert or smth else later
        }
    });
});
//Select the next button and add the eventlistener to it
const nextButtonClicked = document.getElementById("next")
if (nextButtonClicked != null) {
    nextButtonClicked.addEventListener("click", function() {
        setNextMonth();
    });
}
//Select the last button and add the eventlistener to it
const lastButtonClicked = document.getElementById("last")
if (lastButtonClicked != null) {
    lastButtonClicked.addEventListener("click", function() {
        setPreviousMonth();
    });
}
// Modal Part ---------------------------------------------------------------
let openModal = document.querySelectorAll(".addEvent");
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
function toggleModal () {
    const body = document.querySelector('body');
    const modal = document.querySelector('.modal');
    modal.classList.toggle('opacity-0');
    modal.classList.toggle('pointer-events-none');
    body.classList.toggle('modal-active');
    body.classList.toggle('overflow-hidden');
}
// End of Modal Part ---------------------------------------------------------
// Select the add button and add the eventlistener to it
const addButton = document.querySelector(".addButton");
addButton.addEventListener("click", addEvent);

function calculateHoliday(){
    let holidayCount = holidays.reduce(function(previous, current){
        if(current.status === "registered") {
            return previous;
        }
        if(current.type === "halfDay"){
            return previous + 0.5;
        }
        return previous + workingDaysBetweenDates(current.start, current.end , true);
    }, 0);
    let bookedDays = document.getElementById("bookedDays");
    bookedDays.innerHTML = holidayCount;
    let remainingDays = document.getElementById("remainingDays");
    remainingDays.innerHTML = window.currentUser.maxAmountOfHolidays - holidayCount;
}
function workingDaysBetweenDates(startDate, endDate, getWorkingDays) {
    startDate = new Date(startDate);
    endDate = new Date(endDate);
    // Validate input
    if (endDate < startDate)
        return 0;
    // Calculate days between dates
    const millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    let diff = endDate - startDate;  // Milliseconds between datetime objects
    let days = Math.ceil(diff / millisecondsPerDay);
    if(getWorkingDays){
        // Subtract two weekend days for every week in between
        let weeks = Math.floor(days / 7);
        days = days - (weeks * 2);
        // Handle special cases
        const startDay = startDate.getDay();
        const endDay = endDate.getDay();
        // Remove weekend not previously removed.
        if (startDay - endDay > 1)
            days = days - 2;
        // Remove start day if span starts on Sunday but ends before Saturday
        if (startDay == 0 && endDay != 6)
            days = days - 1;
        // Remove end day if span ends on Saturday but starts after Sunday
        if (endDay == 6 && startDay != 0)
            days = days - 1;
    }
    return days;
}
calculateHoliday();
// Function for adding Events with the Modal
function addEvent() {
    // Get the element vacationForm and create a new FormData object
    let form = document.getElementById("vacationForm");
    let formData = new FormData(form)
    // Get the values from the form
    let startDate = formData.get("startDate");
    let endDate = formData.get("endDate");
    // If the startDate or endDate is not a valid date, alert the user
    if (startDate === "" || endDate === "") {
        alert("Bitte Datum eingeben");
        return;
    }
    // If the startDate is after the endDate, alert the user
    else if (startDate > endDate) {
        alert("Startdatum muss vor dem Enddatum liegen");
        return;
    }
    // Set the Status to true
    let status = true;
    // Loop trough all "keys" in the jsonEventList
    holidays.forEach(function(entry) {
        if(!(entry.start > endDate || entry.end < startDate)){
            status = false;
                    alert("Du hast bereits einen Urlaub zwischen " + entry.start + " und " + entry.end);
                    return;
                }
        });
    if (!status) {
        return;
    }
    // Reload the page
    form.submit();
    placeDays(monthIndex, currentYear);
    // Close the modal
    toggleModal();
    calculateHoliday()
}
// Function for loading the events from the localstorage
async function loadEvents(startDate) {
    if(!schoolHolidays){
        schoolHolidays = await getHolidays("/schoolholidays");
    }
    let output = [];
    const currentDate = startDate.toJSON().slice(0, 10);
    schoolHolidays.forEach(function(entry) {
        let start = (new Date(entry.start)).toJSON().slice(0, 10);
        let end = (new Date(entry.end)).toJSON().slice(0, 10);
        let name = entry.name.toUpperCase();

        if(currentDate >= start && currentDate <= end) {
            output.push(
                `
                <div class="w-full text-center font-semibold text-slate-500 my-1 bg-white rounded-md">${name}</div>
                `
            );
        }
    });
    // Loop through all Holidays in the Database
    allHolidays.forEach(function(entry) {
        const department = entry.person.department;
        const firstName = entry.person.firstName;
        const lastName = entry.person.lastName;
        initials = entry.person.firstName.charAt(0) + entry.person.lastName.charAt(0);

        const start = entry.start;
        const end = entry.end;
        const holidayType = entry.type;
        const status = entry.status;
        const dayTime = entry.daytime;
        let bgColor = "bg-slate-50";
        let opacity = "opacity-50";
        // If the currentdate is between the start and end date do the following
        if(holidayType === "halfDay") {
            if(dayTime === "morning") {
                bgColor = "bg-split-halfdayMorning";
            } else {
                bgColor = "bg-split-halfdayAfternoon";
            }
        }
        if (status === "accepted") {
            opacity = "opacity-100";
        } else if (status === "registered") {
            opacity = "opacity-60";
        }
        //test
        if(currentDate >= start && currentDate <= end) {
            output.push(
                `
                <div data-initials="${initials + firstName + lastName}" class="before:content-[''] ${opacity} before:rounded-full before:block before:w-2 before:h-7 before:bg-${department} before:mr-2
                m-1 flex min-w-[55px] min-h-[34px] justify-center justify-self-center text-netzfactor font-bold ${bgColor} bg-auto px-1 py-0.5 rounded-md  scale-75 shadow-md
                hover-event relative hover:scale-100 border border-solid md:scale-100">
                    <div class="flex text-lg">${initials}</div>
                    <div class="hidden px-3 bg-slate-50 text-center py-2 shadow-md">
                        <ul class="list-none text-xl">
                            <li>${firstName} ${lastName}</li>
                        </ul>
                    </div>
                </div>
                `
            )
        }
    });
    return output.length > 0 ? output : null;
}
// Get all the Dates + the Weekday
async function placeDays(monthIndex, year) {
    document.querySelector("#days").innerHTML = "";
    // Start-Datum mit Jahr, Monat und dem 1. Tag
    const startDate = new Date(Date.UTC(year, monthIndex, 1));
    // End-Datum, der "Nullte Tag" des folgenden Monats, ein kleiner Trick um einen Tag in die
    // Vergangenheit zu springen und so das richtige End-Datum des Monats zu erhalten.
    const endDate = new Date(Date.UTC(year, monthIndex + 1, 0));
    // Wenn das Start-Datum nicht bei Montag anfängt, dann gehen wir die notwendigen Tage mit einem
    // negativen Wert bei der `setDate` methode zurück. Das Problem hierbei: JavaScript bietet mit
    // `getDay()` zwar eine Möglichkeit an den Wochentag als nummerischen Wert zu erhalten, nutzt
    // allerdings die folgenden Werte:
    //      0 = Sonntag
    //      1 = Montag
    //      2 = Dienstag
    //      3 = Mittwoch
    //      4 = Donnerstag
    //      5 = Freitag
    //      6 = Samstag
    // da wir allerdings bei Montag anfangen möchten, müssen wir diese Werte sortieren, und können
    // dadurch die Anzahl der vorherigen Tage ermitteln (-1, da wir beim aktuellen startDate
    // Objekt in die Vergangenheit springen möchten und daher 0-index basiert arbeiten):
    if (startDate.getDay() !== 1) {
        startDate.setDate(-([1, 2, 3, 4, 5, 6, 0].indexOf(startDate.getDay()) - 1));
    }
    // Ähnlich können wir auch das Ende unseres Kalenders berechnen, müssen allerdings die Anzahl
    // der nachfolgenden Tage (bis Sonntag) auf das aktuelle End-Datum draufrechnen. Um diese Zahl
    // zu ermitteln, rechnen wir die Position in unserem "sortierten Wochentag-array" gegen die
    // Gesamtanzahl der Wochentage. (7, allerdings 0-index basiert... also 6).
    if (endDate.getDay() !== 0) {
        endDate.setDate(
            endDate.getDate() +
            (6 - [1, 2, 3, 4, 5, 6, 0].indexOf(endDate.getDay()))
        );
    }
    // Jetzt wo startDate und endDate den Kalender des entsprechenden Monats enthält + die Wochen-
    // tage am Anfang sowie am Ende ergänzt haben, können wir mit einem kleinen Trick sämtliche
    // Daten in einer einzigen While Schleife ausgeben:
    // Die `toJSON` Methode gibt einen DateTime String zurück, die ersten 10 Zeichen enthalten das
    // Datum als "[JAHR]-[MONAT]-[TAG]", welches wir mit `≤` gut mit dem Ende vergleichen können:
    const output = [];
    const until = endDate.toJSON().slice(0, 10);        // Da sich endDate nicht ändern, können wir es als Konstante festlegen
    let current;
    if(!localHolidays){
        localHolidays = await getHolidays("https://feiertage-api.de/api/?jahr=2022&nur_land=NW");
    }
    while(startDate.toJSON().slice(0, 10) <= until) {
        // Der aktuelle Monat / das aktuelle Jahr, basierend auf die Funktions-Argumente
        current = startDate.getMonth() === monthIndex && startDate.getFullYear() === year;
        const isWeekEnd = startDate.getDay() === 6 || startDate.getDay() === 0;
        // Die folgende Funktion "übersetzt" das aktuelle Date-Object auf Österreichisch (um die Kollegen zu ärgern).
        // Intl.DateTimeFormat -> https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/DateTimeFormat
        const dayFormat = new Intl.DateTimeFormat('de-AT', {
            day: 'numeric',
        }).format(startDate);
        let events;
        // HTML Inhalt
        let isHoliday = null;
        Object.entries(localHolidays).forEach(([key, value]) => {
            if(startDate.toJSON().slice(0, 10) === value.datum){
                isHoliday = key;
            }
        });
        if (current) {
            events = await loadEvents(startDate);
        }
        if(isWeekEnd && current) {
            output.push(
            `
            <div class="weekend col-span-1 border border-slate-300 bg-slate-100 rounded-md overflow-hidden">
                <div class="p-1 bg-slate-100 text-gray-300">
                    <div class="w-8 h-8 pt-0.5 m-1 truncate text-2xl text-center font-medium rounded-full">
                        ${dayFormat}
                    </div>
                </div>
                <div class="py-1 min-h-[9rem] break-words">
                </div>
            </div>
            `);
        } else {
            output.push(
            current?
                ` ${isHoliday?
                    `<div class="col-span-1 border border-slate-300 bg-slate-100 rounded-md group">
                        <div class="p-1 bg-slate-100 rounded-t-md text-gray-500">
                            <div id="" class="w-8 h-8 pt-0.5 m-1 truncate text-2xl text-center font-medium rounded-full">
                                ${dayFormat}
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-evenly py-1 break-words mx-1">
                            ${events? events.join(""): ""}
                            <div class="w-full text-center font-semibold text-slate-600 my-1 bg-green-200 rounded-md">${isHoliday}</div>
                        </div>
                    </div>
                    `
                    :
                    `<div class="col-span-1 border border-slate-300 bg-slate-100 rounded-md group hover:bg-blue-100 hover:shadow-lg active:bg-slate-100">
                        <div class="p-1 bg-slate-100 rounded-t-md text-gray-500 group-hover:bg-blue-100 group-active:bg-slate-100">
                            <div id="" class="w-8 h-8 pt-0.5 m-1 truncate text-2xl text-center font-medium rounded-full group-hover:text-blue-600 group-active:text-gray-500">
                                ${dayFormat}
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-evenly py-1 break-words mx-1">
                            ${events? events.join(""): "&nbspKeine Einträge"}
                        </div>
                    </div>
                    `
            }
            `:
                `
                <div class="col-span-1 border border-slate-300 bg-slate-50 rounded-md overflow-hidden">
                    <div class="p-1 bg-slate-50 text-gray-200">
                        <div class="w-8 h-8 pt-0.5 m-1 truncate text-2xl text-center font-medium ">
                            ${dayFormat}
                        </div>
                    </div>
                    <div class="py-1 h-24 min-h-[9rem]"></div>
                </div>
            `)
        }
        // Der While-Loop ändert die bestehenden Vergleichswerte nicht, daher müssen wir das tun:
        startDate.setDate(startDate.getDate() + 1);
    }
    document.querySelector("#days").innerHTML += output.join("");
    const dataClass = document.querySelectorAll(`[data-initials]`);
        dataClass.forEach((current) => {
            current.addEventListener("pointerover", function () {
                document.querySelectorAll(`[data-initials="${current.dataset.initials}"]`).forEach((entry) => {
                    if(current !== entry) {
                        entry.classList.add("border-netzfactor");
                    }
            });
        });
            current.addEventListener("pointerout", function () {
                document.querySelectorAll(`[data-initials="${current.dataset.initials}"]`).forEach((entry) => {
                    if(current !== entry) {
                        entry.classList.remove("border-netzfactor");
                    }
            });
        });
    });
}
function setNextMonth() {
    if (monthIndex === 11) {
        monthIndex = 0;
        currentYear += 1;
    } else {
        monthIndex += 1;
    }
    document.querySelector("#month").innerHTML = months[monthIndex] + " " + currentYear;
    document.querySelector("#days").innerHTML = "";
    placeDays(monthIndex, currentYear);
}
function setPreviousMonth() {
    if (monthIndex === 0) {
        monthIndex = 11;
        currentYear -= 1;
    } else {
        monthIndex -= 1;
    }
    document.querySelector("#month").innerHTML = months[monthIndex] + " " + currentYear;
    document.querySelector("#days").innerHTML = "";
    placeDays(monthIndex, currentYear);
}
function render(month, year) {
    // Place the current month + year in the DOM in the topleft
    document.getElementById("month").innerHTML = currentMonth + " " + currentYear;
    document.querySelector("#user").innerHTML = currentUser;

    placeDays(month, year)
}

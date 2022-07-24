// Language: javascript
"use strict";

const profileButton = document.querySelector("#profileButton");
profileButton.addEventListener('click', () => {
    let profile = document.querySelector(".profileMenu");
    profile.classList.toggle('hidden');
});



const departments = ["Media", "App", "Web", "Network"]
const workers = [4, 5, 5, 7]
const colors = ["#ce4c34", "#e8bb40", "#00b0e6", "#08865f"]

new Chart("myChart", {
    type: 'doughnut',
    data: {
        labels: departments,
        datasets: [{
            backgroundColor: colors,
            data: workers
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Mitarbeiter pro Abteilung',
            fontSize: 30
        }
    }
})

// Language: javascript
"use strict";


window.setInterval("reloadIFrame();", 30000);

function reloadIFrame() {
    const iframe = document.querySelector("#toiletIframe");
    iframe.src += ""
}


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

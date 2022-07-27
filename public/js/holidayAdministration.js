// Language: javascript
"use strict";

allHolidays.forEach(function(entry) {
    const department = entry.person.department;
    const firstName = entry.person.firstName;
    const lastName = entry.person.lastName;
    const start = entry.start;
    const end = entry.end;
    const holidayType = entry.type;
    const timeOfDay = entry.daytime;
    const status = entry.status;

    const textColor = "text-" + department;

    let typeText;
    let timeOfDayText;
    if(timeOfDay === "morning"){
        timeOfDayText = "Vormittag";
    } else if(timeOfDay === "afternoon"){
        timeOfDayText = "Nachmittag";
    }
    
    if(holidayType === "fullDay"){
        typeText = "Ganztägig";
    } else if(holidayType === "halfDay"){
        typeText = "Halbtägig" + " - " + timeOfDayText;
    }

    let output = []

    if(checkStatus(status) === true){
        output.push(
            `
            <div class="flex items-center p-4">
                <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-20 w-20 flex-none rounded-full">
                <div class="ml-4 flex-auto">
                    <div class="text-xl font-medium text-slate-600">${firstName} ${lastName}</div>
                    <div class="text-sm font-medium ${textColor} mb-0.5 -mt-1">[NF]-${department.toUpperCase()}</div>
                    <div class="text-sm font-semibold text-slate-600">${typeText}</div>
                    <div class="text-sm text-slate-400">Von <span class="text-slate-600 text-sm font-bold">${start}</span> bis <span class="text-slate-600 text-sm font-bold">${end}</span></div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <button onclick="acceptRequest(${entry.person.id}, ${entry.id})" class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Akzeptieren</button>
                    <button onclick="declineRequest(${entry.person.id}, ${entry.id})" class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Ablehnen</button>
                </div>
            </div>
            `);
    }
    document.getElementById("pendingRequests").innerHTML += output.join("");
});


function checkStatus(status){
    if(status === "registered"){
        return true
    } else {
        return false
    }
}

function acceptRequest(personID, holidayID){
    const acceptForm = new FormData();
    acceptForm.append("personID", personID);
    acceptForm.append("holidayID", holidayID);
    fetch("/acceptRequest", { 
        method: "POST",
        body: acceptForm
    }).then(function(response){
        console.log(response);
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
        

function declineRequest(personID, holidayID){
    const declineForm = new FormData();
    declineForm.append("personID", personID);
    declineForm.append("holidayID", holidayID);
    fetch("/declineRequest", { 
        method: "POST",
        body: declineForm
    }).then(function(response){
        if(response.ok){
            console.log(response);
        }
    }).catch(function(error){
        console.log(error);
    });

}
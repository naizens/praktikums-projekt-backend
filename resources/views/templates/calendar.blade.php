@extends('layers.base')
@section('scripts')
    <script>
        window.holidays = {{ Illuminate\Support\Js::from($holidays) }};
        window.allHolidays = {{ Illuminate\Support\Js::from($allHolidays) }};
        window.allPersons = {{ Illuminate\Support\Js::from($allPersons) }};
    </script>
@endsection
@section('content')
<header class="z-20 h-20 flex bg-white items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <div class="items-center">
        <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-300">
            <time id="month"></time>
        </h1>
        <h2 id="user" class="text-lg font-semibold text-gray-900"></h2>
    </div>

    <div class="flex items-center">
        <div class="flex items-center shadow-md rounded-md md:items-stretch ">
            <button id="last" type="button" class="flex items-center justify-center rounded-l-md border border-r-0 border-gray-300 py-2 pl-3 pr-4 bg-white text-gray-400  hover:text-gray-500 hover:bg-slate-50 focus:relative md:w-9 md:px-2 md:hover:bg-slate-50">
                <span class="sr-only">Vorheriger Monat</span>
                <!-- Heroicon name: solid/chevron-left -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            <button type="button" class="thisMonth hidden border-t border-b border-gray-300 px-3.5 bg-white text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-slate-50  focus:relative md:block">Heute</button>
            <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
            <button id="next" type="button" class="flex items-center justify-center rounded-r-md border border-l-0 border-gray-300 py-2 pl-4 pr-3 bg-white text-gray-400 hover:text-gray-500 hover:bg-slate-50  focus:relative md:w-9 md:px-2 md:hover:bg-slate-50 ">
                <span class="sr-only">Nächster Monat</span>
                <!-- Heroicon name: solid/chevron-right -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="mx-6 h-6 w-px bg-gray-300"></div>
        <div class="hidden md:flex md:items-center">
            <button type="button" class="addEvent focus:outline-none rounded-md border border-transparent bg-netzfactor py-2 px-4 text-sm font-medium text-white shadow-md hover:bg-netzfactor-light focus:ring-2 focus:ring-netzfactor focus:ring-offset-2">Urlaub Beantragen</button>
        </div>

        <div class="relative md:hidden buttoncontainer">
            <button type="button" class="viewButton shadow-md -mx-2 flex items-center rounded-md border bg-white border-gray-300 p-2 text-gray-400 hover:bg-slate-50 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Menü öffnen</span>
                <!-- Heroicon name: solid/dots-horizontal -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
            </button>

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
            <div class="viewMenu hidden focus:outline-none absolute right-0 mt-3 w-36 origin-top-right divide-y divide-gray-100
            overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="addEvent text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Urlaub Beantragen</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="thisMonth text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Gehe zu Heute</a>
                </div>
                <div class="py-1" role="none">
                    <a href="/src/login.html-" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-2">Ausloggen</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="w-full">
<!-- Modal -->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-20">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container w-11/12 md:max-w-md sm:max-h-[80vh] mx-auto shadow-lg z-50 overflow-y-auto scrollbar">
            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>
            <div class="modal-content bg-white py-4 text-left px-6 border-2 border-slate-300 shadow-sm rounded-md" >
                <!--Title-->
                <div class="flex justify-between items-center pb-4 border-b border-slate-300" >
                    <div class="flex justify-between items-center">
                        <img src="/img/event.png" class="w-10 h-10 mr-2" alt="event">
                        <p class="text-xl text-center font-semibold">Urlaub Beantragen</p>
                    </div>

                    <div class="modal-close cursor-pointer z-50 p-1 border border-slate-300 rounded-md hover:bg-gray-100 shadow-sm">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

      <!--Body-->
                <form action="/calendar/submit" method="post" id="vacationForm" class="py-3">
                    <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                        <span>Anfang:</span>
                        <input type="date" name="startDate" class="startDate border border-slate-200 rounded-md p-1">
                    </label>
                    <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                        <span>Ende:</span>
                        <input type="date" name="endDate" class="endDate shadow-sm border border-slate-200 rounded-md p-1">
                    </label>
                    <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm justify-around grid grid-cols-2 text-lg font-medium">
                        <span class="flex items-center justify-center">
                            <input value="fullDay" name="holidaytype" id="fullDayRadio" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-slate-300" checked>
                            <label for="fullDayRadio" class="ml-2 text-lg font-semibold">Ganztags</label>
                        </span>
                        <span class="flex items-center justify-center">
                            <input value="halfDay" name="holidaytype" id="halfDayRadio" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-slate-300">
                            <label for="halfDayRadio" class="ml-2 text-lg font-semibold">Halbtags</label>
                        </span>
                        <span class="halfDayRadios hidden items-center justify-center">
                            <input value="morning" name="daytime" id="morningRadio" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-slate-300">
                            <label for="morningRadio" class="ml-2 text-md font-semibold">Vormittags</label>
                        </span>
                        <span class="halfDayRadios hidden items-center justify-center">
                            <input value="afternoon" name="daytime" id="afternoonRadio" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-slate-300">
                            <label for="afternoonRadio" class="ml-2 text-md font-semibold">Nachmittags</label>
                        </span>
                    </label>
                    <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium ">
                        <span>Kommentar:</span>
                        <textarea name="comment" class="shadow-sm border border-slate-200 rounded-md p-1 h-24 resize-none scrollbar" placeholder="Kommentar zum Urlaub"></textarea>
                    </label>
                </form>
      <!--Footer-->
                <div class="flex justify-end border-t border-slate-300 pt-4">
                    <button class="addButton border border-slate-300 rounded-lg bg-netzfactor py-2 px-4 shadow-md text-white hover:bg-netzfactor-light mr-2">Hinzufügen</button>
                    <button class="modal-close border border-slate-300 rounded-lg bg-transparent py-2 px-4 shadow-md  text-netzfactor hover:bg-gray-100 hover:text-netzfactor-light">Schließen</button>
                </div>
            </div>
        </div>
    </div>

<!-- Kalender -->
    <div id="calendar" class="lg:flex lg:flex-auto lg:flex-col" >
        <div id="table-header" class="grid grid-cols-7 text-center text-2xl font-semibold text-black leading-6 lg:flex-none overflow-hidden gap-2 mt-2 mx-1">
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">M<span class="sr-only sm:sr-only md:not-sr-only break-all">ontag</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">D<span class="sr-only sm:sr-only md:not-sr-only break-all">ienstag</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">M<span class="sr-only sm:sr-only md:not-sr-only break-all">ittwoch</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">D<span class="sr-only sm:sr-only md:not-sr-only break-all">onnerstag</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">F<span class="sr-only sm:sr-only md:not-sr-only break-all">reitag</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">S<span class="sr-only sm:sr-only md:not-sr-only break-all">amstag</span></div>
            <div class="bg-slate-50 border border-slate-300 py-3 rounded-md">S<span class="sr-only sm:sr-only md:not-sr-only break-all">onntag</span></div>
        </div>
        <div id="days" class="grid grid-cols-7 initial-scale gap-2 my-2 mx-1">
        </div>

        <div class="flex mx-1 mb-2 p-1 bg-slate-100 rounded-md border border-slate-300 font-semibold">
            <div class="flex m-1 border-r border-slate-300 bg-green-200">
                <div class="mx-1">
                    Gebuchte Urlaubstage:
                </div>
                <div id="bookedDays" class="mx-1">
                </div>
            </div>
            <div class="flex m-1 border-r border-slate-300 bg-green-200">
                <div class="mx-1">
                    Verbleibende Urlaubstage:
                </div>
                <div id="remainingDays" class="mx-1">
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" async src="/js/calendar.js"></script>
@endsection

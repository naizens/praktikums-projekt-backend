@extends('layers.base')
@section('scripts')
    <script>
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
        <div class="text-3xl font-semibold text-slate-600">
            Mitarbeiter
        </div>
        <div class="flex items-center">
            <div class="flex items-center shadow-md rounded-md md:items-stretch ">

            </div>
            <div class="mx-6 h-6 w-px bg-gray-300"></div>
            <div class="hidden md:flex md:items-center">
                <button type="button" class="addUser focus:outline-none rounded-md border border-transparent bg-netzfactor py-2 px-4 text-sm font-medium text-white shadow-md hover:bg-netzfactor-light focus:ring-2 focus:ring-netzfactor focus:ring-offset-2">Nutzer Anlegen</button>
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
                        <a href="#" class="addEvent text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Nutzer Anlegen</a>
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
                            <p class="text-xl text-center font-semibold">Nutzer Anlegen</p>
                        </div>

                        <div class="modal-close cursor-pointer z-50 p-1 border border-slate-300 rounded-md hover:bg-gray-100 shadow-sm">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>

            <!--Body-->
                    <form action="/manageEmployees/submit" method="post" id="userForm" class="py-3">
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Name:</span>
                            <input required type="text" name="firstName" class="firstName border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Nachname:</span>
                            <input required type="text" name="lastName" class="lastName shadow-sm border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Benutzername:</span>
                            <input required type="text" name="userName" class="firstName border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Passwort:</span>
                            <input required type="password" name="password" class="firstName border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Geburtstag:</span>
                            <input required type="date" name="birthDate" class="shadow-sm border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>E-Mail:</span>
                            <input required type="eMail" name="eMail" class="lastName shadow-sm border border-slate-200 rounded-md p-1">
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Abteilung:</span>
                            <select name="department" required class="shadow-sm border border-slate-200 rounded-md p-1">
                                <option value="1">Web</option>
                                <option value="2">App</option>
                                <option value="3">Network</option>
                                <option value="4">Media</option>
                            </select>
                        </label>
                        <label class="my-3 p-2 border border-slate-300 rounded-md shadow-sm flex flex-col justify-center text-lg font-medium">
                            <span>Urlaubstage:</span>
                            <input required type="number" name="maxAmountOfHolidays" class="shadow-sm border border-slate-200 rounded-md p-1">
                        </label>
                    </form>
            <!--Footer-->
                    <div class="flex justify-end border-t border-slate-300 pt-4">
                        <button id="addButton" class="border border-slate-300 rounded-lg bg-netzfactor py-2 px-4 shadow-md text-white hover:bg-netzfactor-light mr-2">Hinzufügen</button>
                        <button class="modal-close border border-slate-300 rounded-lg bg-transparent py-2 px-4 shadow-md  text-netzfactor hover:bg-gray-100 hover:text-netzfactor-light">Schließen</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-6 flex flex-col">
            <div class="md:mx-12 relative z-10 my-4">
                <div class="divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div id="webHeader" class="flex items-center p-2 w-full">
                        <div class="text-center text-xl font-medium text-slate-600 w-full">
                            [NF]-WEB
                        </div>
                    </div>
                    <div id="webContent" class="divide-y divide-slate-400/20">
                    </div>
                </div>
            </div>

            <div class="md:mx-12 relative z-10 my-4">
                <div class="divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div id="mediaHeader" class="flex items-center p-2 w-full">
                        <div class="text-center text-xl font-medium text-slate-600 w-full">
                            [NF]-MEDIA
                        </div>
                    </div>
                    <div id="mediaContent" class="divide-y divide-slate-400/20">
                    </div>
                </div>
            </div>

            <div class="md:mx-12 relative z-10 my-4">
                <div class="divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div id="appHeader" class="flex items-center p-2 w-full">
                        <div class="text-center text-xl font-medium text-slate-600 w-full">
                            [NF]-APP
                        </div>
                    </div>
                    <div id="appContent" class="divide-y divide-slate-400/20">
                    </div>
                </div>
            </div>

            <div class="md:mx-12 relative z-10 my-4">
                <div class="divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div id="netHeader" class="flex items-center p-2 w-full">
                        <div class="text-center text-xl font-medium text-slate-600 w-full">
                            [NF]-NET
                        </div>
                    </div>
                    <div id="netContent" class="divide-y divide-slate-400/20">
                    </div>
                </div>
            </div>


        </div>
    </main>
    <script type="text/javascript" async src="/js/manageEmployees.js"></script>
@endsection

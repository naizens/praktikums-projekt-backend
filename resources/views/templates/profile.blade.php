@extends('layers.base')
@section('content')
<header class="z-20 h-20 flex bg-white items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <div class="items-center">
        <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-300">
            <time id="month"></time>
        </h1>
        <h2 id="user" class="text-lg font-semibold text-gray-900"></h2>
    </div>
    <div class="flex items-center">
        <div class="flex items-center shadow-md rounded-md md:items-stretch">
            <button id="last" type="button" class="flex items-center justify-center rounded-l-md border border-r-0 border-gray-300 py-2 pl-3 pr-4 bg-white text-gray-400  hover:text-gray-500 hover:bg-slate-50 focus:relative md:w-9 md:px-2 md:hover:bg-slate-50">
                <span class="sr-only">Vorheriger Monat</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            <button type="button" class="thisMonth hidden border-t border-b border-gray-300 px-3.5 bg-white text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-slate-50  focus:relative md:block">Heute</button>
            <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
            <button id="next" type="button" class="flex items-center justify-center rounded-r-md border border-l-0 border-gray-300 py-2 pl-4 pr-3 bg-white text-gray-400 hover:text-gray-500 hover:bg-slate-50  focus:relative md:w-9 md:px-2 md:hover:bg-slate-50 ">
                <span class="sr-only">Nächster Monat</span>
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
            </div>
        </div>
    </div>
</header>
<main class="w-full">
    <div class="m-5 flex">
        <div class="">
            <img id="profilePicture" class="h-20 w-20 rounded-full ring-2 ring-offset-2 ring-web" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </div>
    </div>

</main>
@endsection
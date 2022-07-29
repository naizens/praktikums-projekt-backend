@extends('layers.base')
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
            <button type="button" class="addEvent focus:outline-none rounded-md border border-transparent bg-netzfactor py-2 px-4 text-sm font-medium text-white shadow-md hover:bg-netzfactor-light focus:ring-2 focus:ring-netzfactor focus:ring-offset-2">Nutzer Anlegen</button>
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
                <div class="py-1" role="none">
                    <a href="#" class="thisMonth text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Gehe zu Heute</a>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="w-full">
    <div>
        <div class="w-full border-b border-slate-200 py-4 grid grid-cols-2">
            <div id="tableMedia" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="tableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-50 text-xl bg-media">Media</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            <div id="tableWeb" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="tableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-700 text-xl bg-web">Web</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            <div id="tableMedia" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="tableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-700 text-xl bg-app">App</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            <div id="tableNetwork" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="tableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-50 text-xl bg-network">Network</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
                <div id="tablecontent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

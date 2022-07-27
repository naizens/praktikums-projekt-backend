@extends('layers.base')
@section('scripts')
    <script>
        window.allHolidays = {{ Illuminate\Support\Js::from($allHolidays) }};
    </script>
@endsection
@section('content')
<header class="z-20 h-20 flex bg-white items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <div class="items-center">
        <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-300">Urlaubsverwaltung</h1>
    </div>

    <div class="flex items-center">
        <div class="hidden md:flex md:items-center">
            <button id="acceptAll" type="button" class="addEvent focus:outline-none rounded-md border border-transparent bg-netzfactor py-2 px-4 text-sm font-medium text-white shadow-md hover:bg-netzfactor-light focus:ring-2 focus:ring-netzfactor focus:ring-offset-2">Alle Akzeptieren</button>
        </div>
        <div class="mx-6 h-6 w-px bg-gray-300"></div>
        <div class="hidden md:flex md:items-center">
            <button id="declineAll" type="button" class="addEvent focus:outline-none rounded-md border border-transparent bg-netzfactor py-2 px-4 text-sm font-medium text-white shadow-md hover:bg-netzfactor-light focus:ring-2 focus:ring-netzfactor focus:ring-offset-2">Alle Ablehnen</button>
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
                    <a href="#" class="addEvent text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Alle Akzeptieren</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="thisMonth text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Alle Ablehnen</a>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="w-full scale-100">
    <div class="my-6 flex flex-col">
        <div class="md:mx-12 relative z-10 my-4">
            <div class="divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-xl shadow-black/5 ring-1 ring-slate-700/10">
                <div class="flex items-center p-4 w-full">
                    <div class="text-center text-xl font-medium text-slate-600 w-full">
                        Eingehende Urlaubsanträge
                    </div>

                </div>
                <div class="flex items-center p-4">
                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-20 w-20 flex-none rounded-full">
                    <div class="ml-4 flex-auto">
                        <div class="text-xl font-medium text-slate-600">Niclas Heide</div>
                        <div class="text-sm font-medium text-media mb-0.5 -mt-1">[NF]-MEDIA</div>
                        <div class="text-sm font-semibold text-slate-600">Ganztags</div>
                        <div class="text-sm text-slate-400">Von <span class="text-slate-600 text-sm font-bold">18-07-2022</span> bis <span class="text-slate-600 text-sm font-bold">19-07-2022</span></div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Akzeptieren</button>
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Ablehnen</button>
                    </div>

                </div>
                <div class="flex items-center p-4">
                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-20 w-20 flex-none rounded-full">
                    <div class="ml-4 flex-auto">
                        <div class="text-xl font-medium text-slate-600">Niclas Heide</div>
                        <div class="text-sm font-medium text-web mb-0.5 -mt-1">[NF]-WEB</div>
                        <div class="text-sm font-medium text-slate-600">Halbtags - Vormittags</div>
                        <div class="text-sm text-slate-400">Von <span class="text-slate-600 text-sm font-bold">2022-07-18 </span> bis <span class="text-slate-600 text-sm font-bold">2022-07-18</span></div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Akzeptieren</button>
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Ablehnen</button>
                    </div>
                </div>
                <div class="flex items-center p-4">
                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-20 w-20 flex-none rounded-full">
                    <div class="ml-4 flex-auto">
                        <div class="text-xl font-medium text-slate-600">Niclas Heide</div>
                        <div class="text-sm font-medium text-network mb-0.5 -mt-1">[NF]-NET</div>
                        <div class="text-sm font-medium text-slate-600">Ganztags</div>
                        <div class="text-sm text-slate-400">Von <span class="text-slate-600 text-sm font-bold">2022-07-18 </span> bis <span class="text-slate-600 text-sm font-bold">2022-07-19</span></div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Akzeptieren</button>
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Ablehnen</button>
                    </div>
                </div>
                <div class="flex items-center p-4">
                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-20 w-20 flex-none rounded-full">
                    <div class="ml-4 flex-auto">
                        <div class="text-xl font-medium text-slate-600">Niclas Heide</div>
                        <div class="text-sm font-medium text-app mb-0.5 -mt-1">[NF]-APP</div>
                        <div class="text-sm font-medium text-slate-600">Ganztags</div>
                        <div class="text-sm text-slate-400">Von <span class="text-slate-600 text-sm font-bold">2022-07-18 </span> bis <span class="text-slate-600 text-sm font-bold">2022-07-19</span></div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Akzeptieren</button>
                        <button class="pointer-events-auto my-1 mx-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Ablehnen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

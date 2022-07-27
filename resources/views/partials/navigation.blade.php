<nav class="w-auto md:w-1/6 h-screen bg-white border-r border-slate-200">
    <div class="flex flex-col justify-between h-full">
        <div>
            <div class="py-7 h-20 md:p-4 border-b border-slate-200">
                <a href="/main">
                    <img class="mx-auto h-auto w-auto hidden md:flex" src="/img/nfLogo.svg" alt="[netfactor]">
                    <img class="mx-auto h-auto w-auto md:hidden" src="/img/nfsmalllogo.svg" alt="[NF]">
                </a>
            </div>
            <div class="flex flex-col my-6">
                <!--
                    if active:
                        bg-slate-100 mr-0 rounded-r-none
                -->
                <a href="/dashboard" class="my-1 mx-2 flex items-center rounded-md group hover:bg-slate-100 ">
                    <div class="p-1 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="ml-1 text-md font-semibold p-1 text-slate-600 hidden md:flex">
                        Dashboard
                    </span>
                </a>
                <a href="/profile" class="my-1 mx-2 flex items-center rounded-md group hover:bg-slate-100">
                    <div class="p-1 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="ml-1 text-md font-semibold p-1 text-slate-600 hidden md:flex">
                        Profil Verwalten
                    </span>
                </a>
                <a href="/employees" class="my-1 mx-2 flex items-center rounded-md group hover:bg-slate-100">
                    <div class="p-1 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="ml-1 text-md font-semibold p-1 text-slate-600 hidden md:flex">
                        Mitarbeiter
                    </span>
                </a>
                <a href="/vacations" class="my-1 mx-2 flex items-center rounded-md group hover:bg-slate-100">
                    <div class="p-1 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <span class="ml-1 text-md font-semibold p-1 text-slate-600 hidden md:flex">
                        Urlaube Verwalten
                    </span>
                </a>
                <a href="/calendar" class="my-1 mx-2 flex items-center rounded-md group hover:bg-slate-100">
                    <div class="p-1 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="ml-1 text-md font-semibold p-1 text-slate-600 hidden md:flex">
                        Kalender
                    </span>
                </a>
            </div>
        </div>

        <div class="flex h-20 border-b border-slate-200 bg-white shadow-sm items-center w-full  p-2 lg:flex-none md:p-4">
            <div class="flex overflow-hidden p-1 rounded-full hidden md:flex">
                <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="items-center md:ml-2">
                <h1 id="user" class="text-lg font-semibold text-slate-700 border-b border-gray-300 hidden md:flex">{{$user->firstName}} {{$user->lastName}}</h1>
                <h2 id="profileButton" class="text-xs font-normal text-slate-400 hover:cursor-pointer hidden md:flex">Profil Ansehen</h2>
                <div id="profileMenu" class="z-40 hidden -mt-80 ml-1/4 border border-slate-300 focus:outline-none absolute left-0 origin-top-right divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-md ring-1 ring-black ring-opacity-5">
                    <div class="p-1 my-1 grid justify-center w-72">
                        <div class="p-1 self-center justify-self-center">
                            <img id="profilePicture" class="h-36 w-36 rounded-full ring-2 ring-offset-2 ring-web" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="p-1 my-1 justify-self-center text-center">
                            <h1 id="name" class="text-xl font-bold">{{$user->firstName}} {{$user->lastName}}</h1>
                            <h2 id="email" class="-mt-1 text-md">{{$user->eMail}}</h2>
                        </div>
                        <div class="my-1 border-b border-slate-200 w-60"></div>
                        <div class="text-center my-1 mx-14 p-0.5 bg-web rounded-md text-slate-900 font-medium">[NF]-Web</div>
                        <div class="my-1 border-b border-slate-200 w-60"></div>
                    </div>
                    <button class="w-full hover:bg-slate-50 text-left" role="none">
                        <a href="/logout" class=" text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-2">Ausloggen</a>
                    </button>
                    <!-- End of dropdown-->
                </div>
            </div>
            <div class="md:hidden">
                <button id="profileButton" type="button" class="flex overflow-hidden p-1 rounded-full">
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
            </div>
        </div>
    </div>
</nav>

@extends('layers.base')
@section('scripts')
    <script>
        window.allPersons = {{ Illuminate\Support\Js::from($allPersons) }};
        window.allHolidays = {{ Illuminate\Support\Js::from($allHolidays) }};
    </script>
@endsection
@section('content')
<header class="z-20 h-20 flex bg-white items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <div class="items-center">
        <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-300">
            Mitarbeiter
        </h1>

</header>
<main class="w-full">
    <div>
        <div class="w-full border-b border-slate-200 py-4 grid grid-cols-2">
            <div id="tableWeb" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="webTableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-700 text-xl bg-web">Web</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="webContent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            <div id="tableMedia" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="mediaTableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-50 text-xl bg-media">Media</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="mediaContent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            
            <div id="tableApp" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="appTableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-700 text-xl bg-app">App</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="appContent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
            <div id="tableNetwork" class="bg-white mx-4 my-2 border shadow-md rounded-md overflow-hidden">
                <div id="networkTableHeader" class="bg-slate-50 grid grid-cols-2 border-b text-center font-bold text-slate-600">
                    <div class="col-span-2 border-b text-slate-50 text-xl bg-network">Network</div>
                    <div class="py-1 px-2 border-r">Name</div>
                    <div class="py-1 px-2 border-r">Status</div>
                </div>
                <div id="networkContent" class="grid grid-cols-2 border-b text-center font-medium text-slate-500">
                    <div class="py-1 px-2 border-r ">Niclas</div>
                    <div class="py-1 px-2 border-r">Verfübar</div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" async src="/js/employees.js"></script>
@endsection

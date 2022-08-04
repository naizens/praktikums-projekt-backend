@extends('layers.base')
@section('content')
<header class="z-20 h-20 flex bg-white items-center justify-between border-b border-gray-200 py-4 px-6 lg:flex-none">
    <div class="items-center">
        <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-300">
            Dashboard
        </h1>
    </div>

</header>
<main class="w-full flex flex-col divide-y-2">
    <div class="w-full border-slate-200 flex py-4">
        <canvas id="myChart" class="w-full h-full max-w-[700px] mx-auto"></canvas>
    </div>
    <div class="flex py-4">
        <div id="toilets" class="flex justify-center mx-4">
            <div class="mx-1 bg-slate-100 py-2 px-4 flex items-center justify-between w-48 rounded-md border border-slate-300">
                <div class="text-center text-lg font-semibold">Toilette Links</div>
                <div class=" items-center">
                    <span class="bg-red-100 text-red-800 text-sm font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-red-200 dark:text-red-800 border border-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="mx-1 bg-slate-100 py-2 px-4 flex items-center justify-between w-48 rounded-md border border-slate-300">
                <div class="text-center text-lg font-semibold">Toilette Rechts</div>
                <div class="items-center ">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-green-200 dark:text-green-800 border border-slate-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-4 py-4">
        <iframe id="toiletIframe" class="w-1/6 h-24 rounded-md overflow-hidden" src="http://proklo-widget.nf.docker/" title="Toilettenstatus"></iframe>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" async src="/js/dashboard.js"></script>
</main>
@endsection

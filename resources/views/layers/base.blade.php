<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/css/output.css" rel="stylesheet">
    <link rel="icon" href="/img/kalender.png">
    <script type="text/javascript">
        window.currentUser = {{ Illuminate\Support\Js::from($user) }};

    </script>
    @section('scripts')
    @show
    <style>
        /* For Firefox Browser */
        html {
            scrollbar-width: auto;
            scrollbar-color: #004B7C #f7f4ed;
        }
        /* For Chrome, EDGE, Opera, Others */
        .scrollbar::-webkit-scrollbar {
            width: 13px;
            height: 13px;
        }
        .scrollbar::-webkit-scrollbar-track {
            border-radius: 100vh;
            background: #f7f4ed;
        }
        .scrollbar::-webkit-scrollbar-thumb {
            background: #004B7C;
            border-radius: 100vh;
            border: 3px solid #f6f7ed;
        }
        .scrollbar::-webkit-scrollbar-thumb:hover {
            background: #0068AD;
        }
    </style>
</head>
<body class="scrollbar bg-slate-50">
<div class="min-w-1/6 flex">
    @include('partials.navigation')
    <div class="flex-1 h-screen overflow-y-scroll scrollbar">
        @section('content')
        @show()
    </div>
</div>
<script async src="/js/base.js"></script>
</body>
</html>

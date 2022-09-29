<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | Dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <div class="flex sticky bg-white top-0 justify-between px-[5rem] py-[1rem] shadow-xl">
            <p class="text-xl font-bold">Admin</p>
            <a href="{{route('logout')}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            </a>
        </div>
        <div class="flex">
            <div class="flex flex-col bg-slate-900 w-[15rem] h-screen top-[3.8rem] fixed py-[2rem]">
                <a href="{{route('admin')}}" class="nav flex items-center text-white px-[3rem] hover:bg-black h-[4rem]">
                    Dashboard
                </a>
                <a href="{{route('adminUsers')}}" class="nav flex items-center text-white px-[3rem] hover:bg-black h-[4rem]">
                    Users
                </a>
                <a href="{{route('admin.createAdminView')}}" class="nav flex items-center text-white px-[3rem] hover:bg-black h-[4rem]">
                    Create Admin
                </a>
                <a href="{{route('admin.createSubAdminView')}}" class="nav flex items-center text-white px-[3rem] hover:bg-black h-[4rem]">
                    Create Subadmin
                </a>
                <a href="{{route('adminUpdate')}}" class="nav flex items-center text-white px-[3rem] hover:bg-black h-[4rem]">
                    Update Details
                </a>
            </div>
            <div class="flex flex-1">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>

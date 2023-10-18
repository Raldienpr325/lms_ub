<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css')
</head>

<body>
    <section class="dashboard flex flex-row-reverse h-screen">
        <aside class="w-full h-screen overflow-y-auto bg-gray-50">
            <header class="sticky top-0 z-10 flex items-center justify-between w-full px-5 xs:px-9
                border-b border-gray-200 backdrop-blur-3xl bg-white/80">
                <div class="flex items-center gap-3">
                    <button type="button" class="top-5 left-4 flex items-center justify-center p-2 border bg-gray-50
                        border-gray-200 rounded-md" onclick="openSidebar()">
                        <ion-icon name="filter-outline"
                            class="active:translate-y-1 text-secondary cursor-pointer text-lg">
                        </ion-icon>
                    </button>
                    <button type="button" id="buttonSearch" class='sm:w-[200px]' onclick="searchButton()">
                        <div
                            class="relative flex items-center px-1 py-2 sm:pr-1 sm:pl-0 rounded-md border border-gray-200 bg-gray-50">
                            <div class="grid place-items-center h-full w-10 text-secondary">
                                <ion-icon name="search-outline"></ion-icon>
                            </div>
                            <div class="hidden sm:block text-sm font-light text-gray-400 -ml-[2px]">Search...</div>
                        </div>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="group relative pr-1 py-2">
                        <button type="button" class="relative flex items-center justify-center p-2 border bg-gray-50
                        border-gray-200 rounded-md">
                            <ion-icon name="notifications-outline" class="text-secondary cursor-pointer text-lg">
                            </ion-icon>
                            <span class="absolute top-0 right-0 inline-flex items-center border-2 border-white w-3.5 h-3.5
                                rounded-full text-xs font-medium transform -translate-y-1/3 translate-x-1/2
                                bg-sky-500"></span>
                        </button>
                        <div class="absolute hidden group-hover:block right-0 mt-2 w-64 z-[999] xs:w-72 origin-top-right rounded-md bg-white shadow-lg border border-gray-200 focus:outline-none"
                            id="profileDropdown">
                            <div>
                                <div class="bg-gray-100 text-center py-2 font-medium">
                                    Notification
                                </div>
                                <div class="flex gap-2 items-start border-b border-gray-300 px-4 py-2">
                                    <ion-icon name="ribbon-outline" class="text-2xl text-amber-500"></ion-icon>
                                    <div>
                                        <div class="text-secondary text-sm font-normal pb-1">
                                            Selamat anda telah menyelesaikan pertemuan 4!</div>
                                        <p class="text-xs font-semibold text-sky-600">
                                            a few moments ago</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 items-start border-b border-gray-300 px-4 py-2">
                                    <ion-icon name="ribbon-outline" class="text-2xl text-amber-500"></ion-icon>
                                    <div>
                                        <div class="text-secondary text-sm font-normal pb-1">
                                            Selamat anda telah menyelesaikan pertemuan 3!</div>
                                        <p class="text-xs font-semibold text-sky-600">
                                            58 minutes ago</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 items-start border-b border-gray-300 px-4 py-2">
                                    <ion-icon name="ribbon-outline" class="text-2xl text-amber-500"></ion-icon>
                                    <div>
                                        <div class="text-secondary text-sm font-normal pb-1">
                                            Selamat anda telah menyelesaikan pertemuan 2!</div>
                                        <p class="text-xs font-semibold text-sky-600">
                                            12 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 items-start border-b border-gray-300 px-4 py-2">
                                    <ion-icon name="ribbon-outline" class="text-2xl text-amber-500"></ion-icon>
                                    <div>
                                        <div class="text-secondary text-sm font-normal pb-1">
                                            Selamat anda telah menyelesaikan pertemuan 1!</div>
                                        <p class="text-xs font-semibold text-sky-600">
                                            2 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="inline-block text-left">
                            <div class="group relative cursor-pointer flex gap-2 py-3">
                                <div class="hidden h-9 relative md:flex flex-col justify-between items-end pl-3">
                                    <div
                                        class="text-secondary md:w-40 lg:w-auto text-sm font-medium md:truncate md:break-all">
                                        {{ Auth::user()->name }}</div>
                                    <p class="text-primary-700 text-xs">Peserta</p>
                                    <div class="absolute left-0 top-[2px] h-8 w-[1px] bg-gray-200 rounded-lg">
                                    </div>
                                </div>
                                <ion-icon name="chevron-down-outline" class="md:hidden place-self-center"></ion-icon>
                                <img src="{{ asset('img/profile.webp') }}" alt="profile" class="w-8 h-8 rounded-full">
                                <div class="absolute hidden group-hover:block right-0 z-50 mt-11 w-56 origin-top-right rounded-md bg-white shadow-lg border border-gray-200 focus:outline-none"
                                    id="profileDropdown">
                                    <div class="py-1">
                                        <div class="border-b border-gray-300 px-4 py-2">
                                            <div class="text-secondary w-40 text-sm font-normal break-all">
                                                {{ Auth::user()->name }}</div>
                                            <p class="text-secondary text-sm break-all font-semibold">
                                                {{ Auth::user()->email }}</p>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center gap-2 text-gray-700 hover:bg-gray-100 w-full px-4 py-2 mt-1 text-left text-sm"
                                                role="menuitem" tabindex="-1" id="menu-item-3">
                                                <ion-icon name="log-out-outline"></ion-icon>
                                                <p>Sign out</p>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div>

                <div class="container content">
                    @yield('content')
                </div>

            </div>
        </aside>
        <aside class="fixed -ml-[99999px] z-40 border-r border-gray-200 w-full left-0 sm:w-[300px] 2md:ml-0 2md:static sidebar top-0 h-screen
            bottom-0 p-2
            text-center bg-white">
            <div class="text-secondary text-xl">
                <div class="p-2.5 mt-1 flex items-center justify-between">
                    <a class="font-bold text-secondary text-xl lg:text-2xl font-lemon tracking-wider"
                        href="#">MIRSANI</a>
                    <button type="button" class="2md:hidden" onclick="openSidebar()">
                        <ion-icon name="filter-outline" class="text-secondary cursor-pointer text-2xl">
                        </ion-icon>
                    </button>
                </div>
            </div>
            <nav class="mt-5">
                <a href="{{ route('dashboard') }}">
                    <div
                        class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-primary-100 text-primary-700">
                        <ion-icon name="easel-outline" class="text-primary-700 text-base"></ion-icon>
                        <span class="text-base ml-4 text-primary-700 font-medium">Dashboard</span>
                    </div>
                </a>
                <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-secondary hover:text-primary-700"
                    onclick="dropdown()">
                    <ion-icon name="book-outline" class="text-secondary text-base"></ion-icon>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-base ml-4 text-secondary font-medium">Courses</span>
                        <span class="text-sm rotate-0 duration-300" id="arrow">
                            <ion-icon name="chevron-down-outline" class="text-secondary text-base"></ion-icon>
                        </span>
                    </div>
                </div>
                <div class="h-96 flex flex-col mt-3 pb-3 text-left text-[15px] pl-6 pr-4 scrollbar-thin scrollbar-thumb-primary-400 scrollbar-track-primary-100 overflow-y-auto scrollbar-thumb-rounded-full scrollbar-track-rounded-full mx-auto text-gray-600 font-medium"
                    id="submenu">
                    <a href="#" class="hover:text-gray-950">
                        <div class="cursor-pointer px-2 pb-2 ml-4
                        mt-1">
                            Pre Test
                        </div>
                    </a>
                    <button id="pertemuan1" class="cursor-pointer pl-2 py-2 ml-4 hover:text-gray-950"
                        onclick="toggleDropdown(1)" data-meeting="1" title="Hallo">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 1</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp1">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp1"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup1" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="{{ route('materi-1') }}">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="{{ route('quiz-1') }}">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="{{ route('nilai-1') }}">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan2"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(2)" data-meeting="2" title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 2</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp2">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp2"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup2" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan3"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(3)" data-meeting="3" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 3</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp3">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp3"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup3" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan4"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(4)" data-meeting="4" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 4</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp4">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp4"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup4" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan5"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(5)" data-meeting="5" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 5</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp5">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp5"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup5" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan6"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(6)" data-meeting="6" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 6</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp6">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp6"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup6" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan7"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(7)" data-meeting="7" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 7</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp7">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp7"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup7" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                                </div>
                    </div>
                    <button id="pertemuan8"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(8)" data-meeting="8" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 8</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp8">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp8"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup8" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan9"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(9)" data-meeting="9" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 9</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp9">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp9"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup9" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan10"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(10)" data-meeting="10" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 10</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp10">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp10"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup10" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan11"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(11)" data-meeting="11" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 11</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp11">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp11"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup11" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan12"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(12)" data-meeting="12" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 12</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp12">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp12"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup12" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan13"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(13)" data-meeting="13" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 13</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp13">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp13"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup13" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                                </a>
                        </div>
                    </div>
                    <button id="pertemuan14"
                        class="cursor-pointer pl-2 py-2 ml-4 enabled:hover:text-gray-950 disabled:opacity-75 disabled:cursor-not-allowed"
                        onclick="toggleDropdown(14)" data-meeting="14" disabled title="">
                        <div class="flex justify-between w-full items-center">
                            <span class="duration-300">
                                Pertemuan 14</span>
                            <span class="text-sm rotate-0 duration-300" id="arrowp14">
                                <ion-icon name="chevron-down-outline" class="text-base" id="iconp14"></ion-icon>
                            </span>
                        </div>
                    </button>
                    <div id="submenup14" class="hidden">
                        <div class="flex flex-col text-left text-[15px] w-full pl-4 text-gray-400 font-medium">
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Materi
                            </a>
                            <a class="cursor-pointer px-2 pb-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Quiz
                            </a>
                            <a class="cursor-pointer px-2 py-1 ml-4 hover:text-gray-800 hover:text-[15.5px] duration-300 rounded-md
                            mt-1" href="#">
                                Nilai
                            </a>
                        </div>
                    </div>
                    <a href="#">
                        <div class="cursor-pointer px-2 ml-4 hover:text-gray-800 duration-300
                            mt-1">
                            Post Test
                        </div>
                    </a>
                </div>
                <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer">
                    <ion-icon name="chatbubble-ellipses-outline" class="text-secondary text-base"></ion-icon>
                    <span class="text-base ml-4 text-secondary font-medium">Feedback</span>
                </div>
            </nav>
        </aside>

        <!-- Main modal -->
        <div id="searchModal" tabindex="-1" aria-hidden="true" class="fixed hidden top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden
                    overflow-y-auto md:inset-0 h-full backdrop-blur-sm" style="background: linear-gradient(rgba(0, 0,
                    0, 0.5),
                    rgba(0, 0, 0, 0.5))">
            <div class="relative w-full max-w-xl max-h-full mx-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between px-1 border-b rounded-t">
                        <div class='w-full h-full'>
                            <div class="relative flex items-center w-full pr-1">
                                <div class="grid place-items-center h-full w-12 text-secondary">
                                    <ion-icon name="search-outline" class="text-lg"></ion-icon>
                                </div>
                                <input class="h-full w-full outline-none border-none focus:outline-none
                                            focus:ring-transparent text-sm text-secondary bg-transparent pr-2 py-4"
                                    type="text" id="search" placeholder="Search.." />
                            </div>
                        </div>
                    </div>
                    <!-- Modal body -->
                    <div class="h-72 p-6 space-y-3 scrollbar scrollbar-w-3 scrollbar-thumb-zinc-400
                        scrollbar-track-gray-100 overflow-y-auto scrollbar-thumb-rounded-full">
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="book-outline" class="p-2 bg-gray-100 border rounded-md"></ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Materi 1</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 1</div>
                            </div>
                        </button>
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="book-outline" class="p-2 bg-gray-100 border rounded-md"></ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Materi 2</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 2</div>
                            </div>
                        </button>
                        <button class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50
                            hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="create-outline" class="p-2 bg-gray-100 border rounded-md">
                            </ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Quiz 2</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 2</div>
                            </div>
                        </button>
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="reader-outline" class="p-2 bg-gray-100 border rounded-md">
                            </ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Nilai 1</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 1</div>
                            </div>
                        </button>
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="reader-outline" class="p-2 bg-gray-100 border rounded-md">
                            </ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Nilai 2</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 2</div>
                            </div>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-3 border-t border-gray-200 rounded-b">
                        <button type="button" onclick="closeModal()"
                            class="text-white self-end bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="module" src="{{ asset('js/swiper.js') }}"></script>
    @stack('js')
</body>

</html>

@extends('master.index')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
@endpush
@section('content')
<div class="flex flex-col gap-6 px-5 xs:px-9 pt-6">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-xs xs:text-sm font-medium text-sky-600
                    hover:text-sky-800">
                    <ion-icon name="home" class="text-xs pr-2"></ion-icon>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <div class="group ml-1 relative text-xs xs:text-sm font-medium
                        text-sky-600 hover:text-sky-800 md:ml-2">
                        <div class="inline-flex items-center">
                            <ion-icon name="library" class="text-xs pr-2"></ion-icon>
                            <div class="cursor-pointer py-2">Pertemuan 1</div>
                        </div>
                        <div class="absolute hidden group-hover:block z-50 w-36 left-1/2 transform -translate-x-1/2 origin-top-right rounded-md bg-white shadow-lg border border-gray-200 focus:outline-none"
                            id="profileDropdown">
                            <div class="py-1">
                                <button
                                    class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                    text-xs xs:text-sm"
                                    href="{{ route('materi-1') }}" tabindex="-1">
                                    Materi
                                </button>
                                <button
                                    class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                    text-xs xs:text-sm"
                                    href="{{ route('quiz-1') }}" tabindex="-1">
                                    Quiz
                                </button>
                                <button
                                    class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                    text-xs xs:text-sm"
                                    href="{{ route('nilai-1') }}" tabindex="-1">
                                    Nilai
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-xs xs:text-sm font-medium text-gray-500 md:ml-2 ">Materi</span>
                </div>
            </li>
        </ol>
    </nav>
    <h1 class="font-bold text-xl xs:text-2xl sm:text-3xl text-secondary !leading-relaxed">{{ $data_1[0]['judul'] }}</h1>
    <div class="w-full 2md:max-w-3xl mx-auto border border-gray-200">
        <video id="player" style="border-radius: 8px;" playsinline>
            <source src="../src/images/flowbite.mp4" type="video/mp4" />
        </video>
    </div>
    <div class="flex flex-wrap">
        <button type="button" class="text-white bg-sky-600 hover:bg-sky-700 focus:ring-4
                focus:outline-none focus:ring-sky-500 font-medium rounded-lg text-xs xs:text-sm px-4 py-2
                sm:px-5 sm:py-2.5 text-center
                inline-flex items-center mr-2 gap-2">
            <ion-icon name="arrow-down-circle" class="animate-bounce"></ion-icon>
            <p>Download Materi</p>
        </button>
    </div>
    <div class="mt-1 text-base sm:text-lg font-semibold text-secondary">Deskripsi :</div class="mt-2">
    <div class="mb-3 text-secondary text-justify text-sm sm:text-base !leading-loose">{{ $data_1[0]['deskripsi'] }}</div>
</div>
<div class="w-full px-5 xs:px-9 pt-6 flex items-center justify-end mb-6">
    <a href="{{ route('quiz-1') }}" class="flex items-center gap-2 py-2 sm:py-2.5 px-7 mb-2 text-sm sm:text-base font-medium text-white focus:outline-none
        bg-slate-800 rounded-lg border border-slate-200 hover:bg-slate-900 focus:z-10 focus:ring-4
        focus:ring-slate-200">
        <p>Quiz</p>
        <ion-icon name="chevron-forward-outline"></ion-icon>
    </a>
</div>
@endsection
@push('js')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
    <script type="application/javascript" src="./js/plyr.js"></script>
    <script>
        let controls = [
            'play',
            'progress',
            'current-time',
            'mute',
            'volume',
            'settings',
            'fullscreen',
        ];

        const player = new Plyr('#player', {
            controls
        });
    </script>
@endpush

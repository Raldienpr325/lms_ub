@extends('master.index')

@section('content')
<div class="flex flex-col gap-6 px-5 xs:px-9 pt-6 h-[90%]">
    <div class="flex flex-col gap-6 h-[80%]">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-xs xs:text-sm font-medium text-sky-600
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
                                    <button class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                            text-xs xs:text-sm" href="{{ route('materi-1') }}" tabindex="-1">
                                        Materi
                                    </button>
                                    <button class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                            text-xs xs:text-sm" href="{{ route('quiz-1') }}" tabindex="-1">
                                        Quiz
                                    </button>
                                    <button class="text-secondary hover:bg-gray-100 w-full px-4 py-2 text-left
                                            text-xs xs:text-sm" href="{{ route('nilai-1') }}" tabindex="-1">
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
                        <span class="ml-1 text-xs xs:text-sm font-medium text-gray-500 md:ml-2 ">Quiz</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="w-full flex gap-4">
            <div class="w-full lg:w-1/2 flex flex-col gap-2">
                <h1 class="font-bold text-xl xs:text-2xl sm:text-3xl text-secondary !leading-relaxed">
                    Tiba-Tiba Quiz
                </h1>
                <p class="leading-7 sm:leading-8 text-sm sm:text-base">Quiz Sub-modul Pertemuan 1 ini
                    berguna untuk
                    menguji pengetahuan Anda
                    tentang materi
                    yang
                    telah dipelajari di sub-modul ini. Quiz ini hanya bisa diambil 1 kali, jadi pastikan
                    anda sudah siap sebelumnya.</p>
                    <div class="flex gap-6 items-center mt-2">
                        <div class="h-[70px] sm:h-20 w-[70px] sm:w-20 border-2 border-green-600 bg-green-50 flex flex-col items-center justify-center rounded-full">
                            <p class="text-green-600 text-xl sm:text-2xl font-semibold">
                                {{ isset($data[0]['jumlah_soal']) ? $data[0]['jumlah_soal'] : '0' }}
                            </p>
                            <p class="text-green-600 text-xs sm:text-sm">Soal</p>
                        </div>

                    <a href="{{ route('soal-quiz-1') }}"
                        class="ping border text-sm sm:text-base px-5 sm:px-7 py-2 bg-sky-500 hover:bg-sky-600 text-white cursor-pointer rounded-md">Kerjakan
                        Quiz</a>
                </div>
            </div>
            <div class="hidden lg:w-1/2 lg:flex items-center justify-end">
                <img src="{{ asset('img/quiz.webp') }}" alt="quiz-image" class="w-[90%] h-auto">
            </div>
        </div>
    </div>
    <div class="h-[10%]">
        <div class="w-full pt-6 flex items-center justify-between mb-6">
            <a href="{{ route('materi-1') }}" class="flex items-center justify-center gap-2 py-2 sm:py-2.5 px-7 mb-2 text-sm sm:text-base font-medium text-secondary focus:outline-none
                    bg-white hover:bg-slate-200 rounded-lg border border-slate-300 focus:z-10 focus:ring-4
                    focus:ring-slate-200">
                <ion-icon name="chevron-back-outline"></ion-icon>
                <p>Materi</p>
            </a>
            <a href="{{ route('nilai-1') }}" class="flex items-center justify-center gap-2 py-2 sm:py-2.5 px-7 mb-2 text-sm sm:text-base font-medium text-white focus:outline-none
                    bg-slate-800 rounded-lg border border-slate-200 hover:bg-slate-900 focus:z-10 focus:ring-4
                    focus:ring-slate-200">
                <p>Nilai</p>
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </a>
        </div>
    </div>
</div>
@endsection

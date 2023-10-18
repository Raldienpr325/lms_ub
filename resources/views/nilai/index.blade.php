@extends('master.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<div class="h-screen flex flex-col justify-between gap-5 px-5 xs:px-9 pt-6">
    <div class="flex flex-col gap-5">
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
                        <span
                            class="ml-1 text-xs xs:text-sm font-medium text-gray-500 md:ml-2 ">Nilai</span>
                        </div>
                        </li>
                        </ol>
                        </nav>
                        <div class="font-bold text-2xl sm:text-3xl text-secondary">Hasil Quiz</div>
<!-- Banner jika peserta belum mengerjakan quiz dan mengunjungi halaman nilai -->

<!-- <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-4 w-4 text-blue-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-800 text-base sm:text-lg md:text-xl font-semibold">
                        Oppsss...
                    </h3>
                    <div class="mt-2 text-sm sm:text-base text-gray-600">
                        Sepertinya anda masih belum mengejakan kuis.
                        Silahkan kerjakan quiz terlebih dahulu pada pertemuan ini untuk melihat
                        hasil nilai yang didapatkan. Anda bisa menekan tombol dibawah ini untuk
                        melihat halaman Quiz.
                    </div>
                    <div class="mt-4">
                        <div class="flex space-x-3 justify-end">
                            <a href="#"
                                class="inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-medium text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                Lihat Quiz
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="flex gap-5 mt-3 relative flex-col-reverse justify-between 2md:flex-row">
            <div id="quiz-results" class="w-full 2md:w-[68%]"></div>
            <div
                class="w-full bg-white md:sticky md:top-24 2md:w-[30%] rounded-md border border-gray-200 py-4 px-7 h-fit">
                <div class="flex justify-center relative">
                    <div class="flex gap-5 items-center justify-between mb-5">
                        <div class="flex flex-col items-center justify-center gap-1 text-secondary">
                            <p class="font-semibold text-xs sm:text-sm xl:text-base text-center">Jumlah Soal
                            </p>
                            <p class="numberOfQuestions font-semibold text-4xl sm:text-5xl xl:text-[55px]">
                            </p>
                            </div>
                            <div class="flex flex-col items-center justify-center gap-1 text-secondary">
                            <p class="font-semibold text-xs sm:text-sm xl:text-base text-center">Jawaban
                                Benar
                            </p>
                            <p class="correctAnswer font-semibold text-4xl sm:text-5xl xl:text-[55px]"></p>
                            </div>
                            </div>
                            <div class="absolute h-[1px] w-[70%] bottom-0 bg-gray-200"></div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center gap-3 text-secondary mt-5">
                                <p class="font-semibold text-sm md:text-base xl:text-xl">Nilai</p>
                                <p class="quizGrades font-bold text-5xl xl:text-7xl"></p>
                            </div>
                            </div>
                </div>
    </div>
    <div class="w-full flex items-center">
        <a href="#"
            class="flex items-center justify-center gap-2 py-2 sm:py-2.5 px-7 text-sm sm:text-base font-medium text-secondary focus:outline-none
                bg-white hover:bg-slate-200 rounded-lg border border-slate-300 focus:z-10 focus:ring-4
                focus:ring-slate-200 my-6">
            <ion-icon name="chevron-back-outline"></ion-icon>
            <p>Quiz</p>
        </a>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('js/nilai.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endpush

@extends('master.index')


@section('content')
<section class="px-5 xs:px-9 pt-6 mb-2 text-secondary">
    <h1 class="font-bold text-2xl">Overview</h1>
    <div class="swiper mt-3 w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide h-40 border border-gray-200 bg-white rounded-md shadow-sm p-5">
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-normal text-secondary">Peserta Terdaftar</h2>
                    <div class="flex justify-between">
                        <h3 class="text-5xl sm:text-6xl font-semibold text-secondary">{{ $count }}</h3>
                        <div class="flex relative mt-6 flex-row-reverse items-end self-end">
                            <ion-icon name="people-outline"
                                class="absolute h-[75px] w-[75px] md:h-[88px] md:w-[88px] text-primary-600 right-2">
                            </ion-icon>
                            <div class="w-14 h-14 bg-gray-100 rounded-full"></div>
                            <div class="w-5 h-5 bg-gray-100 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide h-40 border border-gray-200 bg-white rounded-md shadow-sm p-5">
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-normal text-secondary">Jumlah Course</h2>
                    <div class="flex justify-between">
                        <h3 class="text-5xl sm:text-6xl font-semibold text-secondary">16</h3>
                        <div class="flex relative mt-6 flex-row-reverse items-end self-end">
                            <ion-icon name="newspaper-outline"
                                class="absolute h-[75px] w-[75px] md:h-[88px] md:w-[88px] text-lime-600 right-2">
                            </ion-icon>
                            <div class="w-14 h-14 bg-gray-100 rounded-full"></div>
                            <div class="w-5 h-5 bg-gray-100 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide h-40 border border-gray-200 bg-white rounded-md shadow-sm p-5">
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-normal text-secondary">Peserta Lulus</h2>
                    <div class="flex justify-between">
                        <h3 class="text-5xl sm:text-6xl font-semibold text-secondary">50</h3>
                        <div class="flex relative mt-6 flex-row-reverse items-end self-end">
                            <ion-icon name="school-outline"
                                class="absolute h-[75px] w-[75px] md:h-[88px] md:w-[88px] text-orange-600 right-2">
                            </ion-icon>
                            <div class="w-14 h-14 bg-gray-100 rounded-full"></div>
                            <div class="w-5 h-5 bg-gray-100 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<section class="relative px-5 xs:px-9 mb-6 text-secondary w-full overflow-hidden">
    <div class="courses mt-6">
        <div class="flex items-center justify-between w-full">
            <div class="font-bold text-2xl -mt-2">My Courses</div>
            <div class="relative w-[74px]">
                <div class="swiper-button-prev absolute left-0 h-8 w-8 border bg-gray-200 border-gray-300
                    rounded text-secondary text-lg">
                    <ion-icon name="chevron-back-outline" class="active:translate-y-1"></ion-icon>
                </div>
                <div class="swiper-button-next absolute right-0 h-8 w-8 border bg-gray-200 border-gray-300
                    rounded text-secondary text-lg">
                    <ion-icon name="chevron-forward-outline" class="active:translate-y-1"></ion-icon>
                </div>
            </div>
        </div>
        <div class="swiper2 mt-3">
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide relative h-48 border border-gray-200 bg-white rounded-md shadow-sm px-5 py-3">
                    <div class="flex flex-col gap-2">
                        <div class="relative">
                            <h3 class="text-secondary text-sm">Bagian 1</h3>
                            <div
                                class="absolute left-0 -bottom-1 h-[2px] w-[40px] bg-green-700 rounded-lg">
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-secondary mt-1">Pre Test</h2>
                        <h4 class="text-secondary text-xs -mt-1">Evaluasi</h4>
                    </div>
                    <div class="absolute bottom-0 right-0 progress-ring m-4">
                        <svg class="relative w-full h-full">
                            <circle class="progress-ring__circle-background" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" />
                            <circle class="progress-ring__circle" stroke="#22c55e" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" data-percent="100"
                                :stroke-dasharray="" :stroke-dashoffset="" />
                            <text x="40" y="40" text-anchor="middle" dominant-baseline="middle"
                                class="font-bold text-lg !text-sky-700">100%</text>
                        </svg>
                    </div>
                </div>
                <div
                    class="swiper-slide relative h-48 border border-gray-200 bg-white rounded-md shadow-sm px-5 py-3">
                    <div class="flex flex-col gap-2">
                        <div class="relative">
                            <h3 class="text-secondary text-sm">Bagian 2</h3>
                            <div
                                class="absolute left-0 -bottom-1 h-[2px] w-[40px] bg-green-700 rounded-lg">
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-secondary mt-1">Pertemuan 1</h2>
                        <h4 class="text-secondary text-xs -mt-1">Pembelajaran</h4>
                    </div>
                    <div class="absolute bottom-0 right-0 progress-ring m-4">
                        <svg class="relative w-full h-full">
                            <circle class="progress-ring__circle-background" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" />
                            <circle class="progress-ring__circle" stroke="#22c55e" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" data-percent="75"
                                :stroke-dasharray="" :stroke-dashoffset="" />
                            <text x="40" y="40" text-anchor="middle" dominant-baseline="middle"
                                class="font-bold text-lg !text-sky-700">75%</text>
                        </svg>
                    </div>
                </div>
                <div
                    class="swiper-slide relative h-48 border border-gray-200 bg-white rounded-md shadow-sm px-5 py-3">
                    <div class="flex flex-col gap-2">
                        <div class="relative">
                            <h3 class="text-secondary text-sm">Bagian 3</h3>
                            <div
                                class="absolute left-0 -bottom-1 h-[2px] w-[40px] bg-green-700 rounded-lg">
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-secondary mt-1">Pertemuan 2</h2>
                        <h4 class="text-secondary text-xs -mt-1">Pembelajaran</h4>
                    </div>
                    <div class="absolute bottom-0 right-0 progress-ring m-4">
                        <svg class="relative w-full h-full">
                            <circle class="progress-ring__circle-background" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" />
                            <circle class="progress-ring__circle" stroke="#22c55e" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" data-percent="0"
                                :stroke-dasharray="" :stroke-dashoffset="" />
                            <text x="40" y="40" text-anchor="middle" dominant-baseline="middle"
                                class="font-bold text-lg !text-sky-700">0%</text>
                        </svg>
                    </div>
                </div>
                <div
                    class="swiper-slide relative h-48 border border-gray-200 bg-white rounded-md shadow-sm px-5 py-3">
                    <div class="flex flex-col gap-2">
                        <div class="relative">
                            <h3 class="text-secondary text-sm">Bagian 4</h3>
                            <div
                                class="absolute left-0 -bottom-1 h-[2px] w-[40px] bg-green-700 rounded-lg">
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-secondary mt-1">Pertemuan 3</h2>
                        <h4 class="text-secondary text-xs -mt-1">Pembelajaran</h4>
                    </div>
                    <div class="absolute bottom-0 right-0 progress-ring m-4">
                        <svg class="relative w-full h-full">
                            <circle class="progress-ring__circle-background" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" />
                            <circle class="progress-ring__circle" stroke="#22c55e" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" data-percent="0"
                                :stroke-dasharray="" :stroke-dashoffset="" />
                            <text x="40" y="40" text-anchor="middle" dominant-baseline="middle"
                                class="font-bold text-lg !text-sky-700">0%</text>
                        </svg>
                    </div>
                </div>
                <div
                    class="swiper-slide relative h-48 border border-gray-200 bg-white rounded-md shadow-sm px-5 py-3">
                    <div class="flex flex-col gap-2">
                        <div class="relative">
                            <h3 class="text-secondary text-sm">Bagian 5</h3>
                            <div
                                class="absolute left-0 -bottom-1 h-[2px] w-[40px] bg-green-700 rounded-lg">
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-secondary mt-1">Pertemuan 4</h2>
                        <h4 class="text-secondary text-xs -mt-1">Pembelajaran</h4>
                    </div>
                    <div class="absolute bottom-0 right-0 progress-ring m-4">
                        <svg class="relative w-full h-full">
                            <circle class="progress-ring__circle-background" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" />
                            <circle class="progress-ring__circle" stroke="#22c55e" stroke-width="8"
                                fill="transparent" r="32" cx="40" cy="40" data-percent="0"
                                :stroke-dasharray="" :stroke-dashoffset="" />
                            <text x="40" y="40" text-anchor="middle" dominant-baseline="middle"
                                class="font-bold text-lg !text-sky-700">0%</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

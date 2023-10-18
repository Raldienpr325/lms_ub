<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Quiz</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    @php
        // dump($data);
    @endphp
    <section class="dashboard flex flex-row-reverse h-screen">
        <aside class="w-full h-screen overflow-y-auto bg-gray-50">
            <header class="sticky top-0 z-10 flex items-center justify-center w-full py-3 px-5 xs:px-9
                border-b border-gray-200 backdrop-blur-3xl bg-white/80">
                <h1 class="text-xl font-semibold">Quiz Pertemuan 1</h1>
            </header>
            <div class="flex flex-col gap-5 px-5 xs:px-9 pt-6">
                <div>
                    <div id="question-div-0"></div>
                    <button id="questionButtonList" onclick="openQuestionButtonList()"
                        class="fixed z-30 flex items-center left-0 top-[75px] 2md:-left-full transition-left duration-500 ease-linear w-11 p-3 bg-gray-800 rounded-r-[50%]">
                        <ion-icon name="filter" class="text-white text-xl self-end"></ion-icon>
                    </button>
                    <div class="flex gap-5 mt-3 relative">
                        <div id="questions" class="w-full"></div>
                    </div>
                </div>
            </div>
        </aside>
        <aside id="listQuestionButtonCard" class="fixed -right-full z-40 border-r border-gray-200 w-[80%] xs:w-[300px] 2md:w-[400px] 2md:left-0 2md:static sidebar top-0 h-screen
            bottom-0 py-2 px-6
            text-center bg-white transition-right duration-500 ease-linear">
            <div class="text-secondary text-xl">
                <div class="p-2.5 pl-0 mt-1 flex items-center justify-between">
                    <a class="font-bold text-secondary text-xl lg:text-2xl tracking-wider" href="#">Daftar
                        Soal</a>
                    <button type="button" class="block 2md:hidden" onclick="openSidebar()">
                        <ion-icon name="filter-outline" class="text-secondary cursor-pointer text-2xl">
                        </ion-icon>
                    </button>
                </div>
            </div>
            <div class="flex flex-col justify-between h-[90%]">
                <div>
                    <div id="question-list" class="grid grid-cols-4 xs:grid-cols-5 gap-2 mb-4">
                    </div>
                    <div class="mb-4">
                        <div class="flex gap-2 items-center mb-2">
                            <div class="h-3 w-3 rounded-full bg-gray-200 border border-gray-200"></div>
                            <p class="text-xs">Selesai</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="h-3 w-3 rounded-full border border-gray-200"></div>
                            <p class="text-xs">Belum Selesai</p>
                        </div>
                    </div>
                </div>
                @php
                use App\Models\Quiz;
                $operation['check'] = Quiz::where('user_id', Auth::user()->id)->first();
                @endphp

                @if($operation['check'])
                    <button type="button" onclick="openModalCompleteQuiz()" class="w-full py-3 bg-green-700 hover-bg-green-700 rounded-md text-white font-semibold" disabled>
                        Telah diselesaikan
                    </button>
                @else
                    <button type="button" class="w-full py-3 bg-gray-700 hover-bg-gray-800 rounded-md text-white font-semibold">
                        Selesaikan
                    </button>
                @endif

            </div>
        </aside>

        <!-- Search modal -->
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
                                <input
                                    class="h-full w-full outline-none border-none focus:outline-none focus:ring-transparent text-sm text-secondary bg-transparent pr-2 py-4"
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
                            <ion-icon name="create-outline" class="p-2 bg-gray-100 border rounded-md"></ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Quiz 2</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 2</div>
                            </div>
                        </button>
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="reader-outline" class="p-2 bg-gray-100 border rounded-md"></ion-icon>
                            <div class="flex flex-col items-start">
                                <div class="font-medium text-lg">Nilai 1</div>
                                <div class="font-normal text-xs -mt-[2px]">Pertemuan 1</div>
                            </div>
                        </button>
                        <button
                            class="text-base w-full flex items-center gap-4 px-3 py-2 text-secondary bg-gray-50 hover:bg-gray-100 border border-gray-100 rounded-md">
                            <ion-icon name="reader-outline" class="p-2 bg-gray-100 border rounded-md"></ion-icon>
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
        <input type="hidden" value="1" name="pertemuan_1" id="pertemuan_1">
        <div id="info-quiz-modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="fixed inset-0 backdrop-blur-sm" style="background: linear-gradient(rgba(0, 0,
                    0, 0.5),
                    rgba(0, 0, 0, 0.5))"></div>
            <div class="close-info-quiz-modal fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full justify-center text-center items-start p-4 sm:p-0">
                    <div class="block relative transform overflow-hidden rounded-lg bg-white text-left
                        shadow-xl
                        transition-all duration-1000 sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <ion-icon name="information-circle-outline" class="h-6 w-6 text-yellow-500">
                                    </ion-icon>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        Informasi</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Silahkan pilih jawaban terlebih dahulu pada
                                            semua soal untuk menyelesaikan quiz.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" class="close-info-quiz-modal mt-3 inline-flex w-full justify-center rounded-md bg-white
                                px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                hover:bg-gray-50 sm:mt-0 sm:w-auto">Oke</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="confirmQuiz" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="fixed inset-0 backdrop-blur-sm" style="background: linear-gradient(rgba(0, 0,
                    0, 0.5),
                    rgba(0, 0, 0, 0.5))"></div>
            <div class="closeConfirmQuizComplete fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full
                                    bg-slate-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <ion-icon name="megaphone-outline" class="h-6 w-6 text-slate-600"></ion-icon>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        Konfirmasi Selesai</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Apakah kamu yakin ingin menyelesaikan Quiz ?
                                            Jika iya, tekan tombol Konfirmasi dibawah ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <form action="">
                                <button type="button" class="closeConfirmQuizComplete mt-3 inline-flex w-full justify-center rounded-md
                                bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
                                <button type="button" onclick="submitQuizButton()"
                                    class="inline-flex w-full justify-center rounded-md bg-slate-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 sm:ml-3 sm:w-auto">Konfirmasi</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        const questions = [];
        $.ajax({
            url: '/get-data-quiz-1',
            method: 'GET',
            success: function(data) {
                const questionContainer = document.getElementById('questions');
                const questionListContainer = document.getElementById('question-list');
                const confirmQuiz = document.getElementById('confirmQuiz');

                $.each(data, function(i, v) {
                    // console.log(v)
                    const question = {
                        question: v.pertanyaan,
                        options: [
                            { text: v.opsi_a, isCorrect: v.kunci_jawaban === "A" },
                            { text: v.opsi_b, isCorrect: v.kunci_jawaban === "B" },
                            { text: v.opsi_c, isCorrect: v.kunci_jawaban === "C" },
                            { text: v.opsi_d, isCorrect: v.kunci_jawaban === "D" }
                        ],
                        answer: null
                    };

                    questions.push(question);
                });

                function createQuestionElement(q, index) {
                    const questionDiv = document.createElement('div');
                    questionDiv.className = 'mb-8';

                    const questionText = document.createElement('div');
                    questionText.className =
                        'bg-white py-4 px-6 mb-4 rounded-md border border-gray-200';

                    questionText.innerHTML = `
                        <div class="text-secondary text-lg font-semibold mb-2">Soal ${
                            index + 1
                        } :</div>
                        <p class="text-[15px] leading-6">${q.question}</p>
                    `;
                    questionDiv.appendChild(questionText);

                    const optionsDiv = document.createElement('div');
                    optionsDiv.className = 'flex flex-col gap-4 px-6';

                    const optionLetters = ['A', 'B', 'C', 'D'];

                    q.options.forEach((option, optionIndex) => {
                        const optionLabel = document.createElement('label');
                        optionLabel.className = 'flex text-secondary';
                        optionLabel.innerHTML = `
                            <input type="radio" name="question${index}" value="${optionIndex}" class="mr-2 w-5 h-4 mt-1"/>
                            ${optionLetters[optionIndex]}. <span class="ml-2">${option.text}</span>
                        `;

                        optionLabel.querySelector('input').addEventListener('click', () => {
                            q.answer = option.isCorrect;
                            const questionButton = document.getElementById(
                                `question-button-${index}`
                            );
                            questionButton.style.backgroundColor = '#e5e7eb';
                            updateClearButtonVisibility();
                            localStorage.setItem(
                                `question${index + 1}`,
                                optionIndex.toString()
                            );
                        });

                        optionsDiv.appendChild(optionLabel);
                    });

                    const clearButton = document.createElement('button');
                    clearButton.id = `clear-button-${index}`;
                    clearButton.className =
                        'flex gap-2 ml-6 mt-4 items-center py-1.5 px-3 rounded-md text-xs font-semibold bg-red-50 border border-red-300 text-red-700';
                    clearButton.innerHTML = `
                        <ion-icon name="close-circle-outline"></ion-icon>
                        <p>Hapus Jawaban</p>
                    `;
                    clearButton.addEventListener('click', () => {
                        q.answer = null;
                        const questionButton = document.getElementById(
                            `question-button-${index}`
                        );
                        questionButton.style.backgroundColor = 'white';
                        const radioInputs = document.querySelectorAll(
                            `input[name="question${index}"]`
                        );
                        radioInputs.forEach((radio) => {
                            radio.checked = false;
                        });
                        updateClearButtonVisibility();
                        // questionContainer.forEach(data, function(k,v){
                        //     console.log(v)
                        //     alert(i)
                        // })
                        localStorage.removeItem(`question${index + 1}`);
                    });

                    questionDiv.appendChild(optionsDiv);
                    questionDiv.appendChild(clearButton);

                    return questionDiv;
                }

                function createQuestionButton(index) {
                    const questionButton = document.createElement('button');
                    questionButton.id = `question-button-${index}`;
                    questionButton.className =
                        'text-secondary font-bold rounded-full h-11 w-11 flex items-center justify-center rounded-full border border-gray-200 mb-1';
                    questionButton.textContent = index + 1;

                    questionButton.addEventListener('click', () => {
                        const questionDiv = document.getElementById(`question-div-${index}`);
                        questionDiv?.scrollIntoView({ behavior: 'smooth' });
                    });

                    return questionButton;
                }

                function loadQuestions() {
                    questionContainer.innerHTML = '';
                    questionListContainer.innerHTML = '';

                    questions.forEach((q, index) => {
                        const questionDiv = createQuestionElement(q, index);
                        questionDiv.id = `question-div-${index + 1}`;
                        questionContainer.appendChild(questionDiv);

                        const questionButton = createQuestionButton(index);
                        questionListContainer.appendChild(questionButton);

                        const savedAnswer = localStorage.getItem(`question${index + 1}`);
                        if (savedAnswer !== null) {
                            const radioInput = questionDiv.querySelector(
                                `input[value="${savedAnswer}"]`
                            );
                            if (radioInput) {
                                radioInput.checked = true;
                                q.answer = q.options[savedAnswer].isCorrect;
                                questionButton.style.backgroundColor = '#e5e7eb';
                            }
                        }
                    });
                }

                loadQuestions();

                window.addEventListener('load', () => {
                    updateClearButtonVisibility();
                });



                updateClearButtonVisibility();


                // console.log(questions)
            },
            error: function(xhr, status, error) {
            // ...
            }
        });

                document.querySelector('.closeConfirmQuizComplete')?.addEventListener('click', () => {
                    confirmQuiz.classList.add('hidden');
                });

                const openModalCompleteQuiz = () => {
                    const answeredQuestions = questions.filter((q) => q.answer !== null);
                    var jumlah_benar = 0;
                    if (answeredQuestions.length === questions.length) {
                        $.each(answeredQuestions,function(i,v){
                            if(v.answer === true){
                                jumlah_benar+=1;
                            }

                        })
                        confirmQuiz.classList.remove('hidden');
                    } else {
                        document.getElementById('info-quiz-modal').classList.toggle('hidden');
                    }
                };

                document
                    .querySelector('.close-info-quiz-modal')
                    ?.addEventListener('click', () => {
                        document.getElementById('info-quiz-modal').classList.toggle('hidden');
                    });

                const openQuestionButtonList = () => {
                    document.getElementById('questionButtonList').classList.remove('left-0');
                    document.getElementById('questionButtonList').classList.add('-left-full');
                    listQuestionButtonCard.classList.remove('-right-full');
                    listQuestionButtonCard.classList.add('right-0');
                };

                const closeQuestionButtonCard = () => {
                    document.getElementById('questionButtonList').classList.add('left-0');
                    document
                        .getElementById('questionButtonList')
                        .classList.remove('-left-full');
                    listQuestionButtonCard.classList.add('-right-full');
                    listQuestionButtonCard.classList.remove('right-0');
                };


                function submitQuizButton() {
                    var jumlah_benar = 0;
                    var jumlah_salah = 0;
                    const answeredQuestions = questions.filter((q) => q.answer !== null);

                    $.each(answeredQuestions,function(i,v){
                        if(v.answer === true){
                            jumlah_benar+=1;
                        }else{
                            jumlah_salah+=1;
                        }
                    })

                    var pertemuan = $('#pertemuan_1').val()

                    $.ajax({
                        url: '/submit-data-quiz-1',
                        headers : {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            pertemuan : pertemuan,
                            jumlah_benar : jumlah_benar,
                            jumlah_salah : jumlah_salah
                        },
                        method : 'POST',
                        success:function(data)
                        {
                            console.log(data)
                        }
                    })

                    confirmQuiz.classList.add('hidden');

                    answeredQuestions.forEach((q, index) => {
                        q.answer = null;
                        const questionButton = document.getElementById(
                            `question-button-${index}`
                        );
                        questionButton.style.backgroundColor = 'white';
                        const radioInputs = document.querySelectorAll(
                            `input[name="question${index}"]`
                        );
                        radioInputs.forEach((radio) => {
                            radio.checked = false;
                        });
                        updateClearButtonVisibility();
                        localStorage.removeItem(`question${index + 1}`);
                    });
                }

                function updateClearButtonVisibility() {
                    questions.forEach((q, index) => {
                        const clearButton = document.getElementById(`clear-button-${index}`);
                        if (clearButton) {
                            clearButton.style.display = q.answer !== null ? 'flex' : 'none';
                        }
                    });
                }



    </script>
    <script type="text/javascript" src="./js/script.js"></script>
</body>

</html>

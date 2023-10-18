<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="flex">
        <aside class="hidden md:flex md:w-[55%] 2md:w-[60%] lg:w-[65%] bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url(/src/images/image-background.webp);">
            <div class="flex flex-col items-center justify-center gap-5 md:px-14 lg:px-16">
                <div class="font-bold md:text-5xl lg:text-7xl text-center text-white font-lemon tracking-[.25em]">
                    MIRSANI
                </div>
                <div class="text-white text-center font-medium md:text-sm lg:text-lg md:leading-[34px] lg:leading-8">
                    MIRSANI merupakan Laboratorium
                    Teknologi Pembelajaran
                    Universitas Brawijaya yang bertujuan untuk mengembangkan solusi inovatif dalam pendidikan berbasis
                    teknologi.</div>
            </div>
        </aside>
        <aside class="w-full md:w-[45%] 2md:w-[40%] lg:w-[35%]">
            <div class="flex flex-col items-center justify-centermx-auto">
                <div
                    class="w-full md:mt-0 sm:max-w-md xl:p-0">
                    <div
                        class="flex justify-center flex-col overflow-hidden w-full bg-white m-auto h-screen sm:p-8">
                        <div class="mb-[25px] w-[222px] mx-auto bg-gray-50 border border-gray-100 rounded-xl p-[2px]">
                            <div class="w-full flex justify-between mx-auto relative">
                                <div id="btn"
                                    class="top-0 left-0 absolute w-[110px] bg-white border rounded-lg h-full duration-300">
                                </div>
                                <button type="button"
                                    class="w-1/2 font-medium text-secondary cursor-pointer bg-transparent px-5 py-2 relative"
                                    onclick="login()">Login</button>
                                <button type="button"
                                    class="w-1/2 font-medium text-secondary cursor-pointer bg-transparent px-5 py-2 relative"
                                    onclick="register()">Register</button>
                            </div>
                        </div>
                        <div class="mt-[20px]"></div>
                        <form id="login" class="space-y-4 md:space-y-6" action="{{ route('login-mhs') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-normal text-secondary">Your
                                    Email</label>
                                <input type="email" name="email" id="login-email"
                                    class="bg-gray-50 border border-gray-300 text-secondary sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    placeholder="name@company.com" required="">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-normal text-secondary">Password</label>
                                <input type="password" name="password" id="login-password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-secondary sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-normal text-secondary">Please
                                    verify you are not robot</label>
                                <img src="{{ asset('img/captcha.webp') }}" alt="captcha" class="w-3/4">
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="login-remember" aria-describedby="remember" type="checkbox"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                            >
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-secondary">Remember
                                            me</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4
                                    focus:outline-none focus:ring-primary-800 font-semibold rounded-lg text-base px-5
                                    py-2.5 text-center tracking-wider">Login</button>
                        </form>
                        <form id="register" class="space-y-4 md:space-y-6 hidden" action="{{ route('register-mhs') }}" method="post">
                            @csrf
                            <div>
                                <label for="name" class="block mb-2 text-sm font-normal text-secondary">Your
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-secondary sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    placeholder="Adiba Zaira" required="">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-normal text-secondary">Your
                                    Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-secondary sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    placeholder="name@company.com" required="">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-normal text-secondary">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-secondary sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    required="">
                            </div>
                            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4
                                    focus:outline-none focus:ring-primary-800 font-semibold rounded-lg text-base px-5
                                    py-2.5 text-center tracking-wider">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{asset('styles/index.css')}}">
    <link rel="stylesheet" href="{{asset('styles/welcome.css')}}"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.5.0/build/css/intlTelInput.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Phonebook App</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-background font-roboto">
    <div class="flex flex-col md:flex-row w-full gap-4">
        <div class="w-full md:w-1/5 flex flex-col gap-[22px] pl-9 py-11">
            <!-- code for logo -->
            <div class="flex gap-3 flex-row items-center mb-16">
                <svg width="38" height="47" viewBox="0 0 38 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.8001 18.8C23.9915 18.8 28.2 14.5914 28.2 9.39998C28.2 4.20851 23.9915 0 18.8001 0C13.6086 0 9.40009 4.20851 9.40009 9.39998C9.40009 14.5914 13.6086 18.8 18.8001 18.8Z" fill="#463FF1" />
                    <path opacity="0.5" d="M37.5999 36.425C37.5999 42.2647 37.5999 46.9999 18.8 46.9999C0 46.9999 0 42.2647 0 36.425C0 30.5852 8.41768 25.85 18.8 25.85C29.1822 25.85 37.5999 30.5852 37.5999 36.425Z" fill="#463FF1" />
                </svg>
                <h3 class="text-white font-semibold text-2xl">My Phonebook</h3>
            </div>
            <!-- create contact button -->
            <a href="{{route('contacts.create')}}">
                <div class="bg-[#272727] rounded-lg items-center p-2.5 flex flex-row gap-3 group hover:bg-white mb-5">
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="10" fill="#2B2881" />
                            <path d="M31.6666 21.6633H21.6666V31.6633H18.3333V21.6633H8.33331V18.33H18.3333V8.32996H21.6666V18.33H31.6666V21.6633Z" fill="white" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-normal text-sm text-[#A3A3A3] group-hover:text-black">Create new</p>
                        <p class="text-base font-medium text-white  group-hover:text-black">Contact</p>
                    </div>
                </div>
            </a>
            <!-- contact button -->
            <a href="{{route('contacts.index')}}">
                <div class="bg-[#272727] rounded-lg items-center flex flex-row p-2.5">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5 12.0833C17.1694 12.0833 19.3334 9.91934 19.3334 7.24996C19.3334 4.58058 17.1694 2.41663 14.5 2.41663C11.8306 2.41663 9.66669 4.58058 9.66669 7.24996C9.66669 9.91934 11.8306 12.0833 14.5 12.0833Z" fill="#463FF1" />
                        <path d="M24.1666 21.1459C24.1666 24.1486 24.1666 26.5834 14.5 26.5834C4.83331 26.5834 4.83331 24.1486 4.83331 21.1459C4.83331 18.1432 9.16156 15.7084 14.5 15.7084C19.8384 15.7084 24.1666 18.1432 24.1666 21.1459Z" fill="#463FF1" />
                    </svg>
                    <h3 class="text-white">Contact</h3>
                </div>
            </a>
        </div>
        <!-- search and sort -->
        @yield('content')

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    </div>
</body>

</html>
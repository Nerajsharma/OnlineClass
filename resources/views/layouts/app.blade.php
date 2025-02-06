<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('logofull.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- icons -->
    <link rel="stylesheet" href="https://nirajkumarsharma.com.np/icons/main.css" />
    <script>
        function toaster(type, title, text) {
            var icon;
            if (type == "success") {
                icon = "nb nb_checkmark1";
            } else if (type == "error") {
                icon = "nb nb_exclamation1";
            } else if (type == "info") {
                icon = "nb nb_info3";
            }
            let notification = document.querySelector(".notification");
            let newtoaste = document.createElement("div");
            newtoaste.innerHTML = `<div class="toaster ${type} rounded px-4 py-2 mb-5 flex items-center justify-between gap-4">
            <i class="${icon}"></i>
            <div class="">
                <p class="text-base font-bold">${title}</p>
                <p class="text-md">${text}</p>
            </div>
            <i class="nb nb_cross text-sm" onclick="this.parentElement.remove()"></i>
    </div>`;

            notification.insertBefore(newtoaste, notification.firstChild);

            let existingToasters = notification.querySelectorAll(
                ".toaster:not(:first-child)"
            );
            existingToasters.forEach((toast) => {
                toast.classList.add("slide-down");
            });

            newtoaste.timeOut = setTimeout(() => {
                newtoaste.classList.add("slide-down");
                setTimeout(() => {
                    newtoaste.remove();
                }, 300);
            }, 5000);
        }
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="{{ asset('js/toaster.js') }}"></script> --}}
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-blue-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="flex w-full">
                <div class="fixed bottom-0 left-0 h-[90vh] w-full bg-blue-900 md:relative md:w-2/12">
                    <x-slide_navbar />
                </div>
                <div class="h-[90vh] w-full rounded-t bg-slate-50 md:w-10/12" id="main_content">
                    <div class="main_content_wapper overflow-y-auto overflow-x-hidden py-6 pl-8 pr-2">
                        <div class="main_content_cover">
                            <div class="main_content_outer">
                                <x-toaster></x-toaster>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function toaster(type, title, text) {

            var icon;
            if (type == "success") {
                console.log("type sucess");
                icon = "nb nb_checkmark1";
            } else if (type == "error") {
                icon = "nb nb_exclamation1";
            } else if (type == "info") {
                icon = "nb nb_info3";
            }
            let notification = document.querySelector(".notification");
            let newtoaste = document.createElement("div");
            newtoaste.innerHTML = `<div class="toaster ${type} rounded px-4 py-2 mb-5 flex items-center justify-between gap-4">
            <i class="${icon}"></i>
            <div class="">
                <p class="text-base font-bold">${title}</p>
                <p class="text-md">${text}</p>
            </div>
            <i class="nb nb_cross text-sm" onclick="this.parentElement.remove()"></i>
    </div>`;

            notification.insertBefore(newtoaste, notification.firstChild);

            let existingToasters = notification.querySelectorAll(
                ".toaster:not(:first-child)"
            );
            existingToasters.forEach((toast) => {
                toast.classList.add("slide-down");
            });

            newtoaste.timeOut = setTimeout(() => {
                newtoaste.classList.add("slide-down");
                setTimeout(() => {
                    newtoaste.remove();
                }, 300);
            }, 5000);
        }
    </script>
</body>

</html>

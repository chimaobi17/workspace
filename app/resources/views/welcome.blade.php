<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518)}}
                @layer base{*,:after,:before,::backdrop{box-sizing:border-box}html{line-height:1.5;font-family:var(--font-sans)}body{margin:0}}
                @layer utilities{
                    .bg-\[\#FDFDFC\]{background-color:#FDFDFC}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}
                    .text-\[\#1b1b18\]{color:#1b1b18}.dark\:text-\[\#EDEDEC\]{color:#EDEDEC}
                    .min-h-screen{min-height:100vh}.flex{display:flex}.flex-col{flex-direction:column}
                    .items-center{align-items:center}.justify-center{justify-content:center}
                    .p-6{padding:1.5rem}.lg\:p-8{padding:2rem}.lg\:justify-center{justify-content:center}
                    .w-full{width:100%}.max-w-\[335px\]{max-width:335px}.lg\:max-w-4xl{max-width:56rem}
                    .gap-4{gap:1rem}.mb-6{margin-bottom:1.5rem}
                    .text-sm{font-size:0.875rem}.leading-normal{line-height:1.5}
                    .border{border-width:1px}.rounded-sm{border-radius:0.125rem}
                    .px-5{padding-left:1.25rem;padding-right:1.25rem}.py-1\.5{padding-top:0.375rem;padding-bottom:0.375rem}
                    .inline-block{display:inline-block}
                    .border-\[\#19140035\]{border-color:#19140035}.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}
                    .dark\:border-\[\#3E3E3A\]{border-color:#3E3E3A}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}
                    .dark\:text-\[\#EDEDEC\]{color:#EDEDEC}
                }
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col p-6 lg:p-8 items-center lg:justify-center min-h-screen">
        <!-- Navigation with Log in / Register / Dashboard buttons (fully preserved) -->
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main content area (now empty – you can put whatever you want here) -->
        <main class="flex-1 w-full max-w-[335px] lg:max-w-4xl">
            <!-- Your own content goes here -->
            <div class="text-center mt-20">
                <h1 class="text-4xl font-bold">Welcome to your app</h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Start building something awesome!</p>
            </div>
        </main>

        <!-- Keeps spacing consistent with original layout -->
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
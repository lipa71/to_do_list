<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do App</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans main-background">
        <div class="bg-gray-50 text-black/50 main-background dark:text-white/50">
            <div class="relative min-h-screen selection:text-white">
                <div class="py-5 px-10">
                    <header class="flex items-top">
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>
                    <main style="margin: 250pt 100pt 100pt" class="p-8 bg-gray-800 shadow sm:rounded-lg">
                        <div class="flex items-center justify-center gap-10">
                            <div class="text-white text-4xl font-semibold">
                                To Do App
                            </div>
                            <svg style="height: 50pt; width: 50pt" class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                            </svg>
                        </div>
                    </main>

                    <footer class="py-16 justify-center flex items-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

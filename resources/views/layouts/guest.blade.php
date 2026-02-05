<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Galaxy Access | Login</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;700&family=Orbitron:wght@400;900&display=swap" rel="stylesheet">

        <style>
            body {
                background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%);
                font-family: 'Kantumruy Pro', sans-serif;
                min-height: 100vh;
            }
            .font-space { font-family: 'Orbitron', sans-serif; }
        </style>
    </head>
    <body class="antialiased text-gray-200">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8">
                <a href="/" class="font-space text-3xl tracking-[0.5em] font-black text-purple-500 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]">
                    GALAXY_SYSTEM
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white/5 backdrop-blur-xl border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.3)] sm:rounded-[3rem]">
                {{ $slot }}
            </div>
        </div>
        <script>lucide.createIcons();</script>
    </body>
</html>

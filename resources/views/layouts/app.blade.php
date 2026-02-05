<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Galaxy World') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;700&family=Orbitron:wght@400;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest"></script>

        <style>
            body {
                /* កំណត់ Background ឱ្យដូចទំព័រ Welcome */
                background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%) !important;
                font-family: 'Kantumruy Pro', sans-serif;
                color: white;
                min-height: 100vh;
            }
            .font-space { font-family: 'Orbitron', sans-serif; }

            /* រចនាប័ទ្ម Glassmorphism */
            .glass-card {
                background: rgba(255, 255, 255, 0.03) !important;
                backdrop-filter: blur(15px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .neon-text {
                text-shadow: 0 0 15px rgba(167, 139, 250, 0.8);
            }

            /* កែសម្រួល Input ឱ្យមើលឃើញក្នុង Background ងងឹត */
            input, select, textarea {
                background-color: rgba(255, 255, 255, 0.05) !important;
                border: 1px solid rgba(255, 255, 255, 0.1) !important;
                color: white !important;
            }
            label { color: rgba(255, 255, 255, 0.7) !important; }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-transparent border-b border-white/5 shadow-2xl">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-space text-xl font-bold text-purple-400 tracking-widest neon-text uppercase">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script>
            lucide.createIcons();
        </script>
    </body>
</html>

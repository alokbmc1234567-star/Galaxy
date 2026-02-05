<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galaxy Admin | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;700&family=Orbitron:wght@400;900&display=swap" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%) !important;
            font-family: 'Kantumruy Pro', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* ការពារកុំឱ្យមាន Scroll បើមិនចាំបាច់ */
        }
        .font-space { font-family: 'Orbitron', sans-serif; }

        /* បន្ថែមចលនា Glow តិចៗនៅពីក្រោយ Card */
        .galaxy-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(168, 85, 247, 0.15);
            filter: blur(100px);
            border-radius: 50%;
            z-index: -1;
        }
    </style>
</head>
<body class="antialiased text-gray-200">
    <div class="galaxy-glow"></div>

    <div class="w-full flex flex-col items-center px-4 relative">
        <div class="mb-8">
            <a href="/" class="font-space text-3xl tracking-[0.5em] font-black text-purple-500 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)] uppercase text-center block">
                Galaxy<span class="text-white">_SYSTEM</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-10 py-12 bg-white/5 backdrop-blur-3xl border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.5)] rounded-[3rem]">

            <div class="text-center mb-10">
                <div class="inline-block p-4 rounded-full bg-purple-600/10 mb-4 border border-purple-500/20">
                    <i data-lucide="shield-check" class="w-8 h-8 text-purple-400"></i>
                </div>
                <h2 class="text-xl font-bold text-white uppercase tracking-widest font-space">Login Access</h2>
                <p class="text-[10px] text-gray-500 mt-2 italic uppercase tracking-[3px]">Secure terminal connection_</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 text-red-400 text-[11px] italic bg-red-400/5 p-4 rounded-2xl border border-red-400/20">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-2 ml-1 italic">Email_Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-5 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder:text-gray-700"
                        placeholder="commander@galaxy.com">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-2 ml-1 italic">Security_Key</label>
                    <input id="password" type="password" name="password" required
                        class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-5 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder:text-gray-700"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-[10px]">
                    <label class="flex items-center text-gray-500 italic cursor-pointer group">
                        <input type="checkbox" name="remember" class="rounded-md border-white/10 bg-white/5 text-purple-600 mr-2 focus:ring-0 transition-all">
                        <span class="group-hover:text-gray-300 transition-colors uppercase tracking-widest">ចងចាំឈ្មោះ</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-purple-400/60 hover:text-purple-400 transition-all uppercase tracking-widest italic">ភ្លេចលេខសម្ងាត់?</a>
                    @endif
                </div>

                <button type="submit" class="w-full py-5 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl text-white text-[11px] font-black uppercase tracking-[0.4em] shadow-lg shadow-purple-600/20 hover:shadow-purple-500/40 hover:scale-[1.01] active:scale-95 transition-all">
                    login
                </button>
            </form>

            <p class="mt-8 text-center text-[9px] text-gray-600 uppercase tracking-[2px]">
                &copy; {{ date('2026') }} Galaxy System Operations Unit
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

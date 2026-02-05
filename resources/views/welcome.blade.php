<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxy Worl | រសជាតិចក្រវាល</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;700&family=Orbitron:wght@400;900&display=swap" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%);
            font-family: 'Kantumruy Pro', sans-serif;
            color: white;
            scroll-behavior: smooth;
        }
        .font-space { font-family: 'Orbitron', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .neon-text {
            text-shadow: 0 0 15px rgba(167, 139, 250, 0.8);
        }
        .floating { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
        /* លុប Outline ដែលអាក្រក់ចេញ */
        *:focus { outline: none !important; box-shadow: none !important; }
        [x-cloak] { display: none !important; }

        .nav-link-glow {
            position: relative;
            transition: all 0.3s;
        }
        .nav-link-glow:hover { color: white; }
        .nav-link-glow::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: #a855f7;
            transition: width 0.3s;
            box-shadow: 0 0 8px #a855f7;
        }
        .nav-link-glow:hover::after { width: 100%; }
    </style>
</head>
<body class="antialiased" x-data="{ search: '' }">

    <nav class="flex justify-between items-center p-6 px-10 glass sticky top-0 z-50">
        <div class="font-space text-xl tracking-[0.3em] font-black text-purple-400">GALAXY WORLD</div>

        <div class="hidden md:flex items-center space-x-8 text-[10px] tracking-widest uppercase font-bold">
            <a href="#menu" class="text-gray-400 nav-link-glow transition">ម៉ឺនុយអាហារ</a>
            <a href="#location" class="text-gray-400 nav-link-glow transition">ទីតាំង</a>

            <div class="h-4 w-[1px] bg-white/10 mx-2"></div>

            @if (Route::has('login'))
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false"
                                class="flex items-center space-x-3 text-purple-400 hover:text-white transition group bg-white/5 px-4 py-2 rounded-full border border-purple-500/20">
                            <div class="text-right hidden sm:block">
                                <p class="text-[10px] font-bold leading-none uppercase tracking-tighter">{{ auth()->user()->name }}</p>
                                <p class="text-[8px] text-gray-500 uppercase tracking-[2px] mt-1">
                                    {{ auth()->user()->role === 'admin' ? 'Commander' : 'Voyager' }}
                                </p>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-cloak
                             class="absolute right-0 mt-3 w-48 glass rounded-2xl py-2 shadow-2xl border border-purple-500/30 z-[60]">

                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-[10px] text-gray-300 hover:bg-purple-500/10 hover:text-purple-400 transition uppercase font-bold tracking-widest">
                                    <i data-lucide="layout-dashboard" class="w-4 h-4 mr-3"></i>
                                    ផ្ទាំងបញ្ជាការ
                                </a>
                            @endif

                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-[10px] text-gray-300 hover:bg-purple-500/10 hover:text-purple-400 transition uppercase font-bold tracking-widest">
                                <i data-lucide="settings" class="w-4 h-4 mr-3"></i>
                                ការកំណត់
                            </a>

                            <div class="h-[1px] bg-white/10 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-3 text-[10px] text-red-400 hover:bg-red-500/10 transition uppercase font-bold tracking-widest">
                                    <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                                    ចាកចេញ
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition">ចូលប្រព័ន្ធ</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 border border-purple-500/30 rounded-full text-purple-400 hover:bg-purple-500 hover:text-white transition">ចុះឈ្មោះ</a>
                    @endif
                @endauth
            @endif
        </div>

        <button class="bg-purple-600 hover:bg-white hover:text-purple-900 px-6 py-2 rounded-full text-xs font-black transition transform hover:scale-105 active:scale-95 shadow-[0_0_20px_rgba(147,51,234,0.3)]">
            កក់តុឥឡូវនេះ
        </button>
    </nav>

    <section class="flex flex-col items-center justify-center pt-32 pb-20 px-4 text-center">
        <div class="floating mb-10">
            <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-blue-600 rounded-full flex items-center justify-center shadow-[0_0_60px_rgba(139,92,246,0.6)] text-white">
                <i data-lucide="rocket" class="w-12 h-12"></i>
            </div>
        </div>
        <h1 class="font-space text-5xl md:text-8xl font-black mb-6 neon-text leading-tight uppercase">
            Drink the <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Universe</span>
        </h1>
        <p class="max-w-lg text-gray-400 text-lg font-light italic">"រសជាតិដែលនាំអ្នកធ្វើដំណើរឆ្លងកាត់ផ្កាយរាប់លាន។"</p>
    </section>

    <div id="menu" class="max-w-7xl mx-auto px-4 pb-32">
        <div class="flex items-center space-x-4 mb-12">
            <div class="h-[1px] flex-grow bg-gradient-to-r from-transparent to-purple-500"></div>
            <h2 class="text-3xl font-bold tracking-widest uppercase">បញ្ជីភេសជ្ជៈចក្រវាល</h2>
            <div class="h-[1px] flex-grow bg-gradient-to-l from-transparent to-purple-500"></div>
        </div>

        <div class="flex flex-col items-center mb-16">
            <div class="relative w-full max-w-xl group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <i data-lucide="search" class="w-5 h-5 text-purple-500"></i>
                </div>
                <input type="text" x-model="search" placeholder="ស្វែងរកភេសជ្ជៈក្នុងកាឡាក់ស៊ី..."
                    class="w-full bg-white/5 border border-purple-500/30 rounded-full py-4 pl-14 pr-6 text-white focus:ring-2 focus:ring-purple-500/50 transition-all">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @php $foods = \App\Models\Food::all(); @endphp
            @forelse($foods as $food)
                <div class="glass p-6 rounded-[2.5rem] hover:border-purple-500/50 transition duration-500 group"
                    x-show="'{{ strtolower($food->name) }}'.includes(search.toLowerCase())">
                    <div class="relative overflow-hidden rounded-[2rem] mb-6 aspect-square">
                        <img src="{{ asset('storage/' . $food->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $food->name }}">

                        <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md px-4 py-1 rounded-full text-purple-400 font-space text-sm border border-white/10 overflow-hidden group/price">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-500/20 to-transparent -translate-x-full group-hover/price:animate-[shimmer_2s_infinite]"></div>
                            <span class="relative z-10">${{ number_format($food->price, 2) }}</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-purple-400 transition-colors">{{ $food->name }}</h3>
                    <p class="text-sm text-gray-500 font-light mb-4 line-clamp-2 italic">{{ $food->description }}</p>
                    <button class="w-full py-3 rounded-xl border border-purple-500/30 text-xs font-bold uppercase tracking-widest text-purple-400 hover:bg-purple-600 hover:text-white transition shadow-lg active:scale-95">
                        បញ្ជាទិញ_
                    </button>
                </div>
            @empty
                <div class="col-span-full text-center py-20 text-gray-500">មិនទាន់មានទិន្នន័យ...</div>
            @endforelse
        </div>
    </div>

    <footer id="location" class="relative bg-[#090A0F] border-t border-white/5 pt-20 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[1px] bg-gradient-to-r from-transparent via-purple-500 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <div class="space-y-8">
                <div>
                    <h2 class="font-space text-3xl font-black text-white tracking-[5px] uppercase mb-4">GALAXY <span class="text-purple-500">LOCATION</span></h2>
                    <p class="text-gray-400 font-light italic leading-relaxed">"មកទទួលយកបទពិសោធន៍រសជាតិផ្កាយ នៅស្ថានីយ៍ចក្រវាលរបស់យើង។"</p>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 group">
                        <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center group-hover:border-purple-500 transition"><i data-lucide="map-pin" class="w-5 h-5 text-purple-500"></i></div>
                        <span class="text-sm text-gray-300">ផ្លូវផ្កាយព្រះគ្រោះ, ភ្នំពេញ, កម្ពុជា</span>
                    </div>
                </div>
            </div>
            <div class="relative group h-[300px] rounded-[2rem] overflow-hidden border border-white/10">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.77051410114!2d104.921013!3d11.567089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTHCsDM0JzAxLjUiTiAxMDTCsDU1JzE1LjYiRQ!5e0!3m2!1sen!2skh!4v1643880000000!5m2!1sen!2skh"
                    width="100%" height="100%" style="border:0; filter: invert(90%) hue-rotate(180deg) brightness(95%) contrast(90%);" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="py-8 border-t border-white/5 text-center">
            <p class="text-[10px] text-gray-600 font-mono tracking-[4px] uppercase">© 2026 GALAXY WORLD FOOD - Make by Chan NuTh_</p>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

<nav x-data="{ open: false }" class="bg-[#090A0F]/80 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <style>
        [x-show="open"] .rounded-md.ring-1.ring-black {
            background-color: rgba(15, 16, 22, 0.95) !important;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(168, 85, 247, 0.3) !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.7) !important;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->role === 'admin' ? route('dashboard') : url('/') }}" class="font-black tracking-[0.2em] text-purple-500 font-space text-xl uppercase">
                        GALAXY<span class="text-white">_ADMIN</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                           class="relative group py-2 text-[10px] font-black uppercase tracking-widest {{ request()->routeIs('dashboard') ? 'text-purple-400' : 'text-gray-500' }} hover:text-purple-400 transition-all duration-300">
                            {{ __('ផ្ទាំងបញ្ជាការ') }}
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-purple-500 transform {{ request()->routeIs('dashboard') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300 shadow-[0_0_8px_#a855f7]"></span>
                        </a>

                        <a href="{{ route('food.index') }}"
                           class="relative group py-2 text-[10px] font-black uppercase tracking-widest {{ request()->routeIs('food.*') ? 'text-purple-400' : 'text-gray-500' }} hover:text-purple-400 transition-all duration-300">
                            {{ __('បញ្ជីអាហារ') }}
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-purple-500 transform {{ request()->routeIs('food.*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300 shadow-[0_0_8px_#a855f7]"></span>
                        </a>
                    @endif

                    <a href="{{ url('/') }}"
                       class="relative group py-2 text-[10px] font-black uppercase tracking-widest text-gray-500 hover:text-blue-400 transition-all duration-300">
                        <span class="flex items-center">
                            <i data-lucide="eye" class="w-3.5 h-3.5 mr-1.5 opacity-50 group-hover:opacity-100 transition-opacity"></i>
                            {{ __('មើលគេហទំព័រ') }}
                        </span>
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 shadow-[0_0_8px_#3b82f6]"></span>
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-5 py-2.5 border border-purple-500/20 text-[11px] font-black uppercase tracking-widest rounded-full text-purple-400 bg-white/5 hover:text-white hover:bg-purple-500/20 focus:outline-none transition-all duration-300 shadow-[0_0_15px_rgba(168,85,247,0.1)]">
                            <div class="font-bold">{{ Auth::user()->name }}</div>
                            <div class="ms-1 px-2 py-0.5 bg-purple-500/10 rounded text-[8px] border border-purple-500/20 ml-2">
                                {{ strtoupper(Auth::user()->role) }}
                            </div>
                            <div class="ms-2">
                                <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center text-[10px] font-bold uppercase tracking-widest py-3 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5">
                            <i data-lucide="user-cog" class="w-4 h-4 mr-3 text-purple-500"></i>
                            {{ __('ប្រវត្តិរូប') }}
                        </x-dropdown-link>

                        <div class="border-t border-white/5 mx-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center text-[10px] font-bold uppercase tracking-widest py-3 text-red-400 hover:bg-red-500/10 transition-colors">
                                <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                                {{ __('ចាកចេញ') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-purple-400 hover:bg-white/5 focus:outline-none transition duration-150">
                    <i data-lucide="menu" x-show="!open" class="w-6 h-6"></i>
                    <i data-lucide="x" x-show="open" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#090A0F] border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-xs uppercase font-bold tracking-widest">
                    {{ __('ផ្ទាំងបញ្ជាការ') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('food.index')" :active="request()->routeIs('food.*')" class="text-xs uppercase font-bold tracking-widest">
                    {{ __('បញ្ជីអាហារ') }}
                </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="url('/')" class="text-xs uppercase font-bold tracking-widest text-blue-400">
                {{ __('មើលគេហទំព័រ') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-white/10">
            <div class="px-4 flex justify-between items-center">
                <div>
                    <div class="font-bold text-sm text-purple-400">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-gray-500 italic">{{ Auth::user()->email }}</div>
                </div>
                <div class="px-2 py-0.5 bg-purple-500/10 rounded text-[9px] border border-purple-500/20 text-purple-400 uppercase font-black">
                    {{ Auth::user()->role }}
                </div>
            </div>

            <div class="mt-3 space-y-1 text-xs font-bold uppercase tracking-widest">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-400">
                    {{ __('ប្រវត្តិរូប') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-red-400">
                        {{ __('ចាកចេញ') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <i data-lucide="settings-2" class="w-6 h-6 text-purple-500"></i>
            <h2 class="font-space text-xl font-black text-white uppercase tracking-[0.3em]">
                Settings_ <span class="text-purple-500 text-sm">/ ការកំណត់គណនី</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="p-8 glass-card rounded-[2.5rem] border border-white/10 shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 opacity-5 group-hover:opacity-10 transition-opacity duration-700">
                    <i data-lucide="user" class="w-64 h-64 text-white"></i>
                </div>

                <div class="max-w-xl relative z-10">
                    <section>
                        <header class="mb-8">
                            <h2 class="text-lg font-bold text-purple-400 uppercase tracking-widest font-space italic">
                                ព័ត៌មានផ្ទាល់ខ្លួន_
                            </h2>
                            <p class="mt-1 text-[10px] text-gray-500 uppercase tracking-tighter">
                                Update your identity across the sector_
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <label class="block text-[9px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-2 italic">Name_</label>
                                <input name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                                    class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder-gray-700">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <label class="block text-[9px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-2 italic">Email_Address_</label>
                                <input name="email" type="email" value="{{ old('email', $user->email) }}" required
                                    class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder-gray-700">
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="flex items-center gap-4 pt-4">
                                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl text-white text-[10px] font-black uppercase tracking-widest hover:scale-105 active:scale-95 transition-all shadow-lg shadow-purple-900/20">
                                    រក្សាទុកទិន្នន័យ_
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-[10px] text-emerald-400 uppercase font-black tracking-widest italic animate-pulse">
                                        រក្សាទុកជោគជ័យ_
                                    </p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-8 glass-card rounded-[2.5rem] border border-white/10 shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 opacity-5 group-hover:opacity-10 transition-opacity duration-700">
                    <i data-lucide="key" class="w-64 h-64 text-white"></i>
                </div>
                <div class="max-w-xl relative z-10">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 glass-card rounded-[2.5rem] border border-red-500/10 shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 opacity-5 group-hover:opacity-10 transition-opacity duration-700">
                    <i data-lucide="alert-triangle" class="w-64 h-64 text-red-500"></i>
                </div>
                <div class="max-w-xl relative z-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

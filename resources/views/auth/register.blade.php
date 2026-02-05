<x-guest-layout>
    <style>
        body {
            background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%) !important;
            font-family: 'Kantumruy Pro', 'Inter', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 50px rgba(139, 92, 246, 0.1);
        }
        .neon-input:focus {
            border-color: #60a5fa !important;
            box-shadow: 0 0 15px rgba(96, 165, 250, 0.4) !important;
        }
    </style>

    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4">
        <div class="mb-8">
            <div class="w-16 h-16 bg-gradient-to-tr from-blue-600 to-purple-600 rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(59,130,246,0.5)] animate-pulse">
                <i data-lucide="user-plus" class="text-white w-8 h-8"></i>
            </div>
        </div>

        <div class="w-full max-w-md glass-card p-10 rounded-[3rem]">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white khmer-glow">ចុះឈ្មោះនាវិកថ្មី</h2>
                <p class="text-gray-500 text-[10px] mt-2 uppercase tracking-[0.3em]">Recruiting New Explorers_</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="text-blue-400 text-[10px] font-bold uppercase mb-1 block tracking-widest">ឈ្មោះហៅក្រៅ (Full Name)</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        class="w-full bg-white/5 border-white/10 rounded-2xl text-white neon-input p-4 transition-all">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-400 text-xs" />
                </div>

                <div>
                    <label class="text-blue-400 text-[10px] font-bold uppercase mb-1 block tracking-widest">លេខសម្គាល់យាន (Email)</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        class="w-full bg-white/5 border-white/10 rounded-2xl text-white neon-input p-4 transition-all">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-xs" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-blue-400 text-[10px] font-bold uppercase mb-1 block tracking-widest">កូដសម្ងាត់</label>
                        <input id="password" type="password" name="password" required
                            class="w-full bg-white/5 border-white/10 rounded-2xl text-white neon-input p-4 transition-all">
                    </div>

                    <div>
                        <label class="text-blue-400 text-[10px] font-bold uppercase mb-1 block tracking-widest">ផ្ទៀងផ្ទាត់កូដ</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full bg-white/5 border-white/10 rounded-2xl text-white neon-input p-4 transition-all">
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-xs" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-400 text-xs" />

                <div class="pt-4 text-center">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 py-4 rounded-2xl font-bold text-white text-lg hover:shadow-[0_0_30px_rgba(37,99,235,0.4)] transition-all duration-500">
                        ចុះឈ្មោះចូលក្នុងបញ្ជី_
                    </button>

                    <a href="{{ route('login') }}" class="inline-block mt-6 text-xs text-gray-500 hover:text-blue-400 transition underline decoration-blue-500/30 underline-offset-4">
                        មានគណនីរួចហើយ? ចូលទៅកាន់ប្រព័ន្ធ
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>
</x-guest-layout>

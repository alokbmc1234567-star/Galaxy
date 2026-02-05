<section>
    <header class="mb-8">
        <h2 class="text-lg font-bold text-purple-400 uppercase tracking-widest font-space">ព័ត៌មានផ្ទាល់ខ្លួន</h2>
        <p class="mt-1 text-[10px] text-gray-500 uppercase tracking-tighter">Update your identity across the sector_</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label class="block text-[9px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-2">Name_</label>
            <input name="name" type="text" value="{{ old('name', $user->name) }}" required
                class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all">
        </div>

        <div>
            <label class="block text-[9px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-2">Email_Address_</label>
            <input name="email" type="email" value="{{ old('email', $user->email) }}" required
                class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all">
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl text-white text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-purple-900/20">
                រក្សាទុកទិន្នន័យ_
            </button>
        </div>
    </form>
</section>

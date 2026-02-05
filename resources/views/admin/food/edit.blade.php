<x-app-layout>
    <x-slot name="header">
        {{ __('កែសម្រួលមុខម្ហូប') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card shadow-[0_0_50px_rgba(0,0,0,0.4)] sm:rounded-[3.5rem] p-12 relative overflow-hidden">

                <div class="absolute -top-24 -right-24 w-64 h-64 bg-purple-600/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>

                <div class="text-center mb-10 relative z-10">
                    <div class="inline-block p-4 rounded-3xl bg-purple-600/10 border border-purple-500/20 mb-4">
                        <i data-lucide="edit-3" class="w-10 h-10 text-purple-400"></i>
                    </div>
                    <h2 class="font-space text-3xl font-black text-white tracking-tighter uppercase neon-text">កែសម្រួលទិន្នន័យ</h2>
                    <p class="text-[10px] text-gray-500 mt-2 italic uppercase tracking-[4px]">Entity_ID: #{{ $food->id }} | Modification Mode_</p>
                </div>

                <form action="{{ route('food.update', $food) }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">ឈ្មោះអាហារ (Entity Name)_</label>
                        <input type="text" name="name" value="{{ $food->name }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all shadow-inner">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">តម្លៃ (Credits)_</label>
                            <input type="number" name="price" value="{{ $food->price }}" step="0.01" required
                                class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">រូបភាពបច្ចុប្បន្ន_</label>
                            <div class="flex items-center space-x-4 bg-white/5 p-3 rounded-2xl border border-white/5">
                                <img src="{{ asset('storage/' . $food->image) }}" class="w-12 h-12 object-cover rounded-xl border border-white/10 shadow-lg">
                                <span class="text-[9px] text-gray-500 italic uppercase">Visual Active</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">ប្តូររូបភាពថ្មី (Optional)_</label>
                        <div class="relative group">
                            <input type="file" name="image" id="image" class="hidden" onchange="updateFileName()">
                            <label for="image" class="w-full flex items-center justify-center bg-purple-600/5 border-2 border-dashed border-white/10 rounded-2xl py-6 px-4 text-xs text-gray-400 cursor-pointer group-hover:border-purple-500/50 group-hover:bg-purple-600/10 transition-all duration-300">
                                <i data-lucide="upload-cloud" class="w-6 h-6 mr-3 text-purple-400"></i>
                                <span id="file-name">ជ្រើសរើសឯកសារថ្មី (PNG, JPG)...</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-6 flex flex-col space-y-4">
                        <button type="submit"
                            class="w-full py-5 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-3xl text-white text-xs font-black uppercase tracking-[0.4em] shadow-xl shadow-purple-900/40 hover:scale-[1.02] active:scale-95 transition-all duration-300">
                            ធ្វើបច្ចុប្បន្នភាពទិន្នន័យ_
                        </button>

                        <a href="{{ route('food.index') }}" class="text-center text-[10px] text-gray-500 hover:text-purple-400 uppercase tracking-[3px] transition-colors duration-300 flex items-center justify-center">
                            <i data-lucide="arrow-left" class="w-3 h-3 mr-2"></i> បោះបង់ និងត្រឡប់ក្រោយ
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // បញ្ឆេះ Lucide Icons ឡើងវិញ
        lucide.createIcons();

        // បង្ហាញឈ្មោះឯកសារដែលបានជ្រើសរើស
        function updateFileName() {
            const input = document.getElementById('image');
            const fileName = document.getElementById('file-name');
            if(input.files.length > 0) {
                fileName.textContent = "Selected: " + input.files[0].name;
                fileName.className = "text-purple-400 font-bold";
            }
        }
    </script>
</x-app-layout>

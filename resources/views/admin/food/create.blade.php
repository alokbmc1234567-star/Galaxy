<x-app-layout>
    <div class="py-12 min-h-screen" style="background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%);">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/5 backdrop-blur-2xl border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.4)] sm:rounded-[3.5rem] p-12 relative overflow-hidden">

                <div class="absolute -top-24 -left-24 w-48 h-48 bg-purple-600/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-blue-600/20 rounded-full blur-3xl"></div>

                <div class="text-center mb-10 relative">
                    <div class="inline-block p-4 rounded-3xl bg-gradient-to-tr from-purple-600/20 to-blue-600/20 border border-white/10 mb-4">
                        <i data-lucide="plus-circle" class="w-10 h-10 text-purple-400"></i>
                    </div>
                    <h2 class="font-space text-3xl font-black text-white tracking-tighter uppercase">បង្កើតរូបធាតុថ្មី</h2>
                    <p class="text-[10px] text-gray-500 mt-2 italic uppercase tracking-[4px]">Initiating new matter synthesis_</p>
                </div>

                <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">ឈ្មោះម្ហូប ឬភេសជ្ជៈ_</label>
                        <input type="text" name="name" required
                            class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white placeholder:text-gray-700 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all"
                            placeholder="បញ្ចូលឈ្មោះនៅទីនេះ...">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">តម្លៃសរុប ($)_</label>
                            <input type="number" name="price" step="0.01" required
                                class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all"
                                placeholder="0.00">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-purple-400 uppercase tracking-widest mb-3 ml-2">រូបភាពតំណាង_</label>
                            <div class="relative group">
                                <input type="file" name="image" id="image" class="hidden" onchange="updateFileName()">
                                <label for="image" class="w-full flex items-center justify-center bg-purple-600/10 border-2 border-dashed border-white/10 rounded-2xl py-3 px-4 text-xs text-gray-400 cursor-pointer group-hover:border-purple-500/50 transition-all">
                                    <i data-lucide="image" class="w-4 h-4 mr-2 text-purple-400"></i>
                                    <span id="file-name">ជ្រើសរើសរូបភាព</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full py-5 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 rounded-3xl text-white text-xs font-black uppercase tracking-[0.4em] shadow-xl shadow-purple-900/20 hover:shadow-purple-600/40 hover:scale-[1.02] active:scale-95 transition-all">
                            យល់ព្រមបញ្ចូលក្នុងប្រព័ន្ធ_
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('food.index') }}" class="text-[10px] text-gray-500 hover:text-white uppercase tracking-widest transition">
                            បោះបង់ប្រតិបត្តិការ
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
        function updateFileName() {
            const input = document.getElementById('image');
            const fileName = document.getElementById('file-name');
            if(input.files.length > 0) {
                fileName.textContent = input.files[0].name;
                fileName.classList.add('text-purple-400');
            }
        }
    </script>
</x-app-layout>

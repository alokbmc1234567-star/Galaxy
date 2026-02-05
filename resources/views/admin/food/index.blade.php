<x-app-layout>
    <div class="py-12 min-h-screen" style="background: radial-gradient(circle at center, #1B2735 0%, #090A0F 100%);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row justify-between items-center mb-10 px-4">
                <div>
                    <h2 class="font-space text-3xl font-black text-white tracking-tighter uppercase flex items-center">
                        <i data-lucide="orbit" class="mr-3 text-purple-500 animate-spin-slow"></i>
                        បញ្ជីភេសជ្ជៈ
                    </h2>
                    <p class="text-[10px] text-gray-500 mt-1 italic uppercase tracking-[4px]">Inventory of galactic matter_</p>
                </div>

                <a href="{{ route('food.create') }}"
                    class="mt-6 md:mt-0 px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl text-white text-xs font-black uppercase tracking-widest shadow-lg shadow-purple-600/20 hover:scale-105 active:scale-95 transition-all flex items-center">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> បញ្ចូលទិន្នន័យថ្មី
                </a>
            </div>

            <div class="bg-white/5 backdrop-blur-2xl border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.3)] sm:rounded-[3rem] overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 text-[10px] font-black text-purple-400 uppercase tracking-[3px]">
                            <th class="px-8 py-6">រូបធាតុ (Image)</th>
                            <th class="px-8 py-6">ឈ្មោះ (Name)</th>
                            <th class="px-8 py-6">តម្លៃ (Credits)</th>
                            <th class="px-8 py-6 text-right">បញ្ជាការ (Actions)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300 divide-y divide-white/5">
                        @foreach ($foods as $food)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-8 py-5">
                                <div class="relative w-16 h-16">
                                    <div class="absolute inset-0 bg-purple-500/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('storage/' . $food->image) }}"
                                         class="relative w-16 h-16 object-cover rounded-2xl border border-white/10 shadow-lg">
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-white">{{ $food->name }}</div>
                                <div class="text-[9px] text-gray-500 uppercase tracking-tighter">ID: {{ str_pad($food->id, 5, '0', STR_PAD_LEFT) }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-lg font-space font-black text-blue-400">${{ number_format($food->price, 2) }}</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('food.edit', $food) }}" class="p-2 bg-blue-500/10 text-blue-400 rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>

                                    <form action="{{ route('food.destroy', $food) }}" method="POST" onsubmit="return confirm('តើអ្នកប្រាកដថាចង់លុបធាតុនេះចេញពីចក្រវាល?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($foods->isEmpty())
                <div class="py-20 text-center">
                    <i data-lucide="box" class="w-16 h-16 text-gray-700 mx-auto mb-4"></i>
                    <p class="text-gray-500 italic uppercase tracking-widest text-xs">មិនទាន់មានទិន្នន័យនៅក្នុង Sector នេះឡើយ</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }
    </style>

    <script>
        lucide.createIcons();
    </script>
</x-app-layout>

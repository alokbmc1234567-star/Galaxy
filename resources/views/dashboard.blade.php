<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <i data-lucide="layout-dashboard" class="w-6 h-6 text-purple-500"></i>
            <span class="neon-text uppercase tracking-[0.3em] font-black italic">ផ្ទាំងបញ្ជាការចក្រវាល_</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-purple-500 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i data-lucide="coffee" class="w-24 h-24 text-purple-400"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[10px] uppercase tracking-[3px] text-gray-400 mb-1">Entity Count</p>
                        <h3 class="text-3xl font-space font-black text-white">
                            {{ \App\Models\Food::count() }} <span class="text-xs text-purple-500 tracking-tighter uppercase font-sans">មុខម្ហូប</span>
                        </h3>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-blue-500 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i data-lucide="users" class="w-24 h-24 text-blue-400"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[10px] uppercase tracking-[3px] text-gray-400 mb-1">Active Voyagers</p>
                        <h3 class="text-3xl font-space font-black text-white">
                            {{ \App\Models\User::count() }} <span class="text-xs text-blue-500 tracking-tighter uppercase font-sans">អ្នកប្រើប្រាស់</span>
                        </h3>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-emerald-500 relative overflow-hidden group text-emerald-400">
                    <div class="absolute -right-4 -top-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i data-lucide="zap" class="w-24 h-24 text-emerald-400"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[10px] uppercase tracking-[3px] text-gray-400 mb-1">System Status</p>
                        <h3 class="text-xl font-space font-black uppercase tracking-widest">Online_</h3>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-[2.5rem] overflow-hidden border border-white/10 shadow-2xl">
                <div class="p-8 border-b border-white/5 flex justify-between items-center bg-white/5">
                    <div>
                        <h3 class="text-lg font-bold text-white uppercase tracking-widest">បញ្ជីទិន្នន័យរូបធាតុ (Food Entities)</h3>
                        <p class="text-[10px] text-gray-500 italic mt-1 uppercase tracking-[2px]">គ្រប់គ្រង និងកែសម្រួលទិន្នន័យក្នុងចក្រវាល_</p>
                    </div>
                    <a href="{{ route('food.create') }}" class="px-6 py-2.5 bg-purple-600 hover:bg-white hover:text-purple-900 rounded-full text-[10px] font-black uppercase tracking-widest transition-all duration-300 shadow-[0_0_20px_rgba(147,51,234,0.3)] flex items-center">
                        <i data-lucide="plus" class="w-3 h-3 mr-2"></i> បន្ថែមថ្មី
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-black/30">
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[3px] text-purple-400 font-black">រូបភាព</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[3px] text-purple-400 font-black">ឈ្មោះ</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[3px] text-purple-400 font-black">តម្លៃ</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[3px] text-purple-400 font-black text-center">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @php $foods = \App\Models\Food::latest()->get(); @endphp
                            @foreach($foods as $food)
                            <tr class="hover:bg-white/[0.02] transition-colors group">
                                <td class="px-8 py-4">
                                    <img src="{{ asset('storage/' . $food->image) }}" class="w-14 h-14 object-cover rounded-2xl border border-white/10 group-hover:border-purple-500/50 transition-all">
                                </td>
                                <td class="px-8 py-4">
                                    <div class="text-sm font-bold text-white">{{ $food->name }}</div>
                                    <div class="text-[9px] text-gray-500 uppercase tracking-tighter italic">ID: #GXY-{{ $food->id }}</div>
                                </td>
                                <td class="px-8 py-4">
                                    <span class="text-emerald-400 font-space text-sm">${{ number_format($food->price, 2) }}</span>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('food.edit', $food) }}" class="p-2.5 bg-blue-500/10 text-blue-400 rounded-xl hover:bg-blue-500 hover:text-white transition-all shadow-lg active:scale-90 border border-blue-500/20">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('food.destroy', $food) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុប Entity នេះឬ?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2.5 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-lg active:scale-90 border border-red-500/20">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

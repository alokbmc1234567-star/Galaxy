<?php

namespace App\Http\Controllers;

// រាល់ Use Statements ទាំងអស់ត្រូវនៅទីនេះ
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    // បង្ហាញបញ្ជីអាហារទាំងអស់ (Menu Food)
    public function index() {
        $foods = Food::all();
        return view('admin.food.index', compact('foods'));
    }

    // បង្ហាញ Form សម្រាប់បង្កើតអាហារថ្មី (Form Create)
    public function create() {
        return view('admin.food.create');
    }

    // មុខងាររក្សាទុកទិន្នន័យទៅក្នុង Database (Save Button Logic)
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('foods', 'public');
            $data['image'] = $path;
        }

        Food::create($data); // ប្រើ Food:: ដោយផ្ទាល់ព្រោះយើងបាន use វានៅខាងលើហើយ
        return redirect()->route('food.index')->with('success', 'អាហារត្រូវបានរក្សាទុកក្នុងបញ្ជី! 🌸');
    }

    // ១. បង្ហាញ Form សម្រាប់កែប្រែទិន្នន័យ (Edit Form)
    public function edit($id) {
        $food = Food::findOrFail($id);
        return view('admin.food.edit', compact('food'));
    }

    // ២. ធ្វើបច្ចុប្បន្នភាពទិន្នន័យ (Update Logic)
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $food = Food::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // លុបរូបភាពចាស់ចេញពី Storage
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            // រក្សាទុករូបភាពថ្មី
            $path = $request->file('image')->store('foods', 'public');
            $data['image'] = $path;
        }

        $food->update($data);
        return redirect()->route('food.index')->with('success', 'ទិន្នន័យត្រូវបានធ្វើបច្ចុប្បន្នភាពរួចរាល់! 🛸');
    }

    // ៣. លុបទិន្នន័យ (Delete Logic)
    public function destroy($id) {
        $food = Food::findOrFail($id);

        // លុបរូបភាពចេញពី Folder មុននឹងលុបទិន្នន័យក្នុង DB (សំខាន់ណាស់!)
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();
        return redirect()->route('food.index')->with('success', 'មុខម្ហូបត្រូវបានលុបចេញ!');
    }
}

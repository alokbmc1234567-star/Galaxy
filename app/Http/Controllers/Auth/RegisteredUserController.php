<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // ១. ត្រួតពិនិត្យទិន្នន័យពី Form ចុះឈ្មោះ
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ២. បង្កើត User ថ្មីដោយកំណត់ Role ជា 'user' ជាស្វ័យប្រវត្តិ
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // បន្ថែមចំណុចនេះ ដើម្បីកំណត់សិទ្ធិឱ្យ User ធម្មតា
        ]);

        event(new Registered($user));

        // ៣. ធ្វើការ Login ចូលប្រព័ន្ធភ្លាមៗក្រោយចុះឈ្មោះ
        Auth::login($user);

        // ៤. បែងចែកផ្លូវ Redirect ទៅតាមសិទ្ធិ (Role)
        // ប្រសិនបើជា Admin ឱ្យទៅកាន់ Dashboard
        if ($user->role === 'admin') {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // ប្រសិនបើជា User ធម្មតា ឱ្យត្រឡប់ទៅទំព័រដើមវិញ (ដើម្បីកុំឱ្យជាប់ Middleware role:admin)
        return redirect('/')->with('success', 'ចុះឈ្មោះបានជោគជ័យ! ស្វាគមន៍មកកាន់ Galaxy World។');
    }
}

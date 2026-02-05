<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // បន្ថែមបន្ទាត់នេះដើម្បីបាត់ Error 'check'

class RoleManager
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // ឆែកថាបាន Login ឬនៅ
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ឆែក Role របស់ User
        if ($request->user()->role !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}

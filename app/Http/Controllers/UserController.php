<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('dashboard', compact('user'));
    }

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('verified') && $request->verified !== null) {
            $verified = $request->verified === '1';
            $query->whereNotNull('email_verified_at', $verified);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%$search%")
                  ->orWhere('email', 'ILIKE', "%$search%");
            });
        }

        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }
}

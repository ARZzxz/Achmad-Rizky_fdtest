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

        if ($request->has('verified')) {
            $query->whereNotNull('email_verified_at');
        }

        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->paginate(10);
        return view('users.index', compact('users'));
    }
}

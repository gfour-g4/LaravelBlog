<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            abort(403);
        }
        $users = User::orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            abort(403);
        }
        
        $request->validate([
            'role' => 'required|in:user,author,admin',
        ]);

        if ($user->isAdmin() && $request->role !== 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return redirect()->route('users.index')->with('error', 'Cannot remove the last admin role. There must be at least one admin.');
            }
        }

        $user->update([
            'role' => $request->role,
        ]);
        
        return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    }
}

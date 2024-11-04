<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::query();

        // Filter berdasarkan role
        if (request('type')) {
            if (request('type') === 'admin') {
                $users->where('type', 1); // 1 untuk admin
            } elseif (request('type') === 'user') {
                $users->where('type', 0); // 0 untuk user
            }
        }

        // Filter berdasarkan pencarian nama
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
        }

        $userCount = User::count();

        return view('admin.users.user', compact('userCount'), ['users' => $users->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)],
            'type' => ['required']
        ]);

        //create user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ]);

        return redirect('/admin/users')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     * 
     * show
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * edit
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * 
     *  update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)],
            'type' => ['required']
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ]);

        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with(['success' => 'Pengguna Berhasil Dihapus']);
    }

    public function trash(): View
    {
        // Mengambil hanya data pengguna yang di-*soft delete*
        $trashedUsers = User::onlyTrashed()->get();
        $trashedUserCount = User::onlyTrashed()->count();

        return view('admin.users.trash', compact('trashedUsers', 'trashedUserCount'));
    }

    public function restore($id): RedirectResponse
    {
        // Mencari pengguna yang di-soft delete berdasarkan ID dan mengembalikannya
        $trashedUsers = User::onlyTrashed()->findOrFail($id);
        $trashedUsers->restore();

        return redirect()->route('admin.users.trash')->with('success', 'Pengguna berhasil dipulihkan.');
    }
}

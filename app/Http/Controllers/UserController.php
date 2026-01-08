<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user
     */
    public function index(Request $request)
    {
        // $users = User::paginate(8)->onEachSide(2);
        $query = User::query();

    // 1️⃣ FILTER DASAR
    $query->where('role', 'user');

    // 2️⃣ FILTER A–Z / Z–A
    $sort = $request->get('sort', 'asc');
    $query->orderBy('name', $sort);

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    $users = $query->paginate(8)->withQueryString();
    return view('admin.users.index', compact('users'));
    }

    /**
     * Tampilkan form create
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Simpan user baru + foto profil
     */
    public function store(Request $request)
    {
        // VALIDASI
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // UPLOAD FOTO (JIKA ADA)
        $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')
            ->store('users', 'public');
        }

        // HASH PASSWORD
        $data['password'] = Hash::make($data['password']);

        // SIMPAN KE DATABASE
         User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'photo'    => $photoPath
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user + foto profil
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // VALIDASI
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // UPDATE FOTO (JIKA ADA)
        if ($request->hasFile('photo')) {

            // HAPUS FOTO LAMA
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        // UPDATE PASSWORD JIKA DIISI
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user + foto profil
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // HAPUS ABSENSI TERLEBIH DAHULU
        if ($user->absensis()->count() > 0) {
            $user->absensis()->delete();
        }

        // HAPUS FOTO
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

}

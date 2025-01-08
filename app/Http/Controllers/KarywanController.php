<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarywanController extends Controller
{
    //

    public function index()
    {
        $users = User::get();
        $data = Employee::with('user', 'group')->get();
        $groups = Group::all();
        return view("admin.karyawan.index", compact('data', 'users', 'groups'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nip' => 'required|string|max:255|unique:employees,nip',
            'divisi' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|in:active,non-active',
            'user_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        // Proses upload file jika ada gambar
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filePath = $file->store('profile_images', 'public');
            $validated['profile_image'] = $filePath;
        }

        // Simpan data karyawan
        Employee::create([
            'profile_image' => $validated['profile_image'] ?? null,
            'nip' => $validated['nip'],
            'divisi' => $validated['divisi'],
            'departement' => $validated['departement'],
            'position' => $validated['position'],
            'status' => $validated['status'],
            'user_id' => $validated['user_id'],
            'group_id' => $validated['group_id'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function destroy(Request $request, $id)
    {
        Employee::where('id', $id)->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus!.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nip' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|in:active,non-active',
            'user_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        // Cari karyawan berdasarkan ID
        $karyawan = Employee::findOrFail($id);

        // Jika ada file gambar baru yang diunggah, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($karyawan->profile_image) {
                Storage::delete($karyawan->profile_image);
            }

            // Simpan gambar baru
            $path = $request->file('profile_image')->store('profile_images');
            $validated['profile_image'] = $path;
        }

        // Update data karyawan
        $karyawan->update($validated);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    //

    public function index()
    {
        $groups = Group::all();
        return view("admin.golongan.index", compact('groups'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'minimum_wage' => 'required',
                'maximum_wage' => 'required',
                'level' => 'required'
            ]
        );

        Group::create($validated);
        return redirect()->back()->with('success', "Berhasil menambahkan data golongan!");
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'minimum_wage' => 'required',
                'maximum_wage' => 'required',
                'level' => 'required'
            ]
        );

        $group = Group::where('id', $id)->first();
        if ($group) {
            $group->update($validated);
            return redirect()->back()->with('success', 'Berhasil update golongan!');
        }
        return redirect()->back()->with('error', 'Golongan tidak ditemukan');
    }

    public function destroy($id)
    {
        $group =   Group::findOrFail($id);
        $group->delete();
        return redirect()->back()->with('success', 'Berhasil hapus golongan!');
    }
}

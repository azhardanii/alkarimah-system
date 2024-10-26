<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::all();
        return view('pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('pengurus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengurus' => 'required',
            'jabatan' => 'required',
            'no_hp_pengurus' => 'required',
        ]);

        Pengurus::create($validated);
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    public function edit(Pengurus $penguru)
    {
        return view('pengurus.edit', compact('penguru'));
    }

    public function update(Request $request, Pengurus $penguru)
    {
        $validated = $request->validate([
            'nama_pengurus' => 'required',
            'jabatan' => 'required',
            'no_hp_pengurus' => 'required',
        ]);

        $penguru->update($validated);
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $penguru)
    {
        $penguru->delete();
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil dihapus.');
    }
}

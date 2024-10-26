<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankSoal;

class BankSoalController extends Controller
{
    public function index()
    {
        $bankSoal = BankSoal::all();
        return view('bank-soal.index', compact('bankSoal'));
    }

    public function create()
    {
        return view('bank_soal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_pelajaran' => 'required',
            'tingkat' => 'required',
            'file_soal' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('file_soal')) {
            $filePath = $request->file('file_soal')->store('bank_soal', 'public');
            $validated['file_soal'] = basename($filePath);
        }

        BankSoal::create($validated);
        return redirect()->route('bank-soal.index')->with('success', 'Data soal berhasil ditambahkan.');
    }

    public function edit(BankSoal $bankSoal)
    {
        return view('bank_soal.edit', compact('bankSoal'));
    }

    public function update(Request $request, BankSoal $bankSoal)
    {
        $validated = $request->validate([
            'mata_pelajaran' => 'required',
            'tingkat' => 'required',
            'file_soal' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('file_soal')) {
            $filePath = $request->file('file_soal')->store('bank_soal', 'public');
            $validated['file_soal'] = basename($filePath);
        }

        $bankSoal->update($validated);
        return redirect()->route('bank-soal.index')->with('success', 'Data soal berhasil diperbarui.');
    }

    public function destroy(BankSoal $bankSoal)
    {
        $bankSoal->delete();
        return redirect()->route('bank-soal.index')->with('success', 'Data soal berhasil dihapus.');
    }
}

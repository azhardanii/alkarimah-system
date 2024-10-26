<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;
use App\Models\Santri;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $totalSantri = Santri::count();
    $totalSantriPutra = Santri::where('gender', 'Putra')->count();
    $totalSantriPutri = Santri::where('gender', 'Putri')->count();
    $totalSantriAktif = Santri::where('status_pondok', 'Aktif')->count();
    $totalAlumniSantri = Santri::where('status_pondok', '!=', 'Aktif')->count();
    $totalAlumniLulus = Santri::where('status_pondok', 'Alumni')->count();

    return view('dashboard', compact('totalSantri', 'totalSantriPutra', 'totalSantriPutri', 
                                     'totalSantriAktif', 'totalAlumniSantri', 'totalAlumniLulus'));
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // ROUTE SANTRI
    Route::resource('santri', SantriController::class)->except(['show']);
    Route::get('santri/{nis}', [SantriController::class, 'show'])->name('santri.show');
    Route::get('santri/{nis}/pdfdetail', [SantriController::class, 'generatePDF'])->name('santri.pdfdetail');

    // ROUTE PEMBAYARAN
    Route::resource('pembayaran', PembayaranController::class);
    Route::post('pembayaran/{id_pembayaran}/bayar', [PembayaranController::class, 'markAsPaid'])->name('pembayaran.bayar');
    Route::get('pembayaran/{id_pembayaran}/print', [PembayaranController::class, 'printReceipt'])->name('pembayaran.print');
    Route::post('pembayaran/lunas', [PembayaranController::class, 'updateStatusLunas'])->name('pembayaran.lunas');
    Route::post('pembayaran/cicil', [PembayaranController::class, 'cicilPembayaran'])->name('pembayaran.cicil');
    Route::post('pembayaran/cetak', [PembayaranController::class, 'cetakNota'])->name('pembayaran.cetak');
    Route::put('/pembayaran/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayaran.update');

    // ROUTE PENGURUS
    Route::resource('pengurus', PengurusController::class)->except(['show']);

    // ROUTE BANK SOAL
    Route::resource('bank-soal', BankSoalController::class)->except(['show']);

    // ROUTE USER PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

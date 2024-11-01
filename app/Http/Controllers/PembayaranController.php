<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Santri;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('santri')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $santris = Santri::where('status_pondok', 'Aktif')->get();
        return view('pembayaran.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_pembayaran' => 'nullable|string',
            'tagihan' => 'nullable|string',
            'nama_pembayaran' => 'nullable|string',
            'jumlah' => 'required',
            'santri_nis' => 'required_if:jenis_pembayaran,Lainnya|exists:santris,nis'
        ]);

        Pembayaran::create([
            'id_pembayaran' => $request->santri_nis.now()->format('YmdHis').mt_rand(1000, 9999),
            'santri_nis' => $request->santri_nis,
            'jenis_pembayaran' => 'Lainnya',
            'nama_pembayaran' => $request->nama_pembayaran,
            'tagihan' => config('app.bulan_indo')[Carbon::parse($request->tagihan)->format('F')] . ' ' . Carbon::parse($request->tagihan)->format('Y'),
            'jumlah' => $request->jumlah,
            'sisa' => $request->jumlah,
            'status_pembayaran' => 'Belum Dibayar',
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $santris = Santri::where('status_pondok', 'Aktif')->get();
        return view('pembayaran.edit', compact('pembayaran', 'santris'));
    }

    public function update(Request $request, $id_pembayaran)
    {
        $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        try {
            $pembayaran = Pembayaran::findOrFail($id_pembayaran);
            $pembayaran->nama_pembayaran = $request->nama_pembayaran;
            $pembayaran->jumlah = $request->jumlah;
            $pembayaran->save();

            return redirect()->back()->with('success', 'Pembayaran Berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Gagal Memperbarui Data Pembayaran.');
        }
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function markAsPaid($id_pembayaran)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id_pembayaran)->firstOrFail();
        $pembayaran->status_pembayaran = 'Sudah Lunas';
        $pembayaran->save();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran Telah Dibayar Lunas.');
    }

    public function printReceipt($id_pembayaran)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id_pembayaran)->firstOrFail();
        $pdf = PDF::loadView('pembayaran.receipt', compact('pembayaran'));

        return $pdf->stream('receipt_' . $pembayaran->id_pembayaran . '.pdf');
    }

    public function updateStatusLunas(Request $request)
    {
        $selectedPayments = $request->input('selected_payments', []);

        if (is_array($selectedPayments) && count($selectedPayments) > 0) {
            foreach ($selectedPayments as $paymentId) {
                $pembayaran = Pembayaran::findOrFail($paymentId);

                $pembayaran->status_pembayaran = 'Sudah Lunas';

                $riwayatCicilan = json_decode($pembayaran->riwayat, true) ?? [];
                $riwayatCicilan[] = [
                    'tanggal' => now()->format('d-m-Y'),
                    'nominal' => $pembayaran->sisa,
                    'sisa' => 0
                ];
                $pembayaran->riwayat = json_encode($riwayatCicilan);

                $pembayaran->sisa = 0;
                $pembayaran->save();
            }
            return redirect()->back()->with('success', 'Pembayaran Berhasil Dilunasi.');
        }
    }

    public function cicilPembayaran(Request $request)
    {
        $request->validate([
            'selected_payments' => 'required|array',
            'nominal' => 'required|array',
            'nominal.*' => 'min:0'
        ]);

        DB::beginTransaction();

        try {
            foreach ($request->selected_payments as $paymentId) {
                $pembayaran = Pembayaran::findOrFail($paymentId);
                $nominalCicilan = $request->nominal[$paymentId] ?? 0;

                if ($pembayaran->sisa <= 0) { continue; }

                $sisaTunggakanBaru = max($pembayaran->sisa - $nominalCicilan, 0);
                $pembayaran->sisa = $sisaTunggakanBaru;

                $riwayatCicilan = json_decode($pembayaran->riwayat, true) ?? [];
                $riwayatCicilan[] = [
                    'tanggal' => now()->format('d-m-Y'),
                    'nominal' => $nominalCicilan,
                    'sisa' => $sisaTunggakanBaru
                ];
                $pembayaran->riwayat = json_encode($riwayatCicilan);

                if ($sisaTunggakanBaru <= 0) { 
                    $pembayaran->status_pembayaran = 'Sudah Lunas'; 
                } else {
                    $pembayaran->status_pembayaran = 'Sedang Dicicil'; 
                }

                $pembayaran->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran Cicilan Berhasil Disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi Kesalahan Saat Menyimpan Cicilan Pembayaran.');
        }
    }

    public function inputSPP(Request $request)
    {
        $tagihan = config('app.bulan_indo')[now()->format('F')] . ' ' . now()->format('Y');
        $santris = Santri::where('status_pondok', 'Aktif')->get();

        foreach ($santris as $santri) {
            $existingTagihan = Pembayaran::where('santri_nis', $santri->nis)
                ->where('jenis_pembayaran', 'SPP')
                ->where('tagihan', $tagihan)
                ->exists();

            if ($existingTagihan) {
                continue;
            }

            $biayaSPP = ($santri->jadwal_makan == '3x Sehari') ? 450000 : 350000;

            Pembayaran::create([
                'id_pembayaran' => $santri->nis . now()->format('YmdHis') . mt_rand(1000, 9999),
                'santri_nis' => $santri->nis,
                'jenis_pembayaran' => 'SPP',
                'nama_pembayaran' => 'SPP',
                'tagihan' => $tagihan,
                'sisa' => $biayaSPP,
                'jumlah' => $biayaSPP,
                'status_pembayaran' => 'Belum Dibayar',
            ]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Tagihan SPP Bulan Ini berhasil Ditambahkan.');
    }
}

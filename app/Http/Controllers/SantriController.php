<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Http\Requests\StoreSantriRequest;
use App\Http\Requests\UpdateSantriRequest;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::orderBy('updated_at', 'desc')->get();
        return view('santri.index', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSantriRequest $request)
    {
        $validated = $request->validate([
            'nama_santri' => 'required',
            'nisn' => 'nullable|integer|max:9999999999',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'foto_santri' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'gender' => 'required',
            'agama' => 'required',
            'anak_ke' => 'nullable',
            'alamat_santri' => 'nullable',
            'status_keluarga' => 'required',
            'status_pondok' => 'required',
            'no_hp_santri' => 'nullable',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'nama_bapak' => 'nullable',
            'nama_ibu' => 'nullable',
            'pekerjaan_bapak' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'alamat_ortu' => 'nullable',
            'no_hp_ortu' => 'nullable',
            'nama_wali' => 'nullable',
            'no_hp_wali' => 'nullable',
            'alamat_wali' => 'nullable',
            'status_pendaftaran' => 'nullable',
            'jenjang_diniyah' => 'nullable',
            'jenjang_formal' => 'nullable',
            'jadwal_makan' => 'required',
            'sekolah_santri' => 'nullable',
            'starter_kit' => 'nullable|boolean'
        ]);

        $lastNIS = DB::table('santris')
                        ->select(DB::raw('CAST(SUBSTR(nis, 7, 4) AS UNSIGNED) as last_nis_number'))
                        ->orderBy('last_nis_number', 'desc')->first();
        if (!empty($validated['tanggal_masuk'])) {
            $kodeTahun = substr($validated['tanggal_masuk'], 2, 2);
        } else {
            $kodeTahun = '00';
        }
        if ($lastNIS) {
            $lastNisNumber = (int) $lastNIS->last_nis_number + 1;
        } else {
            $lastNisNumber = 1;
        }
        $newNIS = '1401' . $kodeTahun . str_pad($lastNisNumber, 4, '0', STR_PAD_LEFT);

        $santri = new Santri();
        $santri->nis = $newNIS;
        $santri->nama_santri = $validated['nama_santri'];
        $santri->nisn = $validated['nisn'];
        $santri->tempat_lahir = $validated['tempat_lahir'];
        $santri->tanggal_lahir = $validated['tanggal_lahir'];
        $santri->gender = $validated['gender'];
        $santri->agama = $validated['agama'];
        $santri->anak_ke = $validated['anak_ke'];
        $santri->alamat_santri = $validated['alamat_santri'];
        $santri->status_keluarga = $validated['status_keluarga'];
        $santri->status_pondok = $validated['status_pondok'];
        $santri->no_hp_santri = '62' . $validated['no_hp_santri'];
        $santri->tanggal_masuk = $validated['tanggal_masuk'];
        $santri->tanggal_keluar = $validated['tanggal_keluar'];
        $santri->nama_bapak = $validated['nama_bapak'];
        $santri->nama_ibu = $validated['nama_ibu'];
        $santri->pekerjaan_bapak = $validated['pekerjaan_bapak'];
        $santri->pekerjaan_ibu = $validated['pekerjaan_ibu'];
        $santri->alamat_ortu = $validated['alamat_ortu'];
        $santri->no_hp_ortu = '62' . $validated['no_hp_ortu'];
        $santri->nama_wali = $validated['nama_wali'];
        $santri->no_hp_wali = '62' . $validated['no_hp_wali'];
        $santri->alamat_wali = $validated['alamat_wali'];
        $santri->jenjang_formal = $validated['jenjang_formal'];
        $santri->jenjang_diniyah = $validated['jenjang_diniyah'];
        $santri->status_pendaftaran = $validated['status_pendaftaran'];
        $santri->jadwal_makan = $validated['jadwal_makan'];
        $santri->sekolah_santri = $validated['sekolah_santri'];

        if ($request->hasFile('foto_santri')) {
            $fotoPath = $request->file('foto_santri')->store('foto_santri', 'public');
            $santri->foto_santri = basename($fotoPath);
        }

        $santri->save();

        if ($request->starter_kit) {
            $seragamJumlah = ($request->gender == 'Putra') ? 150000 : 350000;

            $starterKitItems = [
                ['nama_pembayaran' => 'Pembelian Kitab', 'jumlah' => 350000],
                ['nama_pembayaran' => 'Biaya Sewa Lemari', 'jumlah' => 150000],
                ['nama_pembayaran' => 'Rapot Santri', 'jumlah' => 50000],
                ['nama_pembayaran' => 'Pembelian Seragam', 'jumlah' => $seragamJumlah],
                ['nama_pembayaran' => 'Biaya Pendaftaran', 'jumlah' => 1000000],
            ];

            foreach ($starterKitItems as $item) {
                Pembayaran::create([
                    'id_pembayaran' => $newNIS.now()->format('YmdHis').mt_rand(1000, 9999),
                    'santri_nis' => $newNIS,
                    'jenis_pembayaran' => 'Lainnya',
                    'nama_pembayaran' => $item['nama_pembayaran'],
                    'tagihan' => config('app.bulan_indo')[Carbon::parse($request->tagihan)->format('F')] . ' ' . Carbon::parse($request->tagihan)->format('Y'),
                    'jumlah' => $item['jumlah'],
                    'sisa' => $item['jumlah'],
                    'status_pembayaran' => 'Belum Dibayar',
                ]);
            }

            $sppJumlah = ($request->jadwal_makan == '3x Sehari') ? 450000 : 350000;

            Pembayaran::create([
                'id_pembayaran' => $newNIS.now()->format('YmdHis').mt_rand(1000, 9999),
                'santri_nis' => $newNIS,
                'jenis_pembayaran' => 'SPP',
                'nama_pembayaran' => 'SPP',
                'tagihan' => config('app.bulan_indo')[Carbon::parse($request->tagihan)->format('F')] . ' ' . Carbon::parse($request->tagihan)->format('Y'),
                'jumlah' => $sppJumlah,
                'sisa' => $sppJumlah,
                'status_pembayaran' => 'Belum Dibayar',
            ]);
        }

        return redirect()->route('santri.index')->with('success', 'Data Santri Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $santri = Santri::where('nis', $nis)->with(['pembayaran' => function ($query) {
            $query->orderByRaw("
                CASE
                    WHEN status_pembayaran = 'Belum Dibayar' THEN 1
                    WHEN status_pembayaran = 'Sedang Dicicil' THEN 2
                    WHEN status_pembayaran = 'Sudah Lunas' THEN 3
                    ELSE 99
                END
            ")->orderByRaw("STR_TO_DATE(CONCAT(tagihan, ' 1'), '%M %Y %e') DESC");
        }])->firstOrFail();

        return view('santri.detail', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nis)
    {
        $santri = Santri::where('nis', $nis)->firstOrFail();
        return view('santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSantriRequest $request, $nis)
    {
        $validated = $request->validate([
            'nama_santri' => 'required',
            'nisn' => 'nullable|integer|max:9999999999',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'foto_santri' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'gender' => 'required',
            'agama' => 'required',
            'anak_ke' => 'nullable',
            'alamat_santri' => 'nullable',
            'status_keluarga' => 'required',
            'status_pondok' => 'required',
            'no_hp_santri' => 'nullable',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'nama_bapak' => 'nullable',
            'nama_ibu' => 'nullable',
            'pekerjaan_bapak' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'alamat_ortu' => 'nullable',
            'no_hp_ortu' => 'nullable',
            'nama_wali' => 'nullable',
            'no_hp_wali' => 'nullable',
            'alamat_wali' => 'nullable',
            'status_pendaftaran' => 'nullable',
            'jenjang_diniyah' => 'nullable',
            'jenjang_formal' => 'nullable',
            'jadwal_makan' => 'required',
            'sekolah_santri' => 'nullable',
        ]);

        $santri = Santri::findOrFail($nis);

        $santri->nama_santri = $validated['nama_santri'];
        $santri->nisn = $validated['nisn'];
        $santri->tempat_lahir = $validated['tempat_lahir'];
        $santri->tanggal_lahir = $validated['tanggal_lahir'];
        $santri->gender = $validated['gender'];
        $santri->agama = $validated['agama'];
        $santri->anak_ke = $validated['anak_ke'];
        $santri->alamat_santri = $validated['alamat_santri'];
        $santri->status_keluarga = $validated['status_keluarga'];
        $santri->status_pondok = $validated['status_pondok'];
        $santri->jenjang_formal = $validated['jenjang_formal'];
        $santri->jenjang_diniyah = $validated['jenjang_diniyah'];
        $santri->status_pendaftaran = $validated['status_pendaftaran'];
        $santri->jadwal_makan = $validated['jadwal_makan'];
        $santri->sekolah_santri = $validated['sekolah_santri'];

        if (!empty($validated['no_hp_santri'])) {
            if (substr($validated['no_hp_santri'], 0, 2) === '62') {
                $santri->no_hp_santri = $validated['no_hp_santri'];
            } else { $santri->no_hp_santri = '62' . $validated['no_hp_santri']; }
        }

        $santri->tanggal_masuk = $validated['tanggal_masuk'];
        $santri->tanggal_keluar = $validated['tanggal_keluar'];
        $santri->nama_bapak = $validated['nama_bapak'];
        $santri->nama_ibu = $validated['nama_ibu'];
        $santri->pekerjaan_bapak = $validated['pekerjaan_bapak'];
        $santri->pekerjaan_ibu = $validated['pekerjaan_ibu'];
        $santri->alamat_ortu = $validated['alamat_ortu'];

        if (!empty($validated['no_hp_ortu'])) {
            if (substr($validated['no_hp_ortu'], 0, 2) === '62') {
                $santri->no_hp_ortu = $validated['no_hp_ortu'];
            } else { $santri->no_hp_ortu = '62' . $validated['no_hp_ortu']; }
        }

        $santri->nama_wali = $validated['nama_wali'];
        $santri->alamat_wali = $validated['alamat_wali'];

        if (!empty($validated['no_hp_wali'])) {
            if (substr($validated['no_hp_wali'], 0, 2) === '62') {
                $santri->no_hp_wali = $validated['no_hp_wali'];
            } else { $santri->no_hp_wali = '62' . $validated['no_hp_wali']; }
        }

        if ($request->hasFile('foto_santri')) {
            $fotoPath = $request->file('foto_santri')->store('foto_santri', 'public');
            $santri->foto_santri = basename($fotoPath);
        }

        if (!empty($validated['tanggal_masuk'])) {
            $kodeTahun = substr($validated['tanggal_masuk'], 2, 2);
        } else { $kodeTahun = '00'; }
        $lastNisNumber = substr($santri->nis, 6);
        if (!empty($validated['tanggal_masuk']) || $kodeTahun === '00') {
            $newNIS = '1401' . $kodeTahun . $lastNisNumber;
            $santri->nis = $newNIS;
        }

        $santri->save();

        return redirect()->route('santri.index')->with('success', 'Data Santri Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        $santri = Santri::where('nis', $nis)->firstOrFail();
        $santri->delete();
        return redirect()->route('santri.index')->with('success', 'Data Santri Berhasil Dihapus.');
    }

    public function generatePDF($nis)
    {
        $santri = Santri::where('nis', $nis)->firstOrFail();
        $pdf = PDF::loadView('santri.pdfdetail', compact('santri'));

        return $pdf->stream('santri_alkarimah_' . $santri->nis . '.pdf');
    }
}

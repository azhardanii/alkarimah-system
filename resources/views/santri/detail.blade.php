@if (session('success'))
<div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 10000)" aria-live="assertive" class="fixed inset-0 flex justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
    <div class="w-full flex flex-col items-center space-y-4">
      <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="p-4">
          <div class="flex items-start">
            <div class="flex-shrink-0">
              <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <p class="text-sm font-medium text-gray-900">{{ session('success') }}</p>
              <p class="mt-1 text-sm text-gray-500">Notifikasi ini otomatis hilang dalam 10 detik.</p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
              <button @click="open = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endif

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-auto py-3 px-4 sm:py-9 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                        <div class="lg:row-end-1 lg:col-span-3">
                            <div class="rounded-lg overflow-hidden">
                                <img 
                                    src="{{ $santri->foto_santri 
                                        ? url('storage/foto_santri/' . $santri->foto_santri) 
                                        : ($santri->gender == 'Putri' 
                                            ? 'https://i.pinimg.com/736x/38/68/27/3868276aa524d3a9154177cfde88471f.jpg' 
                                            : 'https://i.pinimg.com/236x/3b/ab/00/3bab002bfeabef22dc206966ca1070cd.jpg') 
                                    }}" class="object-center object-cover w-full" />
                            </div>
                        </div>

                        <div class="w-full mx-auto mt-14 sm:mt-16 lg:mt-0 lg:row-span-2 lg:col-span-4">
                        <div class="flex flex-col-reverse">
                            <p class="text-sm text-gray-500">Anak {{ $santri->nama_bapak }}</p>
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl mb-0.5">{{ $santri->nama_santri }}</h1>

                            <div>
                                <div class="flex items-center">
                                    <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full mb-1
                                    {{
                                        match($santri->status_pondok) {
                                            'Aktif' => 'bg-green-100 text-green-800',
                                            'Tidak Aktif' => 'bg-orange-100 text-orange-800',
                                            'Alumni' => 'bg-blue-100 text-blue-800',
                                            default => ''
                                        }
                                    }}
                                    "> {{ $santri->status_pondok }} </span>
                                </div>
                            </div>
                        </div>

                        <p class="text-gray-500 mt-6">{{ $santri->alamat_ortu }}</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-3">
                            <a href="https://wa.me/{{ $santri->no_hp_ortu }}" target="_blank" class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                <svg class="h-4 w-4 text-white mr-1"  fill="none" viewBox="0 0 24 24" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
                                Hubungi ORTU
                            </a>
                            <a href="https://wa.me/{{ $santri->no_hp_wali }}" target="_blank" class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                <svg class="h-4 w-4 text-white mr-1"  fill="none" viewBox="0 0 24 24" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
                                Hubungi Wali
                            </a>
                            <a href="https://wa.me/{{ $santri->no_hp_santri }}" target="_blank" class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                <svg class="h-4 w-4 text-white mr-1"  fill="none" viewBox="0 0 24 24" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
                                Hubungi Santri
                            </a>
                        </div>
                        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-4">
                            <a href="{{ route('santri.edit', $santri->nis) }}" type="button" class="w-full bg-indigo-50 border-2 border-indigo-700 rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-indigo-700 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                <svg class="h-5 w-5 text-indigo-700 mr-1"  fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                                Edit Data Santri
                            </a>
                        </div>

                        <div class="mt-5 pt-5">
                            <h3 class="text-lg font-medium text-gray-900">Detail Lengkap Data Santri :</h3>
                                <div class="mt-4 border-t border-gray-200">
                                    <div class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">NIS</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->nis ? $santri->nis : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">NISN</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->nisn ? $santri->nisn : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->gender ? $santri->gender : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Agama</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->agama ? $santri->agama : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Tempat Lahir</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->tempat_lahir ? $santri->tempat_lahir : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Lahir</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->tanggal_lahir ? $santri->tanggal_lahir : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Anak ke</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->anak_ke ? $santri->anak_ke : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Status Dalam Keluarga</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->status_keluarga ? $santri->status_keluarga : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Status di Pondok</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->status_pondok ? $santri->status_pondok : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->tanggal_masuk ? $santri->tanggal_masuk : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Lulus / Keluar</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->tanggal_keluar ? $santri->tanggal_keluar : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Nama Bapak</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->nama_bapak ? $santri->nama_bapak : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Pekerjaan Bapak</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->pekerjaan_bapak ? $santri->pekerjaan_bapak : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Nama Ibu</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->nama_ibu ? $santri->nama_ibu : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Pekerjaan Ibu</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->pekerjaan_ibu ? $santri->pekerjaan_ibu : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Alamat Rumah</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->alamat_ortu ? $santri->alamat_ortu : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">No. Telp. Orang Tua</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->no_hp_ortu ? $santri->no_hp_ortu : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Nama Wali</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->nama_wali ? $santri->nama_wali : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">Alamat Wali</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->alamat_wali ? $santri->alamat_wali : '-' }}</dd>
                                    </div>
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                        <dt class="text-sm font-medium text-gray-500">No. Telp. Wali</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $santri->no_hp_wali ? $santri->no_hp_wali : '-' }}</dd>
                                    </div>
                                    </div>
                                </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-3">
                            <a href="#" target="_blank" class="w-full bg-green-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
                                <svg class="h-6 w-6 text-white mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                Cetak Data
                            </a>
                            <a href="{{ route('santri.pdfdetail', $santri->nis) }}" target="_blank" class="w-full bg-purple-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                                <svg class="h-5 w-5 text-white mr-1"  fill="none" viewBox="0 0 24 24"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="18" cy="5" r="3" />  <circle cx="6" cy="12" r="3" />  <circle cx="18" cy="19" r="3" />  <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />  <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" /></svg>
                                Share PDF
                            </a>

                            <form action="{{ route('santri.destroy', $santri->nis) }}" method="POST" onsubmit="return confirm('SELURUH DATA SANTRI INI AKAN HILANG SECARA PERMANEN DAN TIDAK BISA DIKEMBALIKAN!! APAKAH KAMU YAKIN?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-50 border-2 border-red-700 rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-red-700 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-red-500">
                                    <svg class="h-5 w-5 text-red-700 mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                                    Hapus Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="w-full max-w-2xl mx-auto mt-16 lg:max-w-full lg:mt-0 lg:col-span-3">
                        <div class="border-b border-gray-200 overflow-x-auto w-full overflow-y-hidden scrollbar-custom">
                            <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
                                <button id="tab-pembayaran" class="tab-button text-gray-500 whitespace-nowrap pt-6 pb-3 font-medium text-base" aria-controls="tab-panel-pembayaran" role="tab" type="button" onclick="showTab('pembayaran')">Data Pembayaran</button>
                                <button id="tab-nilai" class="tab-button text-gray-500 whitespace-nowrap pt-6 pb-3 font-medium text-base" aria-controls="tab-panel-nilai" role="tab" type="button" onclick="showTab('nilai')">Data Nilai</button>
                                <button id="tab-tahfidz" class="tab-button text-gray-500 whitespace-nowrap pt-6 pb-3 font-medium text-base" aria-controls="tab-panel-tahfidz" role="tab" type="button" onclick="showTab('tahfidz')">Data Tahfidz</button>
                                <button id="tab-aktifitas" class="tab-button text-gray-500 whitespace-nowrap pt-6 pb-3 font-medium text-base" aria-controls="tab-panel-aktifitas" role="tab" type="button" onclick="showTab('aktifitas')">Riwayat Aktifitas</button>
                            </div>
                        </div>

                        <div id="tab-panel-pembayaran" class="tab-panel pt-3 w-full" aria-labelledby="tab-pembayaran" role="tabpanel" tabindex="0">
                            <form id="pembayaranForm" method="POST">
                                @csrf
                                <table class="divide-y divide-gray-200 min-w-full">
                                    <thead class="bg-gray-50 table-fixed table w-full">
                                        <tr class="bg-gray-50 flex justify-between w-full mb-2 pr-3">
                                            <th scope="col" class="pl-2 pb-3 pt-5">Pilih</th>
                                            <th scope="col" class="flex items-center justify-center gap-2">
                                                <button type="button" id="dicicilButton" class="text-white bg-orange-500 hover:bg-orange-700 flex items-center pl-1.5 pr-2 py-1 rounded-lg">
                                                    <svg class="h-5 w-5 text-white mr-0.5"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
                                                    Dicicil
                                                </button>
                                                <button type="button" onclick="submitForm('{{ route('pembayaran.lunas') }}')" class="text-white bg-green-600 hover:bg-green-800 flex items-center pl-1.5 pr-2 py-1 rounded-lg">
                                                    <svg class="h-5 w-5 text-white mr-0.5 -mt-0.5"  viewBox="0 0 24 24"  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                                                    Dilunasi
                                                </button>
                                                <button type="button" onclick="submitForm('{{ route('pembayaran.cetak') }}')" class="text-white bg-pink-500 hover:bg-pink-700 flex items-center pl-1.5 pr-2 py-1 rounded-lg">
                                                    <svg class="h-5 w-5 text-white mr-0.5"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />  <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />  <rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                                                    Cetak
                                                </button>
                                                <button type="button" onclick="submitForm('{{ route('pembayaran.cetak') }}')" class="text-white bg-sky-500 hover:bg-sky-700 flex items-center pl-1.5 pr-2 py-1 rounded-lg">
                                                    <svg class="h-5 w-5 text-white mr-0.5"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3" />  <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3" />  <circle cx="15" cy="9" r="1"  /></svg>
                                                    Kirim
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 block max-h-screen overflow-y-auto scrollbar-custom">
                                        @forelse($santri->pembayaran as $item)
                                        <tr>
                                            <td class="pl-2 whitespace-nowrap">
                                                <div class="flex items-center justify-center h-full">
                                                    <input type="checkbox" name="selected_payments[]" value="{{ $item->id_pembayaran }}" class="focus:ring-indigo-500 h-6 w-6 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                            </td>
                                            <td class="px-3 whitespace-nowrap">
                                                <div class="relative py-3">
                                                    <div class="flex justify-between space-x-3">
                                                        <div class="min-w-0 flex-1">
                                                            @if($item->status_pembayaran === 'Sudah Lunas')
                                                                <p class="text-base font-semibold text-gray-900 truncate">{{ $item->nama_pembayaran }} | {{ $item->tagihan }}</p>
                                                                <p class="text-[15px] text-gray-600 truncate">Total Pembayaran: {{ 'Rp. ' . number_format($item->jumlah, 0, ',', '.') }}</p>
                                                            @else
                                                                <p class="text-base font-semibold text-gray-900 truncate">{{ $item->nama_pembayaran }} | {{ 'Rp. ' . number_format($item->sisa, 0, ',', '.') }}</p>
                                                                <p class="text-[15px] text-gray-600 truncate">{{ $item->tagihan }} - Tagihan: {{ 'Rp. ' . number_format($item->jumlah, 0, ',', '.') }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="flex flex-col items-center">
                                                            <div class="flex-shrink-0 whitespace-nowrap font-semibold -mt-[1px] {{
                                                                match($item->status_pembayaran) {
                                                                    'Sudah Lunas' => 'text-green-600',
                                                                    'Sedang Dicicil' => 'text-yellow-500',
                                                                    'Belum Dibayar' => 'text-red-600',
                                                                    default => ''
                                                                }
                                                            }}">{{ $item->status_pembayaran }}</div>
                                                            @if($item->status_pembayaran !== 'Sudah Lunas')
                                                                <button type="button" onclick="openEditModal('{{ $item->id_pembayaran }}', '{{ $item->nama_pembayaran }}', {{ $item->jumlah }})" class="text-white text-xs bg-neutral-500 hover:bg-neutral-700 flex items-center justify-center w-fit py-0.5 pl-1.5 pr-2 rounded-lg mt-0.5 font-medium">
                                                                    <svg class="h-3.5 w-3.5 text-white-500 mr-0.5" width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M12 20h9" />  <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" /></svg>
                                                                    Edit
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if($item->riwayat)
                                                    <div class="mt-1">
                                                        <p class="line-clamp-2 text-sm text-gray-700">Riwayat Pembayaran:<br />
                                                            <div class="flex flex-col text-sm text-gray-700">
                                                                @foreach(array_reverse(json_decode($item->riwayat, true)) as $riwayat)
                                                                    <p class="flex gap-1 items-center">{{ $riwayat['tanggal'] }}
                                                                        <svg class="h-4 w-4 text-gray-700" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="5" y1="12" x2="19" y2="12" />  <polyline points="12 5 19 12 12 19" /></svg>
                                                                        Rp. {{ number_format($riwayat['nominal'], 0, ',', '.') }}
                                                                    </p>
                                                                @endforeach
                                                            </div>
                                                        </p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="border-b border-neutral-200">
                                            <td colspan="8" class="whitespace-nowrap px-6 py-4 text-center">Data Pembayaran Kosong!!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div id="cicilModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Cicilan Pembayaran</h3>
                                                    <div class="modal-body mt-2">

                                                    </div>
                                                    <div class="mt-5 sm:mt-4 flex">
                                                        <button type="button" onclick="submitForm('{{ route('pembayaran.cicil') }}')" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">Simpan Cicilan</button>
                                                        <button type="button" onclick="toggleCicilModal(false)" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Pembayaran</h3>
                                                <form id="editPaymentForm" method="POST" action="">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mt-3">
                                                        <label for="editPaymentName" class="block text-sm font-medium text-gray-700">Nama Pembayaran</label>
                                                        <input type="text" name="nama_pembayaran" id="editPaymentName" class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label for="editPaymentAmount" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                                        <input type="number" name="jumlah" id="editPaymentAmount" class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                                                    </div>
                                                    <div class="mt-5 sm:mt-4 flex">
                                                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">Simpan Perubahan</button>
                                                        <button type="button" onclick="toggleEditModal(false)" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div id="tab-panel-nilai" class="tab-panel hidden pt-10" aria-labelledby="tab-nilai" role="tabpanel" tabindex="0">
                            <h3>DATA NILAI</h3>
                        </div>

                        <div id="tab-panel-tahfidz" class="tab-panel hidden pt-10" aria-labelledby="tab-tahfidz" role="tabpanel" tabindex="0">
                            <h3>DATA TAHFIDZ</h3>
                        </div>

                        <div id="tab-panel-aktifitas" class="tab-panel hidden pt-10" aria-labelledby="tab-aktifitas" role="tabpanel" tabindex="0">
                            <h3>RIWAYAT AKTIFITAS</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tab) {
            document.querySelectorAll(".tab-panel").forEach((panel) => {
                panel.classList.add("hidden");
            });
            document.querySelectorAll(".tab-button").forEach((button) => {
                button.classList.remove("text-black");
                button.classList.add("border-transparent", "font-bold", "text-gray-500");
            });
            document.getElementById(`tab-panel-${tab}`).classList.remove("hidden");

            const activeButton = document.getElementById(`tab-${tab}`);
            activeButton.classList.add("text-black");
            activeButton.classList.remove("border-transparent", "font-bold", "text-gray-500");
        }
        showTab("pembayaran");

        function submitForm(actionUrl) {
            const form = document.getElementById('pembayaranForm');
            form.action = actionUrl;
            form.submit();
        }

        document.addEventListener("DOMContentLoaded", function() {
            const dicicilButton = document.getElementById('dicicilButton');
            if (dicicilButton) {
                dicicilButton.addEventListener('click', function() {
                    const modalBody = document.querySelector('#cicilModal .modal-body');
                    modalBody.innerHTML = '';

                    const selectedPayments = document.querySelectorAll('input[name="selected_payments[]"]:checked');

                    if (selectedPayments.length === 0) {
                        alert("Silakan pilih pembayaran yang ingin dicicil terlebih dahulu.");
                        return;
                    }

                    selectedPayments.forEach(payment => {
                        const paymentId = payment.value;
                        const paymentLabelElement = payment.closest('tr').querySelector('.px-6 .text-base.font-semibold');

                        const paymentLabel = paymentLabelElement ? paymentLabelElement.innerText : "Pembayaran";

                        const paymentDiv = document.createElement('div');
                        paymentDiv.classList.add('mt-2');
                        paymentDiv.innerHTML = `
                            <label>${paymentLabel}</label>
                            <input type="number" name="nominal[${paymentId}]" class="form-control mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="Masukkan nominal cicilan">
                        `;
                        modalBody.appendChild(paymentDiv);
                    });

                    toggleCicilModal(true);
                });
            } else {
                console.error('Tombol dicicilButton tidak ditemukan!');
            }
        });

        function toggleCicilModal(show) {
            const modal = document.getElementById('cicilModal');
            if (modal) {
                if (show) {
                    modal.classList.remove('hidden');
                } else {
                    modal.classList.add('hidden');
                }
            } else {
                console.error('Modal cicilModal tidak ditemukan!');
            }
        }

        function openEditModal(paymentId, paymentName, paymentAmount) {
            document.getElementById('editPaymentName').value = paymentName;
            document.getElementById('editPaymentAmount').value = paymentAmount;

            const form = document.getElementById('editPaymentForm');
            form.action = `/pembayaran/${paymentId}`;

            toggleEditModal(true);
        }

        function toggleEditModal(show) {
            const modal = document.getElementById('editModal');
            if (show) {
                modal.classList.remove("hidden");
            } else {
                modal.classList.add("hidden");
            }
        }

    </script>
</x-app-layout>

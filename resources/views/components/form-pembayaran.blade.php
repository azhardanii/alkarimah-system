<div class="space-y-6">
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8">
        <div class="flex flex-col gap-5">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6 mt-7">
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jenis_pembayaran" class="block text-sm font-medium text-gray-700">Jenis Pembayaran</label>
                        <select id="jenis_pembayaran" name="jenis_pembayaran" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jenis_pembayaran') text-red-700 @enderror" required>
                            <option value="" selected disabled></option>
                            <option value="SPP" {{ old('jenis_pembayaran', $santri->jenis_pembayaran ?? '') == 'SPP' ? 'selected' : '' }}>SPP</option>
                            <option value="KAS" {{ old('jenis_pembayaran', $santri->jenis_pembayaran ?? '') == 'KAS' ? 'selected' : '' }}>KAS</option>
                            <option value="Lainnya" {{ old('jenis_pembayaran', $santri->jenis_pembayaran ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('metode_pembayaran') text-red-700 @enderror" required>
                            <option value="" selected disabled></option>
                            <option value="Sekali Bayar" {{ old('metode_pembayaran', $santri->metode_pembayaran ?? '') == 'Sekali Bayar' ? 'selected' : '' }}>Sekali Bayar</option>
                            <option value="Otomatis" {{ old('metode_pembayaran', $santri->metode_pembayaran ?? '') == 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
                        </select>
                    </div>

                    <div id="tempo-tagihan" class="col-span-6 sm:col-span-3 lg:col-span-2 hidden">
                        <label for="tagihan" class="block text-sm font-medium text-gray-700">Tagihan</label>
                        <input type="month" name="tagihan" id="tagihan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tagihan') text-red-700 @enderror" value="{{ old('tagihan', $santri->tagihan ?? '') }}">
                    </div>

                    <div id="santri-section" class="col-span-6 sm:col-span-3 lg:col-span-2 hidden">
                        <label for="santri_nis" class="block text-sm font-medium text-gray-700">Pilih Santri</label>
                        <select id="santri_nis" name="santri_nis" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('santri_nis') text-red-700 @enderror">
                            <option value="" selected disabled></option>
                            @foreach($santris as $list)
                                <option value="{{ $list->nis }}" {{ old('santri_nis') == $list->nis ? 'selected' : '' }}>
                                    {{ $list->nama_santri }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="jadwal-pembayaran" class="col-span-6 sm:col-span-3 lg:col-span-2 hidden">
                        <label for="jadwal_tagihan" class="block text-sm font-medium text-gray-700">Jadwal Tagihan</label>
                        <select id="jadwal_tagihan" name="jadwal_tagihan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jadwal_tagihan') text-red-700 @enderror">
                            <option value="" selected disabled></option>
                            <option value="Harian" {{ old('jadwal_tagihan', $santri->jadwal_tagihan ?? '') == 'Harian' ? 'selected' : '' }}>Harian</option>
                            <option value="Mingguan" {{ old('jadwal_tagihan', $santri->jadwal_tagihan ?? '') == 'Mingguan' ? 'selected' : '' }}>Mingguan</option>
                            <option value="Bulanan" {{ old('jadwal_tagihan', $santri->jadwal_tagihan ?? '') == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
                        </select>
                    </div>
                    <div id="nama-pembayaran" class="col-span-6 sm:col-span-3 lg:col-span-2 hidden">
                        <label for="nama_pembayaran" class="block text-sm font-medium text-gray-700">Nama Pembayaran</label>
                        <input type="text" name="nama_pembayaran" id="nama_pembayaran" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_pembayaran') text-red-700 @enderror" value="{{ old('nama_pembayaran', $santri->nama_pembayaran ?? '') }}">
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Nominal Pembayaran</label>
                        <input type="number" name="jumlah" id="jumlah" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('jumlah') text-red-700 @enderror" value="{{ old('jumlah', $santri->jumlah ?? '') }}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    const jenisPembayaranSelect = document.getElementById('jenis_pembayaran');
    const metodePembayaranSelect = document.getElementById('metode_pembayaran');
    const santriSection = document.getElementById('santri-section');
    const namaPembayaran = document.getElementById('nama-pembayaran');
    const tempoTagihan = document.getElementById('tempo-tagihan');
    const jadwalPembayaran = document.getElementById('jadwal-pembayaran');

    // Menampilkan form yang sesuai dengan jenis pembayaran yang dipilih
    jenisPembayaranSelect.addEventListener('change', function () {
        if (this.value === 'SPP' || this.value === 'KAS') {
            santriSection.classList.add('hidden');
            namaPembayaran.classList.add('hidden');
            tempoTagihan.classList.remove('hidden');
        } else if (this.value === 'Lainnya') {
            santriSection.classList.remove('hidden');
            namaPembayaran.classList.remove('hidden');
            tempoTagihan.classList.remove('hidden');
        } else {
            santriSection.classList.add('hidden');
            namaPembayaran.classList.add('hidden');
            tempoTagihan.classList.add('hidden');
        }
    });

    // Menampilkan dan menyembunyikan form jadwal pembayaran otomatis dan spp/kas section
    metodePembayaranSelect.addEventListener('change', function () {
        if (this.value === 'Otomatis') {
            jadwalPembayaran.classList.remove('hidden');
            tempoTagihan.classList.add('hidden');
        } else {
            jadwalPembayaran.classList.add('hidden');
            tempoTagihan.classList.remove('hidden');
            if (jenisPembayaranSelect.value === 'SPP' || jenisPembayaranSelect.value === 'KAS') {
                tempoTagihan.classList.remove('hidden');
            }
        }
    });
</script>
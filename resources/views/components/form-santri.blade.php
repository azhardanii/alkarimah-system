<div class="space-y-6">

    {{-- DATA SANTRI --}}
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8">
        <div class="flex flex-col gap-5">
            <div class="border-b-2 border-gray-500/10 pb-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Data Santri</h3>
                <p class="mt-1 text-xs text-gray-500">Harap mengisikan data terkait santri yang sesuai dengan penuh kesadaran dan tidak dibuat-buat.</p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="flex gap-5">
                    <div class="flex flex-col justify-center items-center text-center w-1/5">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto Santri</label>
                        <p class="text-xs text-gray-500">Disarankan Ukuran Foto 1:1</p>
                        <div class="mt-1 flex items-center justify-center gap-2 flex-col">
                            @if(isset($santri->foto_santri))
                                <img src="{{ asset('storage/foto_santri/' . $santri->foto_santri) }}" class="h-20 w-20 rounded-full overflow-hidden bg-gray-100" alt="Foto Santri">
                            @else
                                <span class="inline-block h-20 w-20 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="w-4/5">
                        <div id="drop-area" class="mt-1 flex justify-center items-center h-full px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <img id="preview-image" src="" alt="Preview" class="hidden mx-auto h-12 w-12 text-gray-400"/>
                                <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm justify-center text-gray-600">
                                    <label for="foto_santri" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="foto_santri" name="foto_santri" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">File Type PNG / JPEG / JPG max. size 5MB</p>
                            </div>
                        </div>
                        @error('foto_santri')
                            <div class="text-red-700 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 

                <div class="grid grid-cols-6 gap-6 mt-7">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_santri" class="block text-sm font-medium text-gray-700">Nama Lengkap Santri</label>
                        <input type="text" name="nama_santri" id="nama_santri" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_santri') text-red-700 @enderror" value="{{ old('nama_santri', $santri->nama_santri ?? '') }}" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="nisn" class="block text-sm font-medium text-gray-700">Nomor Induk Siswa Nasional (NISN)</label>
                        <input type="number" name="nisn" id="nisn" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nisn') text-red-700 @enderror" value="{{ old('nisn', $santri->nisn ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="status_pendaftaran" class="block text-sm font-medium text-gray-700">Status Pendaftaran</label>
                        <select id="status_pendaftaran" name="status_pendaftaran" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status_pendaftaran') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="Santri Baru" {{ old('status_pendaftaran', $santri->status_pendaftaran ?? '') == 'Santri Baru' ? 'selected' : '' }}>Santri Baru</option>
                            <option value="Pindahan" {{ old('status_pendaftaran', $santri->status_pendaftaran ?? '') == 'Pindahan' ? 'selected' : '' }}>Pindahan</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tempat_lahir') text-red-700 @enderror" value="{{ old('tempat_lahir', $santri->tempat_lahir ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tanggal_lahir') text-red-700 @enderror" value="{{ old('tanggal_lahir', $santri->tanggal_lahir ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender" name="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('gender') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="Putra" {{ old('gender', $santri->gender ?? '') == 'Putra' ? 'selected' : '' }}>Putra</option>
                            <option value="Putri" {{ old('gender', $santri->gender ?? '') == 'Putri' ? 'selected' : '' }}>Putri</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                        <select id="agama" name="agama" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('agama') text-red-700 @enderror">
                            <option value="Islam" {{ old('agama', $santri->agama ?? '') == 'Islam' ? 'selected' : '' }} selected>Islam</option>
                            <option value="Hindu" {{ old('agama', $santri->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Budha" {{ old('agama', $santri->agama ?? '') == 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option value="Katolik" {{ old('agama', $santri->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Protestan" {{ old('agama', $santri->agama ?? '') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="anak_ke" class="block text-sm font-medium text-gray-700">Anak ke</label>
                        <input type="number" name="anak_ke" id="anak_ke" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('anak_ke') text-red-700 @enderror" value="{{ old('anak_ke', $santri->anak_ke ?? '') }}" min="1">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="status_keluarga" class="block text-sm font-medium text-gray-700">Status Dalam Keluarga</label>
                        <select id="status_keluarga" name="status_keluarga" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status_keluarga') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="Anak Kandung" {{ old('status_keluarga', $santri->status_keluarga ?? '') == 'Anak Kandung' ? 'selected' : '' }}>Anak Kandung</option>
                            <option value="Anak Tiri" {{ old('status_keluarga', $santri->status_keluarga ?? '') == 'Anak Tiri' ? 'selected' : '' }}>Anak Tiri</option>
                            <option value="Anak Angkat" {{ old('status_keluarga', $santri->status_keluarga ?? '') == 'Anak Angkat' ? 'selected' : '' }}>Anak Angkat</option>
                            <option value="Anak Di Luar Nikah" {{ old('status_keluarga', $santri->status_keluarga ?? '') == 'Anak Di Luar Nikah' ? 'selected' : '' }}>Famili Lain</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jenjang_formal" class="block text-sm font-medium text-gray-700">Jenjang Formal</label>
                        <select id="jenjang_formal" name="jenjang_formal" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jenjang_formal') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="Tidak Sekolah" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value="Pra-Sekolah" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Pra-Sekolah' ? 'selected' : '' }}>Pra-Sekolah</option>
                            <option value="Kelas 1 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 1 SD' ? 'selected' : '' }}>Kelas 1 SD</option>
                            <option value="Kelas 2 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 2 SD' ? 'selected' : '' }}>Kelas 2 SD</option>
                            <option value="Kelas 3 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 3 SD' ? 'selected' : '' }}>Kelas 3 SD</option>
                            <option value="Kelas 4 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 4 SD' ? 'selected' : '' }}>Kelas 4 SD</option>
                            <option value="Kelas 5 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 5 SD' ? 'selected' : '' }}>Kelas 5 SD</option>
                            <option value="Kelas 6 SD" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 6 SD' ? 'selected' : '' }}>Kelas 6 SD</option>
                            <option value="Kelas 1 SMP" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 1 SMP' ? 'selected' : '' }}>Kelas 1 SMP</option>
                            <option value="Kelas 2 SMP" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 2 SMP' ? 'selected' : '' }}>Kelas 2 SMP</option>
                            <option value="Kelas 3 SMP" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 3 SMP' ? 'selected' : '' }}>Kelas 3 SMP</option>
                            <option value="Kelas 1 SMA/SMK" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 1 SMA/SMK' ? 'selected' : '' }}>Kelas 1 SMA/SMK</option>
                            <option value="Kelas 2 SMA/SMK" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 2 SMA/SMK' ? 'selected' : '' }}>Kelas 2 SMA/SMK</option>
                            <option value="Kelas 3 SMA/SMK" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Kelas 3 SMA/SMK' ? 'selected' : '' }}>Kelas 3 SMA/SMK</option>
                            <option value="Perguruan Tinggi" {{ old('jenjang_formal', $santri->jenjang_formal ?? '') == 'Perguruan Tinggi' ? 'selected' : '' }}>Perguruan Tinggi</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jenjang_diniyah" class="block text-sm font-medium text-gray-700">Jenjang Diniyah</label>
                        <select id="jenjang_diniyah" name="jenjang_diniyah" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jenjang_diniyah') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="Kelas 1 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 1 Diniyah' ? 'selected' : '' }}>Kelas 1 Diniyah</option>
                            <option value="Kelas 2 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 2 Diniyah' ? 'selected' : '' }}>Kelas 2 Diniyah</option>
                            <option value="Kelas 3 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 3 Diniyah' ? 'selected' : '' }}>Kelas 3 Diniyah</option>
                            <option value="Kelas 4 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 4 Diniyah' ? 'selected' : '' }}>Kelas 4 Diniyah</option>
                            <option value="Kelas 5 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 5 Diniyah' ? 'selected' : '' }}>Kelas 5 Diniyah</option>
                            <option value="Kelas 6 Diniyah" {{ old('jenjang_diniyah', $santri->jenjang_diniyah ?? '') == 'Kelas 6 Diniyah' ? 'selected' : '' }}>Kelas 6 Diniyah</option>

                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="status_pondok" class="block text-sm font-medium text-gray-700">Status Pondok</label>
                        <select id="status_pondok" name="status_pondok" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') text-red-700 @enderror">
                            <option value="Aktif" {{ old('status_pondok', $santri->status_pondok ?? '') == 'Aktif' ? 'selected' : '' }} selected>Aktif</option>
                            <option value="Tidak Aktif" {{ old('status_pondok', $santri->status_pondok ?? '') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="Alumni" {{ old('status_pondok', $santri->status_pondok ?? '') == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Diterima Tanggal</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tanggal_masuk') text-red-700 @enderror" value="{{ old('tanggal_masuk', $santri->tanggal_masuk ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tanggal_keluar" class="block text-sm font-medium text-gray-700">Tanggal Lulus / Keluar</label>
                        <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tanggal_keluar') text-red-700 @enderror" value="{{ old('tanggal_keluar', $santri->tanggal_keluar ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="alamat_santri" class="block text-sm font-medium text-gray-700">Alamat Lengkap Santri</label>
                        <div class="mt-1">
                            <textarea id="alamat_santri" name="alamat_santri" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('alamat_santri') text-red-700 @enderror">{{old('alamat_santri', $santri->alamat_santri ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="no_hp_santri" class="block text-sm font-medium text-gray-700">Nomor Telepon Santri (Aktif WA)</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> +62 </span>
                                <input type="number" name="no_hp_santri" id="no_hp_santri" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('no_hp_santri') text-red-700 @enderror" value="{{ old('no_hp_santri', $santri->no_hp_santri ?? '') }}" placeholder="8150021000" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 mt-4">
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="copyAddress" type="checkbox" onchange="copyAddressFunction()" class="h-5 w-5 text-indigo-600 border-2 border-gray-300 rounded">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="copyAddress" class="font-medium text-gray-700">Centang Disini,</label>
                                <span class="text-gray-500">Jika Alamat Lengkap Orang Tua & Wali sama dengan Alamat Lengkap Santri.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DATA ORANG TUA --}}
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8 mt-7">
        <div class="flex flex-col gap-5">
            <div class="border-b-2 border-gray-500/10 pb-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Data Orang Tua</h3>
                <p class="mt-1 text-xs text-gray-500">Harap mengisikan data orang tua santri sebenar-benarnya dan selengkap mungkin.</p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_bapak" class="block text-sm font-medium text-gray-700">Nama Lengkap Bapak</label>
                        <input type="text" name="nama_bapak" id="nama_bapak" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_bapak') text-red-700 @enderror" value="{{ old('nama_bapak', $santri->nama_bapak ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Lengkap Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_ibu') text-red-700 @enderror" value="{{ old('nama_ibu', $santri->nama_ibu ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="pekerjaan_bapak" class="block text-sm font-medium text-gray-700">Pekerjaan Bapak</label>
                        <input type="text" name="pekerjaan_bapak" id="pekerjaan_bapak" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('pekerjaan_bapak') text-red-700 @enderror" value="{{ old('pekerjaan_bapak', $santri->pekerjaan_bapak ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('pekerjaan_ibu') text-red-700 @enderror" value="{{ old('pekerjaan_ibu', $santri->pekerjaan_ibu ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="alamat_ortu" class="block text-sm font-medium text-gray-700">Alamat Lengkap Orang Tua</label>
                        <div class="mt-1">
                            <textarea id="alamat_ortu" name="alamat_ortu" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('alamat_ortu') text-red-700 @enderror">{{old('alamat_ortu', $santri->alamat_ortu ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="no_hp_ortu" class="block text-sm font-medium text-gray-700">Nomor Telepon Orang Tua (Aktif WA)</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> +62 </span>
                                <input type="number" name="no_hp_ortu" id="no_hp_ortu" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('no_hp_ortu') text-red-700 @enderror" value="{{ old('no_hp_ortu', $santri->no_hp_ortu ?? '') }}" placeholder="8150021000" />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 mt-4">
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="sameAsWali" type="checkbox" onchange="copyParentToWali()" class="h-5 w-5 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="sameAsWali" class="font-medium text-gray-700">Centang Disini,</label>
                                <span class="text-gray-500">Jika Data Wali sama dengan Data Orang Tua diatas.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    {{-- DATA WALI --}}
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8 mt-7">
        <div class="flex flex-col gap-5">
            <div class="border-b-2 border-gray-500/10 pb-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Data Wali Santri</h3>
                <p class="mt-1 text-xs text-gray-500">Harap mengisikan data terkait wali santri sebagai penunjang kelengkapan data santri.</p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_wali" class="block text-sm font-medium text-gray-700">Nama Lengkap Wali</label>
                        <input type="text" name="nama_wali" id="nama_wali" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_wali') text-red-700 @enderror" value="{{ old('nama_wali', $santri->nama_wali ?? '') }}">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="no_hp_wali" class="block text-sm font-medium text-gray-700">Nomor Telepon Wali (Aktif WA)</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> +62 </span>
                                <input type="number" name="no_hp_wali" id="no_hp_wali" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('no_hp_wali') text-red-700 @enderror" value="{{ old('no_hp_wali', $santri->no_hp_wali ?? '') }}" placeholder="8150021000" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="alamat_wali" class="block text-sm font-medium text-gray-700">Alamat Lengkap Wali</label>
                        <div class="mt-1">
                            <textarea id="alamat_wali" name="alamat_wali" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('alamat_wali') text-red-700 @enderror">{{old('alamat_wali', $santri->alamat_wali ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    {{-- DATA TAMBAHAN --}}
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8 mt-7">
        <div class="flex flex-col gap-5">
            <div class="border-b-2 border-gray-500/10 pb-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Data Tambahan</h3>
                <p class="mt-1 text-xs text-gray-500">Harap mengisikan data tambahan ini sebagai penunjang kelengkapan data santri.</p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="jadwal_makan" class="block text-sm font-medium text-gray-700">Jadwal Makan</label>
                        <select id="jadwal_makan" name="jadwal_makan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jadwal_makan') text-red-700 @enderror" required>
                            <option value="" disabled selected> </option>
                            <option value="3x Sehari" {{ old('jadwal_makan', $santri->jadwal_makan ?? '') == '3x Sehari' ? 'selected' : '' }}>3x Sehari</option>
                            <option value="2x Sehari" {{ old('jadwal_makan', $santri->jadwal_makan ?? '') == '2x Sehari' ? 'selected' : '' }}>2x Sehari</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="sekolah_santri" class="block text-sm font-medium text-gray-700">Sekolah Santri</label>
                        <select id="sekolah_santri" name="sekolah_santri" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sekolah_santri') text-red-700 @enderror" required>
                            <option value="Tidak Ada" {{ old('sekolah_santri', $santri->sekolah_santri ?? '') == 'Tidak Ada' ? 'selected' : '' }} selected>Tidak Ada</option>
                            <option value="Sekolah Reguler" {{ old('sekolah_santri', $santri->sekolah_santri ?? '') == 'Sekolah Reguler' ? 'selected' : '' }}>Sekolah Reguler</option>
                            <option value="Kejar Paket" {{ old('sekolah_santri', $santri->sekolah_santri ?? '') == 'Kejar Paket' ? 'selected' : '' }}>Kejar Paket</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    const dropArea = document.getElementById('drop-area');
    const fotoInput = document.getElementById('foto_santri');
    const previewImageElement = document.getElementById('preview-image');
    const uploadIcon = document.getElementById('upload-icon');

    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImageElement.src = e.target.result;
            previewImageElement.classList.remove('hidden');
            uploadIcon.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }

    fotoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            previewImage(file);
        }
    });

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('border-indigo-500');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('border-indigo-500');
    });

    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dropArea.classList.remove('border-indigo-500');

        const files = event.dataTransfer.files;
        if (files.length > 0) {
            fotoInput.files = files;
            previewImage(files[0]);
        }
    });

    function copyAddressFunction() {
        const alamatSantri = document.getElementById('alamat_santri').value;
        const isChecked = document.getElementById('copyAddress').checked;

        document.getElementById('alamat_ortu').value = isChecked ? alamatSantri : '';
        document.getElementById('alamat_wali').value = isChecked ? alamatSantri : '';
    }

    function copyParentToWali() {
        const namaBapak = document.getElementById('nama_bapak').value;
        const noHpOrtu = document.getElementById('no_hp_ortu').value;
        const alamatOrtu = document.getElementById('alamat_ortu').value;
        const isChecked = document.getElementById('sameAsWali').checked;

        document.getElementById('nama_wali').value = isChecked ? namaBapak : '';
        document.getElementById('no_hp_wali').value = isChecked ? noHpOrtu : '';
        document.getElementById('alamat_wali').value = isChecked ? alamatOrtu : '';
    }
</script>
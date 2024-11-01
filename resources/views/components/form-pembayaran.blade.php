<div class="space-y-6">
    <div class="bg-white shadow px-4 pt-5 pb-9 sm:rounded-lg sm:px-6 sm:pt-6 sm:pb-8">
        <div class="flex flex-col gap-5">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-6 gap-6 mt-7">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama_pembayaran" class="block text-sm font-medium text-gray-700">Nama Pembayaran</label>
                        <input type="text" name="nama_pembayaran" id="nama_pembayaran" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_pembayaran') text-red-700 @enderror" value="{{ old('nama_pembayaran', $santri->nama_pembayaran ?? '') }}">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="tagihan" class="block text-sm font-medium text-gray-700">Tagihan</label>
                        <input type="month" name="tagihan" id="tagihan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tagihan') text-red-700 @enderror" value="{{ old('tagihan', $santri->tagihan ?? '') }}">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
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

                    <div class="col-span-6 sm:col-span-3">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Nominal Pembayaran</label>
                        <input type="number" name="jumlah" id="jumlah" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('jumlah') text-red-700 @enderror" value="{{ old('jumlah', $santri->jumlah ?? '') }}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
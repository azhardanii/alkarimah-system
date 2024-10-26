@if ($errors->any())
<div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 10000)" aria-live="assertive" class="fixed inset-0 flex justify-center px-4 py-6 pointer-events-none sm:p-6">
    <div class="w-full flex flex-col items-center space-y-4">
      <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="p-4">
          <div class="flex items-start">
            <div class="flex-shrink-0">
              <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <ul class="text-sm font-medium text-gray-900">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
              <button @click="open = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white text-3xl font-bold">
                    Tambah Data Santri
                </div>
            </div>
            <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($santri))
                    @method('PUT')
                @endif
                <x-form-santri />

                <div class="flex justify-end mt-5">
                    <div class="relative flex items-start">
                      <div class="mr-2 text-sm text-right">
                        <label for="starter_kit" class="text-base font-medium text-gray-700">Tambahkan Tagihan Santri Starter Kit</label>
                        <p class="text-gray-500">Biaya Pendaftaran, SPP 1 Bulan, Sewa Lemari, Pembelian Kitab dan Seragam</p>
                      </div>
                      <div class="flex items-center h-full mr-3">
                        <input id="starter_kit" name="starter_kit" type="checkbox" class="focus:ring-indigo-500 h-10 w-11 text-indigo-600 border-gray-300 rounded" value="1">
                      </div>
                    </div>
                    <button type="submit" class="ml-3 inline-flex items-center justify-center py-2 px-5 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
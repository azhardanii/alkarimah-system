@if (session('success'))
    <div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 10000)" aria-live="assertive" class="fixed inset-0 flex justify-center px-4 py-6 pointer-events-none sm:p-6">
        <div class="w-full flex flex-col items-center space-y-4">
          <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between border-b border-gray-200">
                    <div class="p-6 bg-white text-4xl font-bold">
                        Data Pembayaran
                    </div>
                    <div class="flex gap-5">
                      <form action="{{ route('pembayaran.inputSPP') }}" method="POST">
                        @csrf
                        <button type="submit" class="my-6 flex items-center rounded bg-emerald-500 px-3 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-emerald-accent-300 hover:shadow-lg focus:bg-emerald-accent-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-emerald-600 active:shadow-lg motion-reduce:transition-none">
                            <svg class="h-5 w-5 text-white mr-1"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" />  <path d="M4 6v-1a1 1 0 0 1 1 -1h1m5 0h2m5 0h1a1 1 0 0 1 1 1v1m0 5v2m0 5v1a1 1 0 0 1 -1 1h-1m-5 0h-2m-5 0h-1a1 1 0 0 1 -1 -1v-1m0 -5v-2m0 -5" /></svg>
                            Tambah SPP {{ config('app.bulan_indo')[date('F')] }}
                        </button>
                      </form>
                      <a href="{{ route('pembayaran.create') }}" type="button" class="my-6 mr-6 flex items-center rounded bg-blue-500 px-3 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-accent-300 hover:shadow-lg focus:bg-blue-accent-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg motion-reduce:transition-none">
                          <svg class="h-5 w-5 text-white mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                          </svg>
                          Buat Tagihan
                      </a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Santri</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Tempo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Untuk Pembayaran</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col"> </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($pembayaran as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img 
                                            src="{{ $item->santri->foto_santri 
                                                ? url('storage/foto_santri/' . $item->santri->foto_santri) 
                                                : ($item->santri->gender == 'Putri' 
                                                    ? 'https://i.pinimg.com/736x/38/68/27/3868276aa524d3a9154177cfde88471f.jpg' 
                                                    : 'https://i.pinimg.com/236x/3b/ab/00/3bab002bfeabef22dc206966ca1070cd.jpg') 
                                            }}" class="object-center object-cover w-full" />
                                        </div>
                                        <div class="ml-4">
                                        <div class="text-base font-medium text-gray-900">{{ $item->santri->nama_santri }}</div>
                                        <div class="text-sm text-gray-500">{{ $item->santri->nis }}</div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-base text-gray-900">{{ $item->tagihan }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-900">{{ $item->nama_pembayaran }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full 
                                        {{
                                            match($item->status_pembayaran) {
                                                'Sudah Lunas' => 'bg-green-100 text-green-800',
                                                'Belum Dibayar' => 'bg-red-100 text-red-800',
                                                default => ''
                                            }
                                        }}"> {{ $item->status_pembayaran }} </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-center items-center mt-1.5 gap-2">
                                        @if($item->status_pembayaran == 'Belum Dibayar')
                                        <form action="{{ route('pembayaran.bayar', ['id_pembayaran' => $item->id_pembayaran]) }}" method="POST">
                                        @csrf
                                            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 flex items-center px-2 py-1 rounded-lg">
                                                <svg class="h-5 w-5 pb-0.5 text-white mr-0.5"  viewBox="0 0 24 24"  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                                                Sudah Bayar
                                            </button>
                                        </form>
                                        @else
                                        <a href="{{ route('pembayaran.print', ['id_pembayaran' => $item->id_pembayaran]) }}" class="text-white bg-stone-500 hover:bg-stone-700 flex items-center px-2 py-1 rounded-lg">
                                            <svg class="h-5 w-5 pb-0.5 text-white mr-0.5"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />  <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />  <rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                                            Cetak Nota
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-b border-neutral-200">
                                    <td colspan="8" class="whitespace-nowrap px-6 py-4 text-center">Data Pembayaran Santri Kosong!!</td>
                                </tr>
                                @endforelse
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
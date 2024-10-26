  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Santri</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tempat & Tanggal Lahir</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col"> </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @forelse($santris as $santri)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img 
                        src="{{ $santri->foto_santri 
                            ? url('storage/foto_santri/' . $santri->foto_santri) 
                            : ($santri->gender == 'Putri' 
                                ? 'https://i.pinimg.com/736x/38/68/27/3868276aa524d3a9154177cfde88471f.jpg' 
                                : 'https://i.pinimg.com/236x/3b/ab/00/3bab002bfeabef22dc206966ca1070cd.jpg') 
                        }}" class="object-center object-cover w-full" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">{{ $santri->nama_santri }}</div>
                      <div class="text-sm text-gray-500">Anak {{ $santri->nama_bapak ? $santri->nama_bapak : '-nya Siapa?' }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $santri->tempat_lahir }}</div>
                  <div class="text-sm text-gray-500">{{ $santri->tanggal_lahir }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $santri->nis }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    {{
                        match($santri->status_pondok) {
                            'Aktif' => 'bg-green-100 text-green-800',
                            'Tidak Aktif' => 'bg-red-100 text-red-800',
                            'Pindah' => 'bg-orange-100 text-orange-800',
                            'Alumni' => 'bg-blue-100 text-blue-800',
                            'Drop Out' => 'bg-gray-800 text-gray-100',
                            default => ''
                        }
                    }}"> {{ $santri->status_pondok }} </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-center items-center mt-1.5 gap-2">
                  <a href="{{ route('santri.show', $santri->nis) }}" class="text-white bg-pink-600 hover:bg-pink-800 flex items-center px-2 py-1 rounded-lg">
                    <svg class="h-3.5 w-3.5 text-white mr-1"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg>
                    Detail
                  </a>
                </td>
              </tr>
              @empty
              <tr class="border-b border-neutral-200">
                <td colspan="8" class="whitespace-nowrap px-6 py-4 text-center">Data Santri Kosong!!</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
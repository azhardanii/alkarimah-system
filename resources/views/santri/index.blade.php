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
                        Data Santri
                    </div>

                    <div class="m-6 relative flex items-center gap-3 text-left">
                      <div>
                        <form action="#" method="POST" class="mt-1 flex rounded-md shadow-sm">
                          <div class="relative flex focus-within:z-10 w-[20vw]">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                              </svg>
                            </div>
                            <input type="text" name="cari_nama" id="cari_nama" class="focus:ring-gray-700 focus:border-gray-700 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300" placeholder="Cari Nama Santri / Orang Tua / Wali" required>
                          </div>
                          <button type="submit" class="-ml-px relative inline-flex items-center space-x-2 p-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-700 focus:border-gray-700">
                            <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="11" cy="11" r="8" />  <line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
                            </svg>
                          </button>
                        </form>
                      </div>

                      <div>
                        <button type="button" class="mt-1 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-3.5 py-1.5 bg-white text-base font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-700" id="menu-button" aria-expanded="false" aria-haspopup="true">
                          Filter
                          <svg class="-mr-1 ml-2 h-5 w-5 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                          </svg>
                          </svg>
                        </button>
                        <div id="dropdown-menu" class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                          <div class="py-1" role="none">
                            <span class="text-gray-800 font-semibold underline block px-4 py-1 text-sm">Status Santri</span>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">Aktif</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">Tidak Aktif</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-2">Alumni</a>
                          </div>
                          <div class="py-1" role="none">
                            <span class="text-gray-800 font-semibold underline block px-4 py-1 text-sm">Data Santri</span>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">Sudah Lengkap</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">Belum Lengkap</a>
                          </div>
                          <div class="py-1" role="none">
                            <span class="text-gray-800 font-semibold underline block px-4 py-1 text-sm">Pengurutan</span>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">Nama dari A-Z</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">Nama dari Z-A</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-2">NIS dari Baru-Lama</a>
                            <a href="#" class="text-gray-700 block px-4 py-1 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-3">NIS dari Lama-Baru</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <a href="{{ route('santri.create') }}" type="button" class="m-6 flex items-center rounded bg-blue-500 px-3 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-accent-300 hover:shadow-lg focus:bg-blue-accent-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg motion-reduce:transition-none">
                        <svg class="h-5 w-5 text-white mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Tambah Data Santri
                    </a>
                </div>
                <x-table-santri :santris="$santris" />
            </div>
        </div>
    </div>
</x-app-layout>

<script>
  const menuButton = document.getElementById('menu-button');
  const dropdownMenu = document.getElementById('dropdown-menu');

  menuButton.addEventListener('click', function() {
    // Tampilkan dropdown dengan efek transisi
    dropdownMenu.classList.toggle('hidden');
    dropdownMenu.classList.toggle('opacity-100');
    dropdownMenu.classList.toggle('scale-100');
  });

  document.addEventListener('click', function(event) {
    if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
      dropdownMenu.classList.add('hidden');
      dropdownMenu.classList.remove('opacity-100');
      dropdownMenu.classList.remove('scale-100');
    }
  });
</script>
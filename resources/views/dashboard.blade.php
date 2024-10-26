<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-2">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                          </svg>
                        </svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Keseluruhan Santri</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalSantri }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Anak</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>

                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-1.5">
                        <svg class="h-9 w-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="5" r="2" />  <path d="M10 22v-5l-1-1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" /></svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Santri Putra</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalSantriPutra }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Anak</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>

                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-1.5">
                        <svg class="h-9 w-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="5" r="2" />  <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" /></svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Santri Putri</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalSantriPutri }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Anak</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>

                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-2.5">
                        <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/> <circle cx="9" cy="7" r="4" /> <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /> <path d="M16 11h6m-3 -3v6" /></svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Santri Aktif</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalSantriAktif }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Anak</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>
                  
                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-2.5">
                        <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z"/> <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /> <line x1="19" y1="7" x2="19" y2="10" />  <line x1="19" y1="14" x2="19" y2="14.01" /></svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Alumni Pondok</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalAlumniSantri }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Santri</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>
                  
                  <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                      <div class="absolute bg-indigo-500 rounded-md p-2.5">
                        <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <path d="M16 11l2 2l4 -4" /></svg>
                      </div>
                      <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Alumni yang Lulus</p>
                    </dt>
                    <dd class="ml-16 pb-2 flex items-baseline sm:pb-3">
                      <p class="text-2xl font-semibold text-gray-900">{{ $totalAlumniLulus }}</p>
                      <p class="ml-2 flex items-baseline text-sm font-semibold text-green-500">Santri</p>
                      <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                        <div class="text-sm">
                          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Selengkapnya</a>
                        </div>
                      </div>
                    </dd>
                  </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
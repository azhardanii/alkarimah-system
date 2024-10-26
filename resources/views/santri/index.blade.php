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
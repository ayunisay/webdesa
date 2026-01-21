@include('user.layout.header')
    <main class="container mx-auto mt-8 flex-grow">
        <div class="container mx-auto px-6 py-8">
            <h1 class="text-2xl font-bold mb-2">Pelaporan RT/RW</h1>
            <p class="text-gray-600">
                Halaman ini digunakan untuk melaporkan data RT/RW di Desa Sinargalih.
            </p>
        </div>

        {{-- menu1 --}}
        <div class="bg-white shadow-md rounded-lg p-6 mt-8 flex-grow">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pelaporan bencana -->
                <a href="{{ route('pelaporan-bencana') }}" class="group block bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pelaporan Bencana</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data bencana.</p>
                        </div>
                    </div>
                </a>

            <!-- Pelaporan Lansia -->
                <a href="{{ route('pelaporan-kematian') }}" class="group block bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pelaporan Kematian</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data kematian.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <!-- Pelaporan Kehamilan -->
                <a href="{{ route('pelaporan-kepindahan-datang') }}" class="group block bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pelaporan Kepindahan dan Pendatang</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data kepindahan dan kedatangan warga.</p>
                        </div>
                    </div>
                </a>

            <!-- Pelaporan Lansia -->
                <a href="{{ route('pelaporan-tindak-kriminal') }}" class="group block bg-gradient-to-r from-red-800 to-red-900 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pelaporan Hukum</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data hukum.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div> 


    </main>

@include('user.layout.footer') 

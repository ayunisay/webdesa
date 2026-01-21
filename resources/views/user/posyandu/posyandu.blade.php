@include('user.layout.header')
    <main class="container mx-auto mt-8 flex-grow">
        <div class="container mx-auto px-6 py-8">
            <h1 class="text-2xl font-bold mb-2">Pelaporan Posyandu</h1>
            <p class="text-gray-600">
                Halaman ini digunakan untuk melaporkan data posyandu di Desa Sinargalih.
            </p>
        </div>

        {{-- menu1 --}}
        <div class="bg-white shadow-md rounded-lg p-6 mt-8 flex-grow">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">

                <!-- Pelaporan Kehamilan -->
                <a href="{{ route('posyandu-kehamilan') }}" class="group block bg-gradient-to-r from-pink-500 to-pink-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pendataan Kehamilan</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data kehamilan.</p>
                        </div>
                    </div>
                </a>

                <!-- Pelaporan Kelahiran -->
                <a href="{{ route('posyandu-data-kelahiran') }}" class="group block bg-gradient-to-r from-pink-700 to-pink-800 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pendataan Kelahiran</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data kelahiran.</p>
                        </div>
                    </div>
                </a>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <!-- Pelaporan Data Anak -->
                <a href="{{ route('posyandu-data-anak') }}" class="group block bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pendataan Data Anak</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data anak.</p>
                        </div>
                    </div>
                </a>

            <!-- Pelaporan Lansia -->
                <a href="{{ route('posyandu-data-lansia') }}" class="group block bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <!-- Ikon Baru: Ikon Dokumen -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Pendataan Lansia</h3>
                            <p class="text-sm text-white text-opacity-80">Pelaporan data lansia.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>  

    </main>
@include('user.layout.footer')
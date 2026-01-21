@include('user.layout.header')

    <div class="container mx-auto mt-8 flex-grow">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">User Dashboard</h1>

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- kehamilan -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Kehamilan</h2>
                <p class="text-4xl font-semibold text-blue-600 mt-4">{{ $totalKehamilan ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan kehamilan terdaftar.</p>
            </div>

            <!-- kelahiran -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Kelahiran</h2>
                <p class="text-4xl font-semibold text-blue-600 mt-4">{{ $totalKelahiran ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan kelahiran terdaftar.</p>
            </div>

            <!-- ukur anak -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Ukur Anak</h2>
                <p class="text-4xl font-semibold text-yellow-600 mt-4">{{ $totalAnakData ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan ukur anak terdaftar.</p>
            </div>

            <!-- Lansia -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Lansia</h2>
                <p class="text-4xl font-semibold text-green-600 mt-4">{{ $totalLansia ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan lansia terdaftar.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <!-- Bencana -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Bencana</h2>
                <p class="text-4xl font-semibold text-blue-600 mt-4">{{ $totalBencana ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan bencana terdaftar.</p>
            </div>

            <!-- kematian -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Kematian</h2>
                <p class="text-4xl font-semibold text-yellow-600 mt-4">{{ $totalKematian ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan kematian terdaftar.</p>
            </div>

            <!-- kepindahan dan pendatang -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Kepindahan dan Pendatang</h2>
                <p class="text-4xl font-semibold text-green-600 mt-4">{{ $totalKepindahan ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan kepindahan dan pendatang terdaftar.</p>
            </div>

            <!-- Tindak Kriminal -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-700">Tindak Kriminal</h2>
                <p class="text-4xl font-semibold text-green-600 mt-4">{{ $totalTindakKriminal ?? 0 }}</p>
                <p class="text-sm text-gray-500 mt-2">Total laporan tindak kriminal terdaftar.</p>
            </div>
        </div>

    </div>

@include('user.layout.footer')
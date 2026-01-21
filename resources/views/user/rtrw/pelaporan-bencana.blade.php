@include('user.layout.header')   
    <main class="container mx-auto mt-8 flex-grow">
        <div class="container mx-auto p-6">
            <a href="{{ route('rt-rw') }}" class="font-bold text-gray-700 inline-flex items-center space-x-2 hover:text-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 hover:text-orange-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <!-- List Table -->
        <div class="bg-white shadow-md rounded-lg p-6 flex-grow">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Daftar Data Bencana</h2>
            <div class="overflow-x-auto">
                @if ($data->count() > 0)
                    <table class="w-full bg-white border border-gray-200 text-sm">
                        <thead>
                            <tr>
                                @foreach ($columns as $col)
                                    <th class="py-3 px-4 border-b border-gray-200 bg-orange-500 text-left font-semibold text-gray-50 whitespace-nowrap">
                                        {{ $col }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr class="hover:bg-gray-50">
                                    @foreach ($columns as $col)
                                        <td class="py-3 px-4 border-b border-gray-200 text-gray-600">
                                            {{ $row[$col] ?? '-' }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 text-center py-8">Belum ada data bencana.</p>
                @endif
            </div>
        </div>
    </main>

    <script>
        // Set today's date as default
        document.getElementById('tanggal_keluar').valueAsDate = new Date();
    </script>

@include('user.layout.footer')
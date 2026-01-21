<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

class FetchCsvData
{
    /**
     * Fetch CSV data dari Google Sheets
     * Google Forms menggunakan kolom dinamis, jadi harus handle multiple column indices
     */
    public static function getCsvData($csvUrl)
    {
        $data = [];
        try {
            if (($handle = fopen($csvUrl, "r")) !== FALSE) {
                // Baca header dari baris 1
                $header = fgetcsv($handle, 2000, ",");
                
                if (!$header) {
                    fclose($handle);
                    return $data;
                }
                
                // Track duplicate column names untuk handle Google Forms conditional logic
                $columnCount = [];
                $headerFinal = [];
                foreach ($header as $idx => $col) {
                    if (isset($columnCount[$col])) {
                        $columnCount[$col]++;
                        $headerFinal[$idx] = $col . '_' . $columnCount[$col]; // Append index untuk duplicate
                    } else {
                        $columnCount[$col] = 1;
                        $headerFinal[$idx] = $col;
                    }
                }
                
                // Baca semua data
                while (($row = fgetcsv($handle, 2000, ",")) !== FALSE) {
                    $item = [];
                    foreach ($headerFinal as $index => $col) {
                        $item[$col] = $row[$index] ?? null;
                    }
                    
                    // Skip baris kosong - cek apakah ada data meaningful
                    if (!empty(array_filter($item, function($v) { return !empty(trim((string)$v)); }))) {
                        $data[] = $item;
                    }
                }
                fclose($handle);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching CSV: ' . $e->getMessage());
        }
        return $data;
    }

    /**
     * Hitung total dari kolom tertentu
     */
    public static function countByColumn($data, $column, $value)
    {
        return collect($data)->filter(function ($item) use ($column, $value) {
            return isset($item[$column]) && $item[$column] === $value;
        })->count();
    }

    /**
     * Hitung total records
     */
    public static function countTotal($data)
    {
        return count($data);
    }

    /**
     * Get statistik kehamilan
     */
    public static function getKehamilanStats($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        return [
            'total' => self::countTotal($data),
            'posyandu' => self::countByColumn($data, 'Pelaporan yang ingin anda buat?', 'Posyandu'),
            'rt_rw' => self::countByColumn($data, 'Pelaporan yang ingin anda buat?', 'RT/RW'),
        ];
    }

    /**
     * Get value dari multiple possible column names (Google Forms conditional logic)
     * Handles both original column names and suffixed versions for duplicates
     */
    private static function getColumnValue($item, $columnNames)
    {
        if (is_string($columnNames)) {
            $columnNames = [$columnNames];
        }
        
        foreach ($columnNames as $col) {
            // Try original
            if (isset($item[$col]) && !empty(trim((string)$item[$col]))) {
                return trim($item[$col]);
            }
            // Try with suffixes (for duplicate columns from Google Forms)
            if (isset($item[$col . '_1']) && !empty(trim((string)$item[$col . '_1']))) {
                return trim($item[$col . '_1']);
            }
            if (isset($item[$col . '_2']) && !empty(trim((string)$item[$col . '_2']))) {
                return trim($item[$col . '_2']);
            }
            if (isset($item[$col . '_3']) && !empty(trim((string)$item[$col . '_3']))) {
                return trim($item[$col . '_3']);
            }
        }
        return '';
    }

    /**
     * Get data kehamilan dari Posyandu
     */
    public static function getKehamilanData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $kehamilanData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            // Google Forms punya 2 kolom "Pelaporan apa yang ingin anda buat?" - coba keduanya
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            // Filter: Posyandu dan jenis = Pelaporan Data Kehamilan
            return $pelaporan === 'Posyandu' && $jenis === 'Pelaporan Data Kehamilan';
        })->values();

        return $kehamilanData;
    }

    /**
     * Get data kelahiran dari Posyandu
     */
    public static function getKelahiranData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $kelahiranData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            // Filter: Posyandu dan jenis = Pelaporan Data Kelahiran
            return $pelaporan === 'Posyandu' && $jenis === 'Pelaporan Data Kelahiran';
        })->values();

        return $kelahiranData;
    }

    /**
     * Get data anak dari Posyandu
     */
    public static function getDataAnakData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $dataAnakData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            // Filter: Posyandu dan jenis = Pelaporan Data Anak
            return $pelaporan === 'Posyandu' && $jenis === 'Pelaporan Data Anak';
        })->values();

        return $dataAnakData;
    }

    /**
     * Get data lansia dari Posyandu
     */
    public static function getDataLansiaData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $lansiaData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            // Filter: Posyandu dan jenis = Pelaporan Data Lansia
            return $pelaporan === 'Posyandu' && $jenis === 'Pelaporan Data Lansia';
        })->values();

        return $lansiaData;
    }

    /**
     * Get data bencana dari RT/RW
     */
    public static function getDataBencanaData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $bencanaData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            return $pelaporan === 'RT/RW' && $jenis === 'Pelaporan Bencana';
        })->values();

        return $bencanaData;
    }

    /**
     * Get data kematian dari RT/RW
     */
    public static function getDataKematianData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $kematianData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            return $pelaporan === 'RT/RW' && $jenis === 'Pelaporan Kematian';
        })->values();

        return $kematianData;
    }

    /**
     * Get data kepindahan dan pendatang dari RT/RW
     */
    public static function getDataKepindahanData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $kepindahanData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            return $pelaporan === 'RT/RW' && $jenis === 'Pelaporan Kepindahan dan Pendatang';
        })->values();

        return $kepindahanData;
    }

    /**
     * Get data tindak kriminal dari RT/RW
     */
    public static function getDataTindakKriminalData($csvUrl)
    {
        $data = self::getCsvData($csvUrl);
        
        $tindakKriminalData = collect($data)->filter(function ($item) {
            $pelaporan = self::getColumnValue($item, 'Pelaporan yang ingin anda buat?');
            $jenis = self::getColumnValue($item, [
                'Pelaporan apa yang ingin anda buat?',
            ]);
            
            return $pelaporan === 'RT/RW' && $jenis === 'Pelaporan Tindak Kriminal';
        })->values();

        return $tindakKriminalData;
    }

    /**
     * Get kolom untuk Pelaporan Data Kehamilan
     */
    public static function getKehamilanColumns()
    {
        return [
            'Timestamp',
            'Nama Istri',
            'NIK Istri',
            'Nama Suami',
            'NIK Suami',
            'Tanggal Lahir Istri',
            'Berat Badan (kg) ',
            'Tinggi Badan (cm) ',
            'Lingkar Lengan (cm) ',
            'HPHT',
            'Status Kehamilan',
            'Kartu Kesehatan yang Dimiliki',
            'Posyandu   ',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Data Kelahiran
     */
    public static function getKelahiranColumns()
    {
        return [
            'Timestamp',
            'Nama Ibu ',
            'NIK Ibu',
            'Nama Ayah',
            'NIK Ayah',
            'NIK Anak (opsional)',
            'Pembantu Kelahiran',
            'Anak ke berapa',
            'Nomor KK',
            'Foto KK',
            'Posyandu',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Data Anak
     */
    public static function getDataAnakColumns()
    {
        return [
            'Timestamp',
            'Nama Ibu',
            'Nama Anak',
            'Jenis Kelamin Anak',
            'Tanggal Lahir Anak',
            'Usia Anak',
            'Berat Badan Anak (kg)',
            'Tinggi Badan Anak (cm)',
            'Lingkar Kepala Anak (cm)',
            'Lingkar Lengan Anak (cm)',
            'Posyandu ',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Data Lansia
     */
    public static function getDataLansiaColumns()
    {
        return [
            'Timestamp',
            'Nama Anda',
            'Tanggal Lahir',
            'Usia Anda',
            'NIK Anda',
            'Riwayat Penyakit',
            'Tekanan Darah',
            'Gula',
            'Kolesterol (opsional)',
            'Posyandu  ',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Bencana
     */
    public static function getDataBencanaColumns()
    {
        return [
            'Timestamp',
            'Jenis Bencana',
            'Tanggal Kejadian ',
            'Lokasi Kejadian ',
            'Jumlah KK terdampak',
            'Korban Luka',
            'Korban Meninggal',
            'Tindakan Awal',
            'Bantuan Yang Dibutuhkan',
            'Nama Pelapor ',
            'Jabatan Pelapor (RT/RW) ',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Kematian
     */
    public static function getDataKematianColumns()
    {
        return [
            'Timestamp',
            'Nama Almarhum',
            'NIK Almarhum',
            'Jenis Kelamin Almarhum',
            'Usia Almarhum',
            'Tanggal Meninggal',
            'Waktu Meninggal',
            'Tempat Meninggal',
            'Penyebab Kematian',
            'Foto KTP',
            'Foto  KK ',
            'Surat Kematian (opsional)',
            ' Nama Pelapor',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Kepindahan dan Pendatang
     */
    public static function getDataKepindahanColumns()
    {
        return [
            'Timestamp',
            'Nama Warga',
            'NIK Warga',
            'Jenis Laporan',
            'Tanggal Kepergian/Kedatangan',
            'Alamat Asal',
            'Alamat Tujuan',
            'Foto KK',
        ];
    }

    /**
     * Get kolom untuk Pelaporan Tindak Kriminal
     */
    public static function getDataTindakKriminalColumns()
    {
        return [
            'Timestamp',
            'Jenis Pelanggaran',
            'Tanggal Kejadian',
            'Lokasi Kejadian',
            'Nama Tersangka',
            'NIK Tersangka',
            'Jenis Kelamin',
            'Alamat',
            'Nama Pelapor',
            'Deskripsi Kasus',
        ];
    }
}

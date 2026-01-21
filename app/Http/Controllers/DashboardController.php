<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Permintaan;
use App\Models\BarangKeluar;
use App\Models\LaporanKerusakan;
use App\Models\ActivityLog;
use App\Traits\FetchCsvData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardUser()
    {
        // CSV URLs
        $csvUrl = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSrcZCo1MDiHp-46e3hWZ37OCW3POEGmkrp04XjeJeGgfCTf_tLGAQUrg77mInNjqphol7AUavBg0TJ/pub?output=csv";
        
        // Get data untuk semua kategori
        $kehamilanData = FetchCsvData::getKehamilanData($csvUrl);
        $kelahiranData = FetchCsvData::getKelahiranData($csvUrl);
        $dataAnakData = FetchCsvData::getDataAnakData($csvUrl);
        $lansiaData = FetchCsvData::getDataLansiaData($csvUrl);
        $bencanaData = FetchCsvData::getDataBencanaData($csvUrl);
        $kematianData = FetchCsvData::getDataKematianData($csvUrl);
        $kepindahanData = FetchCsvData::getDataKepindahanData($csvUrl);
        $tindakKriminalData = FetchCsvData::getDataTindakKriminalData($csvUrl);
        
        return view('user-dashboard', [
            'totalKehamilan' => $kehamilanData->count(),
            'totalKelahiran' => $kelahiranData->count(),
            'totalAnakData' => $dataAnakData->count(),
            'totalLansia' => $lansiaData->count(),
            'totalBencana' => $bencanaData->count(),
            'totalKematian' => $kematianData->count(),
            'totalKepindahan' => $kepindahanData->count(),
            'totalTindakKriminal' => $tindakKriminalData->count(),
        ]);
    }

    public function dashboardAdmin()
    {
        return view('admin-dashboard');
    }
}
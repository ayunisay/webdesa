<?php

namespace App\Http\Controllers;

use App\Traits\FetchCsvData;
use Illuminate\Http\Request;

class RtRwController extends Controller
{
    private $csvUrl = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSrcZCo1MDiHp-46e3hWZ37OCW3POEGmkrp04XjeJeGgfCTf_tLGAQUrg77mInNjqphol7AUavBg0TJ/pub?output=csv";

    public function index()
    {
        return view('user.rtrw.rt-rw');
    }

    public function laporanBencana()
    {
        $bencanaData = FetchCsvData::getDataBencanaData($this->csvUrl);
        $columns = FetchCsvData::getDataBencanaColumns();
        
        return view('user.rtrw.pelaporan-bencana', [
            'data' => $bencanaData,
            'columns' => $columns,
        ]);
    }

    public function laporanKematian()
    {
        $kematianData = FetchCsvData::getDataKematianData($this->csvUrl);
        $columns = FetchCsvData::getDataKematianColumns();
        
        return view('user.rtrw.pelaporan-kematian', [
            'data' => $kematianData,
            'columns' => $columns,
        ]);
    }

    public function laporanKepindahanKedatangan()
    {
        $kepindahanData = FetchCsvData::getDataKepindahanData($this->csvUrl);
        $columns = FetchCsvData::getDataKepindahanColumns();
        
        return view('user.rtrw.pelaporan-kepindahan-datang', [
            'data' => $kepindahanData,
            'columns' => $columns,
        ]);
    }

    public function laporanTindakKriminal()
    {
        $tindakKriminalData = FetchCsvData::getDataTindakKriminalData($this->csvUrl);
        $columns = FetchCsvData::getDataTindakKriminalColumns();
        
        return view('user.rtrw.pelaporan-tindak-kriminal', [
            'data' => $tindakKriminalData,
            'columns' => $columns,
        ]);
    }
}

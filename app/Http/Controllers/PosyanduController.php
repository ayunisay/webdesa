<?php

namespace App\Http\Controllers;

use App\Models\Kehamilan;
use App\Traits\FetchCsvData;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    private $csvUrl = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSrcZCo1MDiHp-46e3hWZ37OCW3POEGmkrp04XjeJeGgfCTf_tLGAQUrg77mInNjqphol7AUavBg0TJ/pub?output=csv";

    public function index()
    {
        return view('user.posyandu.posyandu');
    }

    public function kehamilanview()
    {
        $kehamilanData = FetchCsvData::getKehamilanData($this->csvUrl);
        $columns = FetchCsvData::getKehamilanColumns();
        
        return view('user.posyandu.pelaporan-kehamilan', [
            'data' => $kehamilanData,
            'columns' => $columns,
        ]);
    }

    public function dataAanakView()
    {
        $dataAnakData = FetchCsvData::getDataAnakData($this->csvUrl);
        $columns = FetchCsvData::getDataAnakColumns();
        
        return view('user.posyandu.pelaporan-anak', [
            'data' => $dataAnakData,
            'columns' => $columns,
        ]);
    }

    public function dataLansiaView()
    {
        $lansiaData = FetchCsvData::getDataLansiaData($this->csvUrl);
        $columns = FetchCsvData::getDataLansiaColumns();
        
        return view('user.posyandu.pelaporan-lansia', [
            'data' => $lansiaData,
            'columns' => $columns,
        ]);
    }

    public function dataKelahiranView()
    {
        $kelahiranData = FetchCsvData::getKelahiranData($this->csvUrl);
        $columns = FetchCsvData::getKelahiranColumns();
        
        return view('user.posyandu.pelaporan-kelahiran', [
            'data' => $kelahiranData,
            'columns' => $columns,
        ]);
    }
}

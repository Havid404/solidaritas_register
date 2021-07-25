<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function kabupaten(Request $request){
        $province_id = $request->province_id;
        $kabupatens = Kabupaten::where('province_id', $province_id)->get();
        return response()->json($kabupatens);
    }

    public function kecamatan(Request $request){
        $kabupaten_id = $request->kabupaten_id;
        $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
        return response()->json($kecamatans);
    }

    public function kelurahan(Request $request){
        $kecamatan_id = $request->kecamatan_id;
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahans);
    }
}

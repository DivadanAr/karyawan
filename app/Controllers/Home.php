<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\MakananFavModel;
use App\Models\OlahragaFavModel;

class Home extends BaseController
{
    public function index(): string
    {
        $Karyawan = new KaryawanModel();
        $MakananModel = new MakananFavModel();
        $OlahragaModel = new OlahragaFavModel();

        $data = [
            'makanans' => $MakananModel->select('makanan.nama_makanan, count(makanan_favorit.karyawan_id) as total')
                ->join('makanan', 'makanan.id = makanan_favorit.makanan_id', 'left')
                ->groupBy('makanan_id')
                ->findAll(),
            'olahragas' => $OlahragaModel->select('olahraga.nama_olahraga, count(olahraga_favorit.karyawan_id) as total')
                ->join('olahraga', 'olahraga.id = olahraga_favorit.olahraga_id', 'left')
                ->groupBy('olahraga_id')
                ->findAll(),
            'total_karyawan' => $Karyawan->countAllResults(),
            'total_laki' => $Karyawan->where('jenis_kelamin', 'Laki-laki')->countAllResults(),
            'total_perempuan' => $Karyawan->where('jenis_kelamin', 'Perempuan')->countAllResults()
        ];

        return view('dashboard', $data);
    }
}

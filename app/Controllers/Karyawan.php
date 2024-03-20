<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\MakananFavModel;
use App\Models\MakananModel;
use App\Models\OlahragaFavModel;
use App\Models\OlahragaModel;

class Karyawan extends BaseController
{
    public function index()
    {

        $karyawanModel = new KaryawanModel();

        $data = [
            'karyawan' => $karyawanModel->select('karyawan.nama, karyawan.id, karyawan.jenis_kelamin, karyawan.nip, GROUP_CONCAT(makanan.nama_makanan SEPARATOR ", ") as makanan_favorit, GROUP_CONCAT(olahraga.nama_olahraga SEPARATOR ", ") as olahraga_favorit')
                ->join('makanan_favorit', 'makanan_favorit.karyawan_id = karyawan.id', 'left')
                ->join('olahraga_favorit', 'olahraga_favorit.karyawan_id = karyawan.id', 'left')
                ->join('makanan', 'makanan.id = makanan_favorit.makanan_id', 'left')
                ->join('olahraga', 'olahraga.id = olahraga_favorit.olahraga_id', 'left')
                ->groupBy('karyawan.id')
                ->findAll()
        ];


        return view('karyawan/karyawan', $data);
    }


    public function create()
    {
        $MakananModel = new MakananModel();
        $olahragaModel = new OlahragaModel();

        $data = [
            'makanans' => $MakananModel->findAll(),
            'olahragas' => $olahragaModel->findAll(),
        ];

        return view('karyawan/create_karyawan', $data);
    }

    public function store()
    {
        try {
            $validation = $this->validate([
                'nama' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Nama karyawan Harus terisi.'
                    ]
                ],
                'nip' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'NIP Harus terisi.'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin Harus terisi.'
                    ]
                ],
                'tanggal_lahir' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir Harus terisi.'
                    ]
                ],
                'nomor_telepon' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Nomor Telepon Harus terisi.'
                    ]
                ],
                'alamat' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Alamat Harus terisi.'
                    ]
                ],

            ]);
            if (!$validation) {
                return view('karyawan/create_karyawan', [
                    'validation' => $this->validator
                ]);
            } else {
                $karyawanModel = new KaryawanModel();
                $MakananFavoritModel = new MakananFavModel();
                $olahragaFavoritModel = new OlahragaFavModel();

                $karyawanData = [
                    'nama'   => $this->request->getPost('nama'),
                    'nip'   => $this->request->getPost('nip'),
                    'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
                    'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
                    'nomor_telepon'   => $this->request->getPost('nomor_telepon'),
                    'alamat'   => $this->request->getPost('alamat'),
                ];
                $karyawanId = $karyawanModel->insert($karyawanData);

                if ($karyawanId) {
                    $makananFavorit = $this->request->getPost('makanan');
                    if (!empty($makananFavorit)) {
                        foreach ($makananFavorit as $makananId) {
                            $makananData = [
                                'makanan_id' => $makananId,
                                'karyawan_id' => $karyawanId,
                            ];
                            $MakananFavoritModel->insert($makananData);
                        }
                    }

                    $olahragaFavorit = $this->request->getPost('olahraga');
                    if (!empty($olahragaFavorit)) {
                        foreach ($olahragaFavorit as $olahragaId) {
                            $olahragaData = [
                                'olahraga_id' => $olahragaId,
                                'karyawan_id' => $karyawanId,
                            ];
                            $olahragaFavoritModel->insert($olahragaData);
                        }
                    }
                }

                session()->setFlashdata('message', 'Karyawan Berhasil Disimpan');
                return redirect()->to(base_url('karyawan'));
            }
        } catch (\Throwable $th) {
            var_dump($th);
            die;
        }
    }

    public function edit($id)
    {

        $KaryawanModel = new KaryawanModel();
        $MakananModel = new MakananModel();
        $MakananFavModel = new MakananFavModel();
        $olahragaModel = new OlahragaModel();
        $olahragaFavModel = new OlahragaFavModel();

        $data = [
            'makanans' => $MakananModel->findAll(),
            'makanan_fav' => $MakananFavModel->select('makanan.id, makanan.nama_makanan')->join('makanan', 'makanan.id = makanan_favorit.makanan_id', 'left')->where('karyawan_id', $id)->findAll(),
            'olahragas' => $olahragaModel->findAll(),
            'olahraga_fav' => $olahragaFavModel->select('olahraga.id, olahraga.nama_olahraga')->join('olahraga', 'olahraga.id = olahraga_favorit.olahraga_id', 'left')->where('karyawan_id', $id)->findAll(),
            'karyawan' => $KaryawanModel->find($id)
        ];

        // dd($data);
        // die;

        return view('karyawan/edit_karyawan', $data);
    }

    public function detail($id)
    {

        $KaryawanModel = new KaryawanModel();
        $MakananModel = new MakananModel();
        $MakananFavModel = new MakananFavModel();
        $olahragaModel = new OlahragaModel();
        $olahragaFavModel = new OlahragaFavModel();

        $data = [
            'makanans' => $MakananModel->findAll(),
            'makanan_fav' => $MakananFavModel->select('makanan.id, makanan.nama_makanan')->join('makanan', 'makanan.id = makanan_favorit.makanan_id', 'left')->where('karyawan_id', $id)->findAll(),
            'olahragas' => $olahragaModel->findAll(),
            'olahraga_fav' => $olahragaFavModel->select('olahraga.id, olahraga.nama_olahraga')->join('olahraga', 'olahraga.id = olahraga_favorit.olahraga_id', 'left')->where('karyawan_id', $id)->findAll(),
            'karyawan' => $KaryawanModel->find($id)
        ];

        // dd($data);
        // die;

        return view('karyawan/detail_karyawan', $data);
    }

    public function update($id)
    {
        // try {
        // $validation = $this->validate([
        //     'nama' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'Nama karyawan Harus terisi.'
        //         ]
        //     ],
        //     'nip' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'NIP Harus terisi.'
        //         ]
        //     ],
        //     'jenis_kelamin' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'Jenis Kelamin Harus terisi.'
        //         ]
        //     ],
        //     'tanggal_lahir' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'Tanggal Lahir Harus terisi.'
        //         ]
        //     ],
        //     'nomor_telepon' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'Nomor Telepon Harus terisi.'
        //         ]
        //     ],
        //     'alamat' => [
        //         'rules'  => 'required',
        //         'errors' => [
        //             'required' => 'Alamat Harus terisi.'
        //         ]
        //     ],

        // ]);
        // if (!$validation) {
        //     $KaryawanModel = new KaryawanModel();
        //     $MakananModel = new MakananModel();
        //     $MakananFavModel = new MakananFavModel();
        //     $olahragaModel = new OlahragaModel();
        //     $olahragaFavModel = new OlahragaFavModel();

        //     return view('karyawan/edit_karyawan', [
        //         'validation' => $this->validator,
        //         'makanans' => $MakananModel->findAll(),
        //         'makanan_fav' => $MakananFavModel->select('makanan.id, makanan.nama_makanan')->join('makanan', 'makanan.id = makanan_favorit.makanan_id', 'left')->where('karyawan_id', $id)->findAll(),
        //         'olahragas' => $olahragaModel->findAll(),
        //         'olahraga_fav' => $olahragaFavModel->select('olahraga.id, olahraga.nama_olahraga')->join('olahraga', 'olahraga.id = olahraga_favorit.olahraga_id', 'left')->where('karyawan_id', $id)->findAll(),
        //         'karyawan' => $KaryawanModel->find($id)

        //     ]);
        // } else {
        $karyawanModel = new KaryawanModel();
        $MakananFavoritModel = new MakananFavModel();
        $olahragaFavoritModel = new OlahragaFavModel();

        $karyawanModel->update($id, [
            'nama'   => $this->request->getPost('nama'),
            'nip'   => $this->request->getPost('nip'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
            'nomor_telepon'   => $this->request->getPost('nomor_telepon'),
            'alamat'   => $this->request->getPost('alamat'),
        ]);

        if ($karyawanModel) {
            $makananFavorit = $this->request->getPost('makanan');
            if (!empty($makananFavorit)) {
                $MakananFavoritModel->where('karyawan_id', $id)->delete();
                foreach ($makananFavorit as $makananId) {
                    $makananData = [
                        'makanan_id' => $makananId,
                        'karyawan_id' => $id,
                    ];
                    $MakananFavoritModel->insert($makananData);
                }
            }

            $olahragaFavorit = $this->request->getPost('olahraga');
            if (!empty($olahragaFavorit)) {
                $olahragaFavoritModel->where('karyawan_id', $id)->delete();
                foreach ($olahragaFavorit as $olahragaId) {
                    $olahragaData = [
                        'olahraga_id' => $olahragaId,
                        'karyawan_id' => $id,
                    ];
                    $olahragaFavoritModel->insert($olahragaData);
                }
            }
        }

        session()->setFlashdata('message', 'Karyawan Berhasil Disimpan');
        return redirect()->to(base_url('karyawan'));
    }
    // } catch (\Throwable $th) {
    //     var_dump($th);
    //     die;
    // }


    public function delete($id)
    {
        $KaryawanModel = new KaryawanModel();
        $MakananFavModel = new MakananFavModel();
        $OlahragaFavModel = new OlahragaFavModel();

        $Makanan = $MakananFavModel->where('karyawan_id', $id);
        $Olahraga = $OlahragaFavModel->where('karyawan_id', $id);
        $Karywan = $KaryawanModel->where('id', $id);

        if (!$Karywan) {
            session()->setFlashdata('error', 'Karyawan tidak ditemukan');
            return redirect()->to(base_url('karyawan'));
        }

        $Makanan->delete();
        $Olahraga->delete();
        $Karywan->delete();

        session()->setFlashdata('message', 'Data Karyawan dan Makanan-Olahraga Berhasil Dihapus');
        return redirect()->to(base_url('karyawan'));
    }
}

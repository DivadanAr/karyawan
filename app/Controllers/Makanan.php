<?php

namespace App\Controllers;

use App\Models\MakananModel;

class Makanan extends BaseController
{
    public function index(): string
    {
        $MakananModel = new MakananModel();

        $pager = \Config\Services::pager();

        $data = [
            'makanans' => $MakananModel->paginate(5, 'makanan'),
            'pager' => $MakananModel->pager
        ];

        // var_dump($data);
        // die;
        return view('makanan/makanan', $data);
    }

    public function create()
    {
        return view('makanan/create_makanan');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_makanan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Makanan Harus terisi.'
                ]
            ],
        ]);
        if (!$validation) {

            return view('makanan/create_makanan', [
                'validation' => $this->validator
            ]);
        } else {

            $MakananModel = new MakananModel();

            $MakananModel->insert([
                'nama_makanan'   => $this->request->getPost('nama_makanan'),
            ]);

            session()->setFlashdata('message', 'Makanan Berhasil Disimpan');

            return redirect()->to(base_url('makanan'));
        }
    }

    public function detail($id)
    {
        $MakananModel = new MakananModel();

        $data = array(
            'makanan' => $MakananModel->find($id)
        );

        return view('makanan/detail_makanan', $data);
    }

    public function edit($id)
    {
        $MakananModel = new MakananModel();

        $data = array(
            'makanan' => $MakananModel->find($id)
        );

        return view('makanan/edit_makanan', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama_makanan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Makanan.'
                ]
            ],
        ]);

        if (!$validation) {

            $MakananModel = new MakananModel();

            return view('edit_makanan', [
                'makanan' => $MakananModel->find($id),
                'validation' => $this->validator
            ]);
        } else {

            $MakananModel = new MakananModel();

            $MakananModel->update($id, [
                'nama_makanan'   => $this->request->getPost('nama_makanan'),
            ]);

            session()->setFlashdata('message', 'Post Berhasil Diupdate');

            return redirect()->to(base_url('makanan'));
        }
    }

    public function delete($id)
    {
        $MakananModel = new MakananModel();

        $Makanan = $MakananModel->find($id);

        if ($Makanan) {
            $MakananModel->delete($id);

            session()->setFlashdata('message', 'Makanan Berhasil Dihapus');

            return redirect()->to(base_url('makanan'));
        }
    }
}

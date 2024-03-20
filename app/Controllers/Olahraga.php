<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\OlahragaModel;

class Olahraga extends BaseController
{
    public function index(): string
    {
        $OlahragaModel = new OlahragaModel();

        $pager = \Config\Services::pager();

        $data = [
            'olahragas' => $OlahragaModel->paginate(5, 'olahraga'),
            'pager' => $OlahragaModel->pager
        ];

        return view('olahraga/olahraga', $data);
    }

    public function create()
    {
        return view('olahraga/create_olahraga');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_olahraga' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Olahraga Harus terisi.'
                ]
            ],
        ]);
        if (!$validation) {

            return view('olahraga/create_olahraga', [
                'validation' => $this->validator
            ]);
        } else {

            $olahragaModel = new OlahragaModel();

            $olahragaModel->insert([
                'nama_olahraga'   => $this->request->getPost('nama_olahraga'),
            ]);

            session()->setFlashdata('message', 'Olahraga Berhasil Disimpan');

            return redirect()->to(base_url('olahraga'));
        }
    }

    public function detail($id)
    {
        $olahragaModel = new OlahragaModel();

        $data = array(
            'olahraga' => $olahragaModel->find($id)
        );

        return view('olahraga/detail_olahraga', $data);
    }

    public function edit($id)
    {
        $olahragaModel = new OlahragaModel();

        $data = array(
            'olahraga' => $olahragaModel->find($id)
        );

        return view('olahraga/edit_olahraga', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama_olahraga' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama Olahraga.'
                ]
            ],
        ]);

        if (!$validation) {

            $olahragaModel = new OlahragaModel();

            return view('edit_olahraga', [
                'olahraga' => $olahragaModel->find($id),
                'validation' => $this->validator
            ]);
        } else {

            $olahragaModel = new olahragaModel();

            $olahragaModel->update($id, [
                'nama_olahraga'   => $this->request->getPost('nama_olahraga'),
            ]);

            session()->setFlashdata('message', 'Post Berhasil Diupdate');

            return redirect()->to(base_url('olahraga'));
        }
    }

    public function delete($id)
    {
        $olahragaModel = new OlahragaModel();

        $olahraga = $olahragaModel->find($id);

        if ($olahraga) {
            $olahragaModel->delete($id);

            session()->setFlashdata('message', 'olahraga Berhasil Dihapus');

            return redirect()->to(base_url('olahraga'));
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\DataModel;

class Data extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
    }

    public function index()
    {
        $data = [
            'siswa' => $this->dataModel->getAllData(),
        ];

        return view('halaman/datatable', $data);
    }

    public function detail($id)
    {
        $data = [
            'siswa' => $this->dataModel->getDataId($id),
        ];
        return view('halaman/dataDetail', $data);
    }

    public function edit($id)
    {
        $data = [
            'siswa' => $this->dataModel->getDataId($id),
        ];
        echo view('halaman/dataEdit', $data);
    }

    public function saveEdit()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'nisn' => $this->request->getPost('nisn'),
            'nik' => $this->request->getPost('nik'),
            'alamat' => $this->request->getPost('alamat'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'lulus' => $this->request->getPost('lulus'),
        ];
        $this->dataModel->dataEdit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/Data');
    }

    public function delete($id)
    {
        $this->dataModel->deleteData($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Data');
    }

    public function create()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nisn' => $this->request->getPost('nisn'),
            'nik' => $this->request->getPost('nik'),
            'alamat' => $this->request->getPost('alamat'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'lulus' => $this->request->getPost('lulus'),
        ];
        $this->dataModel->createData($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/Data');
    }
    //--------------------------------------------------------------------

}

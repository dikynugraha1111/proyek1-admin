<?php

namespace App\Models;

use GuzzleHttp\Client;

use CodeIgniter\Model;

class DataModel extends Model
{
    private $_client;
    // protected $table = 'data_siswa';
    // public function __construct()
    // {
    //     $this->_client = new Client([`
    //         'base_uri' => 'http://localhost:8080/Data_Siswa_Controller',
    //     ]);
    // }

    public function getAllData()
    {

        $response = $this->request('GET', 'http://localhost:8080/Data_Siswa_Controller/', [
            'query' => []
        ]);
        // return $this->db->get('mahasiswa')->result_array();

        $result = json_decode($response->getBody()->getContents(), true);
        // d($result['data']);
        return $result['data'];
    }

    public function getDataId($id)
    {
        $response = $this->request('GET', 'http://localhost:8080/Data_Siswa_Controller/siswaid', [
            'query' => [
                'id' => $id,
            ]
        ]);
        // return $this->db->get('mahasiswa')->result_array();

        $result = json_decode($response->getBody()->getContents(), true);


        return $result['data'];
    }

    // public function search($nis)
    // {
    //     $response = $this->_client->request('GET', 'http://localhost:8080/Data_Siswa_Controller', [
    //         'query' => []
    //     ]);
    //     // return $this->db->get('mahasiswa')->result_array();

    //     $result = json_decode($response->getBody()->getContents(), true);

    //     foreach ($result['data'] as $nisn) {
    //         if ($nisn['nisn'] == $nis) {
    //             $nisnbaru[] = $nisn;
    //         }
    //     };
    //     // $builder->orderBy('nis', 'ASC');
    //     // return $this->table('orang')->like('nama', $keywoard);
    //     return $nisnbaru;
    // }


    public function dataEdit($data)
    {

        // $data = [
        //     "nisn" => $this->request->getVar('nisn'),
        //     "nik" => $this->request->getVar('nik'),
        //     "nama" => $this->request->getVar('nama'),
        //     "tgl_lahir" => $this->request->getVar('tgl_lahir'),
        //     "alamat" => $this->request->getVar('alamat'),
        //     "id" => $this->request->getVar('id'),
        // ];
        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);

        $response = $this->request('PUT', 'http://localhost:8080/Data_Siswa_Controller/editsiswa', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}

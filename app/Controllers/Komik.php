<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $KomikModel;
    public function __construct()
    {
        $this->KomikModel = new KomikModel();
    }
    public function index()
    {
        // $komik = $this->KomikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->KomikModel->getKomik()

        ];


        // $KomikModel = new KomikModel();



        return view('Komik/index', $data);
    }


    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->KomikModel->getKomik($slug)
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();

        $data = [
            'title' => 'Form Tambah Data Komik',
            
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah terdaftar.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Harga hanya boleh angka.'
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar sampul terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]

        ])) {
            // return redirect()->to('/komik/create')->withInput()->with('validation', \Config\Services::validation());
            return redirect()->to('/komik/create')->withInput();
        }
        dd('berhasil');

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->KomikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/komik');
    }


    public function delete($id)
    {
        $this->KomikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/komik');
    }


    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \config\Services::validation(),
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }
    public function update($id)
    {
        //cek judul
        $komikLama = $this->KomikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'is_unique' => 'Judul sudah terdaftar.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Harga hanya boleh angka.'
                ]
            ]

        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', \Config\Services::validation());
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->KomikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/komik');
    }
}

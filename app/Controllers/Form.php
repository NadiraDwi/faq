<?php

namespace App\Controllers;

use App\Models\FaqModel;


class Form extends BaseController
{
  protected $faqModel;

  public function __construct()
  {
    $this->faqModel = new FaqModel();
  }

  public function index()
  {
    $tambah = $this->faqModel->findAll();

    $data = [
      'title' => 'Halaman Olah Data FAQ',
      'tambah' => $tambah
    ];


    return view('/form/index', $data);
  }

  public function tambah()
  {
    session();
    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Form Tambah FAQ'
    ];

    return view('/form/tambah', $data);
  }

  public function simpan()
  {
    if (!$this->validate([
      'pertanyaan' => 'required|is_unique[tbltanya.pertanyaan]',
      'jawaban' => 'required',
      'kata_kunci' => 'required',
      'jenis' => 'required'
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/form/tambah')->withInput()->with('validation', $validation);
    }

    $this->faqModel->save([
      'pertanyaan' => $this->request->getVar('pertanyaan'),
      'jawaban' => $this->request->getVar('jawaban'),
      'kata_kunci' => $this->request->getVar('kata_kunci'),
      'jenis' => $this->request->getVar('jenis')
    ]);

    session()->setFlashdata('pesan', 'FAQ Berhasil ditambahkan.');

    return redirect()->to('/Form');
    // return view('/form/index');
  }
}

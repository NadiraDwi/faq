<?php

namespace App\Controllers;

use App\Models\FaqModel;

class Pages extends BaseController
{
  protected $faqModel;

  public function __construct()
  {
    $this->faqModel = new FaqModel();
  }
  public function index()
  {
    $currentPage = $this->request->getVar('page_faq') ? $this->request->getVar('page_faq') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $faq = $this->faqModel->search($keyword);
    } else {
      $faq = $this->faqModel;
    }

    $data = [
      'title' => 'Daftar FAQ',
      'faq' => $faq->paginate(5, 'tbltanya'),
      'pager' => $this->faqModel->pager,
      'currentPage' => $currentPage
    ];

    return view('pages/faq', $data);
  }
}

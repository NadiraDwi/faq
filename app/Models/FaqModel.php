<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
  protected $table = 'tbltanya';
  protected $allowedFields = ['pertanyaan', 'jawaban', 'kata_kunci', 'jenis'];

  public function search($keyword)
  {
    $builder = $this->table('tbltanya');
    $builder->like('pertanyaan', $keyword);
    return $builder;
  }

  public function getTambah($id)
  {
    return $this->where(['id' => $id])->first();
  }
}

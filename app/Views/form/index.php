<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <a href="/form/tambah" class="btn btn-primary mt-3">Tambah FAQ</a>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Jawaban</th>
            <th scope="col">Kata Kunci</th>
            <th scope="col">Jenis</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($tambah as $t) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $t['pertanyaan']; ?></td>
              <td><?= $t['jawaban']; ?></td>
              <td><?= $t['kata_kunci']; ?></td>
              <td><?= $t['jenis']; ?></td>
              <td>
                <a href="" class="btn btn-warning">Ubah</a>
                <a href="" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
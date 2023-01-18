<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col"><br>
      <div class="header">
        <h3>Form Tambah FAQ</h3>
      </div>
      <form action="/form/simpan" method="POST">
        <?= csrf_field(); ?>
        <div class="mt-5">
          <label for="pertanyaan" class="form-label">Isi Pertanyaan</label>
          <input type="text" class="form-control <?= ($validation->hasError('pertanyaan')) ? 'is-invalid' : ''; ?>" id="pertanyaan" name="pertanyaan" autofocus value="<?= old('pertanyaan'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('pertanyaan'); ?>
          </div>
        </div>

        <div class="mt-3">
          <label for="jawaban" class="form-label <?= ($validation->hasError('jawaban')) ? 'is-invalid' : ''; ?>">Isi Jawaban</label>
          <div class="col">
            <textarea name="jawaban" id="jawaban" cols="30" rows="10" class="form-control summernote" value=""><?= old('jawaban'); ?></textarea>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('jawaban'); ?>
          </div>
        </div>

        <div class="mt-3">
          <label for="kata_kunci" class="form-label">Isi kata kunci</label>
          <input type="text" class="form-control <?= ($validation->hasError('kata_kunci')) ? 'is-invalid' : ''; ?>" id="kata_kunci" name="kata_kunci" value="<?= old('kata_kunci'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('kata_kunci'); ?>
          </div>
        </div>

        <div class="mt-3">
          <label for="jenis" class="form-label">Isi jenis</label>
          <input type="text" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" value="<?= old('jenis'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('jenis'); ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">Tambahkan</button>
        <!-- <a href="/form/index" class="btn btn-primary my-3">Tambahkan</a> -->
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
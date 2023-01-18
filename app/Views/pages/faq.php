<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">

      <form action="" method="get">
        <div class="input-group my-3">
          <input type="text" class="form-control" placeholder="Masukan keyword pencarian.." name="keyword" id="keyword">
          <button class="btn btn-secondary" type="submit" name="submit">Cari</button>
        </div>
      </form>

      <section>
        <?php foreach ($faq as $f) : ?>
          <div class="container">
            <div class="faq">
              <div class="question">
                <h3><?= $f['pertanyaan']; ?></h3>
                <svg width="20" height="10" viewBox="0 0 42 25">
                  <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
              </div>
              <div class="answer">
                <p><?= $f['jawaban']; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?><br>

      </section>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
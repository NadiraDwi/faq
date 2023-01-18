<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

  <!-- CSS Ku -->
  <link rel="stylesheet" href="/css/style.css">

  <title><?= $title; ?></title>
  <style>
    .note-editor .dropdown-toggle::after {
      all: unset;
    }

    .note-editor .note-dropdown-menu {
      box-sizing: content-box;
    }

    .note-editor .note-modal-footer {
      box-sizing: content-box;
    }
  </style>
</head>

<body>
  <?= $this->include('layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <div id="summernote"></div>
  <script>
    $('.summernote').summernote({
      placeholder: 'Silakan isi dengan jawaban',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']]
        // ['insert', ['link', 'picture', 'video']],
        // ['view', ['fullscreen', 'codeview', 'help']]
      ],
      callbacks: {
        onImageUpload: function(files) {
          for (let i = 0; i < files.length; i++) {
            $.upload(files[i]);
          }
        },
        onMediaDelete: function(target) {
          $.delete(target[0].src);
        }
      },
    });

    $.upload = function(file) {
      let out = new FormatDate();
      out.append('file', file, file.name);
      $.ajax({
        method: 'POST',
        url: '<?php echo site_url('berita/uploadGambar') ?>',
        contentType: false,
        cache: false,
        processData: false,
        data: out,
        success: function(img) {
          $('.summernote').summernote('insertImage', img);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
        }
      });
    };
  </script>
  <script src="/js/app.js"></script>
</body>

</html>
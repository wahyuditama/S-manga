<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="image/hiragana.png" type="image/png" alt="">
  <title>My~Manga</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+AU+SA:wght@100..400&family=Playwrite+IE+Guides&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


</head>

<body>
  <?php session_start(); ?>
  <?php if (isset($_GET['edit']) || isset($_GET['tambah']) || isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['read']) || isset($_GET['report'])) : ?>
  <?php else : ?>
    <style>
      body {
        /* background: url('image/inazuma.png') no-repeat center fixed !important; */
        background-size: cover !important;
      }
    </style>
  <?php endif ?>
  <div class="container p-3 mb-0 my-4 rounded-3 shadow">
    <!-- main page -->
    <nav class="d-md-flex p-4">
      <div>
        <h1 style="color: dark; font-family:  Playwrite AU SA, serif;" ;> S~Manga</h1>
      </div>
      <div class="ms-auto my-auto">
        <ul class="list-inline m-0">
          <li class="list-inline-item mx-md-2"><a href="?" class="text-decoration-none text-dark fw-bold">home</a></li>
          <li class="list-inline-item mx-md-2"><a href="?pg&report" class="text-decoration-none text-dark fw-bold">Report</a></li>
          <li class="list-inline-item mx-md-2"><a href="<?php echo isset($_SESSION['ID']) ? 'content/login.php?logout' : 'content/login.php' ?>" class="text-decoration-none text-dark fw-bold"><?php echo isset($_SESSION['ID']) ? 'Logout' : 'Login'; ?>
            </a></li>
          <li class="list-inline-item mx-md-2"><input type="text" class="form-control border border-3" id="searchInput" placeholder="Cari..."></li>
        </ul>
      </div>
    </nav>
    <hr>
    <!-- banner -->
    <div class="card-title border-bottom border-primary-subtle m-2 p-2 shadow-md" align="right">
      <?php if (isset($_GET['edit']) || isset($_GET['tambah']) || isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['read']) || isset($_GET['report'])) : ?>
        <div class="justify-content-between <?php echo isset($_GET['report']) ? 'd-flex' : '' ?>">
          <a href="" class="text-decoration-none btn btn-sm btn-secondary <?php echo isset($_GET['report']) ? '' : 'd-none' ?>">Link Report</a>
          <a href="javascript:void(0)" class="text-decoration-none btn btn-sm btn-secondary" onclick="window.history.back()">Kembali</a>
        </div>
      <?php else : ?>
        <?php if (isset($_SESSION['ID'])) : ?>
          <a href="?tambah" class="text-decoration-none btn btn-sm btn-danger <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">Tambah Banner</a>
        <?php endif ?>
      <?php endif ?>
    </div>


    <?php if (isset($_GET['report'])) : ?>
      <?php include 'content/report.php' ?>
    <?php else : ?>
      <?php if (isset($_GET['tambah']) || isset($_GET['edit']) || isset($_GET['change_detail']) || isset($_GET['read'])) : ?>
        <?php include 'content/main.php' ?>
      <?php elseif (isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['delete'])) : ?>
        <?php include 'content/add_data.php' ?>
      <?php else : ?>
        <div class="row row-cols-sm-5 row-cols-2 gx-4 p-6">
          <?php include 'content/main.php' ?>
        <?php endif ?>
        </div>

      <?php endif ?>


  </div>
  <footer class="bg-light mt-5 text-center p-0 <?php echo isset($rowChange[0]['description']) == 0 || isset($_SESSION['ID']) ? 'fixed-bottom' : '' ?> ">
    <div class=" mx-auto w-75">
      <h6 class="text-center p-2 border-top font-weight-bold">&copy; My~Manga. <span class="text-success">2025</span>
      </h6>
    </div>
  </footer>



  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <script src="script.js"></script>

</body>

</html>
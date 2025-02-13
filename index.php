<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Website Manga</title>

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
  <?php if (isset($_GET['edit']) || isset($_GET['tambah']) || isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['read'])) : ?>
  <?php else : ?>
    <style>
      body {
        background: url('images/inazuma.png') no-repeat center fixed !important;
        background-size: cover !important;
      }
    </style>
  <?php endif ?>
  <div class="container p-3 mb-0 mt-4 rounded-3 shadow">
    <!-- main page -->
    <nav class="d-md-flex p-4">
      <div>
        <h1 style="color: dark; font-family:  Playwrite AU SA, serif;" ;> S~Manga</h1>
      </div>
      <div class="ms-auto my-auto">
        <ul class="list-inline m-0">
          <li class="list-inline-item mx-md-2"><a href="?" class="text-decoration-none text-dark fw-bold">home</a></li>
          <li class="list-inline-item mx-md-2"><a href="#about" class="text-decoration-none text-dark fw-bold">About </a></li>
          <li class="list-inline-item mx-md-2"><a href="#contact" class="text-decoration-none text-dark fw-bold">Contact</a></li>
          <li class="list-inline-item mx-md-2"><a href="<?php echo isset($_SESSION['ID']) ? 'content/login.php?logout' : 'content/login.php' ?>" class="text-decoration-none text-dark fw-bold"><?php echo isset($_SESSION['ID']) ? 'Logout' : 'Login'; ?>
            </a></li>
        </ul>
      </div>
    </nav>
    <hr>
    <!-- banner -->
    <div class="card-title border-bottom border-primary-subtle m-2 p-2 shadow-md" align="right">
      <!-- <img src="images/banner1.png" class="w-100 rounded-3" /> -->
      <?php if (isset($_GET['edit']) || isset($_GET['tambah']) || isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['read'])) : ?>
        <a href="?" class="text-decoration-none btn btn-sm btn-secondary" onclick="window.history.back()">Kembali</a>
      <?php else : ?>
        <a href="?tambah" class="text-decoration-none btn btn-sm btn-danger <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">Tambah Banner</a>
      <?php endif ?>
    </div>

    <!-- catalogue -->
    <!-- <h3 class="text-center" id="?" style="color: dark">Selamat Datang</h3>
    <div class="text-center mb-5 w-50 mx-auto fw-light" style="color: dark">
      Website Manga & Novel Ringan. Meskipun masih sederhana pasti kami akan selalu mengembangkan Smanga
    </div> -->

    <?php if (isset($_GET['pg'])) : ?>
      <?php echo 'Data Tidak Ditemukan'; ?>
    <?php else : ?>
      <?php if (isset($_GET['tambah']) || isset($_GET['edit']) || isset($_GET['change_detail']) || isset($_GET['read'])) : ?>
        <?php include 'content/main.php' ?>
      <?php elseif (isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail']) || isset($_GET['delete'])) : ?>
        <?php include 'content/add_data.php' ?>
      <?php else : ?>
        <div class="row row-cols-md-5 row-cols-2 gx-4 p-6">
          <?php include 'content/main.php' ?>
        <?php endif ?>
        </div>

      <?php endif ?>


  </div>
  <div class="bg-light text-center p-0 fixed-bottom">
    <div class=" mx-auto w-75">
      <h6 class="text-center p-2 border-top font-weight-bold">&copy; My~Manga. <span class="text-success">2025</span>
      </h6>
    </div>
  </div>



  <?php foreach ($resulContent as $modalDisplay) : ?>
    <!-- <div class="modal fade" id="exampleModal<?php echo $modalDisplay['id_detail'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 modalTitle" id="exampleModalLabel">
              <h3><?php echo $modalDisplay['title'] ?></h3>

            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row">
            <div class="modalImage col-md-6 col-12">
              <img width="" src="image/<?php echo $modalDisplay['images'] ?>" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 col-12">
              <div class="modalDeskripsi" style="text-align:justify;">
                <p><?php echo $modalDisplay['description'] ?></p>
              </div>
              <div class="d-md-flex">
                <div class="accordion form-control" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <?php echo $modalDisplay['title'] ?> </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>
                          <?php if (isset($modalDisplay['id_detail']) == 0) : ?>
                            <a href="?add_data" class="btn btn-sm btn-primary <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>"><i class='bx bx-message-square-add'></i></a>
                          <?php else : ?>
                            <a href="?detail=<?php echo $modalDisplay['id_detail'] ?>"><?php echo $modalDisplay['chapter'] ?></a>
                            <a href="?change=<?php echo $modalDisplay['id_detail'] ?>" class="btn btn-sm btn-success mx-3 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Edit Chapter"><i class='bx bx-pencil'></i></a>
                            <a href="?add_data" class="btn btn-sm btn-primary <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Tambah Chapter"><i class='bx bx-message-square-add'></i></a>
                          <?php endif ?>
                        </strong>
                      </div>
                    </div>
                  </div>

                </div>
                <span class="ms-auto text-danger fw-bold d-block text-center modalHarga"></span>
              </div>
            </div>
          </div>
          <div class="card-title mt-2 border shadow-sm p-2 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">
            <span class="fw-900"><i>Customize Banner</i></span>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <div class="d-flex mx-2">
              <a href="?edit=<?php echo $modalDisplay['id_main'] ?>" class="btn btn-sm btn-success mx-3 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Edit Banner">Edit</a>
              <a href="?delete=<?php echo $modalDisplay['id_detail'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-sm btn-danger <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Delete Chapter"><i class='bx bx-trash'></i></a>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->
  <?php endforeach ?>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <script src="script.js"></script>

</body>

</html>
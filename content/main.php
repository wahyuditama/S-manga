<?php

include 'database/koneksi.php';
include 'database/query.php';
// session_start();

//untuk tambah konten
if (isset($_POST['tambah'])) {
    $judul = $_POST['title'];
    $harga = $_POST['harga'];
    $desk = strip_tags($_POST['deskripsi']);

    if (!empty($_FILES['gambar']['name'])) {
        $img = $_FILES['gambar']['name'];
        $size = $_FILES['gambar']['size'];

        $ext = array('jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG');
        $extpath = pathinfo($img, PATHINFO_EXTENSION);

        if (!in_array(strtoupper($extpath), $ext)) {
            echo 'Format gambar harus JPG, JPEG, PNG, atau JPG!';
            exit();
        } else {
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/');

            $queryMain = mysqli_query($koneksi, "INSERT INTO main (title,price,description,images) VALUES ('$judul', '$harga','$desk','$img') ");
        }
    } else {
        $queryMain = mysqli_query($koneksi, "INSERT INTO main (title, price, description) VALUES ('$judul', '$harga', '$desk') ");
    }
    header('location: ?Input=Success');
}

//untuk edit konten

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// $id_detail = isset($_GET['detail']) ? $_GET['detail'] : '';
$dataEdit = mysqli_query($koneksi, "SELECT * FROM main WHERE id = '$id'");

$rowEdit = mysqli_fetch_assoc($dataEdit);


if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $price = $_POST['harga'];
    $description = strip_tags($_POST['deskripsi']);


    if (!empty($_FILES['gambar']['name'])) {
        $img = $_FILES['gambar']['name'];
        $size = $_FILES['gambar']['size'];


        $ext = array('PNG', 'JPEG', 'JPG', 'png', 'jpeg', 'jpg');
        $extpath = pathinfo($img, PATHINFO_EXTENSION);

        if (!in_array(strtoupper($extpath), haystack: $ext)) {
            echo 'Format gambar harus JPG, JPEG, PNG, atau JPG!';
            exit();
        } else {
            unlink('image/' . $rowEdit['images']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'image/' . $img);
            $queryMain = mysqli_query($koneksi, "UPDATE main SET title = '$title', price = '$price', description = '$description', images = '$img' WHERE id = '$id' ");
        }
    } else {
        $queryMain = mysqli_query($koneksi, "UPDATE main SET title = '$title', price = '$price', description = '$description' WHERE id = '$id' ");
    }
    header('location: ?Update=Success');
}



?>

<?php if (isset($_GET['edit']) || isset($_GET['tambah'])) : ?>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row my-3">
                <div class=" col-sm-6">
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($_GET['edit']) ? $rowEdit['title'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo isset($_GET['edit']) ? $rowEdit['price'] : '' ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Deskripsi</label>
                        <textarea id="editor" class="form-control" id="deskripsi" name="deskripsi"><?php echo isset($_GET['edit']) ? $rowEdit['description'] : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Banner</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">

                        <img src="image/<?php echo $rowEdit['images'] ?>" alt="Gambar" width="100">


                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?></button>
            </div>
        </form>
    </div>
<?php else : ?>
    <?php if (isset($_GET['read'])) : ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-title d-flex justify-content-between m-3">
                    <?php if (isset($rowChange[0]['description']) == 0): ?>
                        <div class="col-sm-12 pt-4 px-2 shadow-sm bg-body-tertiary rounded">
                            <h5>Data Belum Tersedia</h5>
                        </div>
                    <?php else : ?>
                        <div class="col-sm-3">
                            <div class="card shadow-md">
                                <img src="image/<?php echo $rowChange[0]['images'] ?>" class="rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-sm-8 card offset-1 pt-4 shadow-sm bg-body-tertiary rounded">
                            <p class="px-5" style="text-align:justify;"><?php echo  $rowChange[0]['description'] ?></p>
                        </div>
                    <?php endif ?>
                </div>
                <div class="table-md m-3">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr align="right">
                                <th colspan="3">
                                    <a href="?add_data" class="btn btn-sm btn-primary pt-2 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">Tambah Data<i class='bx bx-message-square-add mx-2'></i></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Chapter</th>
                                <th>Update</th>
                                <th class="<?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rowChange as $key) : ?>
                                <tr>
                                    <td>
                                        <h5><a href="?detail=<?php echo $key['id'] ?>"><?php echo $key['detail'] ?></a></h5>
                                    <td>
                                        <?php echo $key['update_At'] ?>
                                    </td>
                                    <td class="<?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">
                                        <a href="?change=<?php echo $key['id'] ?>" class="btn btn-sm btn-success mx-3 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Edit Chapter"><i class='bx bx-pencil'></i></a>
                                        <a href="?delete=<?php echo $key['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-sm btn-danger <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Delete Chapter"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php foreach ($resulContent as $value) :  ?>
            <div class="col mb-5">
                <div class="card shadow">
                    <a href="?read=<?php echo $value['id_main'] ?>" style="cursor: pointer;">
                        <img src="image/<?php echo $value['images'] ?>" class="card-img-top" height="250" style="object-fit: cover;" />
                    </a>
                    <div class="card-body">
                        <p class="card-text text-justify"><?php echo $value['title'] ?></p>
                    </div>
                    <div class="d-none deskripsi">
                        <p class="text-justify" style="text-align: justify;">
                            <?php echo  $value['description'] ?>
                        </p>
                    </div>
                    <div class="card-title border-top shadow-md d-flex justify-content-between">
                        <div class="mt-2">
                            <a href="?edit=<?php echo $value['id_main'] ?>" class="btn btn-sm btn-success mx-3 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Edit Banner"><i class='bx bx-pencil'></i></a>
                            <a href="?delete=<?php echo $value['id_detail'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-sm btn-danger <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>" data-toggle="tooltip" data-placement="top" data-bs-custom-class="custom-tooltip" title="Delete Chapter"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

<?php endif ?>
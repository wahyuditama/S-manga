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
    print_r($queryMain);
    die();
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
    print_r($queryMain);
    die();
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
    <?php foreach ($resulContent as $value) :  ?>
        <div class="col mb-5">
            <div class="card shadow">
                <img src="image/<?php echo $value['images'] ?>" class="card-img-top" height="250" style="object-fit: cover;" />
                <div class="card-body">
                    <p class="card-text text-justify"><?php echo $value['title'] ?></p>
                </div>
                <div class="d-none deskripsi">
                    <p class="text-justify" style="text-align: justify;">
                        <?php echo  $value['description'] ?>
                    </p>
                </div>
                <div class="card-footer d-md-flex">
                    <button type="button" class="btn btn-sm btn-primary btnModal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id_detail'] ?>">
                        detail </button>
                    <!-- <a class="btn btn-sm btn-primary d-block btnDetail" data-id="<?php echo $value['id'] ?>">detail</a> -->
                </div>
            </div>
        </div>
    <?php endforeach ?>

<?php endif ?>
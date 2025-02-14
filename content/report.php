<?php

include 'database/koneksi.php';
include 'database/query.php';

//untuk tambah konten

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $review = $_POST['review'];

    $reportEdit = isset($_GET['edit']) ? $_GET['edit'] : '';
    $queryDetailReport = mysqli_query($koneksi, "SELECT * FROM report WHERE id='$reportEdit'");
    $rowDetailReport = mysqli_fetch_assoc($queryDetailReport);

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEditReport = mysqli_query($koneksi, "UPDATE report SET username='$username', review='$review' WHERE id='$id'");
    } else {
        $querySimpanReport = mysqli_query($koneksi, "INSERT INTO report (username, review) VALUES ('$username', '$review')");
    }
    header('location:?report=success');
}
//untuk hapus konten
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $queryHapusReport = mysqli_query($koneksi, "DELETE FROM report WHERE id='$id'");

    echo "<script>
            alert('Yakin Hapus ??');
            document.location.href='?pg&report=delete=success';
        </script>";
}

//tampilan konten
$dataReport = mysqli_query($koneksi, "SELECT * FROM report");
$rowReport = [];
while ($selectReport = mysqli_fetch_assoc($dataReport)) {
    $rowReport[] = $selectReport;
}


?>

<?php if (isset($_GET['report'])) :  ?>
    <div class="col-sm-8 p-3 shadow-sm rounde" style="text-align: justify;">
        <p>Di Halaman ini kalian bisa melaporkan Link Rusak/Mati, Streaming Error, Salah Episode, Salah Penamaan dan lain sebagainya. Harap maklumi jika terdapat kesalahan di Otakudesu, saya selaku admin mohon maaf karena mustahil untuk mengecek sendiri satu persatu link download dan mirror streaming yang ada.
            Jika kalian menemukannya, cukup komentar saja dengan format yang mudah seperti ini.</p>
    </div>
    <div class="col-sm-8">
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="username" placeholder="Masukan Nama Anda" class="form-control">
            </div>
            <div class="mb-3">
                <input type="text" name="review" placeholder="Masukan Ulasan Anda" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Simpan' ?></button>
            </div>
        </form>
    </div>
    <span>Komentar</span>
    <div class="col-sm-8 my-3 p-4">
        <?php foreach ($rowReport as $val) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $val['username'] ?></h5>
                    <p class="card-text"><?php echo $val['update_at'] ?></p>
                    <input type="text" name="" id="" class="form-control" value="<?php echo $val['review'] ?>">
                    <a href="?report=hapus&hapus=<?php echo $val['id'] ?>" class="btn btn-sm btn-danger my-3 <?php echo isset($_SESSION['ID']) ? '' : 'd-none' ?>">Hapus</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
<?php

include 'database/koneksi.php';
include 'database/query.php';
// session_start();

if (isset($_POST['simpan'])) {
    $sub_title = $_POST['sub_title'];
    $event = htmlspecialchars($_POST['event']);
    $detail = strip_tags($_POST['detail']);

    if (!empty($_FILES['dokumen']['name'])) {
        $dock = $_FILES['dokumen']['name'];
        $size = $_FILES['dokumen']['size'];

        $ext = array('pdf', 'docx', 'xlsx', 'PDF', 'DOCX', 'XLSX');
        $extpath = pathinfo($dock, PATHINFO_EXTENSION);

        if (!in_array(strtoupper($extpath), $ext)) {
            echo 'Format dokumen harus PDF, DOCX, atau XLSX!';
            exit();
        } else {
            move_uploaded_file($_FILES['dokumen']['tmp_name'], 'document/' . $dock);

            $queryData = mysqli_query($koneksi, "INSERT INTO sub_main (main_id, chapter, detail, file_content) VALUES ('$sub_title', '$event', '$detail', '$dock') ");
        }
    } else {
        $queryData = mysqli_query($koneksi, "INSERT INTO sub_main (main_id, chapter, detail) VALUES ('$sub_title', '$event', '$detail') ");
    }

    header('location: ?Input=Success');
}




if (isset($_POST['change'])) {
    $sub_title = $_POST['sub_title'];
    $event = htmlspecialchars($_POST['event']);
    $detail = htmlspecialchars(strip_tags($_POST['detail']));

    if (!empty($_FILES['dokumen']['name'])) {
        $dock = $_FILES['dokumen']['name'];
        $size = $_FILES['dokumen']['size'];

        $ext = array('pdf', 'docx', 'xlsx', 'PDF', 'DOCX', 'XLSX');
        $extpath = pathinfo($dock, PATHINFO_EXTENSION);

        if (!in_array(strtoupper($extpath), $ext)) {
            echo 'Format dokumen harus PDF, DOCX, atau XLSX!';
            exit();
        } else {
            unlink('document/' . $rowEdit['file_content']);
            move_uploaded_file($_FILES['dokumen']['tmp_name'], 'document/' . $dock);

            $queryChange = mysqli_query($koneksi, "UPDATE sub_main SET main_id = '$sub_title', chapter = '$event' , detail = '$detail', file_content = '$dock' WHERE id = '$change'");
        }
    } else {

        $queryChange = mysqli_query($koneksi, "UPDATE sub_main SET main_id = '$sub_title', chapter = '$event', detail = '$detail' WHERE id = '$change'");
    }
    header('location: ?Update=Success');
}

//Delete

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $queryDelete = mysqli_query($koneksi, "DELETE FROM sub_main WHERE id = '$delete'");
    header('location:?Delete=Success');
}

// print_r($resulContent);
// die();
?>

<?php if (isset($_GET['change']) || isset($_GET['add_data']) || isset($_GET['detail'])) : ?>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row my-3">
                <div class=" col-sm-6">
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <?php if (isset($_GET['detail'])) : ?>
                            <input type="text" class="form-control" value="<?php echo isset($_GET['detail'])  ? $rowChange[0]['title'] : '' ?>" readonly>
                        <?php else : ?>
                            <select name="sub_title" class="form-control" id="">
                                <option value="">---Pilih Judul---</option>
                                <?php foreach ($resulContent as $val) : ?>
                                    <?php if (isset($_GET['add_data']) || isset($_GET['change'])) : ?>
                                        <option value="<?php echo $val['id_main'] ?>"
                                            <?php echo isset($_GET['add_data']) && $val['id_main'] == $_GET['add_data'] ? 'selected' : ''; ?>>
                                            <?php echo $val['title'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for=""><?php echo isset($_GET['detail']) ? 'Chapter' : 'Masukan Title / Chapter' ?></label>
                        <input type="text" name="event" class="form-control" value="<?php echo isset($_GET['change']) || isset($_GET['detail']) ? $rowChange[0]['chapter'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?> id="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Deskripsi Novel</label>
                        <?php if (isset($_GET['detail'])) :  ?>
                            <textarea id="resize" class="form-control pt-4 px-3" name="detail" style="height: 20rem; text-align: justify;" readonly>
                            <?php echo isset($_GET['detail']) ? $rowChange[0]['description'] : '' ?></textarea>
                        <?php else : ?>
                            <textarea id="editor" class="form-control" name="detail"><?php echo isset($_GET['change']) ? $rowChange[0]['description'] : '' ?></textarea>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Masukan File Disini</label>
                            <?php if (isset($_GET['detail'])) : ?>
                                <iframe src="document/<?php echo isset($_GET['detail']) ? $rowChange[0]['file_content'] : '' ?>" width="100%" height="600" frameborder="0"></iframe>
                            <?php else : ?>
                                <input type="file" class="form-control" id="file" name="dokumen" value="">
                                <input type="text" class="form-control" value="<?php echo isset($_GET['change']) ? $rowChange[0]['file_content'] : '' ?>" readonly>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="<?php echo isset($_GET['change']) ? 'change' : 'simpan' ?>"><?php echo isset($_GET['change']) ? 'Change' : 'Simpan' ?> Data</button>
            </div>
        </form>
    </div>

<?php endif ?>
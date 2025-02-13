<?php
include 'koneksi.php';

$selectContent = mysqli_query($koneksi, "SELECT sub_main.id as id_detail, sub_main.chapter, sub_main.detail, sub_main.file_content, main.id as id_main, main.title, main.description , main.images FROM main LEFT JOIN sub_main ON main.id = sub_main.main_id GROUP BY id_main");


$resulContent = [];
while ($row = mysqli_fetch_assoc($selectContent)) {
    $resulContent[] = $row;
}

$change = isset($_GET['change']) ? $_GET['change'] : '';
$detail = isset($_GET['detail']) ? $_GET['detail'] : '';
$read = isset($_GET['read']) ? $_GET['read'] : '';
$dataChange = mysqli_query($koneksi, "SELECT main.title, main.images,  main.description ,  sub_main.* FROM sub_main LEFT JOIN main ON main.id = sub_main.main_id WHERE sub_main.id = '$change' OR sub_main.id = '$detail' OR main.id = '$read'");

$rowChange = [];
while ($selectChanges = mysqli_fetch_assoc($dataChange)) {
    $rowChange[] = $selectChanges;
}


// $dataRead = mysqli_query($koneksi, "SELECT sub_main.file_content, main.* FROM main LEFT JOIN sub_main ON main.id = sub_main.main_id WHERE main.id = '$read'");


// $rowRead = [];
// while ($selectRead = mysqli_fetch_assoc($dataRead)) {
//     $rowRead[] = $selectRead;
// }

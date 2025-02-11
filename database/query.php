<?php
include 'koneksi.php';

$selectContent = mysqli_query($koneksi, "SELECT sub_main.id as id_detail, sub_main.chapter, sub_main.detail, main.* FROM main LEFT JOIN sub_main ON main.id = sub_main.main_id");


$resulContent = [];
while ($row = mysqli_fetch_assoc($selectContent)) {
    $resulContent[] = $row;
}

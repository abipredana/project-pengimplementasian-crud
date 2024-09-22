<?php
include 'koneksi.php';


$id = $_GET['id'];

$query = "DELETE FROM pemilih WHERE nik = '$id'";


if (mysqli_query($koneksi, $query)) {
    header("location:tampildataadmin.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}


mysqli_close($koneksi);

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "datademokrasi";

$koneksi = new mysqli($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

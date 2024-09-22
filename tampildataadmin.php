<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tampilandataadmin.css">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-brand {
            color: #6F4E37;
            font-size: 20px;
            font-weight: 600;
            margin-left: 50px;
        }

        body {
            background-image: url('gambar/wolfgang-hasselmann-zp_iEPfwvw0-unsplash.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class=" navbar-brand" href="index.php">Data Demokrasi <img class="navbar-brand-logo" src="gambar/ancestors.png" alt="Facebook" /></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><img class="navbar-brand-logo-tampil" src="gambar/icons8-logout-60.png"> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tampildataadmin.php"><img class="navbar-brand-logo-tampil" src="gambar/icons8-account-100.png"> <?php echo $_SESSION['user']['username']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bungkus" style="margin-bottom: 60px;margin-left: 130px;
    margin-top: 50px;">
        <div class="container">
            <div class="container-content">
                <h1>Data Pemilih </h1>
                <label for="inputdata">
                    <p>Klik di bawah ini jika ingin meng-input data:</p>
                </label><br>
                <a href="inputdata.php"><button type="submit" class="btn " style="background-color: #6F4E37; color : white;">Input Data</button></a>
                <br><br>
                <table class=" table table-bordered table-success">
                    <thead>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Pos Pemilihan</th>
                        <th colspan="2">Action</th>

                    </thead>
                    <tbody>
                        <?php
                        $No = 1;
                        include 'koneksi.php';
                        $sql = "SELECT nik, nama, lahir, kelamin, alamat, pos FROM pemilih";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $No; ?></td>
                                <td><?= $data['nik']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['lahir']; ?></td>
                                <td><?= $data['kelamin']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['pos']; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $data['nik']; ?>"><img class="edit-logo" src="gambar/icons8-edit-100.png"></a>
                                    <a href="hapus.php?id=<?= $data['nik']; ?>"><img class="delete-logo" src="gambar/icons8-delete-60.png"></a>

                                </td>
                            </tr>
                            <?php $No++; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
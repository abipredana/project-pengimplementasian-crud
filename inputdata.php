<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="inputdata.css">
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
    <?php
    session_start();
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $lahir = $_POST['lahir'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $pos = $_POST['pos'];

        $query = "INSERT INTO pemilih (nik, nama, lahir, kelamin, alamat, pos) VALUES('$nik', '$nama', '$lahir', '$kelamin', '$alamat', '$pos')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location:tampildataadmin.php");
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Data Demokrasi <img class="navbar-brand-logo" src="gambar/ancestors.png" alt="Facebook" /></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><img class="navbar-brand-logo-tampil" src="gambar/icons8-logout-60.png"> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><img class="navbar-brand-logo-tampil" src="gambar/icons8-account-100.png"> <?php echo $_SESSION['user']['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tampildataadmin.php"><img class="navbar-brand-logo-tampil" src="gambar/icons8-return-96.png"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bungkus" style="margin-bottom: 60px;margin-left: 130px;
    margin-top: 50px;">
        <div class="container">
            <div class="container-content">
                <h1>Input Data Pemilih </h1>
                <form class="form-input" method="POST">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="lahir" id="lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="kelamin" id="kelamin" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label><br>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pos" class="form-label">Pos Pemilihan</label>
                        <select class="form-select" name="pos" id="pos" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="Pos 1">Pos 1</option>
                            <option value="Pos 2">Pos 2</option>
                            <option value="Pos 3">Pos 3</option>
                            <option value="Pos 4">Pos 4</option>
                            <option value="Pos 5">Pos 5</option>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn" style="background-color: #6F4E37; color: white;width: 100%;margin-top: 20px">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
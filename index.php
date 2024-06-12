<?php
include_once("koneksi.php");

$searchNPM = '';
if (isset($_POST['search'])) {
    $searchNPM = $_POST['search_npm'];
    $query = "SELECT * FROM mahasiswa WHERE npm LIKE '%$searchNPM%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .navbar-inverse {
            background-color: #4caf50;
            border-color: #4caf50;
        }
        .navbar-inverse .navbar-inner {
            background-color: #4caf50;
        }
        .navbar-inverse .brand {
            color: #ffffff;
        }
        .btn-success {
            background-color: #ff5722;
            border-color: #ff5722;
        }
        .btn-success:hover {
            background-color: #e64a19;
            border-color: #e64a19;
        }
        .btn {
            background-color: #9e9e9e;
            border-color: #9e9e9e;
        }
        .btn:hover {
            background-color: #757575;
            border-color: #757575;
        }
        .table th {
            background-color: #00bcd4;
            color: #ffffff;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #e0f7fa;
        }
        .form-container {
            width: 100%;
        }
    </style>
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <div class="container w-75">
        <div class="container-fluid">
            <nav class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <a class="brand" href="#">Data Mahasiswa</a>
                </div>
            </nav>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Tambah Data Baru</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12 form-container">
                                <form action="proses.php" method="POST">
                                    <fieldset>
                                        <legend>INPUT DATA MAHASISWA</legend>
                                        <div class="control-group">
                                            <label for="nama">NAMA</label>
                                            <div class="controls">
                                                <input type="text" name="input1" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="prodi">PRODI</label>
                                            <div class="controls">
                                                <input type="text" name="input2" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="npm">NPM</label>
                                            <div class="controls">
                                                <input type="text" name="input3" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <div class="controls">
                                                <label class="radio-inline">
                                                    <input type="radio" name="input4" value="Pria"> Pria
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="input4" value="Wanita"> Wanita
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="input4" value="Tidak Ingin Diketahui"> Tidak Ingin Diketahui
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form_action">
                                            <button type="submit" class="btn btn-success" name="proses">Tambah</button>
                                            <button type="reset" class="btn">Reset</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="row-fluid">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Search Data Mahasiswa</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12 form-container">
                                <form action="" method="POST" class="form-inline">
                                    <input type="text" name="search_npm" value="<?php echo htmlspecialchars($searchNPM); ?>" placeholder="Search by NPM" class="form-control">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Tabel Data Mahasiswa</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NPM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Prodi</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['npm']); ?></td>
                                                <td><?php echo htmlspecialchars($data['nama_mhs']); ?></td>
                                                <td><?php echo htmlspecialchars($data['prodi']); ?></td>
                                                <td><?php echo htmlspecialchars($data['gender']); ?></td>
                                                <td><a href="edit.php?id=<?php echo htmlspecialchars($data['id']); ?>">EDIT</a>
                                                    | <a href="hapus.php?id=<?php echo htmlspecialchars($data['id']); ?>">HAPUS</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

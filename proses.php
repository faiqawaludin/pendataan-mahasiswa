<?php
include "koneksi.php";

if (isset($_POST["proses"])) {
    $nama_mhs = $_POST['input1'];
    $prodi = $_POST['input2'];
    $npm = $_POST['input3'];
    $gender = $_POST['input4']; // Make sure to retrieve the value of the radio button correctly

    // Insert data into the database
    $proses = mysqli_query($conn, "INSERT INTO mahasiswa (nama_mhs, prodi, npm, gender) VALUES ('$nama_mhs', '$prodi', '$npm', '$gender')") or die(mysqli_error($koneksi));

    if ($proses) {
        // Redirect to index.php after successful insertion
        echo "<script>
        alert('SUKSES: Data berhasil ditambahkan');
        window.location.assign('index.php');
        </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data')</script>";
    }
}
?>

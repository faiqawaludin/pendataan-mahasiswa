<?php
include_once("koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id") or die(mysqli_error($koneksi));

if($query){
    echo "<script>
    alert('SUKSES: Data mahasiswa berhasil dihapus');
    window.location.assign('index.php');
    </script>";
}else{
    echo "<script>
    alert('Data gagal dihapus');
    window.location.assign('index.php');
    </script>";
}
?>

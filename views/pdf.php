<?php
include('../config.php');
$id = $_GET['id'];
 $query = mysqli_query($koneksi,"SELECT nama_dokumentasi FROM dokumentasi WHERE id_dokumentasi='$id'");
 while($i = mysqli_fetch_array($query)){
    $nama_file = $i[0];
 }
//memanggil file example.pdf yang berada di folder bernama file
$filePath = '../upload_dokumentasi/'.$nama_file;
//Membuat kondisi jika file tidak ada
if (!file_exists($filePath)) {
    echo "The file $filePath does not exist";
    die();
}
//nama file untuk tampilan
$filename='../upload_dokumentasi/'.$nama_file;
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
//membaca dan menampilkan file
readfile($filePath);
?>
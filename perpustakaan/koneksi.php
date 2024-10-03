<?php 
 
$koneksi = ('localhost', '', 'root', '$dbname');

if($koneksi){
    echo "Berhasil!";
}
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>
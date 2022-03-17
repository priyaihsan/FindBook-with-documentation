<?php
/**
 * include koneksi database
 * 
 * memanggil config.php untuk menyambungkan ke koneksi database.
 */
include './config.php';
/**
 * menangkap data yang di kirim dari form pada findbook.php
 * 
 * @param string $id adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *id_buku* pada form.
 * 
 * @retval id_buku
 * 
 */
$id = $_GET['id_buku'];
/**
 * menghapus data ke database
 * 
 * menggunakan perintah mysqli_query dengan memerulkan 
 * 2 variabel yaitu query _delete_ dan koneksi ke databasenya. 
 */
mysqli_query($koneksi, "delete from mahasiswa where id_buku='$id'");
/**
 * mengembalikan ke halaman awal
 */
header("Location:./findbook.php");


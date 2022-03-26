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
 * @param string $namaBuku adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *nama_buku* pada form.
 * 
 * @retval nama_buku
 * 
 * @param string $kategoriBuku adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *kategori_buku* pada form.
 * 
 * @retval kategori_buku
 * 
 * @param string $penerbitBuku adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *penerbit_buku* pada form.
 * 
 * @retval penerbit_buku
 * 
 * @param string $hargaBuku adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *harga* pada form.
 * 
 * @retval penerbit_buku
 * 
 * @param string $gambarBuku adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *gambar_buku* pada form.
 * 
 * @retval gambar_buku
 * 
 */
$id = $_POST['id_buku'];
$namaBuku = $_POST['nama_buku'];
$kategoriBuku = $_POST['kategori_buku'];
$penerbitBuku = $_POST['penerbit_buku'];
$hargaBuku = $_POST['harga'];
$diskon = $_POST['diskon'];
$gambarBuku = $_POST['gambar_buku'];

/**
 * mengupdate data ke database
 * 
 * menggunakan perintah mysqli_query dengan memerulkan 
 * id sebagai penentu dari 6 variabel yang akan di _update_ 
 * ke database.
 */
mysqli_query($koneksi,"update rakbuku set nama_buku='$namaBuku', kategori_buku='$kategoriBuku',penerbit_buku='$penerbitBuku', harga=$hargaBuku, diskon=$diskon, gambar_buku='$gambarBuku' where '$id'");
/**
 * mengembalikan ke halaman awal
 */
header("Location:./findbook.php");
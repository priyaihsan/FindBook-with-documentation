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
$namaBuku = $_POST['nama_buku'];
$kategoriBuku = $_POST['kategori_buku'];
$penerbitBuku = $_POST['penerbit_buku'];
$hargaBuku = $_POST['harga'];
$diskon = $_POST['diskon'];
$gambarBuku = $_POST['gambar_buku'];
/**
 * menginput data ke database
 * 
 * menggunakan perintah mysqli_query dengan memerulkan 
 * 2 variabel yaitu query _insert_ dan koneksi ke databasenya. 
 */
mysqli_query($koneksi, "insert into rakbuku values('','$namaBuku','$kategoriBuku','$penerbitBuku',$hargaBuku,$diskon,'$gambarBuku')");
/**
 * mengembalikan ke halaman awal
 */
header("Location:./findbook.php");
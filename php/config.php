<?php
/**
 * koneksi ke database
 * 
 * mengoneksikan database ke tokobuku
 */
$koneksi = mysqli_connect("localhost","root","","tokobuku");
/**
 * mengecheck apakah database error atau tidak
 */
if(mysqli_connect_errno()){
    echo "koneksi database gagal :" .mysqli_connect_errno();
}
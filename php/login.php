<?PHP
/**
 * include koneksi database
 * 
 * memanggil config.php untuk menyambungkan ke koneksi database.
 */
include './config.php';
/**
 * menangkap nama dan password dari login.html
 * 
 * @param string $nama adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *nama* pada form.
 * 
 * @retval nama 
 * 
 * @param string $password adalah variabel yang digunakan untuk nenangkap hasil dari form 
 * dengan ngambil parameter *password* pada form.
 * 
 * @retval password 
 * 
 */
$nama = $_POST['nama'];
$password = $_POST['password'];
/**
 * login
 * 
 * pada login membutuhkan akses ke data admin terlebih dahulu 
 * untuk dilakukannya perulangan pada data tersebut setelah itu
 * di check menggunakan if..else statement dengan *nama* dan *password*
 * yang sudah di ambil dari form, ketika datanya sama maka akan bisa masuk ke
 * halaman findbook.php
 */
// get data admin 
$tokobuku = mysqli_query($koneksi,"select * from admin");
// mengecheck apakah sama dengan yang ada di database
while($data = mysqli_fetch_assoc($tokobuku)){
    if ($nama == $data['nama_admin'] && $password == $data['password_admin']){
        header( "Location:../php/findbook.php");
    }
    else{
        header( "Location:./login.html");
    }
};

?>
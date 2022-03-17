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
 * menampilkan data ke halaman print
 * 
 * melakukan perulangan menggunakan while pada tabel rakbuku dengan
 * menampikan data sesuai id_buku,data tersebut berupa gambar_buku,nama_buku,penerbit_buku
 * ,kategori_buku,harga,diskon.
 */
$buku = mysqli_query($koneksi, "select * from rakbuku where id_buku='$id'");
while ($data = mysqli_fetch_assoc($buku)){
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php /**
			 * menampilkan nama_buku */ echo $data['nama_buku'] ?></title>
        </head>
        <body onload="window.print();">
            <div class="container mt-5">
                <p class="fw-bold">Detail Pembelian</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Kategori Buku</th>
                            <th scope="col">Penerbit Buku</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><?php /**
					     * menampilkan id_buku */ echo $data['id_buku'] ?></td>
                        <td><?php /**
						 * menampilkan nama_buku */ echo $data['nama_buku'] ?></td>
						<td><?php /**
						 * menampilkan kategori_buku */ echo $data['kategori_buku'] ?></td>
						<td><?php /**
						 * menampilkan penerbit_buku */ echo $data['penerbit_buku'] ?></td>
						<td>Rp.<?php /**
						 * menampilkan harga */ echo $data['harga'] ?></td>
						<td><?php /**
						 * menampilkan diskon */ echo $data['diskon'] ?>%</td>
                        <?php 
						/**
						 * mencari diskon
						 * 
						 * @param string $total adalah variabel yang digunakan untuk menyimpan
						 * nilai diskon dengan rumus jumlah $hargadiskon - $data['harga'] , $hargadiskon
						 * dicari dengan rumus $data['harga']*($data['diskon']/100)
						 * 
						 * @return total
						 * 
						 */                        
                        $hargadiskon = $data['harga']*($data['diskon']/100);
						$total = $data['harga'] - $hargadiskon; 
                        ?>
                        <td><?php /**
						 * menampilkan total */ echo $total ?></td>
                    </tbody>
                </table>
                <p class="text-end me-3" style="font-weight: bold;font-size: 16px;">Total : <?php /**
						 * menampilkan total */ echo $total ?></p>
            </div>
<?php
}
?>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        </body>
    </html>
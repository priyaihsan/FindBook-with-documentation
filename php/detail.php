<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- my CSS -->
		<link rel="stylesheet" href="../css/style.css" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

		<title>Detail Buku</title>
	</head>
	<body>
		<section id="detail">
			<div class="container">
				<div class="card shadow p-3 mb-5 bg-body rounded">
					<?php
					/**
					 * include koneksi database
					 * 
					 * memanggil config.php untuk menyambungkan ke koneksi database.
					 */
    				include 'config.php';
					/**
					 * menangkap id yang dikirim memalui button detail di findbook.php
					 * 
					 * @param string $id adalah variabel yang digunakan untuk nenangkap hasil dari form 
					 * dengan ngambil parameter *id_buku* pada form.
					 * 
					 * @retval id_buku
					 */
    				$id = $_GET['id_buku'];
					/**
					 * menampilkan data ke halaman detail
					 * 
					 * melakukan perulangan menggunakan while pada tabel rakbuku dengan
					 * menampikan data sesuai id_buku,data tersebut berupa gambar_buku,nama_buku,penerbit_buku
					 * ,kategori_buku,harga,diskon.
					 */
					$mahasiswa = mysqli_query($koneksi, "select * from rakbuku where id_buku='$id'");
					while ($data = mysqli_fetch_assoc($mahasiswa)){
					?>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<img src="<?php echo $data['gambar_buku'] ?>" alt="" width="300px" class="img-thumbnail"/>
								</div>
								<div class="col align-self-center">
									<h2 style="color: #13a390"><?php /** 
									 * menampilkan nama_buku */ echo $data['nama_buku'] ?></h2>
									<p style="font-size: 18px; font-weight: bold"><?php /** 
									 * menampilkan penerbit_buku */  echo $data['penerbit_buku'] ?></p>
									<p style="font-size: 14px; font-weight: 500"><?php /** 
									 * menampilkan kategori_buku */  echo $data['kategori_buku'] ?></p>
									<p style="color: #959595;font-size: 14px;"><i><s>Rp.<?php /** 
									 * menampilkan harga */  echo $data['harga'] ?></i></s><span style="color: #da4431;font-size: 16px;" >&nbsp; &nbsp;<?php echo $data['diskon'] ?>%</span></p>
									<?php 
										/**
										 * mencari diskon
										 * 
										 * @param string $total adalah variabel yang digunakan untuk menyimpan
										 * nilai diskon dengan rumus jumlah $hargadiskon - $data['harga'] , $hargadiskon
										 * dicari dengan rumus $data['harga']*($data['diskon']/100)
										 * 
										 * @retval total
										 * 
										 */
										$hargadiskon = $data['harga']*($data['diskon']/100);
										$total = $data['harga'] - $hargadiskon;
									?>
									<p style="color: #13a390; font-weight: bold;font-size: 18px;">Rp.<?php /** 
									 * menampilkan total */  echo $total ?></p>
									<a class="btn btn-primary" href="./print.php?id_buku=<?php /** 
									 * mengambil id_buku untuk dikirim ke print.php */  echo $data['id_buku']; ?>">beli</a>
								</div>
							</div>
						</div>
						<p class="text-center mt-4"><a href="./findbook.php" style="text-decoration: none;font-weight: bold; color: #13a390">Home</a> / Detail Buku / <?php /** 
									 * menampilkan nama_buku */ echo $data['nama_buku'] ?></p>
					<?php
					}
					?>
				</div>
			</div>
		</section>

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>

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
		<section id="edit">
			<div class="container ">
				<div class="row ">
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
					 * menampilkan data ke halaman edit
					 * 
					 * melakukan perulangan menggunakan while pada tabel rakbuku dengan
					 * menampikan data sesuai id_buku,data tersebut berupa gambar_buku,nama_buku,penerbit_buku
					 * ,kategori_buku,harga,diskon.
					 */
					$mahasiswa = mysqli_query($koneksi, "select * from rakbuku where id_buku='$id'");
					while ($data = mysqli_fetch_assoc($mahasiswa)){
					?>		
						<div class="col-6">					
							<div class="card shadow p-3 mb-5 bg-body rounded">
								<div class="card-body">
									<form method="post" action="../php/update.php">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
										</div>
										<div class="modal-body">
											<!-- form control -->
											<div class="mb-3">
												<!-- input nama buku -->
												<label for="nama_buku" class="form-label">Nama Buku</label>
												<input type="text" class="form-control" id="nama_buku" placeholder="<?php /** * menampilkan nama_buku */ echo $data['nama_buku']; ?>" name="nama_buku" required />
											</div>
											<div class="mb-3">
												<!-- input kategori buku -->
												<label for="kategori_buku" class="form-label">Kategori Buku</label>
												<input type="text" class="form-control" id="kategori_buku" placeholder="<?php /** * menampilkan kategori_buku */ echo $data['kategori_buku']; ?>" name="kategori_buku" required />
											</div>
											<div class="mb-3">
												<!-- input penerbit buku -->
												<label for="penerbit_buku" class="form-label">Penerbit Buku</label>
												<input type="text" class="form-control" id="penerbit_buku" placeholder="<?php /** * menampilkan penerbit_buku */ echo $data['penerbit_buku']; ?>" name="penerbit_buku" required />
											</div>
											<div class="mb-3">
												<!-- input harga -->
												<label for="harga" class="form-label">Harga</label>
												<input type="text" class="form-control" id="harga" placeholder="<?php /** * menampilkan harga */ echo $data['harga']; ?>" name="harga" required />
											</div>
											<div class="mb-3">
												<!-- input diskon -->
												<label for="diskon" class="form-label">Diskon</label>
												<input type="text" class="form-control" id="diskon" placeholder="<?php /** * menampilkan diskon */ echo $data['diskon']; ?>" name="diskon" required />
											</div>
											<div class="mb-3">
												<!-- input gambar buku -->
												<label for="gambar_buku" class="form-label">Url Gambar</label>
												<input type="text" class="form-control" id="gambar_buku" placeholder="<?php /** * menampilkan gambar_buku */ echo $data['gambar_buku']; ?>" name="gambar_buku" required />
											</div>
											<!-- akhir form control -->
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" value="SIMPAN">Ubah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-6">
							<img src="<?php /** * menampilkan gambar_buku */ echo $data['gambar_buku']; ?>" alt="" width="400px" class="img-thumbnail shadow p-3 mb-5 bg-body rounded"/>
							<p class="mt-4"><a href="./findbook.php" style="text-decoration: none;font-weight: bold; color: #13a390">Home</a> / Edit Buku / <?php echo $data['nama_buku'] ?></p>
						</div>
						
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

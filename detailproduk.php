<?php include "header.php"; ?>
<div class="container">
	<div class="row">
	<div class="col-lg-12">
		<h3>Detail Data Produk</h3><br/><br/>
		<?php 
			include "koneksi.php";
			
			$id = $_GET['id'];
			$tampil = "SELECT * FROM produk AS p
						INNER JOIN kategori AS k ON p.id_kategori=k.id_kategori
						INNER JOIN toko AS t ON p.id_toko=t.id_toko
						WHERE p.id_produk='$id'";
			$qtampil = mysqli_query($koneksi,$tampil);
			$hasil = mysqli_fetch_array($qtampil, MYSQL_ASSOC);
			
			$nama = $hasil['nama_produk'];
			$harga = $hasil['harga_produk'];
			$idkat = $hasil['id_kategori'];
			$kategori = $hasil['nama_kategori'];
			$idtoko = $hasil['id_toko'];
			$toko = $hasil['nama_toko'];
			$ket = $hasil['keterangan_produk'];
			$stok = $hasil['stok'];
		?>
		<form class="form-horizontal" id="form_update" action="processproduk.php?act=update" method="POST">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Nama Produk</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" placeholder="Nama Produk" value="<?php echo $nama ?>" name="nama" required>
				<input type="hidden" value="<?php echo $id ?>" name="idproduk" />
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Harga Produk</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" value="<?php echo $harga ?>" placeholder="Harga Produk" name="harga" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Kategori</label>
			  <div class="col-lg-7">
				<select name="kategori" class="form-control" required>
					<option value="">-Pilih Kategori-</option>
					<?php 
						include "koneksi.php";
						
						$tampil = "SELECT * FROM kategori";
						$qtampil = mysqli_query($koneksi,$tampil);
						while($hasil = mysqli_fetch_array($qtampil,MYSQL_ASSOC)) {
							$idk = $hasil['id_kategori'];
							$nama = $hasil['nama_kategori'];
					?>
							<option value="<?php echo $idk; ?>" <?php if($idk == $idkat) echo 'selected' ?> ><?php echo $nama; ?></option>
					<?php
						}
					?>
				</select>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Toko</label>
			  <div class="col-lg-7">
				<select name="toko" class="form-control" required>
					<option value="">-Pilih Toko-</option>
					<?php 
						include "koneksi.php";
						
						$tampil = "SELECT * FROM toko";
						$qtampil = mysqli_query($koneksi,$tampil);
						while($hasil = mysqli_fetch_array($qtampil,MYSQL_ASSOC)) {
							$idt = $hasil['id_toko'];
							$nama = $hasil['nama_toko'];
					?>
							<option value="<?php echo $idt; ?>" <?php if($idtoko == $idt) echo 'selected' ?> ><?php echo $nama; ?></option>
					<?php
						}
					?>
				</select>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Keterangan Produk</label>
			  <div class="col-lg-7">
				<textarea name="keterangan" class="form-control"><?php echo $ket ?></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Stok</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" value="<?php echo $stok ?>" placeholder="Stok" name="stok" required>
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-7 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Update</button>
			  </div>
			</div>
		</form>
	</div>
	</div>
	
	<footer>
		<p>Copyright &copy; 2015</p>
	</footer>
</div>
	<script src="theme/js/jquery-1.10.2.min.js"></script>
	<script src="theme/js/bootstrap.min.js"></script>
	<script src="theme/js/bootswatch.js"></script>
</body>
</html>
<?php include "header.php"; ?>
<div class="container">
	<div class="row">
	<div class="col-lg-12">
		<h3>Tambah Data Produk</h3><br/><br/>
		<form class="form-horizontal" action="processproduk.php?act=add" method="POST">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Nama Produk</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" placeholder="Nama Produk" name="nama" required>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Harga Produk</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" placeholder="Harga Produk" name="harga" required>
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
							$id = $hasil['id_kategori'];
							$nama = $hasil['nama_kategori'];
					?>
							<option value="<?php echo $id; ?>" ><?php echo $nama; ?></option>
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
							$id = $hasil['id_toko'];
							$nama = $hasil['nama_toko'];
					?>
							<option value="<?php echo $id; ?>" ><?php echo $nama; ?></option>
					<?php
						}
					?>
				</select>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Keterangan Produk</label>
			  <div class="col-lg-7">
				<textarea name="keterangan" class="form-control"></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Stok</label>
			  <div class="col-lg-7">
				<input type="text" class="form-control" id="inputEmail" placeholder="Stok" name="stok" required>
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-7 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
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
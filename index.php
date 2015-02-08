<?php include "header.php"; ?>
<div class="container">
	<div class="row">
	<div class="col-lg-12">
		<h3>Data Produk</h3>
		<?php 
			session_start();
			if(isset($_SESSION['insert'])) {
				echo "<div class='alert alert-dismissable alert-success' role='alert'>
				<button type='button' class='close' data-dismiss='alert'>×</button>
				<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
				Data Produk Berhasil Ditambahkan</div>";
				$_SESSION['insert'] = null;
			}
			
			if(isset($_SESSION['delete'])) {
				echo "<div class='alert alert-dismissable alert-success' role='alert'>
				<button type='button' class='close' data-dismiss='alert'>×</button>
				<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
				Data Produk Berhasil Dihapus</div>";
				$_SESSION['delete'] = null;
			}
			
			if(isset($_SESSION['update'])) {
				echo "<div class='alert alert-dismissable alert-success' role='alert'>
				<button type='button' class='close' data-dismiss='alert'>×</button>
				<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
				Update Data Produk Berhasil</div>";
				$_SESSION['update'] = null;
			}
		?>
		<br/>
		<a href="tambahproduk.php" role="button" class="btn btn-success">
			<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Tambah Data</a>&nbsp;&nbsp;
		
		<br/><br/>
		<table class="table table-bordered">
		  <thead>
			<tr>
			  <th>No</th>
			  <th>Nama Produk</th>
			  <th>Harga</th>
			  <th>Kategori</th>
			  <th>Stok</th>
			  <th><center>Aksi</center></th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				include "koneksi.php";
				
				$tampil = "SELECT * FROM produk AS p
							INNER JOIN kategori AS k ON p.id_kategori=k.id_kategori
							INNER JOIN toko AS t ON p.id_toko=t.id_toko";
				$qtampil = mysqli_query($koneksi,$tampil);
				$no = 1;
				while($hasil = mysqli_fetch_array($qtampil, MYSQL_ASSOC)) {
					$id = $hasil['id_produk'];
					$nama = $hasil['nama_produk'];
					$harga = $hasil['harga_produk'];
					$kategori = $hasil['nama_kategori'];
					$stok = $hasil['stok'];
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $nama ?></td>
				<td><?php echo number_format($harga) ?></td>
				<td><?php echo $kategori ?></td>
				<td><?php echo $stok ?></td>
				<td>
					<div style='margin-right:-100px; margin-left:+10'>
					<a href="detailproduk.php?id=<?php echo $id ?>" role="button" class="btn btn-info">
					  <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Detail&nbsp;
					</a>&nbsp;&nbsp;
					
					<a href="#myModal_<?php echo $id; ?>" role="button" class="btn btn-danger" data-toggle="modal">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus</a>
						
					<div id="myModal_<?php echo $id; ?>" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Konfirmasi Hapus Data Pelanggan</h4>
								</div>
								<div class="modal-body">
									<p>Anda Yakin Ingin Menghapus?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
									<a href="processproduk.php?act=del&id=<?php echo $id ?>" type="button" class="btn btn-primary">Ya</a>
								</div>
							</div>
						</div>
					</div>
					</div>
				</td>
			</tr>
			<?php	
					$no++;
				}
			?>
		  </tbody>
		</table>
	</div>
	
	
	
	</div>
	
	<footer>
		<p>Copyright &copy; 2015</p>
	</footer>
</div>
</body>
</html>
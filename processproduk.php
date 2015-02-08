<?php
	session_start();
	include "koneksi.php";
	
	$aksi = $_GET['act'];
	
	if($aksi == "add") {
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		$kategori = $_POST['kategori'];
		$toko = $_POST['toko'];
		$keterangan = $_POST['keterangan'];
		$stok = $_POST['stok'];
		
		$tambah = "INSERT INTO produk VALUES(null, '$nama', '$harga', '$kategori', '$toko', '$keterangan', 'default', '$stok')";
		$qtambah = mysqli_query($koneksi,$tambah);
		$_SESSION['insert'] = 'sukses';
		echo "<script>location.replace('index.php');</script>";
		
	} else if($aksi == "del") {
		$id = $_GET['id'];
		
		$hapus = "DELETE FROM produk WHERE id_produk='$id'";
		$qhapus = mysqli_query($koneksi,$hapus);
		
		$_SESSION['delete'] = 'sukses';
		echo "<script>location.replace('index.php')</script>";
	} else if($aksi == "update") {
		$id = $_POST['idproduk'];
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
		$kategori = $_POST['kategori'];
		$toko = $_POST['toko'];
		$keterangan = $_POST['keterangan'];
		$stok = $_POST['stok'];
		
		$update = "UPDATE produk SET nama_produk='$nama', harga_produk='$harga', id_kategori='$kategori', id_toko='$toko',
					keterangan_produk='$keterangan', stok='$stok' WHERE id_produk='$id'";
		$qupdate = mysqli_query($koneksi,$update);
		
		$_SESSION['update'] = 'sukses';
		echo "<script>location.replace('index.php')</script>";
	} else {
		echo "<script>location.replace('index.php')</script>";
	}
?>
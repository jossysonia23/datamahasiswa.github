<?php
include('config.php');

if (isset($_GET['npm'])) {
	$npm = $_GET['npm'];

	$cek = mysqli_query($link, "SELECT * FROM tb_biodata WHERE npm='$npm'") or die(mysqli_error($link));

	if (mysqli_num_rows($cek) > 0) {
		$del = mysqli_query($link, "DELETE FROM tb_biodata WHERE npm='$npm'") or die(mysqli_error($link));
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="home.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="home.php";</script>';
		}
	} else {
		echo '<script>alert("NPM tidak ditemukan di database."); document.location="home.php";</script>';
	}
} else {
	echo '<script>alert("fitur hapus gagal."); document.location="home.php";</script>';
}

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Simpan Relasi</title>
	<style type="text/css">
		body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
		div { border:1px dashed #666; background-color:#CCC; padding:10px;}
	</style>
</head>
<body>
	<div>
		<?php 
//include "inc.connect/connect.php"; 
		include "../koneksi.php";
# Baca variabel Form (If Register Global ON)
		$kd_penyakit=$_POST['TxtKdPenyakit'];
		$kd_gejala=$_POST['TxtKdGejala'];
		$bobot=$_POST['txtbobot'];

# Validasi Form
		if (trim($kd_penyakit)==""){	
			echo "Kode Penyakit masih kosong, ulangi kembali";
			echo "<center><a href='../admin/halamanadmin.php?top=relasi.php'>Kembali</a></center>";
		}
		elseif (trim($kd_gejala)==""){ 
			echo "Kode Gejala masih kosong, ulangi kembali";
			echo "<center><a href='../admin/halamanadmin.php?top=relasi.php'>Kembali</a></center>";
		}

		$sql_cek = "SELECT * FROM relasi WHERE kd_penyakit='$kd_penyakit' AND kd_gejala='$kd_gejala'";
		$qry_cek = mysqli_query($koneksi,$sql_cek) 
		or die ("Gagal Cek".mysqli_error($koneksi));
		$ada_cek = mysqli_num_rows($qry_cek);
		if ($ada_cek >=1) {
			echo "<center><strong>RELASI TELAH ADA</strong></center>";
			echo "<center><a href='../admin/halamanadmin.php?top=relasi.php'>Kembali</a></center>";
		}
		else {
			$sqltes = "SELECT * FROM gejala WHERE kd_gejala='$kd_gejala'";
			$qrytes = mysqli_query($koneksi,$sqltes);
			while ($data_tmp = mysqli_fetch_array($qrytes)){

				$sql  = " INSERT INTO relasi (kd_penyakit,kd_gejala,bobot) VALUES ('$kd_penyakit','$kd_gejala','$bobot')"; 
			}

			mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error($koneksi));
			
			echo "<center><strong>DATA TELAH BERHASIL DIRELASIKAN..!</strong></center>";
			echo "<center><a href='../admin/halamanadmin.php?top=relasi.php'>OK</a></center>";
			header("location: halamanadmin.php?top=relasi.php");
	//include "relasi.php";
		}
		?>
	</div>
</body>
</html>

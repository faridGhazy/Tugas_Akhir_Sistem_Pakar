<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Proses Diagnosa</title>
	<style type="text/css">
		p{ padding-left:2px; text-indent:0px;}
	</style>
</head>
<body>
	<div class="konten">

		<h3 style="text-align: center;">Hasil Diagnosa</h3><hr>";
		<?php
		include "koneksi.php";

// kosongkan tabel tmp_penyakit
		$sql1 = "DELETE FROM tmp_penyakit";
		$kosong_tmp_penyakit=mysqli_query($koneksi,$sql1);

		$sqlpenyakit="SELECT * FROM relasi GROUP BY kd_penyakit ";
		$querypenyakit=mysqli_query($koneksi,$sqlpenyakit);
		$Similarity=0;
		echo"<div style='display:none;'>";

		while($rowpenyakit=mysqli_fetch_array($querypenyakit)){

			$kd_pen=$rowpenyakit['kd_penyakit'];
			echo "<hr>".$kd_pen."<hr>".PHP_EOL."<br>";

			//mengambil gejala di tabel relasi
			$query_gejala=mysqli_query($koneksi,"SELECT * FROM relasi WHERE kd_penyakit='$kd_pen'");
			$var1=0; $var2=0;$var3=0;
			$querySUM=mysqli_query($koneksi,"select sum(bobot)AS jumlahbobot from relasi where kd_penyakit='$kd_pen'");
			$resSUM=mysqli_fetch_array($querySUM);
			// echo $resSUM['jumlahbobot'] ."<br>";
			$SUMbobot=$resSUM['jumlahbobot'];

			while($row_gejala=mysqli_fetch_array($query_gejala)){

				// kode gejala di tabel relasi
				$kode_gejala_relasi=$row_gejala['kd_gejala'];
				$bobotRelasi=$row_gejala['bobot'];
				echo "bobot relasi=". $bobotRelasi."<br>";

				// mencari data di tabel tmp_gejala dan membandingkannya
				$query_tmp_gejala=mysqli_query($koneksi,"SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_gejala_relasi'");
				$row_tmp_gejala=mysqli_fetch_array($query_tmp_gejala);

				// Mengecek apakah ada data di tabel tmp_gejala
				$adadata=mysqli_num_rows($query_tmp_gejala);
				if($adadata!==0){
					echo "Ada data<br>";
					$bobotNilai=$bobotRelasi*1; echo "Nilai bobot hasil kali 1 = ".$bobotNilai."<br>";
					$HasilKaliSatu;
					$var1=$bobotNilai/$SUMbobot; echo "Nilai Jika 1=". $var1;
					
					$var3 = $var3+$var1;

				}
				else{
					echo "Tidak ada data<br>";
					$bobotNilai=$bobotRelasi*0; 
					$var2=$bobotNilai+$bobotNilai; echo "Nilai Jika 0=". $var2;
				}
				$Nilai_tmp_gejala=$var1+$var2; 
				
				echo "</p>";	

			}
			echo "Similaritas : ".$var3."<br>";


			// input data ke tabel tmp_penyakit		
			$query_tmp_penyakit=mysqli_query($koneksi,"INSERT INTO tmp_penyakit(kd_penyakit,nilai) VALUES ('$kd_pen','$var3')");

			$nilaiMax = mysqli_query($koneksi,"SELECT kd_penyakit,MAX(nilai)  AS NilaiAkhir FROM tmp_penyakit GROUP BY nilai  ORDER BY nilai ASC ");

			$nilaiMin=mysqli_query($koneksi,"SELECT kd_penyakit,MAX(nilai)  AS NilaiAkhir FROM tmp_penyakit GROUP BY nilai  ORDER BY nilai DESC ");
			$rowMax=mysqli_fetch_array($nilaiMax);

			$penyakitakhir=$rowMax['kd_penyakit'];

			$sql_pilih_penyakit=mysqli_query($koneksi,"SELECT * FROM penyakit_solusi WHERE kd_penyakit='$penyakitakhir'");
			$row_hasil=mysqli_fetch_array($sql_pilih_penyakit);
			$kd_penyakit=$row_hasil['kd_penyakit'];
			$penyakit=$row_hasil['nama_penyakit'];
			$keterangan_penyakit=$row_hasil['definisi'];
			$solusi=$row_hasil['solusi'];
		}
		echo "</div>";
		?> 

		<!-- awal tabel -->
		<table width="600" border="0" bgcolor="#ffffff" cellspacing="1" cellpadding="4" bordercolor="#0099FF" style="margin-left: auto; margin-right: auto;">
			
			<!-- Identitas Pemilik dan Gejala yng diinput -->
			<tr bgcolor="#ffffff">
				<td height="32">
					<strong   style="color:#C60;">Identitas Pemilik :</strong><br><br>
					<?php
					include "koneksi.php";
					$query_pasien=mysqli_query($koneksi,"SELECT * FROM tmp_pasien ORDER BY id DESC");
					$data_pasien=mysqli_fetch_array($query_pasien);
					echo "Nama   : ". $data_pasien['nama'] . "<br>";
					echo "Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";
					echo "Umur : ". $data_pasien['umur']. "<br>";
					echo "Alamat : ". $data_pasien['alamat']. "<br><br>";?>

					<hr>
					<label  style="color:#C60;" ><b>Gejala yang diinputkan oleh pemilik : </b><br><br></label>

					<?php
					$query_gejala_input=mysqli_query($koneksi,"SELECT gejala.gejala AS namagejala,tmp_gejala.kd_gejala FROM gejala,tmp_gejala WHERE tmp_gejala.kd_gejala=gejala.kd_gejala");
					$nogejala=0;
					while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
						$nogejala++;
						echo $nogejala. ".". $row_gejala_input['namagejala']. "<br>";
					}
					?>
					<p></p>
				</td>
			</tr>
			
			<tr bgcolor="#FFFFFF">

				<!-- Persentasi Penyakit -->
				<td ><strong  style="color:#C60;">Persentase Setiap Penyakit :</strong><br><br>
					<?php

					//mencari persen
					$query_nilai=mysqli_query($koneksi,"SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit");
					$rowSUM=mysqli_fetch_array($query_nilai);
					$nilaiTotal=$rowSUM['nilaiSum'];
					// echo $nilaiTotal."<br>";

					$query_sum_tmp=mysqli_query($koneksi,"SELECT * FROM tmp_penyakit  ORDER BY nilai DESC LIMIT 0,6");
					while($row_sumtmp=mysqli_fetch_array($query_sum_tmp)){
						$nilai=$row_sumtmp['nilai'];
						$nilai_persen=$nilai;
						$data_persen=$nilai_persen*100;
						$persen=substr($data_persen,0,5);
						// echo $persen."<br>";
						$kd_pen2=$row_sumtmp['kd_penyakit'];

						$query_penyasol=mysqli_query($koneksi,"SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'");
						while ($row_penyasol=mysqli_fetch_array($query_penyasol)){
							echo "Persentase Sapi Potong Menderita Penyakit ". $row_penyasol['nama_penyakit']. " Sebesar ". $persen."%". "<br>";


						} //end while
					}//end while
					echo "<hr>";

					$query_kesimpulan_akhir=mysqli_query($koneksi,"SELECT * FROM tmp_penyakit  ORDER BY nilai DESC LIMIT 0,1");
					while($row_sumtmp=mysqli_fetch_array($query_kesimpulan_akhir)){
						$nilai=$row_sumtmp['nilai'];
						$nilai_persen=$nilai;
						$data_persen=$nilai_persen*100;
						$persen=substr($data_persen,0,5);
						$kd_pen2=$row_sumtmp['kd_penyakit'];

						$query_penyasol=mysqli_query($koneksi,"SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'");
						while ($row_penyasol=mysqli_fetch_array($query_penyasol)){
						//Kesimpulan
							?>
							<strong style="color:#C60;">Hasil Diagnosa :</strong>
							<?php
							echo "<p>"."<strong>Dilihat dari hasil persentase setiap penyakit yang tertera, Sapi Potong anda terjangkit penyakit ".$row_penyasol['nama_penyakit']." sebesar ".$persen." % </p></strong><hr>"; 
							echo "<p>"."<strong style=color:#C60>Solusi Pengobatan :</strong><br><br> ".nl2br(htmlspecialchars($row_penyasol['solusi']))."</p>";

							// simpan data
							$query_temp=mysqli_query($koneksi,"SELECT * FROM tmp_pasien ORDER BY id DESC") or die(mysqli_error($koneksi));
							$row_pasien=mysqli_fetch_array($query_temp)or die(mysqli_error($koneksi));
							$nama=$row_pasien['nama'];
							$kelamin=$row_pasien['kelamin'];
							$umur=$row_pasien['umur'];
							$alamat=$row_pasien['alamat'];
							$tanggal=$row_pasien['tanggal'];
							$query_hasil2="INSERT INTO diagnosa(nama,kelamin,umur,alamat,kd_penyakit,tanggal) VALUES ('$nama','$kelamin','$umur','$alamat','$kd_pen2','$tanggal')";
							$res_hasil2=mysqli_query($koneksi,$query_hasil2)or die(mysqli_error($koneksi));
							if($res_hasil2){
								echo "";
							}else{
								echo "<font color='#FF0000'>Data tidak dapat disimpan..!</font><br>";
							} //end if
							
						}//end while
					}//end while
					?>

				</td>
			</tr>

		</table>
		<!-- akhir tabel -->

		<br>
		<div align="center">
			<a href="index.php?top=konsultasiFm.php">Diagnosa Kembali</a><br />
			<a href="index.php?top=pasien_add_fm.php">Kembali</a>
		</div>
	</div>
</body>
</html>


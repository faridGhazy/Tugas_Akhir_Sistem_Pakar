<?php 
//include "inc.connect/connect.php";
include "../koneksi.php";
$kdsakit = $_REQUEST['CmbPenyakit'];
$sqlp = "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdsakit' ";
$qryp = mysqli_query($koneksi,$sqlp);
$datap= mysqli_fetch_array($qryp);
$sakit = $datap['nama_penyakit'];
?>

<html>
<head>
  <title>Tampilan Data Gejala Penyakit</title>
  <link href="../images/favicon.png" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body style="margin-top: 30px;">

  <table width="310" rules="all" border="2" align="center" >
    <tr>
      <td>
        <div id="art-main">
          <div class="art-header">
            <div class="art-header-clip">
             <div class="art-header-center">
              <h3 style="text-align: center;">Sistem Pakar Diagnosa Penyakit Sapi Potong</h3>
              <br>
              <h3 style="text-align: center;">Menggunakan Metode Case Based Reasoning</h3>
              <!-- <div class="art-header-jpeg"></div> -->   
            </div>
          </div>
        </div>   
      </td>
    </tr>
    
    <tr>
      <td style="margin-left:auto;margin-right:auto" >

        <!-- awal -->
          <table style="margin-left:auto;margin-right:auto; margin-top: 10px; margin-bottom: 10px;" cellpadding="5" cellspacing="1" border="0" bgcolor="black">
            <tr bgcolor="white">
              <td >
                <b style="white-space:pre">Nama Penyakit </b><br>
                <b style="white-space:pre">Kode Penyakit </b>
              </td>
              <td colspan="2">
                <b>: <?php echo $sakit ?></b><br>
                <b>: <?php echo $kdsakit ?></b>
              </td>
            </tr>
            <tr bgcolor="#CCCC99">
              <td colspan="3" style="text-align:center;"><b>Daftar Gejala Per Penyakit</b></td>
            </tr>
            <tr bgcolor="#CCCC99"> 
              <td width="39" align="center"><b>No</b></td>
              <td width="84"><b>Kode</b></td>
              <td width="361"><b>Nama Gejala</b></td>
            </tr>
            <?php 
            $sqlg  = "SELECT gejala.* FROM gejala,relasi ";
            $sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
            $sqlg .= "AND  relasi.kd_penyakit='$kdsakit' ";
            $sqlg .= "ORDER BY gejala.kd_gejala";
            $qryg = mysqli_query($koneksi,$sqlg)or die ("SQL Error".mysqli_error($koneksi));
            $no=0;
            while ($datag=mysqli_fetch_array($qryg)) {
             $no++;
             ?>
             <tr bgcolor="#FFFFFF"> 
              <td align="center"><?php echo $no; ?></td>
              <td><?php echo $datag['kd_gejala']; ?></td>
              <td><?php echo $datag['gejala']; ?></td>
            </tr>
            <?php
          }
          ?>
          <tr>
            <td colspan="3" bgcolor="#CCCC99"><div align="right"><a href="halamanadmin.php?top=LapGejala.php">Kembali</a></div> </td>
          </tr>
        </table>
      <!-- akhir -->

    </td>
  </tr>

  <tr>
    <td><strong><p style="background-image:url(../images/nav.png); height:50px; width:786px; text-align:center; padding:5px;"> </p></td></strong>
  </tr>
</table>
</body>
</html>
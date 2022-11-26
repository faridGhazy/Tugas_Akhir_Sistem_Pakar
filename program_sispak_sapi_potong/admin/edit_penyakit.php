<?php
include "../koneksi.php";
$kdubah = $_GET['kdubah'];
if($kdubah !=""){
	#menampilkan data
	$sql = "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdubah'";
	$qry = mysqli_query ($koneksi,$sql)
 or die ("SQL ERROR".mysqli_error($koneksi));
 $data = mysqli_fetch_array($qry);
	#samakan dengan variabel form
 $in_id_penyakit = $data['kd_penyakit'];
 $in_penyakit = $data['nama_penyakit'];
 $in_definisi = $data['definisi'];
 $in_solusi = $data['solusi'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Edit Penyakit</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="edsimpenyakit.php">

    <!-- awal tabel -->
    <table width="550" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="black" bgcolor="#FFFFF" style="margin-left: auto; margin-right: auto; margin-top:20px; margin-bottom: 20px; border: 1px solid;" rules="all" >

        <tr bgcolor="#DBEAF5" rules="row">
            <td colspan="2">
                <div align="center"><b>Edit Data Penyakit dan Solusi</b></div>
            </td>
        </tr>

        <tr>
            <td width="150" valign="top">
                <span class="style35">Kode Penyakit</span>
            </td>
            <td width="326" valign="top">
                <label>
                    <input type="text" size="1" value="<?php echo $in_id_penyakit;?>" disabled="disabled">
                    <input name="kd_penyakit" type="hidden" id="kd_penyakit" value="<?php echo $in_id_penyakit;?>">
                </label>
            </td>
        </tr>

        <tr>
            <td valign="top">Penyakit</td>
            <td valign="top">
                <label>
                    <input name="in_penyakit" id="in_penyakit" value="<?php echo $in_penyakit;?>">
                    
                    </input>
                </label>
            </td>
        </tr>

        <tr>
            <td valign="top">Definisi</td>
            <td valign="top">
                <label>
                    <textarea name="in_definisi" id="in_definisi" cols="50" rows="6"><?php echo $in_definisi;?></textarea>
                </label>
            </td>
        </tr>

        <tr>
            <td valign="top">Solusi</td>
            <td valign="top">
              <label>
                <textarea name="in_solusi" id="in_solusi" cols="50" rows="8"><?php echo $in_solusi;?></textarea>
            </label>  </td>
        </tr>


        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top"><input type="submit" name="simpan" id="simpan" value="Update" />
           <a href="halamanadmin.php?top=penyakit_solusi.php"><input type="button" name="batal" id="batal" value="Batal" /></a></td>
       </tr>
   </table>
   <!-- akhir tabel -->

</form>
</body>
</html>
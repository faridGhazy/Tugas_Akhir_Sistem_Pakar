<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Edit Data Relasi</title>
</head>

</select><?php $id_relasi=$_GET['id_relasi'];?>
<body>
  <form id="form1" name="form1" method="post" action="update_relasi.php" enctype="multipart/form-data"><div>

    <!-- awal tabel -->
    <table width="400" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="FFFFF" style="margin-left: auto; margin-right: auto; margin-top:20px; margin-bottom: 20px;">
      
      <tr bgcolor="#DBEAF5">
        <td colspan="2"><div align="center"><b>Edit Data Relasi</b></div></td>
      </tr>

      <tr>
        <td>Kode</td>
        <td>
          <label>
            <select name="TxtKdPenyakit" id="TxtKdPenyakit">
              <?php 
              $id = $_POST["id_relasi"];

              $sqlp = "SELECT * FROM relasi join penyakit_solusi on relasi.kd_penyakit = penyakit_solusi.kd_penyakit WHERE relasi.id_relasi=$id_relasi";
              $qryp = mysqli_query($koneksi,$sqlp) 
              or die ("SQL Error: ".mysqli_error($koneksi));
              while ($datap=mysqli_fetch_array($qryp)) {
                if ($datap['kd_penyakit']==$kdsakit) {
                 $cek ="selected";
               }
               else {
                 $cek ="";
               }
               echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
             }
             ?>
             </select><?php $id_relasi=$_GET['id_relasi'];?>
           </label>
           <input name="textrelasi" type="hidden" value="<?php echo $id_relasi?>" /></td>
         </tr>

         <tr>
          <td width="80">Gejala</td>
          <td width="224">
            <select name="TxtKdGejala" id="TxtKdGejala">
              <?php 
              $sqlp = "SELECT * FROM relasi join gejala on relasi.kd_gejala = gejala.kd_gejala WHERE relasi.id_relasi=$id_relasi";
              $qryg = mysqli_query($koneksi,$sqlp) 
              or die ("SQL Error: ".mysqli_error($koneksi));
              while ($datag=mysqli_fetch_array($qryg)) {
                if ($datag['kd_gejala']==$kdgejala) {
                 $cek ="selected";
               }
               else {
                 $cek ="";
               }
               echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$datag[gejala]</option>";
             }
             ?>
           </select>
         </td>
       </tr>

       <tr>
        <td>Bobot</td>
        <td>
          <select name="txtbobot" id="txtbobot">
            <option selected="true" disabled="disabled">[ Bobot Penyakit ]</option>
            <option value="3">3 | Gejala Dominan</option>
            <option value="2">2 | Gejala Sedang</option>
            <option value="1">1 | Gejala Biasa</option>
          </select>
        </td>
        <!-- <td><input name="txtbobot" type="number" id="txtbobot" step="0.01"></td> -->
      </tr>

      <tr>
        <td valign="top">&nbsp;</td>
        <td>
          <input type="submit" name="Submit" value="Update" />
          <input type="button" value="Kembali" onclick="self.history.back();" /></td>
        </tr>

      </table>
      <!-- akhir tabel -->

    </div>
  </form>
</body>
</html>
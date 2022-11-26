<?php
#Baca variabel URL (if register global ON)
//include "connect/config.php";
//include "inc.connect/connect.php" ;
include "../koneksi.php";
$kdubah = $_REQUEST['kdubah'];
if($kdubah !="") {
  #menampilkan data
 $sql = "SELECT * FROM gejala WHERE kd_gejala='$kdubah'";
 $qry = mysqli_query ($koneksi,$sql)
 or die ("SQL ERROR".mysqli_error($koneksi));
 $data = mysqli_fetch_array($qry);
 
  #samakan dengan variabel form
 $kd_gejala = $data['kd_gejala'];
 $gejala = $data['gejala'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Edit Data Gejala</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link href="../Image/icon.png" rel='shortcut icon'>
  <script type="text/javascript">
    function validasi(form){
     if(form.gejala.value==""){
      alert("Masukkan Gejala..!");
      form.gejala.focus(); return false;
    }
    form.submit();
  }
</script>
</head>

<body>
  <form id="form1" name="form1" onSubmit="return validasi(this);" method="post" action="edsimgejala.php" target="_self">

    <!-- awal tabel -->
    <table width="500" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="FFFFF" style="margin-left: auto; margin-right: auto; margin-top:20px; margin-bottom: 20px; border: 1px solid;" rules="all">

      <tr bgcolor="#DBEAF5">
        <td colspan="2"><div align="center"><b>Edit Data Gejala</b></div></td>
      </tr>

      <tr>
        <td>Kode Gejala</td>
        <td>
          <label>
            <input name="kd_gejala" type="text" id="kd_gejala" size="1" value="<?php echo $kd_gejala; ?>" disabled="disabled">
            <input name="kd_gejala2" type="hidden" id="kd_gejala2" value="<?php echo "$kd_gejala"; ?>">
          </label>
          <input name="textrelasi" type="hidden" value="<?php echo $id_relasi?>" />
        </td>
      </tr>

      <tr>
        <td>Gejala</td>
        <td>
         <label>
          <textarea name="gejala" id="gejala" cols="45" rows="5"><?php echo "$gejala"; ?></textarea>
        </label>
      </td>
    </tr>

    <tr>
      <td valign="top">&nbsp;</td>
      <td>
        <input type="submit" name="Submit" value="Update" />
        <input type="button" value="Kembali" onclick="self.history.back();" /></td>
      </tr>

    </table>
    <!-- akhir tabel -->

  </form>
</body>
</html>
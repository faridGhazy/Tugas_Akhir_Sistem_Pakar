<div class="art-post">
  <div class="art-post-body">
    <div class="art-post-inner art-article">
      <h2 class="art-postheader">Daftar Penyakit</h2>
      <div class="art-postcontent">

        <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#22B5DD" style="margin-top:20px">

          <tr bgcolor="#CCCC99" style="text-align:center;">
            <td colspan="4"><b><p style="text-align:center;">Daftar Penyakit Sapi Potong dalam Sistem</p></b></td>
          </tr>
          
          <tr bgcolor="#DBEAF5"> 
            <td width="23" bgcolor="#CCCC99"><b><p style="text-align: center;">No</p></b></td>
            <td width="244" bgcolor="#CCCC99"><strong><p style="text-align:center;">Deskripsi Penyakit</p></strong></td>
          </tr>
          
          <?php 
          $sql = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
          $qry = mysqli_query( $koneksi, $sql) or die ("SQL Error".mysqli_error($koneksi));
          $no=0;
          while ($data=mysqli_fetch_array($qry)) {
           $no++;
           ?>
           
           <tr bgcolor="#FFFFFF"> 
            <td style="padding-top:20px"><div align="center"><?php echo $no; ?></div> </td>
            <td style="padding-right: 10px;">
              <div align="center">
                <?php echo "<h3><em>$data[nama_penyakit]</em></h3>"; ?>
              </div>
              <ul style="padding:0; list-style-type: none;">
                <li>
                  <p><?php echo "$data[definisi]";?></p>
                </li>
                <li> 
                  <hr>
                  <label>Solusi :</label>
                  <p><?php echo nl2br(htmlspecialchars($data['solusi'])); ?>
                </li>
              </ul>
            </td>
          </tr>

        <?php } ?>
      </table>
    </div>
    <div class="cleared"></div>
  </div>

  <div class="cleared"></div>
</div>
</div>
<?php

    $NS = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_suratkeluar where Nomor_surat_keluar='$NS'");
    $row=  mysqli_fetch_array($sql);
?>
<!-- form tambah Surat -->
        <div id="addSuratMasuk" class=" col-xs-12" >
           <div class="box box-success">
             
              <div class="box-header">
                <div class="col-xs-12">
                   <div class="col-sm-12 control-label" >
                    <br>
                   
                      <form id="form_tambahPengguna"  action="" method="post" enctype="multipart/form-data">
                   
                  </div>
                </div>
              </div>
              <div class="box-body">
                  <div class="col-xs-12 form-group">
                     <div class="col-sm-12 control-label" >
                        <div  class="alert " style="text-align: center ;background-color:#e6e9ef;" >
                            <h4><strong> EDIT DATA SURAT  </strong></h4> 
                        </div>
                     </div>
                  </div>
               
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Surat Keluar</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='Nomor_surat' class='form-control' name='Nomor_surat_keluar' type='text' value="<?php echo $row['Nomor_surat_keluar']; ?>" required/>
                         </div>
                  </div>
                  <?php if ($_GET['edit']!='sk2') { ?>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Tujuan Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tujuan_surat' class='form-control' name='Tujuan_surat' type='text'  data-link="" value="<?php echo $row['Tujuan_surat']; ?>"  /> 
                        </div>
                  </div>
                  <?php }
                  else { ?>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Ditugaskan Kepada</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' name="Ditugaskan_kepada" id="ckeditor"><?php echo $row['Ditugaskan_kepada']; ?></textarea>
                        </div>
                  </div>
                  <?php } ?>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tanggal_surat' class='form-control' name='Tanggal_surat' type='date' value="<?php echo $row['Tanggal_surat']; ?>" /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Asal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Asal_surat' class='form-control' name='Asal_surat' type='text' value="<?php echo $row['Asal_surat']; ?>" /> 
                       </div>
                  </div>
                  <?php if ($_GET['edit']=='sk2') { ?>
                       <div class="col-xs-12 form-group">
                         <label class="col-sm-3 control-label" style="text-align:right;">Dasar Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' name="Dasar_surat"><?php echo $row['Dasar_surat']; ?></textarea>
                         </div>
                       </div>
                    
                  <?php } ?>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="Sifat_surat" id="Sifat_surat" class="form-control" value="<?php echo $row['Sifat_surat']; ?>" >
                              <option  value="<?php echo $row['Sifat_surat']; ?>" ><?php echo $row['Sifat_surat']; ?></option>
                              <option value="Biasa" >Biasa</option>
                              <option value="Segera" >Segera</option>
                              <option value="Penting" >Penting</option>
                              <option value="Rahasia" >Rahasia</option>
                              <option value="Pribadi" >Pribadi</option>
                          </select>   
                        </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='Perihal' class='form-control' name='Perihal' type='text' value="<?php echo $row['Perihal']; ?>" />
                         </div>
                  </div>
                  <?php if ($_GET['edit']!='sk2') { ?>
                  <div class="col-xs-12 form-group">
                         <label class="col-sm-3 control-label" style="text-align:right;">Isi Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' id="ckeditor" name="isi_surat"><?php echo $row['Isi_surat']; ?></textarea>
                         </div>
                  </div>
                  <?php } ?>
                   <input id='Jenis_surat' class='form-control' name='Jenis_surat' type='hidden' value="<?php echo $_GET['edit']; ?>" />
                   <input id='currNS' class='form-control' name='currNS' type='hidden' value="<?php echo $row['Nomor_surat_keluar']; ?>" />

                  <div class="col-xs-12 form-group">
                      <label class="col-sm-3 control-label" style="text-align:right;"></label>
                      <div class="col-sm-7 form-group" style="text-align:left;">
                       <div class=" btn-group pull-right">
                              <a href="surat-keluar.php"  class="btn btn-default btn-flat">Batal</a>
                              <button type="submit"  name="editSuratKeluar" value="Simpan"" class="btn btn-primary btn-flat">Edit</button>
                              
                       </div>
                      </div>
                  </div>
              </form> 
                      
              </div>
          </div>
        </div>

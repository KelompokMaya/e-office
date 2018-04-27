<?php

    $NS = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_suratmasuk where Nomor_surat_masuk='$NS'");
    $row=  mysqli_fetch_array($sql);
?>
<!-- form Edit Surat -->
        <div id="editSuratMasuk" class=" col-xs-12" >
           <div class="box box-warning">
             
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
                            <h4><strong>EDIT DATA SURAT MASUK</strong></h4> 
                        </div>
                     </div>
                  </div>
               
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Surat Masuk</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='edit-Nomor_surat' class='form-control' name='edit-Nomor_surat' value="<?php echo $row['Nomor_surat_masuk']; ?>" type='text' />
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Asal Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='edit-Asal_surat' class='form-control' name='edit-Asal_surat' type='text'  value="<?php echo $row['Asal_surat']; ?>"   /> 
                        </div>
                  </div>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Terima</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='edit-Tanggal_terima' class='form-control' name='edit-Tanggal_terima' type='date' value="<?php echo $row['Tanggal_input']; ?>"  /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='edit-Tanggal_surat' class='form-control' name='edit-Tanggal_surat' type='date' value="<?php echo $row['Tanggal_surat']; ?>"  /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="edit-Sifat_surat" id="edit-Sifat_surat" class="form-control"  >
                              <option value="<?php echo $row['Sifat_surat']; ?>" ><?php echo $row['Sifat_surat']; ?></option>
                              <option value="Biasa" >Biasa</option>
                              <option value="Penting" >Penting</option>
                              <option value="Rahasia" >Rahasia</option>
                              <option value="Pribadi" >Pribadi</option>
                          </select>   
                        </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='edit-Perihal' class='form-control' name='edit-Perihal' type='text' value="<?php echo $row['Perihal']; ?>"/>
                         </div>
                  </div>
                  
                   <div class="col-xs-12 form-group">
                      <label class="col-sm-3 control-label" style="text-align:right;">File Surat</label>
                     <div class="col-sm-9 form-group" style="text-align:left;">
                      <div class=" form-group">
                       <a target="_blank" href="../File/<?php echo $row['File_surat'];?>" class="btn btn-sm btn-success btn-flat">Lihat</a> 
                       </div>
                       <input type="file" id="edit-file_Surat" name="edit-file_Surat" >                                    
                     </div>
                  </div>
                  <input id='currSM' class='form-control' name='currSM' value="<?php echo $row['Nomor_surat_masuk']; ?>" type='hidden' />
                  <div class="col-xs-12 form-group" >
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7 control-label">
                      <div class="btn-group pull-right">
                          <button type="submit"  name="edit" value="Simpan"" class="btn btn-warning btn-flat">Edit</button>
                          <a href="surat-masuk.php"  class="btn btn-default btn-flat">Batal</a>
                      </div>
                    </div>
                  </div>
              </form> 
                  
              </div>
          </div>
        </div>
     
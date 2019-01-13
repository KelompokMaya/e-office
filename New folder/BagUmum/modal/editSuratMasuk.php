<?php

    $NS = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_suratmasuk sm,tb_jenis_surat js where sm.Nomor_surat_masuk='$NS' AND sm.Id_jenis_surat= js.Id_jenis_surat");
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
                     <label style="text-align:right;" class="col-sm-3 control-label">Jenis Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="edit-Jenis_surat" id="edit-Jenis_surat" class="form-control"  >
                              <option value="<?php echo $row['Id_jenis_surat']; ?>" ><?php echo $row['Nama_jenis_surat']; ?></option>
                               <?php          
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_jenis_surat  WHERE surat='surat masuk' ");
                                 $no = 1;
                                  while($rowx = mysqli_fetch_assoc($sql)){

                              ?>   
                              <option value="<?php echo $rowx['Id_jenis_surat']; ?>" ><?php echo $rowx['Nama_jenis_surat']; ?></option>
                              <?php } ?>
                          </select>   
                        </div>
                  </div>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="edit-Sifat_surat" id="edit-Sifat_surat" class="form-control"  >
                              <option value="<?php echo $row['Sifat_surat']; ?>" ><?php echo $row['Sifat_surat']; ?></option>
                              <option value="Undangan" >Undangan</option>
                              <option value="Dinas" >Dinas</option>
                          </select>   
                        </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           
                            <textarea id='edit-Perihal' class='form-control' name='edit-Perihal' type='text' ><?php echo $row['Perihal']; ?></textarea>
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
     
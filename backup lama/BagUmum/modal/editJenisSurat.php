 <?php
   

    $id = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_jenis_surat where Id_jenis_surat='$id'");
    $row=  mysqli_fetch_array($sql);
?>

<!-- form Edit Surat -->
        <div id="editJenisSurat" class=" col-xs-12" >
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
                            <h4><strong>EDIT JENIS SURAT</strong></h4> 
                        </div>
                     </div>
                  </div>
               
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Id Jenis Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input  class='form-control' name='edit-Id_jenis_surat' value="<?php echo $row['Id_jenis_surat']; ?>" type='text' />
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nama Jenis Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input  class='form-control' name='edit-Nama_jenis_surat' value="<?php echo $row['Nama_jenis_surat']; ?>" type='text' />
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="edit-Surat" class="form-control"  >
                              <option value="surat masuk" > surat masuk</option>
                              <option value="surat keluar" > surat keluar</option>
                              
                          </select>   
                         </div>
                  </div>
                  
                  <input  class='form-control' name='currId' value="<?php echo $row['Id_jenis_surat']; ?>" type='hidden' />
                  <div class="col-xs-12 form-group" >
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7 control-label">
                      <div class="btn-group pull-right">
                          <button type="submit"  name="edit" value="Simpan" class="btn btn-warning btn-flat">Edit</button>
                          <a href="surat-masuk.php"  class="btn btn-default btn-flat">Batal</a>
                      </div>
                    </div>
                  </div>
              </form> 
                  
              </div>
          </div>
        </div>
     
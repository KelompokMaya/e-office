<?php

    $NS = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_suratmasuk where Nomor_surat_masuk='$NS'");
    $row=  mysqli_fetch_array($sql);
?>
<!-- form Edit Surat -->
        <div id="editSuratMasuk" class=" col-xs-12" >
           <div class="box box-danger">
             
              <div class="box-header">
                <div class="col-xs-12">
                   <div class="col-sm-12 control-label" >
                    <br>
              <form id="form_tambahDisposisi"  action="" method="post" enctype="multipart/form-data">
                    
                  </div>
                </div>
              </div>
              <div class="box-body">
                  <div class="col-xs-12 form-group">
                     <div class="col-sm-12 control-label" >
                        <div  class="alert " style="text-align: center ;background-color:#e6e9ef;" >
                            <h4><strong>TAMBAH DISPOSISI SURAT MASUK</strong></h4> 
                        </div>
                     </div>
                  </div>
               
            
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Surat Masuk</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='disposisi-Nomor_surat' class='form-control' name='disposisi-Nomor_surat' value="<?php echo $row['Nomor_surat_masuk']; ?>" type='text' readonly />
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='disposisi-Tanggal_surat' class='form-control' name='disposisi-Tanggal_surat' type='date' value="<?php echo $row['Tanggal_surat']; ?>" readonly /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Asal Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='disposisi-Asal_surat' class='form-control' name='disposisi-Asal_surat' type='text'  value="<?php echo $row['Asal_surat']; ?>" readonly/> 
                        </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='disposisi-Perihal' class='form-control' name='disposisi-Perihal' type='text' value="<?php echo $row['Perihal']; ?>" readonly/>
                         </div>
                  </div>
          
                 <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Catatan</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='disposisi-Catatan' class='form-control' name='disposisi-Catatan' type='text'  /> 
                       </div>
                  </div>
                 
                  <div class="col-xs-12 form-group" >
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7 control-label">
                      <div class="btn-group pull-right">
                              <button type="submit"  name="tambahdisposisi" value="Simpan" class="btn btn-info btn-flat">Submit</button>
                              <a href="surat-masuk.php"  class="btn btn-default btn-flat">Batal</a>
                      </div>
                    </div>
                  </div>
              </form> 
                  
              </div>
          </div>
        </div>
     
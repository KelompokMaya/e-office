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
                            <h4><strong> Tambah Surat Keluar </strong></h4> 
                        </div>
                     </div>
                  </div>
               
                 <?php //mencari no urut terbesar
            $cek_no_urut=mysqli_query($koneksi, "SELECT max(No_urut_surat) as num FROM tb_suratkeluar")or die (mysqli_error($koneksi));
            $row = mysqli_fetch_assoc($cek_no_urut);
            $no_urut= $row['num']+1;
            if ($no_urut<10) {
              $no_urut='0'.$no_urut;
            }
            ?>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Surat Keluar</label>
                         <div class="col-sm-2 control-label" style="text-align:left;">
                           <input id='Nomor_surat' class='form-control' name='Kode_surat' type='text' required/>
                         </div>
                         <div class="col-sm-1 control-label" style="text-align:left;">
                           <input id='Nomor_surat2' class='form-control' name='Nomor_surat' type='text' value="<?php echo $no_urut; ?>" readonly />
                         </div>
                         <div class="col-sm-2 control-label" style="text-align:left;">
                           <input id='Nomor_surat3' class='form-control' name='Kode_bidang' type='text' required/>
                         </div>
                         <div class="col-sm-2 control-label" style="text-align:left;">
                           <input id='Nomor_surat4' class='form-control' name='nama_instansi' type='text' required/>
                         </div>
                  </div>
                  <?php if ($_POST['Jenis_surat']!='sk2') { ?>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Tujuan Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tujuan_surat' class='form-control' name='Tujuan_surat' type='text'  data-link=""  /> 
                        </div>
                  </div>
                  <?php }
                  else { ?>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Ditugaskan Kepada</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' name="Ditugaskan_kepada" id="ckeditor"></textarea>
                        </div>
                  </div>
                  <?php } ?>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tanggal_surat' class='form-control' name='Tanggal_surat' type='date' /> 
                       </div>
                  </div>
                  <?php if ($_POST['Jenis_surat']=='sk3') { ?>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Asal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Asal_surat' class='form-control' name='Asal_surat' type='text' /> 
                       </div>
                  </div>
                  <?php } ?>
                  <?php if ($_POST['Jenis_surat']=='sk2') { ?>
                       <div class="col-xs-12 form-group">
                         <label class="col-sm-3 control-label" style="text-align:right;">Dasar Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' name="Dasar_surat"></textarea>
                         </div>
                       </div>
                    
                  <?php } ?>
                   <?php if ($_POST['Jenis_surat']=='sk1') { ?>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="Sifat_surat" id="Sifat_surat" class="form-control"  >
                             <option value="01" >Biasa</option>
                              <option value="02" >Penting</option>
                              <option value="03" >Segera</option>
                              
                          </select>   
                        </div>
                  </div>
                  <?php } ?>
                   <div class="col-xs-12 form-group">
                         <?php if ($_POST['Jenis_surat']=='sk2') { ?>
                        <label class="col-sm-3 control-label" style="text-align:right;">Untuk</label>
                        <?php } else { ?>
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                        <?php } ?>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='Perihal' class='form-control' name='Perihal' type='text' />
                         </div>
                  </div>
                  <?php if ($_POST['Jenis_surat']!='sk2') { ?>
                  <div class="col-xs-12 form-group">
                         <label class="col-sm-3 control-label" style="text-align:right;">Isi Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                            <textarea class='form-control' id="ckeditor" name="isi_surat"></textarea>
                         </div>
                  </div>
                  <?php } ?>
                   <input id='Jenis_surat' class='form-control' name='Jenis_surat' type='hidden' value="<?php echo $_POST['Jenis_surat']; ?>" />

                  <div class="col-xs-12 form-group">
                      <label class="col-sm-3 control-label" style="text-align:right;"></label>
                      <div class="col-sm-7 form-group" style="text-align:left;">
                       <div class=" btn-group pull-right">
                              <a href="surat-keluar.php"  class="btn btn-default btn-flat">Batal</a>
                              <button type="submit"  name="addSuratKeluar" value="Simpan"" class="btn btn-primary btn-flat">Tambah</button>
                              
                       </div>
                      </div>
                  </div>
              </form> 
                      
              </div>
          </div>
        </div>

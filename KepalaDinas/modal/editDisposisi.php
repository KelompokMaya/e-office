<?php

    $id_disposisi = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_disposisi  WHERE No_urut_disposisi='$id_disposisi'");
    $sql2 = mysqli_query($koneksi,"SELECT * FROM tb_disposisi d,tb_bagian b WHERE d.Kode_bagian=b.Kode_bagian AND d.No_urut_disposisi='$id_disposisi'");
    $row=  mysqli_fetch_array($sql);
    $row2= mysqli_fetch_array($sql2);
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
                        <label class="col-sm-3 control-label" style="text-align:right;">Kode</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='disposisi-kode' class='form-control' name='disposisi-kode' value="<?php echo $row['Kode_surat']; ?>" type='text' readonly />
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Urut</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='disposisi-NU' class='form-control' name='disposisi-NU' value="<?php echo $row['No_urut_disposisi']; ?>"  type='text' readonly/>
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
                          <input id='disposisi-Catatan' class='form-control' name='disposisi-Catatan' type='text' value="<?php echo $row['Catatan']; ?>" readonly /> 
                       </div>
                  </div>
                     <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Tujuan</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="disposisi-Tujuan" id="disposisi-Tujuan" class="form-control" value="<?php echo $row['Tujuan']; ?>" >
                              <option value="<?php echo $row2['Kode_bagian']; ?>" ><?php echo $row2['Nama_bagian']; ?></option>
                              <option value="I" >Bidang Destinasi Pariwisata</option>
                              <option value="II" >Bidang Sumber Daya Pariwisata</option>
                              <option value="III" >Bidang Pemasaran Pariwisata</option>
                              <option value="IV" >Bidang Industri Pariwisata</option>
                              <option value="V" >Sekretaris</option>
                          </select>   
                        </div>
                  </div>
                  <div class="col-xs-12 form-group" >
                     <label style="text-align:right;" class="col-sm-3 control-label">Disposisi</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="disposisi-isi" id="disposisi-isi" class="form-control"   >
                              <option value="<?php echo $row['Disposisi']; ?>" ><?php echo $row['Disposisi']; ?></option>
                              <option value="Dibuat tanggapannya" >Dibuat tanggapannya</option>
                              <option value="Dikoreksi" >Dikoreksi</option>
                              <option value="Dibuat laporannya" >Dibuat laporannya</option>
                              <option value="Untuk dicatat dan diketahui" >Untuk dicatat dan diketahui</option>
                              <option value="Untuk diketahui dan dipelajari" >Untuk diketahui dan dipelajari</option>
                              <option value="Diproses lebih lanjut" >Diproses lebih lanjut</option>
                              <option value="Untuk diselesaikan" >Untuk diselesaikan</option>
                              <option value="Harap diwakili" >Harap diwakili</option>
                              <option value="Dijadwalkan" >Dijadwalkan</option>
                              <option value="Temui saya" >Temui saya</option>
                              <option value="Memperhatikan catatan saya" >Memperhatikan catatan saya</option>
                              <option value="Membuat Copy" >Membuat Copy</option>
                              <option value="File" >File</option>
                          </select>   
                        </div>
                  </div>
                  
                  <div class="col-xs-12 form-group" >
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7 control-label">
                      <div class="btn-group pull-right">
                              <button type="submit"  name="editdisposisi" value="Simpan" class="btn btn-info btn-flat">Submit</button>
                              <a href="surat-masuk.php"  class="btn btn-default btn-flat">Batal</a>
                      </div>
                    </div>
                  </div>
              </form> 
                  
              </div>
          </div>
        </div>
     
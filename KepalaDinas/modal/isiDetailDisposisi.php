  <?php
    include '../../database/koneksi.php';

    $no_urut = $_GET['no_urut'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_disposisi where No_urut_disposisi='$no_urut'");
    $row=  mysqli_fetch_array($sql);
?>
<div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Kode</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Kode_surat']; ?>
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Nomor Urut</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['No_urut_disposisi']; ?>
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Tanggal Penyelesaian</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Tanggal_penyelesaian_disposisi']; ?> 
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">No Surat Masuk</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Nomor_surat_masuk']; ?> 
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Tanggal Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Tanggal_surat']; ?> 
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Asal Surat</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Asal_surat']; ?>
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <?php
                        $Kode_bagian = $row['Kode_bagian'];
                        $sql = mysqli_query($koneksi,"SELECT * FROM tb_bagian where Kode_bagian='$Kode_bagian'");
                        $row2=  mysqli_fetch_array($sql);
                    ?>
                        <label class="col-sm-4 control-label" style="text-align:left;">Kode Bagian</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php if($row['Kode_bagian']==''){echo "-";} else{ echo $row2['Kode_bagian'].' '.$row2['Nama_bagian']; } ?> 
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Disposisi</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php if($row['Disposisi']==''){echo "-";} else{ echo $row['Disposisi']; } ?>
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php echo $row['Perihal']; ?>
                         </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-4 control-label" style="text-align:left;">Catatan</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                          : <?php if($row['Catatan']==''){echo "-";} else{ echo $row['Catatan']; } ?>
                         </div>
                  </div>
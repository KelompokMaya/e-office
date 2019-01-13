 <?php
    include '../../database/koneksi.php';

    $NIP = $_GET['NIP'];
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_pengguna where NIP='$NIP'");
    $row=  mysqli_fetch_array($sql);
?>

<!-- form tambah data -->
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-header" style="background: #0086b3; padding:15px 20px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 style="color: white" ><center><b>Edit Data Pengguna</b></center></h2>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <form id="form_tambahPengguna" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="curr-NIP" value="<?php echo $row['NIP']; ?>">
                  <div class="form-group">
                    <label > NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $row['NIP']; ?>" placeholder="masukan NIP" required>
                  </div>
                  <div class="form-group">
                    <label > Nama</label>
                    <input type="text" class="form-control" name="Nama" placeholder="masukan nama " value="<?php echo $row['Nama']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label > Alamat</label>
                    <input type="text" class="form-control" name="Alamat" placeholder="masukan alamat" value="<?php echo $row['Alamat']; ?>">
                  </div>
                  <div class="form-group">
                    <label > Hak Akses</label>
                    <div class="control-label" style="text-align:left;">
                        <select name="Hak_akses" id="Hak_akses" class="form-control"  >
                              <option value="<?php echo $row['Hak_akses']; ?>" ><?php echo $row['Hak_akses']; ?></option>
                              <option value="Sub Bagian Umum" > Sub Bagian Umum</option>
                              <option value="Sekretaris" > Sekretaris</option>
                              <option value="Kepala Dinas" > Kepala Dinas</option>
                              <option value="DSP" > DSP</option>
                              
                          </select>                                     
                     </div>
                  </div>
                  <div class="form-group">
                    <label > No Telepone</label>
                    <input type="text" class="form-control" name="No_telepon" placeholder="masukan no telepon" value="<?php echo $row['No_telepon']; ?>" >
                  </div>
               
                  <div class="form-group pull-right">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     <button type="submit"  name="edit" value="Simpan"  class="btn btn-success btn-flat">Simpan</button>
                  </div>
                  <br>
           
              </form>
            </div>     
          </div>
        </div>
<!-- Proses edit data ke data base -->
 
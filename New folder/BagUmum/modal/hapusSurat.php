 <?php
    include '../../database/koneksi.php';

    $nourut = $_GET['nourut'];
    $sql = mysqli_query($koneksi,"SELECT Nomor_surat_masuk FROM tb_suratmasuk where No_urut_surat='$nourut'");
    $row=  mysqli_fetch_array($sql);
?>

   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Peringatan !!</h4>
         </div>
         <div class="modal-body">
            Apakah anda yakin menghapus data : <?php echo $row['Nomor_surat_masuk']; ?>
         </div>
         <div class="modal-footer">
            <div class="btn-group">
            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="Nomor_surat_masuk" value="<?php echo $row['Nomor_surat_masuk']; ?>">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
               <button name="hapus" type="submit" class="btn btn-danger btn-flat">Ya</button>
            </form>
            </div>
         </div>
      </div>
   </div>

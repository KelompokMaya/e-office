 <?php
    include '../../database/koneksi.php';

    $NIP = $_GET['NIP'];
    $sql = mysqli_query($koneksi,"SELECT NIP,nama FROM tb_pengguna where NIP='$NIP'");
    $row=  mysqli_fetch_array($sql);
?>

   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Peringatan !!</h4>
         </div>
         <div class="modal-body">
            Apakah anda yakin menghapus data : <?php echo $row['nama']; ?>
         </div>
         <div class="modal-footer">
            <div class="btn-group">
            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="NIP" value="<?php echo $row['NIP']; ?>">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
               <button name="hapus" type="submit" class="btn btn-danger btn-flat">Ya</button>
            </form>
            </div>
         </div>
      </div>
   </div>

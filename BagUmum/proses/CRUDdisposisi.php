
  <!-- Proses tambah data ke data base -->
  <?php
     // Proses tampil modal hapus data 
    if(isset($_GET["hapus"]))
      {
              echo '<script >
              $(window).load(function() { $("#ModalHapusDisposisi").modal(); })
              </script>'; 
    include("modal/hapusDisposisi.php");  
   
   
             
      }

    // Proses hapus data      
    if(isset($_POST['hapus']))
      {
              $Nomor_surat_masuk     = $_POST['Nomor_surat_masuk'];
    
              $delete = mysqli_query($koneksi, "DELETE FROM tb_disposisi WHERE Nomor_surat_masuk='$Nomor_surat_masuk'");
              if($delete){

                       echo '<script >
                            $("#ModalHapus").modal();
                              setTimeout(function () {
                              window.location.href = "disposisi.php";  }, 100);
                          
                          </script>';

            }else{
                       echo '<script >
                            $("#ModalGagal").modal();
                              setTimeout(function () {
                              window.location.href = "disposisi.php";  }, 100);
                          
                          </script>';
            }
      } 
          
  ?>

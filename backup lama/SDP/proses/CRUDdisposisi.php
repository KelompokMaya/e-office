
  <?php
   // Proses tampil form edit data 
  if(isset($_GET["edit"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelSurat").css("display","none");     
             })
            </script>';
           
    }

     // Proses edit data 
    if(isset($_POST['terimadisposisi']))
          {
            $disposisi_Nomor_surat_masuk     = $_POST['disposisi-Nomor_surat'];
            $disposisi_NU                    = $_POST['disposisi-NU'];
            $disposisi_Catatan               = $_POST['disposisi-Catatan'];
           
            
               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set Catatan='$disposisi_Catatan',Status_disposisi='terima bidang' WHERE Nomor_surat_masuk='$disposisi_Nomor_surat_masuk' ") or die(mysqli_error($koneksi));
               $updatenotif = mysqli_query($koneksi, " UPDATE tb_notif set status='terbaca' WHERE id_disposisi='$disposisi_NU' ") or die(mysqli_error($koneksi));
                if($update)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "surat-masuk.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "surat-masuk.php";  }, 100);
                        
                        </script>';
                }
          }


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

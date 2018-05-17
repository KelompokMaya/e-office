
  <?php
   // Proses tampil form edit data 
  if(isset($_GET["edit"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelDisposisi").css("display","none");     
             })
            </script>';
           
    }

     // Proses edit data 
    if(isset($_POST['editdisposisi']))
          {
            $disposisi_kode                  = $_POST['disposisi-kode'];
            $disposisi_NU                    = $_POST['disposisi-NU'];
            $disposisi_Nomor_surat_masuk     = $_POST['disposisi-Nomor_surat'];
            // $disposisi_Tanggal_surat         = $_POST['disposisi-Tanggal_surat'];
            // $disposisi_Asal_surat            = $_POST['disposisi-Asal_surat'];
            // $disposisi_Perihal               = $_POST['disposisi-Perihal'];
            $disposisi_Tanggal_penyelesaian  = $_POST['disposisi-Tanggal_penyelesaian'];
            $disposisi_Catatan               = $_POST['disposisi-Catatan'];
            $disposisi_Tujuan                = $_POST['disposisi-Tujuan'];
            $disposisi_isi                   = $_POST['disposisi-isi'];

          
           
            
               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set No_urut_disposisi='$disposisi_NU', Kode_surat='$disposisi_kode',Tanggal_penyelesaian_disposisi='$disposisi_Tanggal_penyelesaian',Disposisi='$disposisi_isi',Kode_bagian='$disposisi_Tujuan',Catatan='$disposisi_Catatan' WHERE Nomor_surat_masuk='$disposisi_Nomor_surat_masuk' ") or die(mysqli_error($koneksi));
                if($update)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';
                }
              }           


    //  // Proses tampil modal hapus data 
    // if(isset($_GET["hapus"]))
    //     {
    //             echo '<script >
    //             $(window).load(function() { $("#ModalHapusDisposisi").modal(); })
    //             </script>'; 
    //   include("modal/hapusDisposisi.php");  
     
     
               
    //     }

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

      // Proses tampil modal hapus data 
      if(isset($_GET["kirim"]))
        {
               $id_disposisi = $_GET["id"];
               $hak_akses = $_SESSION['hak_akses'];
               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set Status_disposisi='terkirim sekretaris' WHERE No_urut_disposisi='$id_disposisi' ") or die(mysqli_error($koneksi));
                

              $sql  = mysqli_query($koneksi,"SELECT * FROM tb_disposisi where No_urut_disposisi='$id_disposisi'");
              $row  = mysqli_fetch_array($sql);
              $judul= $row['Perihal'];

               $insert = mysqli_query($koneksi, "INSERT INTO tb_notif( asal_hak_akses,tujuan_hak_akses,judul,id_disposisi,status) VALUES('$hak_akses','Sekretaris','$judul','$id_disposisi','terkirim')") or die(mysqli_error($koneksi));

                if($update&&$insert)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';
                }
     
 
           
      } 
      if(isset($_GET["kirimbidang"]))
        {
               $id_disposisi = $_GET["id"];
               $hak_akses = $_SESSION['hak_akses'];
               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set Status_disposisi='terkirim bidang' WHERE No_urut_disposisi='$id_disposisi' ") or die(mysqli_error($koneksi));
                

              $sql  = mysqli_query($koneksi,"SELECT * FROM tb_disposisi where No_urut_disposisi='$id_disposisi'");
              $row  = mysqli_fetch_array($sql);
              $judul= $row['Perihal'];

               $insert = mysqli_query($koneksi, "INSERT INTO tb_notif( asal_hak_akses,tujuan_hak_akses,judul,id_disposisi,status) VALUES('$hak_akses','SDP','$judul','$id_disposisi','terkirim')") or die(mysqli_error($koneksi));

                if($update&&$insert)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "disposisi.php";  }, 100);
                        
                        </script>';
                }
     
 
           
      } 
          
  ?>


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
    if(isset($_POST['editdisposisi']))
          {
            $disposisi_Nomor_surat_masuk     = $_POST['disposisi-Nomor_surat'];
            $disposisi_NU                    = $_POST['disposisi-NU'];
            $disposisi_Catatan               = $_POST['disposisi-Catatan'];
           
               //mencari no urut terbesar
            $cek_no_urut=mysqli_query($koneksi, "SELECT max(No_urut_sekretaris) as num FROM tb_disposisi")or die (mysqli_error($koneksi));
            $row = mysqli_fetch_assoc($cek_no_urut);
            $no_urut= $row['num']+1;


               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set Catatan='$disposisi_Catatan',Status_disposisi='terima sekretaris',No_urut_sekretaris='$no_urut' WHERE Nomor_surat_masuk='$disposisi_Nomor_surat_masuk' ") or die(mysqli_error($koneksi));
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



      if(isset($_GET["kirim"]))
        {
               $id_disposisi = $_GET["id"];
               $hak_akses = $_SESSION['hak_akses'];
               $update = mysqli_query($koneksi, " UPDATE tb_disposisi set Status_disposisi='terkirim Kepala dinas' WHERE No_urut_disposisi='$id_disposisi' ") or die(mysqli_error($koneksi));
                

              $sql  = mysqli_query($koneksi,"SELECT * FROM tb_disposisi where No_urut_disposisi='$id_disposisi'");
              $row  = mysqli_fetch_array($sql);
              $judul= $row['Perihal'];

               $insert = mysqli_query($koneksi, "INSERT INTO tb_notif( asal_hak_akses,tujuan_hak_akses,judul,id_disposisi,status) VALUES('$hak_akses','Kepala Dinas','$judul','$id_disposisi','terkirim')") or die(mysqli_error($koneksi));

                if($update&&$insert)
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
          
  ?>

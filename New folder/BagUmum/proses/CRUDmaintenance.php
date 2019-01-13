
  <!-- Proses tambah data ke data base -->
  <?php
  if(isset($_POST['add']))
          {
            $Id_jenis_surat                = $_POST['Id_jenis_surat'];
            $Nama_jenis_surat              = $_POST['Nama_jenis_surat'];
            $Surat                         = $_POST['Surat'];
           
             $cek = mysqli_query($koneksi, "SELECT * FROM tb_jenis_surat WHERE Id_jenis_surat='$Id_jenis_surat'")or die (mysqli_error($koneksi));

              if(mysqli_num_rows($cek) == 0)
                {
                  $insert = mysqli_query($koneksi, "INSERT INTO tb_jenis_surat(Id_jenis_surat, Nama_jenis_surat, Surat, Status) VALUES('$Id_jenis_surat','$Nama_jenis_surat','$Surat','aktif')") or die(mysqli_error($koneksi));
                    if($insert)
                    { 
                       echo '<script >
                              $("#ModalSukses").modal();
                                setTimeout(function () {
                                window.location.href = "maintenance.php";  }, 100);
                            
                            </script>';

                    }
                  else
                    {
                      echo '<script >
                              $("#ModalGagal").modal();
                                setTimeout(function () {
                                window.location.href = "maintenance.php";  }, 100);
                            
                            </script>';
                    }

              } else{
                 echo '<script >
                            $("#ModalDuplikat").modal();
                              setTimeout(function () {
                              window.location.href = "maintenance.php";  }, 100);
                          
                          </script>';
              }
        }

    // Proses tampil form edit data 
  if(isset($_GET["edit"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelJenisSurat").css("display","none");     
             })
            </script>';
           
    }
          
 
  if(isset($_POST['edit']))
          {
            $currId                = $_POST['currId'];
            $edit_Id_jenis_surat   = $_POST['edit-Id_jenis_surat'];
            $edit_Nama_jenis_surat = $_POST['edit-Nama_jenis_surat'];
            $edit_Surat            = $_POST['edit-Surat'];          
            
               $update = mysqli_query($koneksi, " UPDATE tb_jenis_surat set Id_jenis_surat='$edit_Id_jenis_surat', Nama_jenis_surat='$edit_Nama_jenis_surat', surat='$edit_Surat' WHERE Id_jenis_surat='$currId' ") or die(mysqli_error($koneksi));
                if($update)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                             $("#editJenisSurat").css("display","none");
                            window.location.href = "maintenance.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            $("#editJenisSurat").css("display","none");
                            window.location.href = "maintenance.php";  }, 100);
                        
                        </script>';
                }

          }


    if(isset($_GET['status']))
          {
            $Id_jenis_surat=$_GET['id'];

            if ($_GET['status']=='aktif') {
              $update = mysqli_query($koneksi, " UPDATE tb_jenis_surat set status='non aktif' WHERE Id_jenis_surat='$Id_jenis_surat' ") or die(mysqli_error($koneksi));
            }
            if ($_GET['status']=='nonaktif') {
              $update = mysqli_query($koneksi, " UPDATE tb_jenis_surat set status='aktif' WHERE Id_jenis_surat='$Id_jenis_surat' ") or die(mysqli_error($koneksi));
            }
            
                if($update)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "maintenance.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "maintenance.php";  }, 100);
                        
                        </script>';
                }

          }
          
          
 
  
          
  ?>

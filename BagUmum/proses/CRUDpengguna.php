
  <!-- Proses tambah data ke data base -->
  <?php
  if(isset($_POST['add']))
          {
            $NIP                = $_POST['NIP'];
            $Nama               = $_POST['Nama'];
            $Password           = md5($_POST['Password']);
            $Alamat             = $_POST['Alamat'];
            $Hak_akses          = $_POST['Hak_akses'];
            $No_telepon         = $_POST['No_telepon'];
           
             $cek = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE NIP='$NIP'")or die (mysqli_error($koneksi));

              if(mysqli_num_rows($cek) == 0)
                {
                  $insert = mysqli_query($koneksi, "INSERT INTO tb_pengguna(NIP,Nama,Password,Alamat,Hak_akses,No_telepon) VALUES('$NIP','$Nama','$Password','$Alamat','$Hak_akses','$No_telepon')") or die(mysqli_error($koneksi));
                    if($insert)
                    { 
                       echo '<script >
                              $("#ModalSukses").modal();
                                setTimeout(function () {
                                window.location.href = "data-pengguna.php";  }, 100);
                            
                            </script>';

                    }
                  else
                    {
                      echo '<script >
                              $("#ModalGagal").modal();
                                setTimeout(function () {
                                window.location.href = "data-pengguna.php";  }, 100);
                            
                            </script>';
                    }

              } else{
                 echo '<script >
                            $("#ModalDuplikat").modal();
                              setTimeout(function () {
                              window.location.href = "data-pengguna.php";  }, 100);
                          
                          </script>';
              }
        }
          
 
  if(isset($_POST['edit']))
          {
            $currNIP            = $_POST['curr-NIP'];
            $NIP                = $_POST['NIP'];
            $Nama               = $_POST['Nama'];
            $Alamat             = $_POST['Alamat'];
            $Hak_akses          = $_POST['Hak_akses'];
            $No_telepon         = $_POST['No_telepon'];
           
            
               $update = mysqli_query($koneksi, " UPDATE tb_pengguna set NIP='$NIP', Nama='$Nama', Alamat='$Alamat',Hak_akses='$Hak_akses', No_telepon='$No_telepon' WHERE NIP='$currNIP' ") or die(mysqli_error($koneksi));
                if($update)
                { 
                   echo '<script >
                          $("#ModalSukses").modal();
                            setTimeout(function () {
                            window.location.href = "data-pengguna.php";  }, 100);
                        
                        </script>';

                }
              else
                {
                  echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "data-pengguna.php";  }, 100);
                        
                        </script>';
                }

          }
          
 
  if(isset($_POST['hapus']))
          {
            $nip = $_POST['NIP'];       
            $delete = mysqli_query($koneksi, "DELETE FROM tb_pengguna WHERE NIP='$nip'");
            if($delete){

                     echo '<script >
                          $("#ModalHapus").modal();
                            setTimeout(function () {
                            window.location.href = "data-pengguna.php";  }, 100);
                        
                        </script>';

          }else{
                     echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "data-pengguna.php";  }, 100);
                        
                        </script>';
          }
        

          }
          
  ?>

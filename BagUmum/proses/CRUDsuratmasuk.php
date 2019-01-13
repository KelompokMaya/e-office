     


  <!-- Proses tambah data ke data base -->
  <?php
  if(isset($_POST['add']))
          {
            $Nomor_surat_masuk     = $_POST['Nomor_surat'];
            $Asal_surat            = $_POST['Asal_surat'];
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $Tanggal_terima        = date("Y-m-d H:i:s");
            $Tanggal_surat         = $_POST['Tanggal_surat'];
            $Jenis_surat           = $_POST['Jenis_surat'];
            $Sifat_surat           = $_POST['Sifat_surat'];
            $Perihal               = $_POST['Perihal'];


            $File       = $_FILES['file_Surat']['name'];
            $tmp        = $_FILES['file_Surat']['tmp_name'];
            $file_Surat = date('YmdH_').$File;
            $path = "../File/".$file_Surat;

            //mencari no urut terbesar
            $cek_no_urut=mysqli_query($koneksi, "SELECT max(No_urut_surat) as num FROM tb_suratmasuk")or die (mysqli_error($koneksi));
            $row = mysqli_fetch_assoc($cek_no_urut);
            $no_urut= $row['num']+1;
          
            $cek = mysqli_query($koneksi, "SELECT * FROM tb_suratmasuk WHERE Nomor_surat_masuk='$Nomor_surat_masuk'")or die (mysqli_error($koneksi));

          if(mysqli_num_rows($cek) == 0)
            {
              if(move_uploaded_file($tmp, $path)){
                      $insert = mysqli_query($koneksi, "INSERT INTO tb_suratmasuk(No_urut_surat, Nomor_surat_masuk,Asal_surat,Tanggal_input,Tanggal_surat,Id_jenis_surat,Sifat_surat,Perihal,File_surat) VALUES('$no_urut','$Nomor_surat_masuk','$Asal_surat','$Tanggal_terima','$Tanggal_surat','$Jenis_surat','$Sifat_surat','$Perihal','$file_Surat')") or die(mysqli_error($koneksi));
                        if($insert)
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
              }else{

                  echo '<script >
                                  $("#ModalGagal").modal();
                                    setTimeout(function () {
                                    window.location.href = "surat-masuk.php";  }, 100);
                                
                                </script>';
              }
            }
            else
            {
              echo '<script >
                            $("#ModalDuplikat").modal();
                              
                          
                          </script>';
            }

           
          }


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
  if(isset($_POST['edit']))
          { 
            $currSM                = $_POST['currSM'];
            $Nomor_surat_masuk     = $_POST['edit-Nomor_surat'];
            $Asal_surat            = $_POST['edit-Asal_surat'];
            // $Tanggal_terima        = $_POST['edit-Tanggal_terima'];
            $Tanggal_surat         = $_POST['edit-Tanggal_surat'];
            $Jenis_surat           = $_POST['edit-Jenis_surat'];
            $Perihal               = $_POST['edit-Perihal'];
            $Sifat_surat           = $_POST['edit-Sifat_surat'];

            if (!empty($_FILES['edit-file_Surat']['name'])) {
                $File       = $_FILES['edit-file_Surat']['name'];
                $tmp        = $_FILES['edit-file_Surat']['tmp_name'];
                $file_Surat = date('YmdH_').$File;
                $path = "../File/".$file_Surat;


                if(move_uploaded_file($tmp, $path)){
                    $update = mysqli_query($koneksi, "UPDATE tb_suratmasuk set Nomor_surat_masuk='$Nomor_surat_masuk', Asal_surat='$Asal_surat', Tanggal_surat='$Tanggal_surat', Id_jenis_surat='$Jenis_surat',Sifat_surat='$Sifat_surat', Perihal='$Perihal', File_surat='$file_Surat' WHERE Nomor_surat_masuk='$currSM'") or die(mysqli_error($koneksi));
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
                }else{

                    echo '<script >
                                    $("#ModalGagal").modal();
                                      setTimeout(function () {
                                      window.location.href = "surat-masuk.php";  }, 100);
                                  
                                  </script>';
                }
              
            } else {  

               $update = mysqli_query($koneksi, "UPDATE tb_suratmasuk set Nomor_surat_masuk='$Nomor_surat_masuk', Asal_surat='$Asal_surat', Tanggal_input='$Tanggal_terima',Tanggal_surat='$Tanggal_surat', Sifat_surat='$Sifat_surat', Perihal='$Perihal',Id_jenis_surat='$Jenis_surat' WHERE Nomor_surat_masuk='$currSM'") or die(mysqli_error($koneksi));
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
           
            

          }
   // Proses tampil form tambah disposisi 
  if(isset($_GET["tambahdisposisi"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelSurat").css("display","none");     
             })
            </script>';
           
    }

  if(isset($_POST['tambahdisposisi']))
          { 
            $disposisi_kode                  = $_POST['disposisi-kode'];
            $disposisi_NU                    = $_POST['disposisi-NU'];
            $disposisi_Nomor_surat_masuk     = $_POST['disposisi-Nomor_surat'];
            $disposisi_Tanggal_surat         = $_POST['disposisi-Tanggal_surat'];
            $disposisi_Asal_surat            = $_POST['disposisi-Asal_surat'];
            $disposisi_Perihal               = $_POST['disposisi-Perihal'];
            // $disposisi_Tanggal_penyelesaian  = $_POST['disposisi-Tanggal_penyelesaian'];
            // $disposisi_Catatan               = $_POST['disposisi-Catatan'];
            // $disposisi_Tujuan                = $_POST['disposisi-Tujuan'];
            // $disposisi_isi                   = $_POST['disposisi-isi'];
            $disposisi_status                = 'belum terkirim';

            //mencari no urut terbesar
            $cek_no_urut=mysqli_query($koneksi, "SELECT max(No) as num FROM tb_disposisi")or die (mysqli_error($koneksi));
            $row = mysqli_fetch_assoc($cek_no_urut);
            $no_urut= $row['num']+1;
            
            

            $cek = mysqli_query($koneksi, "SELECT * FROM tb_disposisi WHERE No_urut_disposisi='$disposisi_NU'")or die (mysqli_error($koneksi));

            if(mysqli_num_rows($cek) == 0)
              {

            $insert = mysqli_query($koneksi, "INSERT INTO tb_disposisi(No_urut_disposisi,No,Kode_surat,Nomor_surat_masuk,Perihal,Tanggal_surat,Asal_surat,Status_disposisi) VALUES('$disposisi_NU','$no_urut','$disposisi_kode','$disposisi_Nomor_surat_masuk','$disposisi_Perihal','$disposisi_Tanggal_surat','$disposisi_Asal_surat','$disposisi_status')") or die(mysqli_error($koneksi));
                      if($insert)
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
           
            
            } else{

               echo '<script >
                            $("#ModalDuplikatdisposisi").modal();
                              setTimeout(function () {
                              window.location.href = "surat-masuk.php";  }, 100);
                          
                          </script>';
            }
          }
          
  ?>

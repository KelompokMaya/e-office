     

  <?php
  // Proses tampil form tambah data 
  if(isset($_GET["tambahSuratKeluar"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelSuratKeluar").css("display","none");     
             })
            </script>';
           
    }
  //Proses tambah data ke data base 
  if(isset($_POST['addSuratKeluar']))
          {
            $Nomor_surat_keluar     = $_POST['Nomor_surat'];
            $Tanggal_surat          = $_POST['Tanggal_surat'];
            $Asal_surat             = $_POST['Asal_surat'];
            $Sifat_surat            = $_POST['Sifat_surat'];
            $Perihal                = $_POST['Perihal'];
            $Isi_surat              = $_POST['isi_surat'];
            $Jenis_surat            = $_POST['Jenis_surat'];

            

            if ($Jenis_surat=='Surat Keluar') {
              $Tujuan_surat     =$_POST['Tujuan_surat'];
              $Dasar_surat      ='-';
              $Ditugaskan_kepada= '-';
              $Id_jenis_surat   = 'sk1';
              
            }
            if ($Jenis_surat=='Surat Perintah Tugas') {
              $Dasar_surat      =$_POST['Dasar_surat'];
              $Ditugaskan_kepada= $_POST['Ditugaskan_kepada'];
              $Id_jenis_surat   = 'sk2';
              
            }
            if ($Jenis_surat=='Nota Dinas') {
              $Tujuan_surat     =$_POST['Tujuan_surat'];
              $Dasar_surat      ='-';
              $Ditugaskan_kepada= '-';
              $Id_jenis_surat   = 'sk3';
              
            }
             
            $cek = mysqli_query($koneksi, "SELECT * FROM tb_suratkeluar WHERE Nomor_surat_keluar='$Nomor_surat_keluar'")or die (mysqli_error($koneksi));

          if(mysqli_num_rows($cek) == 0)
            {
                $insert = mysqli_query($koneksi, "INSERT INTO tb_suratkeluar(Nomor_surat_keluar,Ditugaskan_kepada,Tujuan_surat,Tanggal_surat,Perihal,Asal_surat,Dasar_surat,Isi_surat,Sifat_surat,Id_jenis_surat) VALUES('$Nomor_surat_keluar','$Ditugaskan_kepada','$Tujuan_surat','$Tanggal_surat','$Perihal','$Asal_surat','$Dasar_surat','$Isi_surat','$Sifat_surat','$Id_jenis_surat')") or die(mysqli_error($koneksi));
                  if($insert)
                  { 
                     echo '<script >
                            $("#ModalSukses").modal();
                              setTimeout(function () {
                              window.location.href = "surat-keluar.php";  }, 100);
                          
                          </script>';

                  }
                else
                  {
                    echo '<script >
                            $("#ModalGagal").modal();
                              setTimeout(function () {
                              window.location.href = "surat-keluar.php";  }, 100);
                          
                          </script>';
                  }

            } else {
                 echo '<script >
                            $("#ModalDuplikat").modal();
                              setTimeout(function () {
                              window.location.href = "surat-keluar.php";  }, 100);
                          
                          </script>';

            }

           
           
          }

  // Proses tampil modal hapus data 
  if(isset($_GET["hapus"]))
    {
            echo '<script >
            $(window).load(function() { $("#ModalHapusSurat").modal(); })
            </script>'; 
  include("modal/hapusSuratkeluar.php");  
 
 
           
    }


   // Proses hapus data      
  if(isset($_POST['hapus']))
    {
            $Nomor_surat_keluar     = $_POST['Nomor_surat_keluar'];
  
            $delete = mysqli_query($koneksi, "DELETE FROM tb_suratkeluar WHERE Nomor_surat_keluar='$Nomor_surat_keluar'");
            if($delete){

                     echo '<script >
                          $("#ModalHapus").modal();
                            setTimeout(function () {
                            window.location.href = "surat-keluar.php";  }, 100);
                        
                        </script>';

          }else{
                     echo '<script >
                          $("#ModalGagal").modal();
                            setTimeout(function () {
                            window.location.href = "surat-keluar.php";  }, 100);
                        
                        </script>';
          }
    }

  // Proses tampil form edit data 
  if(isset($_GET["edit"]))
    {
            echo '<script >
            $(window).load(function() {  
              $("#tabelSuratKeluar").css("display","none");     
             })
            </script>';
           
    }

  // Proses edit data     
  if(isset($_POST['editSuratKeluar']))
          { 
            $currNS                 = $_POST['currNS'];
            $Nomor_surat_keluar     = $_POST['Nomor_surat_keluar'];
            $Tanggal_surat          = $_POST['Tanggal_surat'];
            $Asal_surat             = $_POST['Asal_surat'];
            $Sifat_surat            = $_POST['Sifat_surat'];
            $Perihal                = $_POST['Perihal'];
            $Isi_surat              = $_POST['isi_surat'];
            $Jenis_surat            = $_POST['Jenis_surat'];

            

            if ($Jenis_surat=='sk1') {
              $Tujuan_surat     =$_POST['Tujuan_surat'];
              $Dasar_surat      ='-';
              $Ditugaskan_kepada= '-';

              
            }
            if ($Jenis_surat=='sk2') {
              $Dasar_surat      = $_POST['Dasar_surat'];
              $Ditugaskan_kepada= $_POST['Ditugaskan_kepada'];
              
            }
            if ($Jenis_surat=='sk3') {
              $Tujuan_surat     =$_POST['Tujuan_surat'];
              $Dasar_surat      ='-';
              $Ditugaskan_kepada= '-';
              
            }
             $update = mysqli_query($koneksi, "UPDATE tb_suratkeluar set Nomor_surat_keluar='$Nomor_surat_keluar',Tanggal_surat='$Tanggal_surat',Asal_surat='$Asal_surat',Sifat_surat='$Sifat_surat',Perihal='$Perihal',Isi_surat='$Isi_surat',Id_jenis_surat='$Jenis_surat',Tujuan_surat='$Tujuan_surat',Dasar_surat='$Dasar_surat',Ditugaskan_kepada='$Ditugaskan_kepada' WHERE Nomor_surat_keluar='$currNS'") or die(mysqli_error($koneksi));
                      if($update)
                        { 
                           echo '<script >
                                  $("#ModalSukses").modal();
                                    setTimeout(function () {
                                    window.location.href = "surat-keluar.php";  }, 100);
                                
                                </script>';

                        }
                      else
                        {
                          echo '<script >
                                  $("#ModalGagal").modal();
                                    setTimeout(function () {
                                    window.location.href = "surat-keluar.php";  }, 100);
                                
                                </script>';
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
            $disposisi_Tanggal_penyelesaian  = $_POST['disposisi-Tanggal_penyelesaian'];
            $disposisi_NIP                   = $_POST['disposisi-NIP'];
            $disposisi_Catatan               = $_POST['disposisi-Catatan'];
            $disposisi_Tujuan                = $_POST['disposisi-Tujuan'];
            $disposisi_isi                   = $_POST['disposisi-isi'];

            $insert = mysqli_query($koneksi, "INSERT INTO tb_disposisi(No_urut_disposisi,Kode_surat,Tanggal_penyelesaian_disposisi,Nomor_surat_masuk,Tanggal_surat,NIP,Catatan,Asal_surat,Disposisi,Tujuan,Perihal) VALUES('$disposisi_NU','$disposisi_kode','$disposisi_Tanggal_penyelesaian','$disposisi_Nomor_surat_masuk','$disposisi_Tanggal_surat','$disposisi_NIP','$disposisi_Catatan','$disposisi_Asal_surat','$disposisi_isi','$disposisi_Tujuan','$disposisi_Perihal')") or die(mysqli_error($koneksi));
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
                                    window.location.href = "surat-masuk.php";  }, 100);
                                
                                </script>';
                        } 
           
            

          }
          
  ?>

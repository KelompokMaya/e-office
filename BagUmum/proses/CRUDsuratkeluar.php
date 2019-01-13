     

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
            $Kode_surat             = $_POST['Kode_surat'];
            $Nomor_surat            = $_POST['Nomor_surat'];
            $Kode_bidang            = $_POST['Kode_bidang'];
            $nama_instansi          = $_POST['nama_instansi'];
            $Nomor_surat_keluar     = $Kode_surat.'/'.$Nomor_surat.'/'.$Kode_bidang.'/'.$nama_instansi;
            $Tanggal_surat          = $_POST['Tanggal_surat'];
            $Asal_surat             = '-';
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
              $Dasar_surat      =$_POST['Dasar_surat'];
              $Ditugaskan_kepada= $_POST['Ditugaskan_kepada'];
              
            }
            if ($Jenis_surat=='sk3') {
              $Tujuan_surat     =$_POST['Tujuan_surat'];
              $Dasar_surat      ='-';
              $Ditugaskan_kepada= '-';
              $Asal_surat             = $_POST['Asal_surat'];
            }
            //  //mencari no urut terbesar
            // $cek_no_urut=mysqli_query($koneksi, "SELECT max(No_urut_surat) as num FROM tb_suratkeluar")or die (mysqli_error($koneksi));
            // $row = mysqli_fetch_assoc($cek_no_urut);
            // $no_urut= $row['num']+1;
             
            $cek = mysqli_query($koneksi, "SELECT * FROM tb_suratkeluar WHERE Nomor_surat_keluar='$Nomor_surat_keluar'")or die (mysqli_error($koneksi));

          if(mysqli_num_rows($cek) == 0)
            {
                $insert = mysqli_query($koneksi, "INSERT INTO tb_suratkeluar(Nomor_surat_keluar,Ditugaskan_kepada,Tujuan_surat,Tanggal_surat,Perihal,Asal_surat,Dasar_surat,Sifat_surat,Isi_surat,Id_jenis_surat,No_urut_surat) VALUES('$Nomor_surat_keluar','$Ditugaskan_kepada','$Tujuan_surat','$Tanggal_surat','$Perihal','$Asal_surat','$Dasar_surat','$Sifat_surat','$Isi_surat','$Jenis_surat','$Nomor_surat')") or die(mysqli_error($koneksi));
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
             $update = mysqli_query($koneksi, "UPDATE tb_suratkeluar set Nomor_surat_keluar='$Nomor_surat_keluar',Tanggal_surat='$Tanggal_surat',Asal_surat='$Asal_surat',Perihal='$Perihal',Isi_surat='$Isi_surat',Sifat_surat='$Sifat_surat',Tujuan_surat='$Tujuan_surat',Dasar_surat='$Dasar_surat',Ditugaskan_kepada='$Ditugaskan_kepada',Id_jenis_surat='$Jenis_surat' WHERE Nomor_surat_keluar='$currNS'") or die(mysqli_error($koneksi));
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

          
  ?>

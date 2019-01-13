<?php
session_start();

if ($_SESSION['hak_akses']=='Sub Bagian Umum') {
  header("Location: BagUmum");
}
if ($_SESSION['hak_akses']=='Sekretaris') {
  header("Location: Sekretaris");
}
if ($_SESSION['hak_akses']=='Kepala Dinas') {
  header("Location: KepalaDinas");
}
if ($_SESSION['hak_akses']=='SDP') {
  header("Location: SDP");
}



  ?>


 <!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
   <link rel="shortcut icon" href="template/login/img/logos.png" alt="User Image" type="image/x-icon">
  <title>E-OFFICE</title>
  <link rel="stylesheet" href="template/login/css/style.css">

  
</head>

<body>

  <div class="wrapper">
  <div class="container" style="background-color: #2b9ed8;">
    <div style="background-color: #1874a3; height: 110px; margin-top: -80px;">
      <img src="template/login/img/logos.png"; style="width: 75px; height: 75px; margin: 10px 10px 0px 30px; float: left;">
      <h2 style="color: white; line-height: 40px; float: left;margin-top: 10px; margin-left: 40px; font-weight: bold;
">SISTEM INFORMASI E-OFFICE <br> DINAS PARIWISATA PROVINSI BALI</b></h2>
    </div>

    <div><br />
    
    <form class="form" action="" method="post" >
      <input type="text" placeholder="NIP" name="nip" required>
      <input type="password" placeholder="Password" name="pass" required>
      <button type="submit" name="login" >Login</button>
    </form>
  </div>
  <h3 id="alert" style="display: none;" ><b>NIP atau Password Salah!!</b></h3>
  </div>
  
</div>
  <script src='template/bootstrap/js/jquery.min.js'></script>

  

    <script  src="template/login/js/index.js"></script>


<script src="template/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>



</body>

</html>


<!-- proses login-->

<?php
        
        if(isset($_POST['login'])){
          include("database/koneksi.php");
          
          $nip = $_POST['nip'];
          $password = md5($_POST['pass']);

          
          $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE NIP='$nip' AND Password='$password' ");


          $row = mysqli_fetch_assoc($query);
          if(mysqli_num_rows($query) == 0 ){
            
           echo ' <script type="text/javascript">
            $("#alert").css("display","block");
              $(window).load(function() { $("#alert").fadeOut(3300); })
            </script> ';


             } else if ($row['Hak_akses']=='Sub Bagian Umum') {

                $_SESSION['nama']=$row['Nama'];
                $_SESSION['nip']=$row['NIP'];
                $_SESSION['hak_akses']=$row['Hak_akses'];
                

              echo ' <script type="text/javascript">
                          window.location.href = "BagUmum";
                          </script> ';

              
          
          
          } else if ($row['Hak_akses']=='Sekretaris') {

                $_SESSION['nama']=$row['Nama'];
                $_SESSION['nip']=$row['NIP'];
                $_SESSION['hak_akses']=$row['Hak_akses'];
                

              echo ' <script type="text/javascript">
                          window.location.href = "Sekretaris";
                          </script> ';

              
          
          
          } else if ($row['Hak_akses']=='Kepala Dinas') {

                $_SESSION['nama']=$row['Nama'];
                $_SESSION['nip']=$row['NIP'];
                $_SESSION['hak_akses']=$row['Hak_akses'];
                

              echo ' <script type="text/javascript">
                          window.location.href = "KepalaDinas";
                          </script> ';

              
          
          
          }  else if ($row['Hak_akses']=='SDP') {

                $_SESSION['nama']=$row['Nama'];
                $_SESSION['nip']=$row['NIP'];
                $_SESSION['hak_akses']=$row['Hak_akses'];
                $_SESSION['jabatan']=$row['Jabatan'];
                

              echo ' <script type="text/javascript">
                          window.location.href = "SDP";
                          </script> ';

              
          
          
          } else{
             echo ' <script type="text/javascript">
            $("#alert_login").css("display","block");
              $(window).load(function() { $("#alert_login").fadeOut(3300); })
            </script> ';
          }
          
          
        
      }

        ?>


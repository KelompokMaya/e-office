<?php
session_start();

if(empty($_SESSION)){
  header("Location: ../index.php");
}

if ($_SESSION['hak_akses']!='Kepala Dinas') {
  header("Location: ../index.php");
}

?>
<?php
  include("../database/koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../template/login/img/logos.png" alt="User Image" type="image/x-icon">
  <title>E-OFFICE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../template/bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../template/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../template/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link href="../template/bootstrap/css/magnum_custom.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../template/plugins/datatables/dataTables.bootstrap.css">
  



 
</head>
<body  class="hold-transition skin-blue">

           
<div   class="wrapper">

  <header  style="background-color: #1874a3" class="main-header">
    <div  >
        <!-- <img src="../template/img/bg-blur.jpg" alt="User Image" /> -->
    </div>
    <!-- Logo -->
    <a href="index.php" class="logo">
      
     <!--  <span class="logo-lg"> <b>  E-OFFICE</b></span> -->

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav  class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>
      </a>
     
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          
           <!-- Notifications: style can be found in dropdown.less -->
              <li id="notif" class="dropdown notifications-menu">
               
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span style="font-size: 14px" class="label label-warning">0</span>
                </a>
                
              </li>
          
          <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user "></i>
                    <span class="hidden-xs">
              <?php echo $_SESSION['hak_akses'];  ?></span> 

            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li style="background-color: white;" class="user-header">
    
                <p style="color: black">
                  <?php echo $_SESSION['nama']; ?>
                  <small><?php echo $_SESSION['hak_akses'];  ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a id="logout" href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>


        
            
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside  class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <div style="background-color: #1874a3" class="user-panel">
            <div  >
                 <!-- <img src="../template/img/bg-blur.jpg" alt="User Image" /> -->
            </div>
            <div style="width: 40%; height: 40%; margin: 5px" class="image">
                <img src="../template/login/img/logos.png";  alt="User Image" />
            </div>
            <div class="info">
                <p style="color: #fff;">SISTEM INFORMASI E-OFFICE</p>
                <a href="#">Dinas Pariwisata Provinsi Bali</a>
            </div>
            
        </div>
<?php include("comp/header.php")  ?>

              <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <li class="active treeview">
                  <a href="index.php">
                    <i class="fa  fa-home"></i> <span>Home</span>
                  </a>
                </li>
                <li class=" treeview">
                  <a href="data-pengguna.php">
                    <i class="fa  fa-user"></i> <span>Data Pengguna</span>
                    
                  </a>
                </li>
                <li class=" treeview">
                  <a href="surat-masuk.php">
                    <i class="fa fa-download"></i> <span>Surat Masuk</span>
                  </a>
                </li>   
                <li class=" treeview">
                  <a href="disposisi.php">
                    <i class="fa fa-folder"></i> <span>Disposisi</span>
                  </a>
                </li>
                <li class=" treeview">
                  <a href="surat-keluar.php">
                    <i class="fa fa-upload"></i> <span>Surat Keluar</span>
                  </a>
                </li>    
                <li class=" treeview">
                  <a href="laporan-surat.php">
                    <i class="fa fa-paper-plane"></i> <span>Laporan Surat</span>
                  </a>
                </li> 
              </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HOME
        
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">

        <div class=" col-xs-12" >
          <div class="box box-success">
              <div class="box-header">
                <br><br>
                <h3 id="title-edit" class="box-title">Selamat datang di sistem informasi E-office, anda login dengan hak akses <?php echo $_SESSION['hak_akses'];  ?></h3>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div>
          </div>
        </div>
      </div>
     
 
     
    
      
         
    </section>
          
  </div>

        <!---modal detail-->
      <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Anggota</h4>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>

 
 


        
       



    



<?php include("comp/footer.php")  ?>

</body>
</html>

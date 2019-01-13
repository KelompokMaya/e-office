<?php include("comp/header.php")  ?>

              <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <li class=" treeview">
                  <a href="index.php">
                    <i class="fa  fa-home"></i> <span>Home</span>
                  </a>
                </li>
               
                <li class=" treeview">
                  <a href="surat-masuk.php">
                    <i class="fa fa-download"></i> <span>Surat Masuk</span>
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
        NOTIFIKASI
        
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <!-- row -->
      <div class="row">
        <div class="col-md-12">
           <div class="box box-success">
              <div class="box-header">
                <div style="font-size: 18px; text-align: center"><b>BELUM DIBACA</b></div>
                <!-- The time line -->
                <ul class="timeline">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
              <?php 
              $hak_akses=$_SESSION['hak_akses'];                 
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_notif  WHERE tujuan_hak_akses='$hak_akses' AND status='terkirim'  ORDER BY id DESC ");
               while($row = mysqli_fetch_assoc($sql)){
               ?>

                  <li>
                    <i class="fa fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row['tanggal_notif'];?></span>
                      <h3 class="timeline-header"><a ><?php echo $row['asal_hak_akses'];?></a> Belum Dibaca</h3>

                      <div class="timeline-body">
                        <?php echo $row['judul'];?> 
                      </div>
                      <div class="timeline-footer">
                         <a href="surat-masuk.php?edit&&id=<?php echo $row['id_disposisi'];?>" class="btn btn-primary btn-xs">Lihat</a>
                      </div>
                    </div>
                  </li>
                 <?php } ?>  
       
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-md-12">
           <div class="box box-danger">
              <div class="box-header">
                <div style="font-size: 18px; text-align: center;"><b>RIWAYAT NOTIFIKASI</b></div>
                <!-- The time line -->
                <ul class="timeline">
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li class="time-label">
                       
                  </li>
                  <li>
                    <i class="fa fa-folder-open bg-red"></i>

                    <div class="timeline-item">
                       <span class="time"><i class="fa fa-clock-o"></i> 12 oktober 2017</span>
                      <h3 class="timeline-header"><a href="#">Kepala Bagian A</a> terbaca</h3>

                      <div class="timeline-body">
                        Undangan Rapat Disbud Prov Bali dengan pak gubernur
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-folder-open bg-red"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12 oktober 2017</span>
                      <h3 class="timeline-header"><a href="#">Kepala Bagian B</a> terbaca</h3>

                      <div class="timeline-body">
                        Bersepeda bersama-sama
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-folder-open bg-red"></i>

                    <div class="timeline-item">
                     <span class="time"><i class="fa fa-clock-o"></i> 13 oktober 2017</span>
                      <h3 class="timeline-header"><a href="#">Kepala Bagian C</a> terbaca</h3>

                      <div class="timeline-body">
                        pesta ulang tahun
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-folder-open bg-red"></i>

                    <div class="timeline-item">
                       <span class="time"><i class="fa fa-clock-o"></i> 14 oktober 2017</span>
                      <h3 class="timeline-header"><a href="#">Kepala Bagian D</a> terbaca</h3>

                      <div class="timeline-body">
                        Undangan Rapat Disbud Prov Bali dengan pak gubernur
                      </div>
                    </div>
                  </li>
                  
                   
       
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
            </div>
        </div>
 
      </div>
      <!-- /.row -->
     
 
     
    
      
         
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

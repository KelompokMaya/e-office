<?php
              session_start();
              include("../../database/koneksi.php");

              $hak_akses=$_SESSION['hak_akses'];                 
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_notif  WHERE tujuan_hak_akses='$hak_akses' AND status='terkirim'  ORDER BY id DESC ");
              
              if ($sql==FALSE) {
                $jumlah=0;
              }
              else{
                $jumlah=mysqli_num_rows($sql);
              }
              
              $no = 1; ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span style="font-size: 14px" class="label label-warning"><?php if ($jumlah!=0) { echo $jumlah; } ?></span>
                </a>
                <ul class="dropdown-menu">

                  <li style="text-align: center;font-size: 14px" class="header"><b><?php echo $jumlah;?> Surat Baru</b></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     <?php
                      while($row = mysqli_fetch_assoc($sql)){
                        $no++;
                      ?>  
                      <li>
                        <a href="surat-masuk.php?edit&&id=<?php echo $row['id_disposisi'];?>">
                          <i class="fa fa-user text-red"></i><b><?php echo $row['asal_hak_akses'];?></b><br> <?php echo $row['judul'];?></a>
                      </li>

                      <?php } ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="lihat-notif.php">Lihat Semua</a></li>
                </ul>
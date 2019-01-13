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

                  <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
                </ul>
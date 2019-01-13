<?php include("comp/header.php")  ?>

              <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <li class=" treeview">
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
                 <li class="active treeview">
                  <a href="maintenance.php">
                    <i class="fa fa-gears"></i> <span>Jenis Surat </span>
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
        MAINTENANCE JENIS SURAT
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">

    <?php
        if(isset($_GET["edit"]))
    {
      include("modal/editJenisSurat.php");  
    }
    
    ?>

 <!-- tabel data pengguna -->
        <div class=" col-xs-12" id="tabelJenisSurat">
          <div class="box box-primary" >
               <div class="box-header" >
                 
                    <div class="btn-group pull-left">
                        <button id="TambahJenisSurat" onclick="addJenisSurat();" class="btn btn-success btn-flat" title="Jenis Surat"> Tambah Data</button>
                    </div>
                </div>    
                <div  class="box-body table-responsive">

              <table style="font-size: 15px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="5%">No</th>
                  <th >Id Jenis Surat</th>
                  <th style="width: 20%" >Nama Jenis Surat</th>
                  <th style="width: 20%" >Surat</th>
                  <th style="width: 15%" >Status</th>
                  <th  style="text-align: center; width: 20%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_jenis_surat ");
                 $no = 1;
                  while($row = mysqli_fetch_assoc($sql)){

              ?>                
                              <tr>
                                  <td ><?php echo $no?></td>
                                  <td ><?php echo $row['Id_jenis_surat'];?></td>
                                  <td ><?php echo $row['Nama_jenis_surat'];?></td>
                                  <td ><?php echo $row['Surat'];?></td>
                                  <td ><?php echo $row['Status'];?></td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                    <a class="btn btn-info btn-flat" data-toggle="tooltip" title="Edit"  href="maintenance.php?edit&&id=<?php echo $row['Id_jenis_surat'];?>"  > Edit</a>


                                    <?php if ($row['Status']=='aktif') { ?>
                                     <a class="btn btn-danger btn-flat" data-toggle="tooltip" href="maintenance.php?status=aktif&&id=<?php echo $row['Id_jenis_surat'];?>" >Non Aktif</a>

                                    <?php } else { ?>
                                       <a class="btn btn-success btn-flat" data-toggle="tooltip" href="maintenance.php?status=nonaktif&&id=<?php echo $row['Id_jenis_surat'];?>" >  Aktif</a>
                                    <?php } ?>
                                   
                                  </div>
                                </td>
                            </tr>
              <?php
                 $no++;       
                }
              ?>
                            
                </tbody>
                <tfoot>
                  <tr>
                  <th width="5%">No</th>
                  <th >Id Jenis Surat</th>
                  <th  >Nama Jenis Surat</th>
                  <th  >Surat</th>
                  <th >Status</th>
                  <th  style="text-align: center;">Aksi</th>
                </tr>
                </tfoot>
                
              </table>
                
              
                
            </div>
          </div>
        </div>

 <!-- form tambah data -->
      <div class="modal fade" id="Modal-tambahJenisSurat" role="dialog">
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-header" style="background: #0086b3; padding:15px 20px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 style="color: white" ><center><b>Tambah Jenis Surat</b></center></h2>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <form id="form_tambahPengguna" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label > Id Jenis Surat</label>
                    <input type="text" class="form-control" name="Id_jenis_surat" id="Id_jenis_surat" placeholder="Masukan id jenis surat" required>
                  </div>
                  <div class="form-group">
                    <label > Nama Jenis Surat</label>
                    <input type="text" class="form-control" name="Nama_jenis_surat" placeholder="masukan nama jenis surat " required>
                  </div>
                  <div class="form-group">
                    <label > Surat </label>
                    <div class="control-label" style="text-align:left;">
                        <select name="Surat" id="Surat" class="form-control"  >
                              <option value="Surat Masuk" > surat masuk</option>
                              <option value="Surat Keluar" > surat keluar</option>
                              
                          </select>                                     
                     </div>
                  </div>               
                  <div class="form-group pull-right">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     <button type="submit"  name="add" value="Simpan"  class="btn btn-success btn-flat">Simpan</button>
                  </div>
                  <br>
           
              </form>
            </div>     
          </div>
        </div>
      </div> 


      </div>
          
         
    </section>
          
  </div>

      <!---modal-->
      <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      </div>


      <!---modal Sukses-->
      <div class="modal modal-success" id="ModalSukses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Data Berhasil Disimpan</h4>
            </div>
          </div>
        </div>
      </div>
      <!---modal Hapus-->
      <div class="modal modal-danger" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Data Berhasil Dihaus</h4>
            </div>
          </div>
        </div>
      </div>
      <!---modal Gagal-->
      <div class="modal modal-danger" id="ModalGagal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Data Berhasil Dihaus</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="modal modal-danger" id="ModalDuplikat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">ID Jenis Surat Sudah Ada !!</h4>
            </div>
          </div>
        </div>
      </div>
    
     

<?php include("comp/footer.php")  ?>

<!-- bagian proses CRUD pengguna -->
<?php include("proses/CRUDmaintenance.php")  ?>



<script type="text/javascript">
  function addJenisSurat() {
      $("#Modal-tambahJenisSurat").modal();
        
    }
    


  
       

 

  

</script>
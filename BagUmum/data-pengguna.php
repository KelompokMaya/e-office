<?php include("comp/header.php")  ?>

              <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <li class=" treeview">
                  <a href="index.php">
                    <i class="fa  fa-home"></i> <span>Home</span>
                  </a>
                </li>
                <li class="active treeview">
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
        DATA PENGGUNA
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">

 <!-- tabel data pengguna -->
        <div class=" col-xs-12" >
          <div class="box box-primary">
               <div class="box-header">
                 
                    <div class="btn-group pull-left">
                        <button id="TambahAgenda" onclick="addPengguna();" class="btn btn-success btn-flat" title="tambah agenda"><i class="fa  fa-user-plus"></i> Tambah Pengguna</button>
                    </div>
                </div>    
                <div  class="box-body table-responsive">

              <table style="font-size: 15px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="5%">No</th>
                  <th >NIP</th>
                  <th style="width: 20%" >Nama</th>
                  <th style="width: 20%" >Alamat</th>
                  <th >Hak Akses</th>
                  <th >No Telepon</th>
                  <th  style="text-align: center;">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengguna ");
                 $no = 1;
                  while($row = mysqli_fetch_assoc($sql)){

              ?>                
                              <tr>
                                  <td ><?php echo $no?></td>
                                  <td ><?php echo $row['NIP'];?></td>
                                  <td ><?php echo $row['Nama'];?></td>
                                  <td ><?php echo $row['Alamat'];?></td>
                                  <td ><?php echo $row['Hak_akses'];?></td>
                                  <td ><?php echo $row['No_telepon'];?></td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                    <a class="btn btn-info btn-flat" data-toggle="tooltip" title="Edit"  onclick="editPengguna(<?php echo $row["NIP"]; ?>);"  ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-flat" data-toggle="tooltip" title="Delete" onclick="deletePengguna(<?php echo $row["NIP"]; ?>);"><i class="fa fa-trash"></i></a>
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
                    <th >NIP</th>
                    <th >Nama</th>
                    <th >Alamat</th>
                    <th >Hak Akses</th>
                    <th >No Telepon</th>
                    <th  style="text-align: center;">Aksi</th>
                  </tr>
                </tfoot>
                
              </table>
                
              
                
            </div>
          </div>
        </div>

 <!-- form tambah data -->
      <div class="modal fade" id="Modal-tambahPengguna" role="dialog">
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-header" style="background: #0086b3; padding:15px 20px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 style="color: white" ><center><b>Tambah Data Pengguna</b></center></h2>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <form id="form_tambahPengguna" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label > NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" placeholder="Masukan NIP" required>
                  </div>
                  <div class="form-group">
                    <label > Password</label>
                    <input type="Password" class="form-control" name="Password" placeholder="masukan password" required>
                  </div>
                  <div class="form-group">
                    <label > Nama</label>
                    <input type="text" class="form-control" name="Nama" placeholder="masukan nama " required>
                  </div>
                  <div class="form-group">
                    <label > Alamat</label>
                    <input type="text" class="form-control" name="Alamat" placeholder="masukan alamat">
                  </div>
                  <div class="form-group">
                    <label > Hak Akses</label>
                    <div class="control-label" style="text-align:left;">
                        <select name="Hak_akses" id="Hak_akses" class="form-control"  >
                              <option value="Sub Bagian Umum" > Sub Bagian Umum</option>
                              <option value="Sekretaris" > Sekretaris</option>
                              <option value="Kepala Dinas" > Kepala Dinas</option>
                              <option value="DSP" > DSP</option>
                              
                          </select>                                     
                     </div>
                  </div>
                  <div class="form-group">
                    <label > No Telepone</label>
                    <input type="text" class="form-control" name="No_telepon" placeholder="masukan no telepon" >
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
              <h4 class="modal-title" id="myModalLabel">NIP Sudah Terdaftar !!</h4>
            </div>
          </div>
        </div>
      </div>
    
     

<?php include("comp/footer.php")  ?>

<!-- bagian proses CRUD pengguna -->
<?php include("proses/CRUDpengguna.php")  ?>



<script type="text/javascript">
  function addPengguna() {
      $("#Modal-tambahPengguna").modal();
        
    }
    
  function editPengguna(nip) {
         $.ajax({
           url: "modal/editPengguna.php",
           type: "GET",
           data : {NIP: nip,},
              success: function (ajaxData){
                  $("#ModalEdit").html(ajaxData);
                  $("#ModalEdit").modal('show',{backdrop: 'true'});
                  // $("#Modal-tambahPengguna").modal();
              }
          });
       }

  function deletePengguna(nip) {
         $.ajax({
           url: "modal/hapusPengguna.php",
           type: "GET",
           data : {NIP: nip,},
              success: function (ajaxData){
                  $("#ModalEdit").html(ajaxData);
                  $("#ModalEdit").modal('show',{backdrop: 'true'});
                  // $("#Modal-tambahPengguna").modal();
              }
          });
       }
       

 

  

</script>
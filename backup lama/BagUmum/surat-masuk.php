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
                <li class="active treeview">
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
                    <i class="fa fa-gears"></i> <span>Jenis Surat</span>
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
        DATA SURAT MASUK
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">
       
        <!-- form tambah Surat -->
        <div id="addSuratMasuk" class=" col-xs-12" style="display: none;">
           <div class="box box-success">
             
              <div class="box-header">
                <div class="col-xs-12">
                   <div class="col-sm-12 control-label" >
                    <br>
                    
              <form id="form_tambahPengguna"  action="" method="post" enctype="multipart/form-data">
                    
                  </div>
                </div>
              </div>
              <div class="box-body">
                  <div class="col-xs-12 form-group">
                     <div class="col-sm-12 control-label" >
                        <div  class="alert " style="text-align: center ;background-color:#e6e9ef;" >
                            <h4><strong>TAMBAH DATA SURAT MASUK</strong></h4> 
                        </div>
                     </div>
                  </div>
               
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Nomor Surat Masuk</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='Nomor_surat' class='form-control' name='Nomor_surat' type='text' required />
                         </div>
                  </div>
                  <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Asal Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Asal_surat' class='form-control' name='Asal_surat' type='text'  data-link=""  /> 
                        </div>
                  </div>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Terima</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tanggal_terima' class='form-control' name='Tanggal_terima' type='date' /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                       <label class="col-sm-3 control-label" style="text-align:right;">Tanggal Surat</label>
                       <div class="col-sm-7 control-label" style="text-align:left;">
                          <input id='Tanggal_surat' class='form-control' name='Tanggal_surat' type='date' /> 
                       </div>
                  </div>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Jenis Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="Jenis_surat" id="Jenis_surat" class="form-control"  >
                               <?php          
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_jenis_surat  WHERE surat='surat masuk' ");
                                 $no = 1;
                                  while($row = mysqli_fetch_assoc($sql)){

                              ?>   
                              <option value="<?php echo $row['Id_jenis_surat']; ?>" ><?php echo $row['Id_jenis_surat']; ?> <?php echo $row['Nama_jenis_surat']; ?></option>
                              <?php } ?>
                          </select>   
                        </div>
                  </div>
                  <div class="col-xs-12 form-group">
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="Sifat_surat" id="Sifat_surat" class="form-control"  >
                              <option value="Biasa" >Biasa</option>
                              <option value="Penting" >Penting</option>
                          </select>   
                        </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <textarea class='form-control' id='Perihal' name='Perihal'  ></textarea>
                         </div>
                  </div>
                  
                   <div class="col-xs-12 form-group">
                      <label class="col-sm-3 control-label" style="text-align:right;">File Surat</label>
                     <div class="col-sm-9 form-group" style="text-align:left;">
                       <input type="file" id="file_Surat" name="file_Surat" required>                                    
                     </div>
                  </div>
                  <div class="col-xs-12 form-group" >
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7 control-label">
                      <div class="btn-group pull-right">
                          <button type="submit"  name="add" value="Simpan" class="btn btn-success btn-flat">Simpan</button>
                           </form>
                          <div class=" btn-group pull-right">
                          <button onclick="Batal();" class="btn btn-default btn-flat">Batal</button>
                          </div>
                      </div>
                    </div>
                  </div>
              
                  
              </div>
          </div>
        </div>

<?php 
  // Proses tampil form edit data 
 if(isset($_GET["tambahdisposisi"]))
    {
      include("modal/tambahDisposisi.php");  
    }  
  if(isset($_GET["edit"]))
    {
      include("modal/editSuratMasuk.php");  
    }
    
    ?>
     

 <!-- tabel data pengguna -->
        <div id="tabelSurat" class=" col-xs-12" >
          <div class="box box-warning">
               <div class="box-header">
                  
                 <div   class="btn-group">

                  <div class=" control-label " >
                            <select name="status" id="status" class="form-control" onchange="filter()"  >
                              <option >-- filter status ---</option>
                              <option value="belum" >belum</option>
                              <option value="disposisi" >disposisi</option>
                          </select>   
                  </div>
                </div>
                <div class="btn-group pull-left">
                  <button  onclick="addSuratMasuk();" class="btn btn-success btn-flat" ><i class="fa fa-pencil-square-o"></i> Tambah Surat Masuk</button>
                </div>
                </div>    
                <div  class="box-body table-responsive">
              <div id="hasilfilter" >
              <table style="font-size: 14px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="4%">No</th>
                  <th style="width: 14%">No Surat Masuk</th>
                  <th style="width: 11%">Asal Surat</th>
                  <th style="width: 14%">Tanggal Terima</th>
                  <th style="width: 12%">Tanggal Surat</th>
                  <th style="width: 11%">Jenis Surat</th>
                  <th style="width: 8%" >Perihal</th>
                  <th  style="text-align: center;width: 11%">File Surat</th>
                  <th  style="text-align: center;width: 14%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT sm.*,js.* FROM tb_suratmasuk sm LEFT JOIN tb_jenis_surat js ON sm.Id_jenis_surat = js.Id_jenis_surat group by No_urut_surat HAVING COUNT((No_urut_surat)>1) ORDER BY No_urut_surat  DESC; ");
                 
                  while($row = mysqli_fetch_assoc($sql)){
                  $Nomor_surat_masuk=$row['Nomor_surat_masuk'];
              ?>                
                              <tr>
                                  <td ><?php echo $row['No_urut_surat'];?></td>
                                  <td ><?php echo $Nomor_surat_masuk;?></td>
                                  <td ><?php echo $row['Asal_surat'];?></td>
                                  <td ><?php echo $row['Tanggal_input'];?></td>
                                  <td ><?php echo $row['Tanggal_surat'];?></td>
                                  <td ><?php echo $row['Id_jenis_surat'];?> <?php echo $row['Nama_jenis_surat'];?></td>
                                  <td ><?php echo $row['Perihal'];?></td>
                                  <td style="text-align: center;" >
                                    <a target="_blank" href="../File/<?php echo $row['File_surat'];?>" class="btn btn-warning btn-flat" data-toggle="tooltip" title="File Surat"   ><i class="fa fa-file-pdf-o"></i></a>
                                  </td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                     <?php $cek = mysqli_query($koneksi, "SELECT * FROM tb_disposisi WHERE Nomor_surat_masuk='$Nomor_surat_masuk'")or die (mysqli_error($koneksi));
                                    if(mysqli_num_rows($cek) == 0)
                                      { ?>
                                    <a href="surat-masuk.php?tambahdisposisi&&id=<?php echo $row['Nomor_surat_masuk'];?>" class="btn btn-primary btn-flat" data-toggle="tooltip" title="Buat Disposisi"  ><i class="fa fa-book"></i></a>
                                    <?php } ?>
                                    <a href="surat-masuk.php?edit&&id=<?php echo $row['Nomor_surat_masuk'];?>" class="btn btn-info btn-flat" data-toggle="tooltip" title="Edit" ><i class="fa fa-pencil"></i></a>
                                     <a class="btn btn-danger btn-flat" data-toggle="tooltip" title="Delete" onclick="deleteSuratMasuk(<?php echo $row["No_urut_surat"]; ?>);"><i class="fa fa-trash"></i></a>
                                  </div>
                                </td>
                            </tr>
              <?php
         
                }
              ?>
                            
                </tbody>
                <tfoot>
                  <tr>
                  <th width="5%">No</th>
                  <th >No Surat Masuk</th>
                  <th>Asal Surat</th>
                  <th>Tanggal Terima</th>
                  <th >Tanggal Surat</th>
                  <th >Sifat Surat</th>
                  <th >Perihal</th>
                  <th  style="text-align: center;">File Surat</th>
                  <th  style="text-align: center;">Aksi</th>
                  </tr>
                </tfoot>
                
              </table>
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
              <h4 class="modal-title" id="myModalLabel">Data Berhasil Dihapus</h4>
            </div>
          </div>
        </div>
      </div>
      <!---modal Gagal-->
      <div class="modal modal-danger" id="ModalGagal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Kesalahan penyimpanan data</h4>
            </div>
          </div>
        </div>
      </div>
       <!---modal Duplikat-->
     <!--  <div class="modal modal-danger" id="ModalDuplikat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Nomor Surat Sudah ada !!</h4>
            </div>
          </div>
          <div class="btn-group pull-right">
            <a type="submit"  name="add" value="Simpan" class="btn btn-success btn-flat">OK</a>
          
                      </div>
        </div>
      </div> -->
  <div class="modal modal-danger" id="ModalDuplikat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Peringatan !!</h4>
         </div>
         <div class="modal-body">
            Nomor Surat Sudah ada !!
         </div>
         <div class="modal-footer">
            <div class="btn-group">
            
               
               <a type="button" class="btn btn-default btn-flat" data-dismiss="modal">OK</a>
             
           
            </div>
         </div>
      </div>
   </div>
 </div>
       <div class="modal modal-danger" id="ModalDuplikatdisposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Nomorurut Disposisi Sudah ada !!</h4>
            </div>
          </div>
        </div>
      </div>
      

 <?php 
 include("comp/footer.php");  

//include proses CRUD
include("proses/CRUDsuratmasuk.php");
?>



<script type="text/javascript">
  function addSuratMasuk() {
     if($('#addSuratMasuk').css('display')=='block'){
            $("#addSuratMasuk").hide('slow');    
        }
        else{
          $("#addSuratMasuk").show('slow'); 
        }
      $('#tabelSurat').css('display','none'); 
        
    }
    


  function Batal() {
      $("#addSuratMasuk").hide('slow');
      $('#tabelSurat').css('display','block');     
      
      }

   function deleteSuratMasuk(nourut) {
         $.ajax({
           url: "modal/hapusSurat.php",
           type: "GET",
           data : {nourut: nourut,},
              success: function (ajaxData){
                  $("#ModalEdit").html(ajaxData);
                  $("#ModalEdit").modal('show',{backdrop: 'true'});
                  // $("#Modal-tambahPengguna").modal();
              }
          });
       }
       function filter() {
        status = document.getElementById("status").value;
         $.ajax({
           url: "modal/filter.php",
           type: "GET",
           data : {status: status,},
              success: function (ajaxData){
                  $("#hasilfilter").html(ajaxData);
                  $("#example3").DataTable({

                      "ordering": false
                     
                  });
                  
               

                  // $("#Modal-tambahPengguna").modal();
              }
          });
       }


  

</script>
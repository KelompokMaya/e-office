<?php include("comp/header.php")  ?>

               <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <li class=" treeview">
                  <a href="index.php">
                    <i class="fa  fa-home"></i> <span>Home</span>
                  </a>
                </li>
                <li class=" active treeview">
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
                    <div class=" btn-group pull-right">
                          <button onclick="Batal();" class="btn btn-default btn-flat">Batal</button>
                    </div>
              <form id="form_tambahPengguna"  action="" method="post" enctype="multipart/form-data">
                    <div class=" btn-group pull-right">
                          <button type="submit"  name="add" value="Simpan"" class="btn btn-primary btn-flat">Tambah</button>
                    </div>
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
                     <label style="text-align:right;" class="col-sm-3 control-label">Sifat Surat</label>
                        <div class="col-sm-7 control-label" style="text-align:left;">
                            <select name="Sifat_surat" id="Sifat_surat" class="form-control"  >
                              <option value="Biasa" >Biasa</option>
                              <option value="Penting" >Penting</option>
                              <option value="Rahasia" >Rahasia</option>
                              <option value="Pribadi" >Pribadi</option>
                          </select>   
                        </div>
                  </div>
                   <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" style="text-align:right;">Perihal</label>
                         <div class="col-sm-7 control-label" style="text-align:left;">
                           <input id='Perihal' class='form-control' name='Perihal' type='text' />
                         </div>
                  </div>
                  
                   <div class="col-xs-12 form-group">
                      <label class="col-sm-3 control-label" style="text-align:right;">File Surat</label>
                     <div class="col-sm-9 form-group" style="text-align:left;">
                       <input type="file" id="file_Surat" name="file_Surat" required>                                    
                     </div>
                  </div>
              </form> 
                  
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
      include("modal/editDisposisi.php");  
    }
    
    ?>
     

 <!-- tabel data pengguna -->
        <div id="tabelSurat" class=" col-xs-12" >
          <div class="box box-warning">
               <div class="box-header">
                 
                </div>    
                <div  class="box-body table-responsive">

              <table style="font-size: 14px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="4%">No</th>
                  <th style="width: 14%">No Surat Masuk</th>
                  <th style="width: 11%">Asal Surat</th>
                  <th style="width: 14%">Tanggal Surat</th>
                  <th style="width: 8%" >Perihal</th>
                  <th  style="text-align: center;width: 11%">File Surat</th>
                  <th  style="text-align: center;width: 13%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_disposisi d,tb_suratmasuk sm WHERE d.Nomor_surat_masuk=sm.Nomor_surat_masuk AND d.Status_disposisi='terima kepala dinas' or d.Nomor_surat_masuk=sm.Nomor_surat_masuk AND d.Status_disposisi='terima bidang'");
                 $no = 1;
                  while($row = mysqli_fetch_assoc($sql)){

              ?>                
                              <tr>
                                  <td ><?php echo $no?></td>
                                  <td ><?php echo $row['Nomor_surat_masuk'];?></td>
                                  <td ><?php echo $row['Asal_surat'];?></td>
                                  <td ><?php echo $row['Tanggal_surat'];?></td>
                                  <td ><?php echo $row['Perihal'];?></td>
                                  <td style="text-align: center;" >
                                    <a target="_blank" href="../File/<?php echo $row['File_surat'];?>" class="btn btn-warning btn-flat" data-toggle="tooltip" title="File Surat"   ><i class="fa fa-file-pdf-o"></i></a>
                                  </td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                    <?php if ($row['Status_disposisi']=='terima bidang') { 
                                    echo '<span style="font-size: 14px" class="label label-info ">Selesai</span>';
                                    }
                                    else { ?>
                                     <a href="surat-masuk.php?kirim&&id=<?php echo $row['No_urut_disposisi'];?>"  class="btn btn-success btn-flat" data-toggle="tooltip" title="Kirim Disposisi ke Sub Bagian Umum" ><i class="fa fa-paper-plane"></i></a>
                                    <a href="surat-masuk.php?edit&&id=<?php echo $row['No_urut_disposisi'];?>" class="btn btn-primary btn-flat" data-toggle="tooltip" title="Edit Disposisi"  ><i class="fa fa-book"></i></a>
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
                  <th >No Surat Masuk</th>
                  <th>Asal Surat</th>
                  <th >Tanggal Surat</th>
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
              <h4 class="modal-title" id="myModalLabel">Kesalahan penyimpanan data</h4>
            </div>
          </div>
        </div>
      </div>
       <!---modal Duplikat-->
      <div class="modal modal-danger" id="ModalDuplikat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="modal-title" id="myModalLabel">Nomor Surat Sudah ada !!</h4>
            </div>
          </div>
        </div>
      </div>
      

 <?php 
 include("comp/footer.php");  

//include proses CRUD
include("proses/CRUDdisposisi.php");
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


  

</script>
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
                <li class="active treeview">
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
                    <i class="fa fa-gears"></i> <span>Maintenance Jenis Surat </span>
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
        DATA DISPOSISI
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">

<?php 
  // Proses tampil form edit data 
  if(isset($_GET["edit"]))
    {
      include("modal/editDisposisi.php");  
    }    
    ?>
     

 <!-- tabel data pengguna -->
        <div id="tabelDisposisi" class=" col-xs-12" >
          <div class="box box-success">
               <div class="box-header">
                </div>    
                <div  class="box-body table-responsive">

              <table style="font-size: 13px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="4%">No</th>
                  <th width="7%" >Kode</th>
                  <th width="8%" >No Urut</th>
                  <th width="10%">Asal Surat</th>
                  <th width="13%">No Surat Masuk</th>
                  <th width="9%">Tgl Surat</th>
                  <th width="12%">Tgl Penyelesaian</th>
                  <th width="15%">Perihal</th>
                  <th  style="text-align: center;width: 14%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_disposisi  ");
                 $no = 1;
                  while($row = mysqli_fetch_assoc($sql)){

              ?>                
                              <tr>
                                  <td ><?php echo $no?></td>
                                  <td ><?php echo $row['Kode_surat'];?></td>
                                  <td ><?php echo $row['No_urut_disposisi'];?></td>
                                  <td ><?php echo $row['Asal_surat'];?></td>
                                  <td ><?php echo $row['Nomor_surat_masuk'];?></td>
                                  <td ><?php echo $row['Tanggal_surat'];?></td>
                                  <td ><?php echo $row['Tanggal_penyelesaian_disposisi'];?></td>
                                  <td ><?php echo $row['Perihal'];?></td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                  <?php if ($row['Status_disposisi']=='belum terkirim') { ?>
                                    <a href="disposisi.php?kirim&&id=<?php echo $row['No_urut_disposisi'];?>"  class="btn btn-sm btn-success btn-flat" data-toggle="tooltip" title="Kirim Disposisi" ><i class="fa fa-paper-plane"></i></a>
                                    <a href="disposisi.php?edit&&id=<?php echo $row['Nomor_surat_masuk'];?>" class="btn btn-sm btn-info btn-flat" data-toggle="tooltip" title="Edit" ><i class="fa fa-pencil"></i></a>
                                    <a href="disposisi.php?hapus&&id=<?php echo $row['Nomor_surat_masuk'];?>"  class="btn btn-sm btn-danger btn-flat" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash"></i></a>
                                    
                                  <?php } elseif ($row['Status_disposisi']=='terkirim Sub Bagian Umum') { ?>
                                    <a href="disposisi.php?kirimbidang&&id=<?php echo $row['No_urut_disposisi'];?>"  class="btn btn-success btn-flat" data-toggle="tooltip" title="Kirim Disposisi ke Bidang" ><i class="fa fa-paper-plane"></i></a>
                                    
                                  <?php } elseif ($row['Status_disposisi']=='terima bidang') { 
                                    echo '<span style="font-size: 14px" class="label label-info ">Selesai</span>';
                                    } else{ 
                                    echo '<span style="font-size: 14px" class="label label-success ">Terkirim</span>';
                                    } ?>
                                    
                                    
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
                  <th width="4%">No</th>
                  <th >Kode</th>
                  <th >No Urut</th>
                  <th >Asal Surat</th>
                  <th >No Surat Masuk</th>
                  <th >Tgl Surat</th>
                  <th >Tgl Penyelesaian</th>
                  <th >Perihal</th>
                  <th style="text-align: center;">Aksi</th>
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
//include proses CRUD
include("comp/footer.php"); 
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
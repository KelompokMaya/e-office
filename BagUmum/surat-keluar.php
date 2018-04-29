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
                <li class="active treeview">
                  <a href="surat-keluar.php">
                    <i class="fa fa-upload"></i> <span>Surat Keluar</span>
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
        DATA SURAT KELUAR
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">
       
      
<?php 
  // Proses tampil form edit data 
 if(isset($_GET["tambahSuratKeluar"]))
    { 
      include("modal/tambahSuratKeluar.php");  
    } 
 if(isset($_GET["edit"]))
    { 
      include("modal/editSuratKeluar.php");  
    }  
    
    ?>
     

 <!-- tabel data pengguna -->
        <div id="tabelSuratKeluar" class=" col-xs-12" >
          <div class="box box-danger">
               <div class="box-header">
                 
                    <div class="btn-group pull-left">
                        <button  onclick="addSuratKeluar();" class="btn btn-success btn-flat" ><i class="fa fa-pencil-square-o"></i> Tambah Surat Keluar</button>
                    </div>
                </div>    
                <div  class="box-body table-responsive">

              <table style="font-size: 13px"  id="example1" class="table table-bordered table-striped  ">

                <thead style="text-align: center; background:#1874a3 ;color: white">
                <tr>
                  <th width="4%">No</th>
                  <th style="width: 14%">No Surat Keluar</th>
                  <th style="width: 10%">Tujuan Surat</th>
                  <th style="width: 9%">Tanggal Surat</th>
                  <th style="width: 10%">Asal Surat</th>
                  <th style="width: 12%">Dasar Surat</th>
                  <th style="width: 10%" >Jenis Surat</th>
                  <th  style="width: 8%">Sifat Surat</th>
                  <th  style="width: 10%">Perihal</th>
                  <th  style="text-align: center; width: 14%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_suratkeluar a,tb_jenis_surat b WHERE a.Id_jenis_surat=b.Id_jenis_surat ");
                 $no = 1;
                  while($row = mysqli_fetch_assoc($sql)){

              ?>                
                              <tr>
                                  <td ><?php echo $no?></td>
                                  <td ><?php echo $row['Nomor_surat_keluar'];?></td>
                                  <td ><?php echo $row['Tujuan_surat'];?></td>
                                  <td ><?php echo $row['Tanggal_surat'];?></td>
                                  <td ><?php echo $row['Asal_surat'];?></td>
                                  <td ><?php echo $row['Dasar_surat'];?></td>
                                  <td ><?php echo $row['Nama_jenis_surat'];?></td>
                                  <td ><?php echo $row['Sifat_surat'];?></td>
                                  <td ><?php echo $row['Perihal'];?></td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                    <?php if ($row['Id_jenis_surat']=='sk1') { ?>
                                    <a href="../Print/printSuratKeluar.php?id=<?php echo $row['Nomor_surat_keluar'];?>" class="btn btn-sm btn-primary btn-flat" data-toggle="tooltip" title="Cetak Surat"  ><i class="fa fa-print"></i></a>
                                    <?php } elseif ($row['Id_jenis_surat']=='sk2') { ?>
                                    <a href="../Print/printSuratPerintah.php?id=<?php echo $row['Nomor_surat_keluar'];?>" class="btn btn-sm btn-primary btn-flat" data-toggle="tooltip" title="Cetak Surat"  ><i class="fa fa-print"></i></a>
                                     <?php } elseif($row['Id_jenis_surat']=='sk3') { ?>
                                     <a href="../Print/printNotaDinas.php?id=<?php echo $row['Nomor_surat_keluar'];?>" class="btn btn-sm btn-primary btn-flat" data-toggle="tooltip" title="Cetak Surat"  ><i class="fa fa-print"></i></a>
                                     <?php } ?>
                                    <a href="surat-keluar.php?edit=<?php echo $row['Id_jenis_surat'];?>&&id=<?php echo $row['Nomor_surat_keluar'];?>" class="btn btn-sm btn-info btn-flat" data-toggle="tooltip" title="Edit" ><i class="fa fa-pencil"></i></a>
                                    <a href="surat-keluar.php?hapus&&id=<?php echo $row['Nomor_surat_keluar'];?>"  class="btn btn-sm btn-danger btn-flat" data-toggle="tooltip" title="Delete" ><i class="fa fa-trash"></i></a>
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
                  <th >No Surat Keluar</th>
                  <th >Tujuan Surat</th>
                  <th >Tanggal Surat</th>
                  <th >Asal Surat</th>
                  <th >Dasar Surat</th>
                  <th >Jenis Surat</th>
                  <th >Sifat Surat</th>
                  <th >Perihal</th>
                  <th >Aksi</th>
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

       <!-- form tambah data -->
      <div class="modal fade" id="ModalPilih" role="dialog" >
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
              <form id="form_tambahPengguna" class="form-horizontal" action="surat-keluar.php?tambahSuratKeluar" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label > Pilih Jenis Surat</label>
                    <div class="control-label" style="text-align:left;">
                        <select name="Jenis_surat"  class="form-control"  >
                              <option value="Surat Keluar" >Surat Keluar</option>
                              <option value="Surat Perintah Tugas" >Surat Perintah Tugas</option>
                              <option value="Nota Dinas" >Nota Dinas</option>
                        </select>                                     
                     </div>
                  </div> 
                   
                  <div class="form-group pull-right">
                     <button type="button" id="btn-cancel" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     <button type="submit"  name="PilihJenisSurat" value="Simpan"  class="btn btn-success btn-flat">Pilih</button>
                  </div>         
              </form>
                <br>
            </div>     
          </div>
        </div>
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
include("proses/CRUDsuratkeluar.php");
?>



<script type="text/javascript">
   // Replace Textarea with CKEDITOR
    CKEDITOR.replace('ckeditor'); 




  function addSuratKeluar() {
     $("#ModalPilih").modal();    
    }
    


  function Batal() {
      $("#addSuratMasuk").hide('slow');
      $('#tabelSuratKeluar').css('display','block');     
      
      }

  // $(document).on('click', '#btn-cancel', function(event) {
  //       event.preventDefault();
  //       $('#tabelSuratKeluar').css('display','block');    
        
  //   });


  

</script>
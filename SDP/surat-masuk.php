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
                 <li class=" treeview">
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
        DATA SURAT MASUK
      </h1>
    </section>

  


    <!-- Main content -->
    <section class="content">
     
    <div id="main-content" class="row">
       
       

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
                  <th  style="text-align: center;width: 10%">Detail</th>
                  <th  style="text-align: center;width: 10%">Aksi</th>
                </tr>
                </thead>
                <tbody >
              
              <!-- Proses mencari data ke database -->
              <?php
                                
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_disposisi d,tb_suratmasuk sm WHERE d.Nomor_surat_masuk=sm.Nomor_surat_masuk AND d.Status_disposisi='terima bidang' ORDER BY No_urut_bidang DESC  ");
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
                                  <td style="text-align: center;" >
                                    <a onclick="detail(<?php echo  $row['No_urut_disposisi'];?>)"  class="btn  btn-info btn-flat" data-toggle="tooltip" title="Detail Disposisi" ><i class="fa fa-eye"></i></a>
                                  </td>
                                  <td style="text-align: center;">
                                  <div class="btn-group">
                                    <span style="font-size: 14px" class="label label-success ">Diterima</span>
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
                   <th  style="text-align: center;">Detail</th>
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
      <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: #0086b3; padding:15px 20px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="myModalLabel" style="text-align: center;color: white;">Detail Disposisi</h3>
         </div>
            <div class="modal-body" id="isidetail">
            
            </div>
             <div class="modal-footer">
                <div class="btn-group">
              
                   <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">OK</button>
 
                </div>
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
 function detail(id){
    $.ajax({
      url:"modal/isiDetailDisposisi.php",
      type:"GET",
      data: {no_urut:id},
        success: function(data){
           
           $('#isidetail').html(data);
           $('#viewDetail').modal();

        }
    });

   

  }


  

</script>
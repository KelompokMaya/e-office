<?php
  include("../../database/koneksi.php");
?>
<div id="hasilfilter" >
              <table style="font-size: 14px"  id="example3" class="table table-bordered table-striped  ">

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

                                
                $sql = mysqli_query($koneksi, "SELECT sm.*,js.* FROM tb_suratmasuk sm LEFT JOIN tb_jenis_surat js ON sm.Id_jenis_surat = js.Id_jenis_surat WHERE month(Tanggal_surat)='04' group by No_urut_surat HAVING COUNT((No_urut_surat)>1) ORDER BY No_urut_surat  DESC; ");
                 
                  while($row = mysqli_fetch_assoc($sql)){
                  $Nomor_surat_masuk=$row['Nomor_surat_masuk'];

                   $filterstatus = $_GET['status'];
		              if ($filterstatus=='belum') {
		              	$status=0;
		              }
		              else{
		              	$status=1;
		              }


                  $cek = mysqli_query($koneksi, "SELECT * FROM tb_disposisi WHERE Nomor_surat_masuk='$Nomor_surat_masuk' ")or die (mysqli_error($koneksi));

                  if(mysqli_num_rows($cek) == $status)
                    {
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
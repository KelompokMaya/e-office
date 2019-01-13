<?php
session_start();

  ?>
<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>

</head>
<body style="font-family: Times">

    
<?php

include "koneksi.php";
$No_surat_keluar=$_GET['id'];
$query = "SELECT * FROM tb_suratkeluar sk,tb_jenis_surat js where sk.Nomor_surat_keluar='$No_surat_keluar' AND sk.Id_jenis_surat= js.Id_jenis_surat"; // Tampilkan semua data gambar
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil semua data dari hasil eksekusi $sql
       
$tanggal = $data['Tanggal_surat'];  
$format1 = date('d F Y', strtotime($tanggal ));
?>

<div style="margin-top:80px; text-align: center ; font-size: 22px;text-decoration: underline;">NOTA DINAS</div>

<br> 
<br>
<br> 
<br>
<table style="width:100%">
  <tr style="font-size: 17px;margin-left: 60px ;">
    <td style="width: 20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kepada Yth.</td>
    <td style="width: 50%">: <?php echo $data['Tujuan_surat'];  ?></td> 
  </tr>
  <tr style="font-size: 17px;">
    <td style="margin-left: 60px ;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dari</td>
    <td >: <?php echo $data['Asal_surat'];  ?></td>
  </tr>
  <tr style="font-size: 17px;">
  <td style="margin-left: 60px ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sifat</td>
  <td >: <?php echo $data['Nama_jenis_surat'];  ?></td>
  </tr>
   <tr style="font-size: 17px;">
  <td style="margin-left: 60px ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Perihal</td>
  <td >: <?php echo $data['Perihal'];  ?></td>
  </tr>
</table>
<br>
<br>
 <div style=" margin-top: -6px ;margin-left: 50px ;margin-right: 60px ; height: 7px"><hr></div>


<div style="margin-top:50px ;margin-left: 100px ;margin-right: 90px ;line-height: 200%; font-size: 14px;text-align: justify;"><?php echo $data['Isi_surat'];  ?></div>

<br> <br><br> <br><br> <br>
<table style="width:100%">
    <tr>
        <td style="width: 49%;height:80px;"></td>
        <td style="width: 40%;font-size: 17px;margin-right: 100px ;">Kepala Bidang Sumber Daya Pariwisata,</td>
    </tr>
     <tr>
        <td ></td>
        <td style="height: 30px" ></td>
    </tr>
     <tr>
        <td ></td>
         <td style="font-size: 17px;"><b style="text-decoration: underline;"><?php echo $_SESSION['nama']; ?></b><br>NIP. <?php echo $_SESSION['nip']; ?></td>
    </tr>
    
</table>




</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Nota_dinas_'.$data['Nomor_surat_keluar'].'.pdf', 'D');
?>

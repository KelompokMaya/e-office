<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>

</head>
<body style="font-family: Times">

    
<?php

include "koneksi.php";
$No_surat_keluar=$_GET['id'];
$query = "SELECT * FROM tb_suratkeluar WHERE Nomor_surat_keluar='$No_surat_keluar'"; // Tampilkan semua data gambar
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil semua data dari hasil eksekusi $sql
       
$tanggal = $data['Tanggal_surat'];  
$format1 = date('d F Y', strtotime($tanggal ));
?>

<div style="margin-top:100px; text-align: center ; font-size: 20px;text-decoration: underline;">SURAT PERINTAH TUGAS</div>
<div style="margin-bottom: -10px ; text-align: center ; font-size: 18px;">Nomor : <?php echo $data['Nomor_surat_keluar'];  ?></div>

<br> 
<br>
<br>
<br> 

<table  style="width:95%;">
  <tr style="font-size: 15px;">
    <td valign="top" style="width: 27%; padding-top:15px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dasar  </td>
    <td valign="top" style="width: 3%;padding-top:15px;">:</td>
    <td valign="top" style="width: 70%;" ><br><?php echo $data['Dasar_surat'];  ?></td>
  </tr>
  <tr style="font-size: 17px;">
    <br>
    <td  ></td>
    <td ></td>
    <td style="padding-top: 50px;padding-bottom: 20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MENUGASKAN</td>
  </tr>
  <tr style="font-size: 15px;">
    <br>
    <td valign="top" style="padding-top:15px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kepada</td>
    <td valign="top" style="padding-top:14px;">:</td>
    <td valign="top"><?php echo $data['Ditugaskan_kepada'];  ?></td>
  </tr>
  <tr style="font-size: 15px;">
  <td valign="top" style="padding-top:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Untuk</td>
  <td valign="top" style="padding-top:15px;">:</td>
  <td  valign="top" style="padding-top:15px;"><?php echo $data['Perihal'];  ?></td>
  </tr>
  
 
</table>
<div style="margin-top:50px ;margin-left: 120px ; font-size: 15px;">Demikian surat perintah tugas ini dibuat untuk dilaksanakan sebaik-baiknya.</div>

<br> <br><br> <br><br> <br>
<table style="width:100%">
    <tr>
        <td style="width: 60%;height:80px;"></td>
        <td style="width: 40%;font-size: 15px;">Ditetapkan di Denpasar<br>Pada tanggal <?php echo $format1;  ?><br>Kepala Dinas Pariwisata <br>Provinsi Bali, </td>
    </tr>
     <tr>
        <td ></td>
        <td style="height: 60px" ></td>
    </tr>
     <tr>
        <td ></td>
         <td style="font-size: 14px;"><div style="text-decoration: underline;">A.A GEDE YUNIARTHA PUTRA,SH,MH</div><br>Pembina Utama Madya<br>NIP. 19590622 198803 1 010</td>
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
$pdf->Output('Surat_perintah_tugas.pdf', 'D');
?>

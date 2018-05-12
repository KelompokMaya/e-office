<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>

</head>
<body style="font-family: Times">

    <table  style="width:100%">
          <tr>
            <th width="40%" rowspan="7"><img src="logo.jpg"  style="margin-left:50px;margin-top:30px ;margin-bottom:20px ; width:120px;height:120px;"></th>
            <td width="60%"><div style="margin-top:20px ;margin-left: -300px ;margin-bottom: -10px ; text-align: center ; font-size: 18px;">PEMERINTAH PROVINSI BALI</div></td>
          </tr>
          <tr>
            <td width="60%"><div style=" font-size: 26px;margin-left: -300px ;margin-top: -10px ; text-align: center ;">DINAS PARIWISATA BALI</div></td>
          </tr>
          <tr>
            <td width="60%"><div style=" font-size: 18px;margin-left: -300px ;margin-top: -6px ;text-align: center ;">BALI GOVERNMENT TOURISM OFFICE</div></td>
          </tr>
          <tr>
            <td width="60%"><div style=" font-size: 14px;margin-left: -300px ;margin-top: -6px ; text-align: center ;text-decoration: underline;">http://www.tourism.baliprov.go.id</div></td>
          </tr>
           <tr>
            <td width="60%"><div style=" font-size: 14px;margin-left: -300px ;margin-top: -6px ; text-align: center ;">e-mail: infotourism@baliprov.go.id</div></td>
          </tr>
           <tr>
            <td width="60%"><div style=" font-size: 14px;margin-left: -300px ;margin-top: -6px ; text-align: center ;">Jalan S.Parman Niti Mandala Renon, Telp.(0361) 222387, Fax(0361) 226313</div></td>
          </tr>
           <tr>
            <td width="60%"><div style=" font-size: 13px;margin-left: -300px ;margin-top: -6px ; text-align: center ;">Denpasar-Bali 80235</div></td>
          </tr>
    </table>
    <div style=" margin-top: -6px ;margin-left: 50px ;margin-right: 50px ;height: 50px"><hr></div>
<?php

include "koneksi.php";
$No_surat_keluar=$_GET['id'];
$query = "SELECT * FROM tb_suratkeluar sk,tb_jenis_surat js where sk.Nomor_surat_keluar='$No_surat_keluar' AND sk.Id_jenis_surat= js.Id_jenis_surat"; // Tampilkan semua data gambar
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil semua data dari hasil eksekusi $sql
       
$tanggal = $data['Tanggal_surat'];  
$format1 = date('d F Y', strtotime($tanggal ));   

?>
<div style=" font-size: 15px;margin-top: 10px ;margin-right: 64px ; text-align: right ;">Denpasar, <?php echo $format1;  ?></div>
<br>
<div style=" font-size: 15px;margin-top: 10px ;margin-right: 142px ; text-align: right ;">K e p a d a</div>
<br> 
<table style="width:100%">
  <tr style="font-size: 15px;margin-left: 60px ;">
    <td style="width: 17%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nomor</td>
    <td style="width: 50%">: <?php echo $data['Nomor_surat_keluar'];  ?></td>
    <td style="width: 5%">Yth.</td>
    <td style="width: 22%" rowspan="3"><?php echo $data['Tujuan_surat'];  ?></td>
    
  </tr>
  <tr>
    <td style="font-size: 15px;margin-left: 60px ;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sifat</td>
    <td >: <?php echo $data['Nama_jenis_surat'];  ?></td>
    <td ></td>



  </tr>
  <tr>
  <td style="font-size: 15px;margin-left: 60px ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lampiran</td>
  <td >: -</td>
  <td ></td>

  </tr>
   <tr>
  <td style="font-size: 15px;margin-left: 60px ;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Perihal</td>
  <td >: <b style="text-decoration: underline;"><?php echo $data['Perihal'];  ?></b></td>
  <td ></td>
  <td>di -</td>
  
  </tr>
  <td style="width: 17%" ></td>
  <td style="width: 52%"></td>
  <td style="width: 5%"></td>
  <td  style="width: 20%" >&nbsp;&nbsp;&nbsp;<div style="text-decoration: underline;">Denpasar</div></td>
  <tr>
      
  </tr>
 
</table>

<div style="margin-top:30px ;margin-left: 110px ;margin-right: 80px ; font-size: 15px;text-align: justify;"><?php echo $data['Isi_surat'];  ?></div>

<br> <br><br> <br>
<table style="width:100%">
    <tr>
        <td style="width: 60%;height:80px;"></td>
        <td style="width: 40%;font-size: 14px;"><b>KEPALA DINAS PARIWISATA<br>PROVINSI BALI</b></td>
    </tr>
     <tr>
        <td ></td>
        <td style="height: 30px" ></td>
    </tr>
     <tr>
        <td ></td>
         <td style="font-size: 14px;"><b style="text-decoration: underline;">A.A GEDE YUNIARTHA PUTRA,SH,MH</b><br>Pembina Utama Madya<br>NIP. 19590622 198803 1 010</td>
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
$pdf->Output('Surat_keluar_'.$data['Nomor_surat_keluar'].'.pdf', 'D');
?>

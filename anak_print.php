<?php 
	session_start();
	error_reporting(0);
	include "inc/constant.php";
	include "inc/config.php";
?>
<?php
	$sql = "SELECT * FROM ank_asuh";
	$result = mysqli_query($con,$sql);
?>

<html 	xmlns:v="urn:schemas-microsoft-com:vml"
		xmlns:o="urn:schemas-microsoft-com:office:office"
		xmlns:x="urn:schemas-microsoft-com:office:excel"
		xmlns="http://www.w3.org/TR/REC-html40"
>

<head>
	<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
	<meta name=ProgId content=Excel.Sheet>



<style id="test_29397_Styles">
<table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
.xl1529397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6329397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6429397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6529397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.asemanjenk
	{	padding-left:270px;
		color:black;
		font-size:14.0pt;
		font-weight:700;
		font-style:normal;
		font-family:"Times New Roman", serif;
		text-align:left;
		vertical-align:bottom;
		white-space:nowrap;
	}
.asemkunyuk
	{	padding-left:480px;
		color:black;
		font-size:10.0pt;
		font-weight:10;
		font-style:normal;
		font-family:"Times New Roman", serif;
		text-align:left;
		vertical-align:bottom;
		white-space:nowrap;
	}
.xl6629397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6729397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	background:#8DB4E2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl6829397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	background:#8DB4E2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl6929397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7029397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7129397
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
>
</style>
</head>

<body>

<div id="test_29397" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1206 style='border-collapse:
 collapse;table-layout:fixed;width:907pt'>
 <col width=13 style='mso-width-source:userset;mso-width-alt:475;width:10pt'>
 <col width=46 style='mso-width-source:userset;mso-width-alt:1682;width:35pt'>
 <col width=500 style='mso-width-source:userset;mso-width-alt:3401;width:70pt'>
 <col width=82 style='mso-width-source:userset;mso-width-alt:4278;width:88pt'>
 <col width=165 style='mso-width-source:userset;mso-width-alt:6034;width:124pt'>
 <col width=128 style='mso-width-source:userset;mso-width-alt:4681;width:96pt'>
 <col width=69 style='mso-width-source:userset;mso-width-alt:2523;width:52pt'>
 <col width=79 style='mso-width-source:userset;mso-width-alt:2889;width:59pt'>
 <col width=97 style='mso-width-source:userset;mso-width-alt:3547;width:73pt'>
 <col width=258 style='mso-width-source:userset;mso-width-alt:9435;width:194pt'>
 <col width=49 style='mso-width-source:userset;mso-width-alt:1792;width:37pt'>
 <col width=92 style='mso-width-source:userset;mso-width-alt:3364;width:69pt'>
 <tr height=25 style='height:18.75pt'>
  <td height=25 class=xl1529397 width=12 style='height:18.75pt;width:10pt'></td>
  <td class=xl1529397 width=46 style='width:35pt'></td>
  <td width=93 style='width:70pt' align=left valign=top>
	  <span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:51px;margin-top:14px;width:126px;
  height:95px'><img width=126 height=95 src="dist/img/cirebon.jpg" 
  v:shapes="Picture_x0020_1"></span><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=25 class=xl6329397 width=93 style='height:18.75pt;width:70pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=asemanjenk colspan=3 style='width:207pt'><span
  style='mso-spacerun:yes'>   </span>LAPORAN DATA ANAK ASUH</td>
  <td class=xl6329397 width=96 style='width:73pt'></td>
  <td class=xl6329397 width=256 style='width:194pt'></td>
  <td class=xl6329397 width=48 style='width:37pt'></td>
  <td class=xl6329397 width=95 style='width:69pt'></td>

 </tr>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td height=31 class=xl1529397 style='height:23.25pt'></td>
  <td class=xl1529397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6529397></td>
  <td class=xl6529397 colspan=3><span style='mso-spacerun:yes'>  
  </span>Yayasan Budhi Asih Cirebon<span style='mso-spacerun:yes'> </span></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
 </tr>
 <tr height=32 style='mso-height-source:userset;height:24.0pt'>
  <td height=32 class=xl1529397 style='height:24.0pt'></td>
  <td align="center" class=asemkunyuk colspan="3">Jl. Wahidin No.22 Cirebon</td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1529397 style='height:15.0pt'></td>
  <td class=xl1529397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
 
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1529397 style='height:15.0pt'></td>
  <td class=xl1529397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  <td class=xl6329397></td>
  
 </tr>
<table 	id="dyntable" 
		class="table table-bordered responsive" 
		style='border-collapse:collapse;
		table-layout:fixed;width:907pt'
>
	<thead>
		<tr height=20 style='height:15.0pt'>
			<td class=xl6729397 width="20">No</td>
			<td class=xl6829397 width="150">Nama</td>
			<td class=xl6829397 width="95">Jenis Kelamin</td>
			<td class=xl6829397 width="95">Tempat Lahir</td>
			<td class=xl6829397 width="100">Tanggal Lahir</td>
			<td class=xl6829397 width="100">Nama Ayah</td>
			<td class=xl6829397 width="100" >Nama Ibu</td>
			<td class=xl6829397 width="100">Sekolah</td>
			<td class=xl6829397 width="100">Tanggal</td>
			<td class=xl6829397 width="40">Kelas</td>
			<td class=xl6829397 width="100">Alamat Anak</td>
			<td class=xl6829397 width="130">Nik Sekolah</td>
			<td class=xl6829397 width="100">Alasan Masuk</td>
			<td class=xl6829397 width="80">Tahun Panti</td>
		</tr>
	</thead>
	<tbody>
<?php
    $i=1;
    while($data = mysqli_fetch_array($result)){
?>    
		<tr>
			<td><center><?php echo $i; ?></center></td>
			<td><center><?php echo $data['nama_anak'] ?></center></td>
			<td><center><?php echo $data['jenis_kelamin'] ?></center></td>
			<td><center><?php echo $data['tempat_lahir'] ?></center></td>
			<td><center><?php echo $data['tanggal_lahir'] ?></center></td>
			<td><center><?php echo $data['nama_ayah'] ?></center></td>
			<td><center><?php echo $data['nama_ibu'] ?></center></td>
			<td><center><?php echo $data['sekolah'] ?></center></td>
			<td><center><?php echo $data['tgl_masuk'] ?></center></td>
			<td><center><?php echo $data['kelas'] ?></center></td>
			<td><center><?php echo $data['alamat_asal'] ?></center></td>
			<td><center><?php echo $data['nik_sekolah'] ?></center></td>
			<td><center><?php echo $data['alasan_masuk'] ?></center></td>
			<td><center><?php echo $data['tahun_masuk'] ?></center></td>			
		</tr>
<?php
		$i++;
}
?>                     
	</tbody>
</table>

 <![if supportMisalignedColumns]>
	<tr height=0 style='display:none'>
	  <td width=12 style='width:10pt'></td>
	  <td width=46 style='width:35pt'></td>
	  <td width=93 style='width:70pt'></td>
	  <td width=116 style='width:88pt'></td>
	  <td width=163 style='width:124pt'></td>
	  <td width=85 style='width:96pt'></td>
	  <td width=118 style='width:52pt'></td>
	  <td width=81 style='width:59pt'></td>
	  <td width=96 style='width:73pt'></td>
	  <td width=256 style='width:194pt'></td>
	  <td width=48 style='width:37pt'></td>
	  <td width=95 style='width:69pt'></td>
 	</tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>

<html>
<head>
<title>Kartu KTM</title>
</head>
<body>
<form>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="003300">
<tr>
<td>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="003300">
<tr>
<td height="40" align="center" bgcolor=""><img src="image/logo-uir.jpg";></td>
</tr>
<tr>
<td bgcolor="#FFFFFF"><table width="500" border="0" align="center" cellpadding="3" cellspacing="2">
<tr>
<td width="150">Nama</td>
<td width="11">:</td>
<td width="237">
<?php
$namaku="yendi";
print $namaku;
?></td>
<td rowspan="6" valign="center">

<?php
/*fungsi untuk menyimpan gambar
$foto1=$_FILES[‘foto'][‘tmp_name'];
$foto2=$_FILES[‘foto'][‘name'];

if(move_uploaded_file($foto1, $foto2))
{
echo "";

}
else
echo "Upload Foto GAGAL";
*/
$foto2="image/foto.jpg";
echo "<img src=$foto2 height=100 width=80>";

?>

</td>
</tr>
<tr>
<td>Tempat/Tanggal Lahir</td>
<td>:</td>
<td>
<?php
$tempat="Rao-rao";
print $tempat;
echo ",";
$tgllahir = "12-12-1222";
print $tgllahir;
?>
</td>
</tr>
<tr>
<td>Fakultas</td>
<td>:</td>
<td>
<?php
$fakultas="Teknik";
echo $fakultas;
?></td>
</tr>
<tr>
<td>Program Studi</td>
<td>:</td>
<td>
<?php
$prog="Teknik Informatika";
echo " $prog ";
?>
</td>
</tr>
<tr>
<td>NPM</td>
<td>:</td>
<td>
<?php
$nim="21313131";
print $nim;
?>
</td>
</tr>
<tr>
<td align="top">Alamat</td>
<td>:</td>
<td>
<?php
$alt="Jalan Raya Rao-rao";
print $alt;
?>
</td>
</tr>
<tr></tr>
<tr>
<td colspan="4" align="center"><font size="2" color="006600">Kartu Ini Sebagai Bukti Untuk Mengikuti Kegiatan Akademik Pada Tahun 2013/2014</td>
</tr>
</table></td>
</tr>
</table>
</td>
</td>
</tr>
</table>
</form>
</body>
</html>
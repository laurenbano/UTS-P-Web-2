<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Dosen</title>
</head>
<body>
<?php

require_once "app/mhsw.php";
$dosen = new dosen();
$rows = $dosen->tampil();

if(isset($_GET["cari"])){
    $rows = $dosen->cari($_GET["nama"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nip'])) $vnip =$_GET['nip'];
else $vnip ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';


if($vsimpan=='simpan' && ($vnip <>''||$vnama <>'')){
    $dosen->simpan();
    $rows = $dosen->tampil();
    $vid ='';
    $vnip ='';
    $vnama ='';
}

if($vaksi=="hapus")  {
    $dosen->hapus();
    $rows = $dosen->tampil();
}
if($vaksi=="cari")  {
    $rows = $dosen->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $dosen->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id'];
        $vnip = $row['nip'];
        $vnama = $row['nama'];
    }
 }

if ($vupdate=="update"){
    $dosen->update($vid,$vnip,$vnama);
    $rows = $dosen->tampil();
    $vid ='';
    $vnip ='';
    $vnama ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vnip ='';
    $vnama ='';
}


?>

<h2>Data Mata kuliah Dosen</h2>
<form action="?" method="get">
<table>
    <tr><td>NIP</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="nip" value="<?php echo $vnip; ?>" /></td></tr>
    <tr><td>NAMA</td><td>:</td><td><input type="text" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    <a href="index.php">kembali</a>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>NO</td>
        <td>NIP</td>
        <td>NAMA</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nip']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><a href="?id=<?php echo $row['id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id=<?php echo $row['id']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="matkuldosen.php?id=<?php echo $row['id']; ?>&aksi=matkul">Matkul</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>
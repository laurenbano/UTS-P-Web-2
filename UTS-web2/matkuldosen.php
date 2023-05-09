<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Mata Kuliah Dosen</title>
</head>
<body>
<?php

require_once "app/mhsw.php";
$matkul = new matkul();
$rows = $matkul->tampildosen();

if(isset($_GET["cari"])){
    $rows = $matkul->cari($_GET["sks"]);
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
if(isset($_GET['matkul'])) $vmatkul =$_GET['matkul'];
else $vmatkul ='';
if(isset($_GET['sks'])) $vsks =$_GET['sks'];
else $vsks ='';


if($vsimpan=='simpan' && ($vmatkul <>''||$vsks <>'')){
    $matkul->simpandosen();
    $rows = $matkul->tampildosen();
    $vid ='';
    $vmatkul ='';
    $vsks ='';
}

if($vaksi=="hapus")  {
    $matkul->hapus();
    $rows = $matkul->tampildosen();
}
if($vaksi=="cari")  {
    $rows = $matkul->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $matkul->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id'];
        $vmatkul = $row['matkul'];
        $vsks = $row['sks'];
    }
 }

if ($vupdate=="update"){
    $matkul->update($vid,$vmatkul,$vsks);
    $rows = $matkul->tampildosen();
    header('Location: matkuldosen.php');
    die();
    $vid ='';
    $vmatkul ='';
    $vsks ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vmatkul ='';
    $vsks ='';
}


?>

<form action="?" method="get">
<table>
    <tr><td>MATKUL</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="matkul" value="<?php echo $vmatkul; ?>" /></td></tr>
    <tr><td>SKS</td><td>:</td><td><input type="text" name="sks" value="<?php echo $vsks; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
 
    <a href="matkuldosen.php">kembali</a>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>NO</td>
        <td>MATKUL</td>
        <td>SKS</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['matkul']; ?></td>
            <td><?php echo $row['sks']; ?></td>
            <td><a href="?id=<?php echo $row['id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id=<?php echo $row['id']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>
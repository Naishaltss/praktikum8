DATABASE KONTAK
CREATE TABLE kontak (
	id int(4) NOT NULL,
    	nama varchar(30) NOT NULL,
    	jkel varchar(10),
    	email varchar(40),
    	alamat varchar(50),
	kota  varchar(20),
	pesan text
) ENGINE=INNODB DEFAULT CHARSET=latin1;

ALTER TABLE kontak
	ADD PRIMARY KEY (id);
ALTER TABLE kontak
	MODIFY id INT(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

SIMPAN KONTAK
<?php
include 'koneksi.php';

$nama			    = $_POST['nama'];
$jkel			    = $_POST['jkel'];
$email		        = $_POST['email'];
$alamat		        = $_POST['alamat'];
$kota			    = $_POST['kota'];
$pesan			    = $_POST['pesan'];

$query="INSERT INTO kontak SET nama='$nama', jkel='$jkel', email='$email', alamat='$alamat', kota='$kota', pesan='$pesan'";
mysqli_query($koneksi, $query);

header("location:tambahkontak.php");
?>

TAMBAH KONTAK
<!DOCTYPE html>
<html>

<head>
    <title>Form Input</title>
</head>

<body>
    <form method="post" action="simpankontak.php">
        <table>
            <tr>
                <td>id</td>
                <td><input type="text" onkeyup="isi_otomatis()" name="id"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>KOTA</td>
                <td><input type="text" name="kota"></td>
            </tr>
            <tr>
                <td>PESAN</td>
                <td><input type="textarea" name="pesan"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td>
            </tr>
        </table>
    </form>
</body>

</html>

TAMPIL KONTAK
<h2>List Kontak</h2>
<table border="1">
    <tr><th>NO</th><th>NAMA</th><th>GENDER</th><th>EMAIL</th><th>ALAMAT</th><th>KOTA</th><th>PESAN</th></tr>
    <?php
    include 'koneksi.php';
    $kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
    $no=1;
    foreach ($kontak as $row){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nama']."</td>
            <td>".$row['jkel']."</td>
            <td>".$row['email']."</td>
            <td>".$row['alamat']."</td>
            <td>".$row['kota']."</td>
            <td>".$row['pesan']."</td>
            <tr>";
        $no++;
    }
    ?>
</table>
<html>
<head>
	<title>Halaman Pengurus</title>
	<style>body {
       background: -webkit-linear-gradient(bottom, #00008B, #a6f77b);
       background-repeat: no-repeat;
}</style>
</head>
<body>
	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	<h1>Halaman Pengurus</h1>
 
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	
	<div class="container">
<h2>Daftar Buku yang Tersedia</h2>
<table class="table">
<tr>
<td>Kode Buku</td>
<td>Judul Buku</td>
<td>Pengarang Buku</td>
<td>Penerbit Buku</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php
require("Library.php");
$Lib = new Library();
$show = $Lib->showBooks();
while($data = $show->fetch(PDO::FETCH_OBJ)){
echo "
<tr>
<td>$data->kodeBuku</td>
<td>$data->judulBuku</td>
<td>$data->pengarang</td>
<td>$data->penerbit</td>
<td><a class='btn btn-danger' href='list.php?delete=$data->kodeBuku'>Delete</a></td>
<td><a class='btn btn-info' href='edit.php?kode=$data->kodeBuku'>Edit</td>
</tr>";
};
?>
</table>
<a href="tambahbuku.php" class="btn btn-success">Tambah Buku Baru</a>
</div>
	
	<a href="logout.php">LOGOUT</a>
 
	<br/>
	<br/>
 
	
</body>
</html>

<?php
if(isset($_GET['delete'])){
$del = $Lib->deleteBook($_GET['delete']);
 
}
?>
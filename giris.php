<?php session_start();
include('baglan.php') ;
//Admin6335

if (isset($_SESSION['giris'])) {
	header('location:index.php');
}

if (isset($_POST['giris'])) {

	$kullanici_adi=$_POST['kullanici_adi'];
	$kullanici_sifre=md5($_POST['kullanici_sifre']);
	$sql="SELECT * FROM hnt_admin WHERE kullanici_adi=:kullanici_adi AND kullanici_sifre=:kullanici_sifre";
	$query=$dbh->prepare($sql);
	$query->bindParam(':kullanici_adi',$kullanici_adi,PDO::PARAM_STR);
	$query->bindParam(':kullanici_sifre',$kullanici_sifre,PDO::PARAM_STR);
	$query->execute();
	if ($query->rowCount()>0) {
		$_SESSION['giris']=$kullanici_adi;
		header('location:index.php');
	}
	
}




 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<title></title>
</head>
<body>

	<div class="kullanicigiris">
		<h1>GİRİŞ</h1>
		<form action="" method="POST">
			<input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı">

			<input type="password" name="kullanici_sifre" placeholder="Şifre">

			<input type="submit" name="giris" value="Giriş">
			
		</form>
	</div>

</body>
</html>
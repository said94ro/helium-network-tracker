<?php session_start();?>

<?php if (isset($_SESSION['giris'])) { ?>
    
  <?php 
  include('menu.php');
  include('baglan.php');




if (isset($_POST['makina_kayit'])) {

$hnt_code_name=$_POST['hnt_code_name'];


$sql="INSERT INTO hnt_info (hnt_code_name) VALUES (:hnt_code_name)";
$query=$dbh->prepare($sql);
$query->bindParam(':hnt_code_name',$hnt_code_name,PDO::PARAM_STR);
$query->execute();

}

 ?>


  <div class="col-10">
    <form class="form-control mt-5 p-5 " method="POST" action="">
        <h5 style="text-align: center; margin-top: -1%; padding-right: 10%;">MAKINA KAYIT</h5>
        <div class="col-10 " style="padding-left: 10%; padding-bottom: 5%; padding-top: 3%;">
        <input style="width: 100%; text-align: center; " class="form-control" type="text" name="hnt_code_name" placeholder="Makina blockchain Adress giriniz">
        </div>
        <div class="col-10" style="float: right;padding-left: 10%;">
       <input  style="width:50% " type="submit" class=" btn btn-success form-control " value="MAKINA KAYDET " name="makina_kayit" >
       </div>
    </form>
      
  </div>

  <?php }else{
    header("location:giris.php");
}

 ?>
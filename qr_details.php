<?php session_start();?>

<?php if (isset($_SESSION['giris'])) { ?>


  <?php 
  include('menu.php');
  include('baglan.php');
  include('function.php');

// https://prnt.sc/1k0a3xu


if (isset($_GET['makina_kayit'])) {

$hnt_code_name=$_GET['hnt_code_name'];

$sql="SELECT * FROM hnt_info WHERE hnt_code_name=:hnt_code_name";
$query=$dbh->prepare($sql);
$query->bindParam(':hnt_code_name',$hnt_code_name,PDO::PARAM_STR);
$query->execute();
$hnt_info=$query->fetchall(PDO::FETCH_OBJ);


}

 ?>



  <div class="col-10">
    <form class="form-control mt-5 p-5 " method="GET" action="" style="display: ;">
        <h5 style="text-align: center; margin-top: -1%; padding-right: 10%;">MAKINA KAYIT</h5>
        <div class="col-10 " style="padding-left: 10%; padding-bottom: 5%; padding-top: 3%;">
        <input style="width: 100%; text-align: center; " class="form-control" type="text" name="hnt_code_name" placeholder="Makina blockchain Adress giriniz">
        </div>
        <div class="col-10" style="float: right;padding-left: 10%;">
       <input  style="width:50% " type="submit" class=" btn btn-success form-control " value="MAKINA KAYDET " name="makina_kayit" >
       </div>
    </form>

      <div class="col-12 mt-3">
        <div class="col-4">
          
        </div>
        <div class="col-6">
      <table class="table ">
      <thead>
          <tr>
            <th scope="col-1"></th>
            <th scope="col-1">HELIUM MINING DEVICE</th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
            <th scope="col-1"></th>
          </tr>
        </thead>
        <tbody class="mt-2">
          <?php if (isset($_GET['makina_kayit'])) {?> 
          <?php if (count($hnt_info) > 0): ?>
          <?php foreach ($hnt_info as $hnt_data):  ?>
          <?php $hnt_id= $hnt_data->hnt_id ?>
          <?php $hnt_miktar= gunlukraport($hnt_data) ?>
          <?php $hnt_detay= statusupdatev2($hnt_data) ?>
                 <tr>
                <th scope="row"> Id</th>
                <td><?php echo $hnt_id?></td>
                </tr>
                <tr>
                <th scope="row"> Status</th>
                <td><?php echo $hnt_detay[0]?></td>
                </tr>
                <tr>
                <th scope="row"> Name</th>
                <td><?php echo $hnt_detay[3]?></td>
                </tr>
                 <tr>
                 <th scope="row">Adress</th>
                <td><?php echo $hnt_detay[2]; echo"-"; echo $hnt_detay[1]?></td>
                </tr>
                 <tr>
                 <th scope="row"> Reward Scale</th>
                <td><?php echo $hnt_detay[5]?></td>
                  </tr>
                 <tr>
                 <th scope="row"> Reward 24H</th>
                <td><?php echo $hnt_miktar?> </td>
                </tr>
                 <tr>
                 <th scope="row"> Reward $</th>
                <td><?php echo $Dolar_hntrate=hntrate()*$hnt_miktar; ?>$</td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php  } ?> 
        </tbody>
    </table>
    </div>
  </div>
 
  </div>


  <?php }else{
  header("location:giris.php");
}

 ?>
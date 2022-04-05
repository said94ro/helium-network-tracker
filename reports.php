<?php session_start();?>

<?php if (isset($_SESSION['giris'])) { ?>
  

<?php 
include('baglan.php');
include('function.php');



$sql="SELECT * FROM hnt_info";
$query=$dbh->prepare($sql);
$query->execute();
$hnt_info=$query->fetchall(PDO::FETCH_OBJ);

$cash_para=0;

 ?>



   <?php include('menu.php') ?>

  
   	<div class="col-10">
   		<form class="form-control mt-3 " action="" method="POST">
		  <div class="row formreports m-3 p-3 ml-2 ">
		    <div class="col">
		    	<h6 style="text-align: center;">Baslangic Tarih</h6>
		    <input class="form-control " type="date" name="start_date" >
		    </div>
		    <div class="col">
		    	<h6 style="text-align: center;">Baslangic Saat</h6>
		     <input  class="form-control "  type="time" name="start_hour" value=00:00>
		    </div>

		    <div class="col">
		    	<h6 style="text-align: center;">Bitis Tarih</h6>
		     <input  class="form-control "  type="date" name="stop_date">
		    </div>
		    <div class="col">
				<h6 style="text-align: center;">Bitis Saat</h6>
		     <input  class="form-control "  type="time" name="stop_hour" value=00:00>
		    </div>
		  </div>
		  <div class="row p-2 kolayarama">
		    <div class="col ">
		      <input type="submit" class="btn btn-primary form-control" value="1 AYLIK RAPOR" name="30_gunluk_rapor">
		    </div>
		    <div class="col">
		      <input type="submit" class="btn btn-primary form-control" value="1 HAFTALIK RAPOR"name="7_gunluk_rapor">
		    </div>
		    <div class="col">
		      <input type="submit" class="btn btn-primary form-control" value="1 GUNLUK RAPOR" name="1_gunluk_rapor">
		    </div>
		  </div>
		  <div class="row p-2 ">
		  	<div class="col-10">
		  		
		  	</div>
		    <div class="col-2 ">
		      <input type="submit" class=" btn btn-success form-control " value="FILTIRELE " name="filtrele_btn">
		    </div>
		    </div>
		</form>

   		<div class="row p-2 mt-4">
   			<div class="col-12">
   				<table class="table">
				 <table class="table table-info table-striped table-hover ">
				    <tr class="table-dark">
				    <th scope="col">#</th>
				      <th scope="col">ID</th>
				      <th scope="col">Makina Isim</th>
				      <th scope="col">Adress</th>
				      <th scope="col">Reward Scale</th>
				      <th scope="col">HNT adet</th>
				      <th scope="col">HNT-$</th>
				    </tr>
				  </thead>
				  <tbody>
				  	 <?php if (isset($_POST['filtrele_btn'])) {?> 
                    <?php if (count($hnt_info) > 0): ?>
                    <?php foreach ($hnt_info as $hnt_data):  ?>
                    <?php $hnt_id= $hnt_data->hnt_id ?>
                     <?php $hnt_miktar= filtreleme($hnt_data) ?>
                     <?php $hnt_detay= statusupdatev2($hnt_data) ?>
                     <th scope="row"></th>
                     <td><?php echo $hnt_id?></td>
                      <td><?php echo $hnt_detay[3]?></td>
                      <td><?php echo $hnt_detay[2]; echo"-"; echo $hnt_detay[1]?></td>
                      <td><?php echo $hnt_detay[5]?></td>
                      <td><?php echo $hnt_miktar?> </td>
                   	  <td><?php echo $Dolar_hntrate=hntrate()*$hnt_miktar; ?>$</td>
                   	  <?php $cash_para+=$Dolar_hntrate ?>
                     </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>
                     <?php  } ?> 
				  </tbody>
				  <tbody>
				  	 <?php if (isset($_POST['30_gunluk_rapor'])) {?> 
                    <?php if (count($hnt_info) > 0): ?>
                    <?php foreach ($hnt_info as $hnt_data):  ?>
                  	<?php $hnt_id= $hnt_data->hnt_id ?>
                     <?php $hnt_miktar= aylikrapor($hnt_data) ?>
                     <?php $hnt_detay= statusupdatev2($hnt_data) ?>
                     <th scope="row"></th>
                       <td><?php echo $hnt_id?></td>
                      <td><?php echo $hnt_detay[3]?></td>
                      <td><?php echo $hnt_detay[2]; echo"-"; echo $hnt_detay[1]?></td>
                      <td><?php echo $hnt_detay[5]?></td>
                      <td><?php echo $hnt_miktar?> </td>
                   	  <?php $Dolar_hntrate=hntrate()*$hnt_miktar; ?>
                    	<?php  $Dolar_hntrate=number_format($Dolar_hntrate,2, '.', '',);?>
                   	  <td><?php echo $Dolar_hntrate;?>$</td>
                   	  <?php $cash_para+=$Dolar_hntrate ?>
                     </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>
                     <?php  } ?> 
				 </tbody>
				 <tbody>
				  	 <?php if (isset($_POST['7_gunluk_rapor'])) {?> 
                    <?php if (count($hnt_info) > 0): ?>
                    <?php foreach ($hnt_info as $hnt_data):  ?>
                    <?php $hnt_id= $hnt_data->hnt_id ?>
                     <?php $hnt_miktar= haftalikraport($hnt_data) ?>
                     <?php $hnt_detay= statusupdatev2($hnt_data) ?>
                     <th scope="row"></th>
                       <td><?php echo $hnt_id?></td>
                      <td><?php echo $hnt_detay[3]?></td>
                      <td><?php echo $hnt_detay[2]; echo"-"; echo $hnt_detay[1]?></td>
                      <td><?php echo $hnt_detay[5]?></td>
                      <td><?php echo $hnt_miktar?> </td>
                   	  <?php $Dolar_hntrate=hntrate()*$hnt_miktar; ?>
                    	<?php  $Dolar_hntrate=number_format($Dolar_hntrate,2, '.', '',);?>
                   	  <td><?php echo $Dolar_hntrate;?>$</td>
                   	  <?php $cash_para+=$Dolar_hntrate ?>
                     </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>
                     <?php  } ?> 
				 </tbody>
				 <tbody>
				  	 <?php if (isset($_POST['1_gunluk_rapor'])) {?> 
                    <?php if (count($hnt_info) > 0): ?>
                    <?php foreach ($hnt_info as $hnt_data):  ?>
                    	<?php $hnt_id= $hnt_data->hnt_id ?>
                     <?php $hnt_miktar= gunlukraport($hnt_data) ?>
                     <?php $hnt_detay= statusupdatev2($hnt_data) ?>
                     <th scope="row"></th>
                     <td><?php echo $hnt_id?></td>
                      <td><?php echo $hnt_detay[3]?></td>
                      <td><?php echo $hnt_detay[2]; echo"-"; echo $hnt_detay[1]?></td>
                      <td><?php echo $hnt_detay[5]?></td>
                      <td><?php echo $hnt_miktar?> </td>
                      <?php $Dolar_hntrate=hntrate()*$hnt_miktar; ?>
                    	<?php  $Dolar_hntrate=number_format($Dolar_hntrate,2, '.', '',);?>
                   	  <td><?php echo $Dolar_hntrate;?>$</td>
                   	  <?php $cash_para+=$Dolar_hntrate ?>
                     </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>
                     <?php  } ?> 
				 </tbody>
				</table>
				<div class="row">
					<div class="col-12 ">
						<div class="col-2"style="float: right;">
							<h5 style="padding-left: %;"> TOTAL <?php echo $cash_para ?>
							$</h5>
						</div>	
					</div>
				</div>
   			</div>
   		</div>
   	</div>

   	<?php }else{
	header("location:giris.php");
}

 ?>
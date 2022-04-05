<?php session_start();?>

<?php if (isset($_SESSION['giris'])) { ?>
  

<?php


include('baglan.php');
include('function.php');



$sql="SELECT * FROM hnt_info";
$query=$dbh->prepare($sql);
$query->execute();
$hnt_info=$query->fetchall(PDO::FETCH_OBJ);
//HNT TOTAL--->

$toplam_casa =0;

 foreach ($hnt_info as $hnt_data){
  $toplam_casa+=totalhnt($hnt_data);
   }


//------->

$Dolar_hntrate=hntrate()*$toplam_casa;
$dolar_hnt=number_format($Dolar_hntrate,2, '.', '',);



 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Hello, world!</title>
  </head>
  <body style="background-color: #c1efde;">
    <div class="container-fluid">
      <div class="row">
          <div class="col-2 p-0">
            <div class="sidebar">
              <div class="logo">
                <a href="index.php"><img class="logoimg" src="img/logopc.png"></a>
              </div>
              <div class="list-group list-group-flush my-3 sidebarmenu ">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Projects</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="reports.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="makina_kayit.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Diveci Register</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a>
                <a href="cikis.php" style="margin-top:80%;margin-bottom: -5%; " class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
            </div>
          </div>
          <div class="col-10 p-0">
            <div class="row">
              <div class="col-12 p-0">
                <div id="root">
                <div class="container pt-5">
                  <div class="row align-items-stretch">
                    <div class="c-dashboardInfo col-lg-3 col-md-6 ">
                      <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Helium NETWORK <svg
                            class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                          </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count" style="margin-top: -10% ;"><?php echo hntrate(); ?>$</span>
                      </div>
                    </div>
                    <div class="c-dashboardInfo col-lg-3 col-md-6">
                      <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">BITCOIN<svg
                            class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                          </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"> <?php echo btcrate(); ?>$</span>
                      </div>
                    </div>
                    <div class="c-dashboardInfo col-lg-3 col-md-6">
                      <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">TOTAL HNT<svg
                            class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                          </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $toplam_casa; ?> HNT </span>
                      </div>
                    </div>
                    <div class="c-dashboardInfo col-lg-3 col-md-6">
                      <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">TOTAL HNT $<svg
                            class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                          </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"> <?php echo $dolar_hnt; ?> $
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-11">
                <table class="table table-info table-striped table-hover statustablo">
                  <thead>
                    <tr>
                      <th  scope="col">#</th>
                      <th scope="col">Makina ismi</th>
                      <th scope="col">Adress</th>
                      <th scope="col"></th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($hnt_info) > 0): ?>
                    <?php foreach ($hnt_info as $hnt_data):  ?>
                     <?php $hnt_miktar= statusupdatev2($hnt_data) ?>
                     <?php //$hnt_isim= $hnt_data->hnt_name ?>
                     <th scope="row"></th>
                      <td><?php echo $hnt_miktar[3]?></td>
                      <td><?php echo $hnt_miktar[2]; echo"-"; echo $hnt_miktar[1]?></td>
                      <td><div class="status-light <?php echo $hnt_miktar[4] ?> "> <span class="hide">live</span></div></td>
                      <td>  <?php echo $hnt_miktar[0]?> </td>

                     </tr>
                    <?php endforeach; ?>
                     <?php endif; ?>
                </tbody>
              </table>
              </div>
              <div class="col-1">
              </div>
            </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php }else{
  header("location:giris.php");
}

 ?>
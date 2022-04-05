<?php 
include('baglan.php');
include('function.php');



if (isset($_POST['refreshx'])) {

$sql="SELECT * FROM hnt_info";
$query=$dbh->prepare($sql);
$query->execute();
$hnt_info=$query->fetchall(PDO::FETCH_OBJ);

$toplam_casa =0;



foreach ($hnt_info as $hnt_data) {
    $toplam_casa+=totalhnt($hnt_data);

}





/*$liste=[];
foreach ($hnt_info as $key ) {
    $xy=$key->hnt_code_name;
    $sx=$key->hnt_name;

     $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$xy;
    $time_startx=$_POST['time_startx'];

    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_startx ."&max_time=".$time_urlx;
    $ch = curl_init();
    $urlx = $new_urlx;
    $codx=0;
    curl_setopt($ch, CURLOPT_URL, $urlx);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respx= curl_exec($ch);
      if ($e = curl_error($ch)) {
          echo $e;
      }else {
        $decodedx =json_decode($respx,true);
        $codx=$decodedx["data"]["total"];
        $codx1=number_format($codx);
        array_push($liste,$codx1,);

    

      }
    curl_close($ch);
}

*/


/*$liste=[];
foreach ($hnt_info as $a) 
{
  foreach ($a as $value ) 
  {
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$value;
    $time_startx=$_POST['time_startx'];

    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_startx ."&max_time=".$time_urlx;
    $ch = curl_init();
    $urlx = $new_urlx;
    $codx=0;
    curl_setopt($ch, CURLOPT_URL, $urlx);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respx= curl_exec($ch);
      if ($e = curl_error($ch)) {
          echo $e;
      }else {
        $decodedx =json_decode($respx,true);
        $codx=$decodedx["data"]["total"];
        $codx1=number_format($codx);
        array_push($liste,$codx1);

      }
    curl_close($ch);
      }

}*/




/*$xxx2=0;
foreach ($hnt_info as $xxx63) {
$xxx1= var_export($xxx63, true);
$xxx2= $xxx63 ->hnt_code_name;
echo $xxx2; 
echo "<br>";
$today1 = date("Y-m-d");
$today2 = date("H:i:s");
$today_t= "T";
$time_urlx=$today1.$today_t.$today2;

$namex=$xxx63;
$time_startx=$_POST['time_startx'];

$new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_startx ."&max_time=".$time_urlx;
$ch = curl_init();
$urlx = $new_urlx;
$codx=0;
curl_setopt($ch, CURLOPT_URL, $urlx);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respx= curl_exec($ch);
  if ($e = curl_error($ch)) {
      echo $e;
  }else {
    $decodedx =json_decode($respx,true);
    $codx=$decodedx["data"]["total"];
  }
curl_close($ch);

}*/





//$array = json_decode(json_encode($hnt_info), true);
//$cars_together = implode(", ", $array);
//echo $cars_together;
 }

//--------->

$ch = curl_init();

$hnturl = "https://api.binance.com/api/v3/ticker/price?symbol=HNTUSDT";

$hntprice="0";

curl_setopt($ch, CURLOPT_URL, $hnturl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp2= curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
}else {
  $decoded2 =json_decode($resp2,true);
  $hntprice=$decoded2["price"];
  //print_r($decoded2["price"]);
}

curl_close($ch);

//-------------->

$ch = curl_init();

$btcurl = "https://api.binance.com/api/v3/ticker/price?symbol=BTCUSDT";

$btcprice= "0";

curl_setopt($ch, CURLOPT_URL, $btcurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp3= curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
}else {
  $decoded3 =json_decode($resp3,true);
  $btcprice=$decoded3["price"];
  //print_r($decoded3["price"]);

}

curl_close($ch);


//-------------->

if (isset($_POST['refresh'])) {


$today1 = date("Y-m-d");
$today2 = date("H:i:s");
$today_t= "T";
$time_url=$today1.$today_t.$today2;

$name=$_POST['name'];
$time_start=$_POST['time_start'];

$new_url = "https://api.helium.io/v1/hotspots/". $name ."/rewards/sum?min_time=" . $time_start ."&max_time=".$time_url;
$ch = curl_init();
$url = $new_url;
$cod=0;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp= curl_exec($ch);
if ($e = curl_error($ch)) {
    echo $e;
}else {
  $decoded =json_decode($resp,true);
  $cod=$decoded["data"]["total"];
}
curl_close($ch);

}


echo date('d/m/Y', strtotime('-30 days'));




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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Hello, world!</title>
  </head>
  <body style="background-color:#e4eaec">
    <nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-2"style="background-color:#3e8ef7;">
          </div>
          <div class="col-10 ustmenu" style="background-color:whitesmoke;">
            <a  href="#">Cikis</a>
          </div>
          <div class="col-2 p-0 " style="background-color: #526069;">
            <nav class="navbar" >
              <div class="container-fluid"> 
                <ul>
                  <li>Dashboard</li>
                  <li>Makina Kayit</li>
                  <li>Raport</li>
                  <li>Uyelik</li>
                </ul>
              </div>
            </nav>
          </div>
           <div class="col-2 p0">
              <form action="" method="POST">
                <input type="text" name="name" value="name">
                <input type="text" name="time_start" value="time_start">
                <input type="submit" name="refresh" value="refresh">
              </form>
            </div>
            <div class="col-2 p0 infocrypto">
              <h4>
                <img class="hntimg1" src="img/hnticon.png"> <br>
                <?php echo $toplam_casa ?>
              </h4>
            </div>
            <div class="col-2 p0 infocrypto " >
              <h4>
                <img src="img/hnticon.png"> <br>
                <?php if (isset($_POST['refresh'])) {
                echo number_format($cod);}?>
              </h4>
            </div>
            <div class="col-2 p0 infocrypto ">
              <img src="img/btc-brands.svg">
              <h4>
                <?php echo number_format($btcprice);?>$
              </h4>
            </div>
        </div>
        
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-10 tablo">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_POST['refreshx'])) {?> 
              <?php if (count($hnt_info) > 0): ?>
              <?php foreach ($hnt_info as $hnt_data):  ?>
               <?php $hnt_miktar= hnt_data($hnt_data) ?>
               <?php $hnt_isim= $hnt_data->hnt_name ?>
               <th scope="row"></th>
                <td><?php echo $hnt_isim?></td>
                <td><?php echo $hnt_miktar ?></td>
                <td></td>
            </tr>
              <?php endforeach; ?>
               <?php endif; ?>
             <?php  } ?> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-2 p0">
              <form action="" method="POST">
                <input type="text" name="time_startx" value="time_startx">
                <input type="submit" name="refreshx" value="refreshx">
              </form>
            </div>

          <div class="container">
    <div class="row bg-light py-3">

      <div class="col-md-8">
        <div class="row"> 

      <div class="col-md-4 py-2">
        <input type="text" name="siparis_isim" class="form-control" placeholder="İsim Soyisim">
        <input type="hidden" name="siparis_id" value="<?php echo $son ?>">
      </div>

      <div class="col-md-4 py-2">
        <input type="tel" name="siparis_tel" class="form-control" placeholder="Telefon">
      </div>

      <div class="col-md-4 py-2">
        <input type="email" name="siparis_email" class="form-control" placeholder="Email">
      </div>

      <div class="col-md-4 py-2">
        <select class="form-control" name="siparis_sehir">
          <option>Şehir Seçiniz</option>
          <option value="İstanbul">İstanbul</option>
          <option value="Ankara">Ankara</option>
          <option value="Urfa">Urfa</option>
        </select>
      </div>

      <div class="col-md-4 py-2">
        <input type="text" name="siparis_ilce" placeholder="İlçe" class="form-control py-2">
      </div>

      <div class="col-md-4 py-2">
        <input type="text" name="siparis_adresozet" placeholder="Adres Özeti" class="form-control py-2">
      </div>

      <div class="col-md-12 py-2">
        <textarea name="siparis_adres" class="form-control" placeholder="Adres" rows="3"></textarea>
      </div>

      <input type="hidden" name="siparis_tip" value="<?php echo $siparis_tip; ?>">
    
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>




             
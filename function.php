<?php 




// HNT-REWARD EARNINGS FUNCTION..

function hnt_data($hnt_code){
    $hnt_code=$hnt_code->hnt_code_name;
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$hnt_code;
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
        //array_push($liste,$codx1);
         return $codx1;
      }
    curl_close($ch);
 }

//BTC-EXCHANGE RATE

function btcrate(){

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
 return number_format($btcprice);
}


//------>

//STATUS/ADRES/NAME FUNCTION---->

function statusupdate($hnt_code){

$hnt_code=$hnt_code->hnt_code_name;

$ch = curl_init();

$url = "https://api.helium.io/v1/hotspots/". $hnt_code;


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp= curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
}else {

  $decoded =json_decode($resp,true);

  $status=$decoded["data"];
  $status_new=$status["status"];
  $status_new1=$status_new["online"];
  $status_adress=$decoded['short_street'];

  //print_r($status_new1);
  //echo $status_adress;
  //print_r($decoded["data"]["online"]);

}

curl_close($ch);
}
//------>

//STATUS/ADRES/NAME FUNCTION v2



function statusupdatev2($hnt_code){

$hnt_code=$hnt_code->hnt_code_name;

$liste=[];
$listex=[];
$status_class="";
$ch = curl_init();

$url = "https://api.helium.io/v1/hotspots/". $hnt_code;


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp= curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
}else {

  $decoded =json_decode($resp,true);
  $data_new=$decoded["data"];
  array_push($liste,$data_new);

  foreach ($liste as $key ) {
  $status=$key;
  $status_work=$key['status']['online'];
  $status_street=$key['geocode']['long_street'];
  $status_city=$key['geocode']['short_state'];
  $status_name=$key['name'];
  $status_skale=$key['reward_scale'];
  $status_skale=number_format($status_skale,2, '.', '',);

  if ($status_work == "online") {
  	 $status_class=" status-light-live";
  }else{
  	 $status_class=" status-light-ofline";
  }
     
  }
  array_push($listex, $status_work,$status_street,$status_city, $status_name,$status_class,$status_skale);
  return $listex;
}

}


// HNT PRICE RATE FUNCTION----->

function hntrate(){

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
return number_format($hntprice,2, '.', '',);
}



//TOTAL HNT TOPLAMA FUNCTIONU----->

function totalhnt($hnt_code){

	$liste=[];
    $hnt_code=$hnt_code->hnt_code_name;
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_end=$today1.$today_t.$today2;

    $namex=$hnt_code;

    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=2021-07-01T00:00:53&max_time=".$time_end;
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
        $codx1=number_format($codx,2, '.', '',);

        //$listetoplam=$codx1+$listetoplam;

    curl_close($ch);
 }
    return $codx1;
 }

// FILTIRELEME SYSTEM-------->



function filtreleme($hnt_code){

 	$hnt_code=$hnt_code->hnt_code_name;
    $today1 = $_POST['start_date'];
    $today2 = $_POST['start_hour'];
    $today_t= "T";
    $start_time=$today1.$today_t.$today2;

    $today1 = $_POST['stop_date'];
    $today2 = $_POST['stop_hour'];
    $today_t= "T";
    $stop_time=$today1.$today_t.$today2;

    $namex=$hnt_code;

    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $start_time ."&max_time=".$stop_time;
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
        //array_push($liste,$codx1);
         return $codx1;
      }
    curl_close($ch);

}

//30 GUNLUK RAPORLAMA SYSTEMI---->

function aylikrapor($hnt_code){
	$hnt_code=$hnt_code->hnt_code_name;
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$hnt_code;
    $time_start_d= date('Y-m-d', strtotime('-30 days'));
    $time_start_h="00:00:00";
    $time_start=$time_start_d.$today_t.$time_start_h;



    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_start ."&max_time=".$time_urlx;
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
        //array_push($liste,$codx1);
         return $codx1;
      }
    curl_close($ch);
}

//------->

function haftalikraport($hnt_code){
	$hnt_code=$hnt_code->hnt_code_name;
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$hnt_code;
    $time_start_d= date('Y-m-d', strtotime('-7 days'));
    $time_start_h="00:00:00";
    $time_start=$time_start_d.$today_t.$time_start_h;



    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_start ."&max_time=".$time_urlx;
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
        $codx1=number_format($codx,2, '.', '',);
        //array_push($liste,$codx1);
         return $codx1;
      }
    curl_close($ch);
}

function gunlukraport($hnt_code){
	$hnt_code=$hnt_code->hnt_code_name;
    $today1 = date("Y-m-d");
    $today2 = date("H:i:s");
    $today_t= "T";
    $time_urlx=$today1.$today_t.$today2;

    $namex=$hnt_code;
    $time_start_d= date('Y-m-d', strtotime('-1 days'));
    $time_start_h="00:00:00";
    $time_start=$time_start_d.$today_t.$time_start_h;



    $new_urlx = "https://api.helium.io/v1/hotspots/". $namex ."/rewards/sum?min_time=" . $time_start ."&max_time=".$time_urlx;
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
        //$codx1=number_format($codx);
        $codx1=number_format($codx,2, '.', '',);
        //array_push($liste,$codx1);
         return $codx1;
      }
    curl_close($ch);
}


function cash_cal($hnt_miktar){
	$money=[];
	array_push($money,$hnt_miktar);
	$cash_liste=[];

	foreach ($hnt_miktar as $cash) {
		array_push($cash_liste,$cash);
	}
	return $cash_liste;
}








 ?>

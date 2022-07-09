<?php

$ekspedisi = $_POST["ekspedisi"];
$distrik = $_POST["distrik"];
$berat = $_POST["berat"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=399&destination=".$distrik."&weight=".$berat."&courier=".$ekspedisi,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: eee5524fe598e5369e8a6f38fe57f055"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//   echo $response;
    $arr_response = json_decode($response, true);

    $ongkir = $arr_response["rajaongkir"]["results"][0]["costs"];

    // echo "<pre>";
    // print_r($ongkir);
    // echo "</pre>";

    echo "<option value=''>Pilih Jenis Paket</option>";
    foreach ($ongkir as $key => $tiap_paket) {
        echo "<option paket='". $tiap_paket["service"] ."' id_paket='". $key ."'>";
        echo $tiap_paket["service"];
        echo "</option>";
    }
}
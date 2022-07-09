<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: eee5524fe598e5369e8a6f38fe57f055"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err) {
    echo "cURL Error #:" . $err;
} else {
    //JSON
    //convert to array
    $arr_response = json_decode($response, true);
    $dataprovinsi = $arr_response["rajaongkir"]['results'];

    // echo "<pre>";
    // print_r($dataprovinsi);
    // echo "</pre>";
    echo "<option value=''>Pilih Provinsi</option>";

    foreach ($dataprovinsi as $key => $tiap_provinsi) {
        echo "<option value='". $tiap_provinsi["province_id"] ."' id_provinsi='". $tiap_provinsi["province_id"] ."'>";
        echo $tiap_provinsi["province"];
        echo "</option>";
    }
}

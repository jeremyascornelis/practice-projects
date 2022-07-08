<?php

//bisa ambil dari tempat lain : link url
$data = file_get_contents('coba.json');

$mahasiswa = json_decode($data, true); //true -> agar berubah ke array
//without true -> akan jadi object

var_dump($mahasiswa);

echo "<br>";
echo "<br>";

echo $mahasiswa[0]["pembimbing"]["pembimbing1"];
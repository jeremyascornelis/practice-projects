<?php

// $mahasiswa = [
//     [
//         "nama" => "Jeremyas Cornelis",
//         "nim" => "A11202012415",
//         "email" => "jeremyas@gmail.com"
//     ],
//     [
//         "nama" => "Naufal Fawwazi",
//         "nim" => "A11202012764",
//         "email" => "fawwaz@gmail.com"
//     ]
// ];

//sebaiknya pakai class :v
//from database 
//with PDO
$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);


$data = json_encode($mahasiswa);

echo $data;
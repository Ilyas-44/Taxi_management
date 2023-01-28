<?php

 header("Content-Type: application/json; charset=UTF-8");

$servername= "localhost";
$username= "root";
$password = "root";
$dbname = "taxi_orga";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql = "SELECT * FROM TAXI";
$results = $conn->query($sql);

$arr = [];
while($item = $results->fetch_assoc()){
    $arr[]= $item;
}

echo json_encode($arr);



////////test /////////////////

// class orgtx {
//     public $ID_TX;
//     public $numero;
//     public $marque;
//     public $model;

//     public function __construct($ID_TX, $numero, $marque, $model) {
//       $this->ID_TX = $ID_TX;
//       $this->numero = $numero;
//       $this->marque = $marque;
//       $this->model = $model;
    
//     }
// }

// $query = "SELECT * FROM TAXI";
// $result = $conn->query($query); 

// $taxiarr = array();


// while ($row = $result->fetch_assoc()) {

//     $taxiobj = new orgtx(
//     $row['ID_TX'],
//     $row['numero'],
//     $row['marque'],
//     $row['model']
    
//     );
  
 
//      array_push($taxiarr,$taxiobj)
// }


// echo json_encode($taxiarr);
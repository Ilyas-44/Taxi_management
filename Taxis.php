<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <title>Taxis</title>
   <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
</head>
<body>
<a href="index1.php" class="btn btn-primary btn-lg">revenir a l'accueil</a>

<div class="container">
<h2> AJOUTER UN TAXI </h2>
      <form action="" method="POST">
          <label >ID :</label>
          <input    name="ID_TX" value=""><br><br>
          <label >NUMERO : </label>
          <input   name="numero" value=""><br><br>
          <label >MARQUE : </label>
          <input  name="marque" value=""><br><br>
          <label >MODEL : </label>
          <input  name="model" value=""><br><br>
          <input type="submit" value="ADD" name="INSERT">
      </form>
        <h2>liste TAXIS :</h2>
        
        <?php 
         
        $servername = "localhost";
        $username = "root"; 
        $password = "root"; 
        $dbname = "taxi_orga"; 
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if (isset($_POST['INSERT'])) {
          $ID_TX=$_POST['ID_TX'];
          $numero=$_POST['numero'];
          $marque=$_POST['marque'];
          $model=$_POST['model'];

          $conn ->query ("INSERT INTO TAXI (numero,marque,model)
          VALUES ('$numero','$marque','$model')");
        
        }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM TAXI";
        $result = $conn->query($sql);

        $json = json_encode($result);

        echo $json;
        


       
        if ($result->num_rows > 0) {        
            echo "<table><tr>
            <th>ID</th>
            <th>NUMERO</th>
            <th>MARQUE</th>
            <th>MODEL</th>

            </tr>";

            while ($row = $result->fetch_assoc()) {

                $id=$row['ID_TX'];
                $numero=$row['numero'];
                $marque=$row['marque'];
                $model=$row['model'];

                response($id,$numero,$marque,$model);

                echo "<tr>
                        <td>$id</td>
                        <td>$numero</td>
                        <td>$marque</td>
                        <td>$model</td>

                        </tr>";
            }
          }

      //   function response($id,$numero,$marque,$model){
      //     $response['ID_TX'] = $id;
      //     $response['numero'] = $numero;
      //     $response['marque'] = $marque;
      //     $response['model'] = $model;



      //     $json_response = json_encode($response);

          
      //     echo $json_response; 
          
      //     //        foreach((array) $json_response as $key => $value) {
      //     //   echo "  " . $value . "<br>";
      //     // }
      // }
        ?>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Chaufeurs</title>

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
      <h2> AJOUTER UN CHAUFFEUR </h2>
      <form action="" method="POST">
          <label >ID :</label>
          <input    name="ID_CH" value="" ><br><br>
          <label >NOM : </label>
          <input   name="nom" value="" ><br><br>
          <label >CIN : </label>
          <input  name="cin" value="" ><br><br>
          <input type="submit" value="ADD" name="insert">
          <input type="submit" value="UPDATE" name="update">
          <input type="submit" value="DELETE" name="delete">


      </form>

        <h2>liste Chaufeurs:</h2> 
        
        
        <?php 
            
        $servername = "localhost";
        $username = "root"; 
        $password = "root"; 
        $dbname = "taxi_orga"; 
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if (isset($_POST['insert'])) {
              $ID_CH=$_POST['ID_CH'];
              $nom=$_POST['nom'];
              $cin=$_POST['cin'];
              $conn -> query ("INSERT INTO CHAUFFEUR (nom,cin)
              VALUES ('$nom' , '$cin' )");
            }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM CHAUFFEUR";
        $result = $conn->query($sql);
        


        if ($result->num_rows > 0) {        
            echo "<table><tr>
            <th>ID</th>
            <th>NOM</th>
            <th>CIN</th></tr>";
            while ($row = $result->fetch_assoc()) {

$id=$row['ID_CH'];
$nom=$row['nom'];
$cin=$row['cin'];
                echo "<tr>
                        <td>$id</td>
                        <td>$nom</td>
                        <td>$cin</td></tr>";
            }
        }

        if (isset($_POST['update'])) {
          $ID_CH=$_POST['ID_CH'];
          $nom=$_POST['nom'];
          $cin=$_POST['cin'];
          $conn -> query ("UPDATE CHAUFFEUR SET nom='$nom', cin ='$cin' where ID_CH='$ID_CH' ");


          if($conn -> affected_rows)
            echo"<script>alert('update succes');</script>";
          else
            echo"<script>alert('update Failed');</script>";
          
        }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//-------delete
if (isset($_POST['delete'])) {
  $ID_CH=$_POST['ID_CH'];
  
  $conn -> query ("DELETE FROM CHAUFFEUR WHERE ID_CH=$ID_CH ");


  if($conn -> affected_rows) 
  // echo"<script>alert('data deleted');</script>";

  header("location:Chaufeurs.php");  
  else if($conn -> affected_rows = false)
    echo"<script>alert('data non existe to delete');</script>";
  
}
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

      

        ?>

    </div>

</body>
</html>
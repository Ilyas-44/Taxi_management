<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>AFFECTATION</title>

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
.left{
  float:left;
}
.right{
  float:right;
}
.no{
 
  clear: both;
}
</style>
</head>
<body>
  <?php
          $servername = "localhost";
          $username = "root"; 
          $password = "root"; 
          $dbname = "taxi_orga"; 
          
          $conn = new mysqli($servername, $username, $password, $dbname);   
  
  
  $sql = "SELECT * FROM CHAUFFEUR";
  $sqli = "SELECT * FROM TAXI";

  $result = $conn->query($sql);
  $ro = $result -> fetch_all(MYSQLI_ASSOC);

  $result1 = $conn->query($sqli);
  $ro1 = $result1 -> fetch_all(MYSQLI_ASSOC);
  ?>
    
<a href="index1.php" class="btn btn-primary btn-lg">revenir a l'accueil</a>

    <div class="container">
      <h2> ajouter une affectation :</h2>
      <form action="" method="POST">
        <div class="left">
          <label >ID TAXI  : </label>
          <!-- <input   name="ID_TX" value=""><br><br> -->

          <select name="ID_TX">
                <?php for($i=0; $i<sizeof($ro1); $i++):
                  $in = $ro1[$i];?>
                <option value="<?php echo $in["ID_TX"]?>">
                <?php echo $in["ID_TX"]?></option>
                <?php endfor;?>
            </select><br>


          <label >ID CHAUFFEUR : </label>
          <!-- <input  name="ID_CH" value=""><br><br> -->

          <select name="ID_CH">
                <?php for($i=0; $i<sizeof($ro); $i++):
                  $in = $ro[$i];?>
                <option value="<?php echo $in["ID_CH"]?>">
                <?php echo $in["ID_CH"]?></option>
                <?php endfor;?>
            </select><br>
           
          <label >DATE : </label>
          <input  type="date" name="DATE" value=""></BR>
          <label >KM : </label>
          <input  name="KM" value=""><br>
          <label >INCIDENT : </label>
          <input  name="INCIDENT" value=""> <br>
          
          <input type="submit" class="btn btn-primary" value="ADD" name="INSERT"> <br><br>

           </div>
           <div class="right">
            <h2> DELETE AFFECTATION :</h2> 
           <label >id affectation : </label>
          <input  name="ID_AFFEC" value=""> 
          <input type="submit" value="DELETE" name="DELETE"> <br><br>
                </FORM>
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  update
                </button>

<!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">update affectation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
        <label >id affectation : </label>
          <input  name="ID_AFFEC" value=""> <BR></BR>
            <label >ID TAXI  : </label>
            <select name="ID_TX">
                  <?php for($i=0; $i<sizeof($ro1); $i++):
                    $in = $ro1[$i];?>
                  <option value="<?php echo $in["ID_TX"]?>">
                  <?php echo $in["ID_TX"]?></option>
                  <?php endfor;?>
              </select><br>
            <label >ID CHAUFFEUR : </label>
            <select name="ID_CH">
                  <?php for($i=0; $i<sizeof($ro); $i++):
                    $in = $ro[$i];?>
                  <option value="<?php echo $in["ID_CH"]?>">
                  <?php echo $in["ID_CH"]?></option>
                  <?php endfor;?>
              </select><br>      
            <label >DATE : </label>
            <input  type="date" name="DATE" value=""></BR>
            <label >KM : </label>
            <input  name="KM" value=""><br>
            <label >INCIDENT : </label>
            <input  name="INCIDENT" value=""> <br>
                
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="UPDATE" name="UPDATE"> <br><br>
              </div> </form>
          </div>
    </div>
  </div>
         
           </div>

           
           
      </form>
      <div class="no">
        <h2>liste Affectation :</h2> 
        
        
        <?php 

        if (isset($_POST['INSERT'])) {
          $ID_AFFEC=$_POST['ID_AFFEC'];

          $ID_TX=$_POST['ID_TX'];
          $ID_CH=$_POST['ID_CH'];
          $DATE=$_POST['DATE'];
          $KM=$_POST['KM'];
          $INCIDENT=$_POST['INCIDENT'];


          $conn ->query("INSERT INTO AFFECTATION(ID_TX, ID_CH, DATE, KM, INCIDENT)
          VALUES ('$ID_TX','$ID_CH','$DATE','$KM','$INCIDENT')");
          echo'insert success';
        
        }


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM AFFECTATION";
        $result = $conn->query($sql);
        


        if ($result->num_rows > 0) {        
            echo "<table><tr>
            <th>ID AFFECTATION</th>
            <th>ID TAXI</th>
            <th>ID CHAUFFEUR </th>
            <th>ID DATE </th>
            <th> KM </th>
            <th> INCIDENT </t>

            </tr>";
            while ($row = $result->fetch_assoc()) {

$id_AFFEC=$row['ID_AFFEC'];
$ID_TX=$row['ID_TX'];
$ID_CH=$row['ID_CH'];
$DATE=$row['DATE'];
$KM=$row['KM'];
$INCIDENT=$row['INCIDENT'];


                echo "<tr>
                        <td>$id_AFFEC</td>
                        <td>$ID_TX</td>
                        <td>$ID_CH</td>
                        <td>$DATE</td>
                        <td>$KM</td>
                        <td>$INCIDENT</td>

                        </tr>";
            }
        }

        if (isset($_POST['DELETE'])) {
          $ID_AFFEC=$_POST['ID_AFFEC'];
          
          $conn -> query ("DELETE FROM AFFECTATION WHERE ID_AFFEC=$ID_AFFEC ");
        
        
          if($conn -> affected_rows) 
          echo"<script>alert('data deleted');</script>";
        
          // header("location:Reservations.php");  
          else if($conn -> affected_rows = false)
            echo"<script>alert('data non existe to delete');</script>";
          
        }
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        // --- UPDATE 
        if (isset($_POST['UPDATE'])) {
          $ID_AFFEC=$_POST['ID_AFFEC'];
          $ID_TX=$_POST['ID_TX'];
          $ID_CH=$_POST['ID_CH'];
          $DATE=$_POST['DATE'];
          $KM=$_POST['KM'];
          $INCIDENT=$_POST['INCIDENT'];
          $conn -> query ("UPDATE AFFECTATION SET ID_TX='$ID_TX', ID_CH ='$ID_CH' DATE ='$DATE', KM = '$KM' , INCIDENT = '$INCIDENT',  where ID_AFFEC='$ID_AFFEC' ");


          if($conn -> affected_rows)
            echo"<script>alert('update succes');</script>";
          else if($conn -> affected_rows = FALSE)
            echo"<script>alert('update Failed');</script>";
          
        }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        ?>
</div>
    </div>

</body>
</html>
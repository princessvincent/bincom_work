<?php
require_once "connection.php";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
  <thead>
<tr>
    <th>S/N</th>
    <th>Party Abrevation</th>
    <th>Party Name</th>
    <th>Polling unit Number</th>
    <th>Score</th>
</tr>
  </thead>
  <tbody>
      <?php
      
      $sql = "SELECT polling_unit_name, polling_unit_number, party_abbreviation, party_score FROM polling_unit, announced_pu_results WHERE polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid";
      $res = mysqli_query($conn,$sql);

      $i = 1;

      while($row = mysqli_fetch_assoc($res)){

      ?>
      <tr>
<td><?php echo $i?></td>
<td><?php echo $row["party_abbreviation"]?></td>
<td><?php echo $row["polling_unit_name"]?></td>
<td><?php echo $row["polling_unit_number"]?></td>
<td><?php echo $row["party_score"]?></td>
      </tr>
    <?php 
$i++;    
}
    ?>
  </tbody>
</table> <br><br>
<a href="index.php">Go Back</a>

</body>
</html>
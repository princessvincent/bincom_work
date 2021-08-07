<?php
require_once "connection.php";

if(isset($_POST["get_total"]) && isset($_POST["lga"])){

    $lga = $_POST["lga"];

    $sql = "SELECT  polling_unit.lga_id, lga_name,sum(party_score) as total FROM polling_unit,announced_pu_results,lga WHERE polling_unit.lga_id = '$lga' and polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid and polling_unit.lga_id = lga.lga_id ";

    $rest  = mysqli_query($conn,$sql);
    $row2 = mysqli_fetch_assoc($rest);
    if($row2["total"]){
        
    
}
?>
<h2>The vote Count in <b><?php echo $row2["lga_name"]?></b> is: <?php echo $row2["total"]?></h2>
<?php

}else{
echo "Vote not found!";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Local Government Result</h1>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
 <label for="lga">Choose Lga</label>
 <select name="lga">
     <?php
     $selet = "SELECT * FROM lga";
     $res = mysqli_query($conn,$selet);
     while($row = mysqli_fetch_assoc($res)){

     ?>
     <option value="<?php echo $row["lga_id"]?>"><?php echo strtoupper($row["lga_name"]) ?></option>
     <?php } ?>
 </select><br><br>
     <button type="submit" name="get_total" >Submit</button>
 </form>   
 <a href="index.php">Go Back</a>
</body>
</html>
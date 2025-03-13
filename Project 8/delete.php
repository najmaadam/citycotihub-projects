<?php

include ("connection.php");
if(isset($_GET ['deleteid'])){
    $id=$_GET['deleteid'];
}

$sql="delete from `itasset_reg` where asset_id=$id";
$result= mysqli_query($conn,$sql);
if($result){
    header('location:assets_reg.php');
}else{
    echo die(mysqli_error($conn));
}






?>
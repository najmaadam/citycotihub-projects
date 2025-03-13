
<?php
include("connection.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['asset_id'];
    $name=$_POST['asset_name'];
    $category=$_POST['category'];
    $date=$_POST['Purchased'];
    $location=$_POST['locations'];
    $condition=$_POST['conditions'];
    $assigned=$_POST['assigned'];
    $note=$_POST['note'];

 if (empty($id) || empty($name) || empty($category) || empty($date) ||
    empty($location) || empty($condition) || empty($assigned) || empty($note)) {
    $error_message = "Please fill in all the fields.";
} else {


    $sql= "INSERT INTO itasset_reg( asset_id , asset_name, category, 
    purchased_date , locations , conditions, assigned_to, notes)
    VALUES('$id','$name','$category','$date','$location', '$condition' ,'$assigned','$note')";
  

    if ($conn->query($sql) == TRUE) {
       $message= "<p class='success-message'> sucessefull</p>";
    } else {
       echo (mysqli_error($conn));
    }
}


}



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asset registration</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="">

    <style>

        label{

            font-family:Georgia, 'Times New Roman', Times, serif;
            font-weight: 500;
            font-size:large;
            padding-bottom: 10px;
            padding-top: 10px;
        }



    </style>
</head>
<body>
    <div class="container-fluid">
        <form action="" method="post">
<div class="card">
    <div class="card-header" style="background-color: rgb(96, 139, 193); color: white; font-size:larger;">
        <div class="card-title">Asset Registration </div>
    </div>

    <?php
if(!empty($message)) 
echo $message;
    ?>
<div class="card-body">
    <!-- row 1 -->
<div class="row">  
    <!-- id -->
    <div class="col-md-4">
        <label for="id">Asset Id</label>
        <div class="input-group">
            <span class="input-group-text"> <i class="fa-solid fa-hashtag" style="color: red;"></i></span>

<input type="number" name="asset_id" class="form-control" ;
>
</div>
</div>

<!-- name -->
<div class="col-md-4">
    <label for="id">Asset Name </label>
    <div class="input-group">
        <span class="input-group-text" ><i class="fa-solid fa-box-archive" style="color: red;"></i></span>


<input type="text" name="asset_name" class="form-control" >
</div>
</div>

<!-- category -->
<div class="col-md-4">
    <label for="id">Asset Category </label>
    <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-list" style="color: red;"></i></span>

<input type="text" name="category" class="form-control" ;>
</div>
</div>
</div>

<!-- row2 -->
<div class="row">

    <!-- Purchased -->

<div class="col-md-4">
    <label for="id">Purchased date </label>
    <div class="input-group">
        <span class="input-group-text"> <i class="fa-regular fa-calendar-days" style="color: red;"></i></span>

<input type="date" name="Purchased" class="form-control" >
</div>
</div>


<!-- location -->

<div class="col-md-4">
    <label >Location</label>
    <div class="input-group">
        <span class="input-group-text" ><i class="fa-solid fa-location-dot" style="color: red;"></i></span>
<select name="locations" id="locations" class="form-select" >
    <option>Choose Location</option>
    <option value="Nakhiil">Nakhiil</option>
    <option value="Main Campus">Main Campus</option>
</select>
</div>
</div>

<!-- condition -->

<div class="col-md-4">
    <label>Condition </label>
    <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-check" style="color: red;"></i></span>
        <select name="conditions" id="conditions" class="form-select" >
            <option>Choose Condition</option>
            <option value="Working">Working</option>
            <option value="Scrap">Scrap</option>
        </select>

</div>
</div>

</div>

<!-- row3 -->
<div class="row">
<!-- assigned -->
    <div class="col-md-4">
        <label for="id">Assigned To </label>
        <div class="input-group">
            <span class="input-group-text"> <i class="fa-solid fa-signature" style="color: red;"></i></span>
    
    <input type="text" name="assigned" class="form-control" >
    </div>
    </div>
<!-- note -->
    <div class="col-md-4">
        <label for="id" >Notes</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-note-sticky" style="color: red;"></i></span>
    
    <textarea name="note" id=""  placeholder="Notes" style="border-radius: 3px; " class="form-control" ></textarea>
    </div>
    </div>
    
</div>

<!-- row4 buttons -->
<div class="row mt-4 button">
    <div class="col-md-6 col-12 mt-2 save">
<button type="submit" class="btn btn-success w-100  buttons" name="submit">Save
    <i class="fas fa-save"></i>
</button>
    </div>
    
    <div class="col-md-6 col-12 mt-2 reset">
<button type="reset" class="btn btn-danger w-100 buttons" name="reset">Reset
    <i class="fas fa-trash"></i></button>

    </div>
    
</div>


</div>



</form>


<div class="card mt-4">
    <div class="card-header" style="background-color: rgb(96, 139, 193); color: white;">
<div class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif; font-weight: 500; font-size: larger;">Asset List</div>   

</div>
<div class="card-body">
<table class="table table-striped">

    <tr>
        <th>Asset Id</th>
        <th>Asset Name</th>
        <th>Category</th>
        <th>Purchased date</th>
        <th>Location</th>
        <th>Condition</th>
        <th>Action</th>
        <th></th>
    </tr>

    <?php
$sql= "SELECT * FROM itasset_reg";
$result= mysqli_query($conn,$sql);
if($result){
    while($row= mysqli_fetch_assoc($result)){

$id=$row['asset_id'];
$name=$row['asset_name'];
$category=$row['category'];
$date=$row['purchased_date'];
$location=$row['locations'];
$condition=$row['conditions'];




echo '<tr>

<th scope=row>'.$id.'</th>
<td>'.$name.'</td>
<td>'.$category.'</td>
<td>'.$date.'</td>
<td>'.$location.'</td>
<td>'.$condition.'</td>
<td><button class="btn btn-warning">
<i class="fa-solid fa-pen"  style="color: white;"></i>
<a href="update.php?updateid='.$row['asset_id'].'" class="text-light"  style="text-decoration: none;">Edit</a>

</button></td>

<td><button class="btn btn-danger">
<i class="fa-solid fa-trash-can" style="color: white;"></i>
<a href="delete.php? deleteid='.$row['asset_id'].'" class="text-light" style="text-decoration: none;" >Delete</a>
</button></td>



</tr>';

    }

}



?>





</table>

    </div>
</div>

</div>

  





 

    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/53a255a459.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("connection.php");

if (!isset($_GET['updateid'])) {
    die("Error: Missing asset ID for update.");
}

$id = $_GET['updateid'];


$sql = "SELECT * FROM itasset_reg WHERE asset_id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("No asset found with this ID.");
} else {
    $row = mysqli_fetch_assoc($result);
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['asset_name'];
    $category = $_POST['category'];
    $date = $_POST['purchased'];
    $location = $_POST['locations'];
    $condition = $_POST['conditions'];
    $assigned = $_POST['assigned'];
    $note = $_POST['note'];

    // Update query
    $sql = "UPDATE itasset_reg SET 
            asset_name = '$name', 
            category = '$category', 
            purchased_date = '$date', 
            locations = '$location',
            conditions = '$condition', 
            assigned_to = '$assigned', 
            notes = '$note' 
            WHERE asset_id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $message = "<p class='success-message'>Success! The data has been updated successfully</p>";
    } else {
        $message = "<p class='error-message'>Error! " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Asset</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <form method="post"> 
        <div class="card">
            <div class="card-header" style="background-color: royalblue; color: white;">
                <div class="card-title">Asset Update</div>
            </div>

            <?php if (!empty($message)) echo $message; ?>

            <div class="card-body">
                <div class="row">
                    <input type="hidden" name="asset_id" value="<?= $row['asset_id']; ?>"> <!-- Hidden input for ID -->

                    <div class="col-md-4">
                        <label>Asset Name</label>
                        <input type="text" name="asset_name" class="form-control" value="<?= $row['asset_name']; ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label>Asset Category</label>
                        <input type="text" name="category" class="form-control" value="<?= $row['category']; ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label>Purchased Date</label>
                        <input type="date" name="purchased" class="form-control" value="<?= $row['purchased_date']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label>Location</label>
                        <select name="locations" class="form-select" required>
                            <option value="Nakhiil" <?= ($row['locations'] == 'Nakhiil') ? 'selected' : ''; ?>>Nakhiil</option>
                            <option value="Main Campus" <?= ($row['locations'] == 'Main Campus') ? 'selected' : ''; ?>>Main Campus</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Condition</label>
                        <select name="conditions" class="form-select" required>
                            <option value="Working" <?= ($row['conditions'] == 'Working') ? 'selected' : ''; ?>>Working</option>
                            <option value="Scrap" <?= ($row['conditions'] == 'Scrap') ? 'selected' : ''; ?>>Scrap</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Assigned To</label>
                        <input type="text" name="assigned" class="form-control" value="<?= $row['assigned_to']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Notes</label>
                        <textarea name="note" class="form-control"><?= $row['notes']; ?></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning w-100">Update Asset</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="bootstrap/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/53a255a459.js" crossorigin="anonymous"></script>
</body>
</html>

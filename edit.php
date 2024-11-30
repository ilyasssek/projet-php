<?php
include("database.php");


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    
    $sql = "SELECT fullname, email FROM Clients WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_sql = "UPDATE Clients SET fullname='$fullname', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $update_sql)) {
        echo "Record updated successfully";
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"  required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="read.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
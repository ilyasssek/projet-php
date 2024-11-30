
<?php
include("database.php");
$succesMsg ="";
$errorMsg="";
$fnamevalue = "";
$lnamevalue = "";
$emailvalue = "";
if($_SERVER['REQUEST_METHOD']=='GET'){
   
    $sql = "SELECT  firstname, lastname,email  FROM Etudiants WHERE id='$_GET[idupdated]'";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $emailvalue=$row['email'];
    $fnamevalue=$row['firstname'];
    $lnamevalue=$row['lastname'];
    }
    } 

 
}


elseif(isset($_POST['submit'])){
  $fnamevalue = $_POST['firstName'];
  $lnamevalue = $_POST['lastName'];
  $emailvalue = $_POST['email'];

  if(empty($fnamevalue) ||empty($lnamevalue) ||empty($emailvalue) ){
  $errorMsg = "all fileds are required!";
  }
else{
    include("database.php");
    // hachage du mot de passe
$password = password_hash($passwordvalue,PASSWORD_DEFAULT);
$sql = "UPDATE  Etudiants SET firstname='$fnamevalue',lastname='$lnamevalue',email='$emailvalue' WHERE id = '$_GET[idupdated]'";

if (mysqli_query($conn, $sql)) {
$succesMsg = "New record update successfully";
header("location:readd.php");
} else {
$errorMsg = "Error: " . $sql . "<br>" .
mysqli_error($conn);

}
  }
  
  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Etudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">

        <h2>SIGN UP</h2>


<?php
if(!empty($errorMsg)){
 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> $errorMsg </strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>"; }
  ?>

        <br>
        <form method="post">
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $fnamevalue?>"  class="form-control" type="text" id="fname" name="firstName">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $lnamevalue?>"  class="form-control" type="text" id="lname" name="lastName">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $emailvalue?>" class="form-control" type="email" id="email" name="email">
                    </div>
            </div>
          
            </div>


<?php
if(!empty($succesMsg)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$succesMsg</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div> ";
}
?>
      

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="readd.php">Cancel</a>
                    </div>
            </div>
        </form>

    </div>


</body>
</html>
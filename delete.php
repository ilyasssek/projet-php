<?php
// sql to delete a record
include("database.php");
$sql = "DELETE FROM Etudiants WHERE id='$_GET[iddeleted]'";

if (mysqli_query($conn, $sql)) {

echo "Record deleted successfully";
header("location:readd.php");
} else {

echo "Error deleting record: " .
mysqli_error($conn);

}
?>
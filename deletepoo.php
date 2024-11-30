<?php

// sql to delete a record
include ("connection.php");
 $connection=new Connection();
 include ("client.php");
 $connection->selectDatabase("poog4");

 Etudiants::deleteEtudiants(" Etudiants",$connection->conn,$_GET['deletedId']);


?>
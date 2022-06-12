<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if(isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "DELETE FROM tblcitas WHERE ID = $ID";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro eliminado';
  $_SESSION['message_type'] = 'danger';
  
  header('Location: vista-citas.php');
}

?>
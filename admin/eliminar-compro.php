<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if(isset($_GET['id'])) {
  $id= $_GET['id'];
  $query = "DELETE FROM tblfactura WHERE id_facturacion= $id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro eliminado';
  $_SESSION['message_type'] = 'danger';
  
  header('Location: comprobantes.php');
}

?>
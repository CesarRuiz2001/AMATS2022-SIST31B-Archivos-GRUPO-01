<?php
session_start();
error_reporting(0);
date_default_timezone_set("America/El_Salvador");
include('includes/dbconnection.php');
$fechahoy=date('Y-m-d h:i:s a' , time());

if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['bpmsaid'];
    $aname=$_POST['nombreAdmin'];
	$usuario=$_POST['usuario'];
  $mobno=$_POST['contactnumber'];
  $correo=$_POST['correo'];
  
     $query=mysqli_query($con, "update tbladmin set nombreAdmin ='$aname', usuario='$usuario', telefono='$mobno', correo='$correo', fecharegistro='$fechahoy' where ID='$adminid'");
    if ($query) {
    $msg="El perfil del administrador ha sido actualizado.";
	echo "<script>window.location.href = 'inicio-admin.php'</script>";
  }
  else
    {
      $msg="Algo salió mal. Inténtalo de nuevo.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Perfil Admin</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 style=color:black class="title1">Perfil Administrador</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Actualizar Perfil :</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:black" align="center"> 
								
								<?php if($msg){ echo $msg;}  ?> 

									</p>

  <?php
$adminid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
							 
								 <div class="form-group"> 
								 <label for="exampleInputEmail1">Nombre Administrador</label> 
								 <input type="text" class="form-control" id="nombreAdmin" name="nombreAdmin" placeholder="Admin Name" value="<?php  echo $row['nombreAdmin'];?>"> </div> 
								 
								 <div class="form-group">
							  <label for="exampleInputcontraseña1">Usuario</label> <input type="text" id="usuario" name="usuario" class="form-control" value="<?php  echo $row['usuario'];?>" > </div>
							 
								 <div class="form-group"> 
								 <label for="exampleInputcontraseña1">Número de Contacto</label> 
								 <input type="text" id="contactnumber" name="contactnumber" class="form-control" value="<?php  echo $row['telefono'];?>"> </div>
							 
								 <div class="form-group">
								 <label for="exampleInputcontraseña1">Correo Electrónico</label> 
								 <input type="email" id="correo" name="correo" class="form-control" value="<?php  echo $row['correo'];?>" > </div>  
							  
								 <div class="form-group">
								 <label for="exampleInputcontraseña1">Fecha de actualizacion</label> 
								 <input type="email" id="fecha" name="fecharegistro" class="form-control" value="<?php  echo $fechahoy;?>" readonly="true" > </div>  
							  
								 <button type="submit" name="submit" class="btn btn-default">Actualizar</button> </form> 
						</div>
						<?php } ?>
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>
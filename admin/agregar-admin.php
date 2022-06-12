
<?php
session_start();
error_reporting(0);
date_default_timezone_set("America/El_Salvador");
include('includes/dbconnection.php');

class cls_encriptar_desencriptar{
    public function encriptar_desencriptar($accion,$texto){
        $output=false;
        $encriptarmetodo="AES-256-CBC";
        $palabrasecreta="mi clave para encriptar";
        $iv="C9FBL1EWSD/M8JFTGS";
        $key=hash("sha256",$palabrasecreta);
        $siv=substr(hash("sha256",$iv),0,16);
        if($accion=="encriptar"){
            $salida=openssl_encrypt($texto,$encriptarmetodo,$key,0,$siv);
        }else if($accion=="desencriptar"){
            $salida=openssl_decrypt($texto,$encriptarmetodo,$key,0,$siv);
        }
        return $salida;
    }
}

if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
$objEncriptar_desencriptar=new cls_encriptar_desencriptar();
if(isset($_POST['guardar']))
  {
    $nombreAdmin=$_POST['nombreAdmin'];
    $usuario=$_POST['usuario'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
   // $contraseña=$_POST['contraseña'];
   $contraseña=$objEncriptar_desencriptar->encriptar_desencriptar("encriptar",$_POST["contraseña"]);
   $contraseña2=$objEncriptar_desencriptar->encriptar_desencriptar("encriptar",$_POST["contraseña2"]);


$fecharegistro=$_POST['fecharegistro'];

	$fecha=date('Y-m-d h:i:s a', time());
	
   if ($contraseña==$contraseña2) {
	   //Se ejecutara la sentencia
	   $query=mysqli_query($con, "insert into  tbladmin(nombreAdmin,usuario,telefono,correo,contraseña, fecharegistro) value('$nombreAdmin','$usuario','$telefono','$correo','$contraseña','$fecha')");
   
   }
    else{
		"<script>alert('Las contraseñas no coinciden.');</script>";  
	}
   

     
     
	if ($query) {
    	echo "<script>alert('Servicio ha sido agregado satisfactoriamente.');</script>"; 
    		echo "<script>window.location.href = 'inicio-admin.php'</script>";   
    $msg="";
  }
  else
    {
    echo "<script>alert('Algo salió mal. Inténtalo de nuevo.');</script>";  	
    }

  
}
  ?>



<!DOCTYPE HTML>
<html>
<head>
<title>Agregar Administradores</title>

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


<!--//si coinciden contrseñas-->
<script type="text/javascript">
	
function checkpass()
{
if(document.changecontraseña.newcontraseña.value!=document.changecontraseña.confirmcontraseña.value)
{
alert('Las contraseñas no coinciden');
document.changecontraseña.confirmcontraseña.focus();
return false;
}
return true;
} 

</script>

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
					<h3 style=color:black class="title1">Agregar Administrador</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Agregar Admin</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
						echo $msg;
					}  ?> </p>

  
							 <div class="form-group">
								  <label for="exampleInputEmail1">Nombre de Administrador</label> 
							 <input type="text" class="form-control" id="nombreAdmin" name="nombreAdmin" placeholder="Nombre de Admin" value="" required="true"> </div> 
							 
                             <div class="form-group">
								  <label for="exampleInputEmail1">Nombre de usuario</label> 
							 <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="" required="true"> </div> 
							 
                             <div class="form-group">
								  <label for="exampleInputEmail1">Telefono</label> 
							 <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="" required="true"> </div> 
							 
                             <div class="form-group">
								  <label for="exampleInputEmail1">Correo</label> 
							 <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" required="true"> </div> 
							 
                             <div class="form-group">
								  <label for="exampleInputEmail1">Contraseña</label> 
							 <input type="password" class="form-control" id="contraseña" name="contraseña"  value="" required="true"> </div> 
							 
							 <div class="form-group">
								  <label for="exampleInputEmail1">Confirmar Contraseña</label> 
							 <input type="password" class="form-control" id="contraseña2" name="contraseña2"  value="" required="true"> </div> 
							 

                             <div class="form-group">
							
							<input type="hidden" name="fecharegistro" value="<?php $fecha  ?>">

							  <button type="submit" name="guardar" class="btn btn-success">Agregar</button> </form> 
						</div>
						
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
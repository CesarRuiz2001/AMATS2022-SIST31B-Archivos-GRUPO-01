<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$objEncriptar_desencriptar=new cls_encriptar_desencriptar();


if(isset($_POST['login']))
  {
    $usuario=$_POST['usuario'];
    //$contraseña=md5($_POST['contraseña']);
	$contraseña=$objEncriptar_desencriptar->encriptar_desencriptar("encriptar",$_POST["contraseña"]);


    $query=mysqli_query($con,"select ID from tbladmin where  usuario='$usuario' && contraseña='$contraseña' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['ID'];
     header('location:inicio-admin.php');
    }
    else{
    $msg="Información Inválida.";
    }
  }
  ?>

<?php
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
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin-Login </title>

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

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button3 {width: 100%;}

.button3 {
  background-color: #f44336; 
  color: white; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #e05050;
  color: black;
}

</style>
</head> 

<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 style="color:black" class="title1">Iniciar Sesión</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>BARBERIA DANIELA </h4>
					</div>
					
					<div class="login-body">
						<form role="form" method="post" action="">
							
							<p style="font-size:16px; color:Black" align="center">
							
							<?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="text" class="user" name="usuario" placeholder="Usuario" required="true">
							<input type="password" name="contraseña" class="lock" placeholder="Contraseña" required="true">
						
							<button class="button button3" type="submit" name="login" >Acceder </button>
							<div class="forgot-grid">
								
								<div class="forgot">
									<br>
									<a href="../index.php">Volver al Inicio</a>

								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
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
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$bpmsaid=$_SESSION['bpmsaid'];
     $titulo_pag=$_POST['titulo_pag'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$mobnumber=$_POST['mobnumber'];
$tiempo=$_POST['tiempo'];
     
    $query=mysqli_query($con,"update tblpagina set titulo_pag='$titulo_pag',correo_electronico='$email',no_telefono='$mobnumber',tiempo='$tiempo',descripcion_pag='$pagedes' where  tipo_pag='contactus'");
    if ($query) {
    $msg="La página de Contacto, ha sido actualizada satisfactoriamente";
  }
  else
    {
      $msg="Algo salió mal. Inténtalo de nuevo";
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Contacto</title>

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
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
					<h3 style=color:black class="title1">Actualizar Página de Contacto</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Actualizar Página de Contacto:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 
$ret=mysqli_query($con,"select * from  tblpagina where tipo_pag='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

  
							 <div class="form-group">
							<label for="exampleInputEmail1">Título de Página</label> 
							<input type="text" class="form-control" name="titulo_pag" id="titulo_pag" value="<?php  echo $row['titulo_pag'];?>" required="true"> </div>
							
							<div class="form-group"> 	
							<label for="exampleInputEmail1">Correo Electrónico</label> 
							<input type="text" class="form-control" name="email" id="email" value="<?php  echo $row['correo_electronico'];?>" required="true"> </div>
							
							<div class="form-group"> 
								<label for="exampleInputEmail1">Telefono de contacto</label> 
								<input type="text" class="form-control" name="mobnumber" id="mobnumber" value="<?php  echo $row['no_telefono'];?>" required="true"> </div>
								
								<div class="form-group"> 
									<label for="exampleInputEmail1">tiempo</label> 
									<input type="text" class="form-control" name="tiempo" id="tiempo" value="<?php  echo $row['tiempo'];?>" required="true"> </div> 
									
									<div class="form-group"> 
										<label for="exampleInputcontraseña1">Page Description</label> 
										<textarea name="pagedes" id="pagedes" rows="5" class="form-control">
        								<?php  echo $row['descripcion_pag'];?></textarea> </div>
							 <?php } ?>
							  <button type="submit" name="submit" class="btn btn-info">Actualizar</button> </form> 
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
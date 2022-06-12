
<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
date_default_timezone_set("America/El_Salvador");
include('includes/dbconnection.php');
$DATE = date('d-m-Y');

$fecha_actual=date('Y-m-d', time());




if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000, 999999);

	$horaiva= "12:00pm";
	$horano="12:30pm";


//$consulta_si_existe=mysqli_query($con,"Select * from tblcitas where dia_cita='$adate'");

$consulta_si_existe_hora=mysqli_query($con,"   SELECT dia_cita FROM tblcitas WHERE hora_cita='$atime'");

$severifica= mysqli_fetch_array($consulta_si_existe_hora)>0; 


//se verifica que no este ocupada la cita
if ($severifica){ 

		$alerta2 = '<div class="alert alert-warning alert-info fade show" role="alert">
		<strong> ¡Reservacion ocupada!</strong> Reservacion Ocupada, Seleccione otra fecha.
	  </div>';

	  //no disponible la hora de almuerzo

}elseif ($atime==$horaiva || $atime==$horano ) {
		

		$alerta = "<div class='alert alert-warning alert-danger fade show' role='alert'>
		<strong> ¡No se pudo realizar la reservación!</strong>  Cambie la hora de la reservación.
		
	  </div>";
		
		 //no ingrear fechas pasadas
	} elseif($adate<$fecha_actual){

		$alerta = "<div class='alert alert-warning alert-danger fade show' role='alert'>
		<strong> ¡No se pudo realizar la reservación!</strong>  Cambie la fecha de la reservación.
		
	  </div>";
		
	}
	else{
		$query=mysqli_query($con,"insert into tblcitas(no_citas,nombre,correo,telefono,dia_cita,hora_cita,servicios) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
    
		if ($query) {
	
	$ret=mysqli_query($con,"select no_citas, nombre from tblcitas where correo='$email' and  telefono='$phone'");
	
	$result=mysqli_fetch_array($ret);

	$_SESSION['aptno']=$result['no_citas'];

	header('location:gracias.php');
	
	

	  }
	  else
		{
		  $msg="Algo salió mal. Inténtalo de nuevo";
		}
	
	}
   
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Barberia-Daniela</title>
        
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	  <?php include_once('includes/header.php');?>
    

    <section id="home-section" class="hero" style="background-image: url(imgbarberia/Barber.gif);" data-stellar-background-ratio="0.5">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">

	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third align-self-end order-md-last img-fluid" src="" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class=>
		          		<span style="color:#FFFFFF" class="subheading"> BIENVENIDOS</span>
			            <h1 style="color:#FFFFFF" class="mb-4"> Santa Ana,</h1>
						<h1 style="color:#FFFFFF" class="mb-4">Col. El palmar</h1>
			            <p style="color:#FFFFFF" class="mb-4">Cortes de cabello, Recorte de barba, Aplicado de mascarillas faciales y más.</p>
			            
			           
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third align-self-end order-md-last img-fluid" src="" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class=>
					  <span style="color:#FFFFFF" class="subheading"> BIENVENIDOS</span>
			            <h1 style="color:#FFFFFF" class="mb-4"> Santa Ana,</h1>
						<h1 style="color:#FFFFFF" class="mb-4">Col. El palmar</h1>
			            <p style="color:#FFFFFF" class="mb-4">Cortes de cabello, Recorte de barba, Aplicado de mascarillas faciales y más.</p>
			            
			           
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>


<br>
<section class="ftco-section ftco-pricing">
			<div class="container">

				<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big">Reservas citas </h1>

			  <h5 style=color:black>   <?php   echo $fecha_actual;  ?></h5>   
          	<span class="subheading">Completando el formulario  para reservar su cita</span>
            <h2 class="mb-4">Reserve su cita </h2>

			<br><br>
			<?php echo $alerta; ?>
            <?php echo $alerta2; ?>
          </div>
        </div>
            

		<div class="container">
				<div class="row justify-content-center pb-3">

		<form action="#" method="post" class="appointment-form">
			            <!-- Row--><div class="row">

			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required="true">
					            </div>
			              </div>


			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="email" class="form-control" id="appointment_email" placeholder="Correo" name="email" required="true">
					            </div>
			              </div>


				            <div class="col-sm-12">
			                <div class="form-group">
					              <div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="services" id="services" required="true" class="form-control">
		                      	<option value="">Selecciona Nuestros Servicios</option>

		                      	<?php $query=mysqli_query($con,"select * from tblservicios");
              while($row=mysqli_fetch_array($query))
              {
              ?>
		                       <option value="<?php echo $row['nombre_servicio'];?>"><?php echo $row['nombre_servicio'];?></option>
		                       <?php } ?> 
		                      </select>
		                    </div>
					            </div>
			              </div>



			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="date"  placeholder="Fecha" name="adate" id='adate' required="true">
							
							</div>    
			              </div>

						  

			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_time" placeholder="Hora" name="atime" id='atime' required="true">
							  
				
   																		 
							</div>
			              </div>

						

			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" required="true" maxlength="10" pattern="[0-9]+">
			                </div>
			              </div>


						  

				          	<div class="form-group">
							  <div class="d-grid">
  
							
			              
			   			</div>	
						</div>
			</div>
			<br>
			<input type="submit" name="submit" value="HAZ UNA CITA" class="btn btn-primary btn-block">
			          </form>

					</div>  
					</div>
			</div>
<br><br><br><br><br>
<!-- Estilo de la galeria -->
			<style>
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<!--Galeriaa--> 
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_151537.jpg ">
      <img src="imgbarberia/20220607_151537.jpg" alt="Cinque Terre" width="600" height="400">
    </a>

  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_151641.jpg">
      <img src="imgbarberia/20220607_151641.jpg" alt="Forest" width="600" height="400">
    </a>

  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152247.jpg">
      <img src="imgbarberia/20220607_152247.jpg" alt="Northern Lights" width="600" height="400">
    </a>
   
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152258.jpg">
      <img src="imgbarberia/20220607_152258.jpg" alt="Mountains" width="600" height="400">
    </a>
 
  </div>
</div>
<br>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152625.jpg">
      <img src="imgbarberia/20220607_152625.jpg" alt="Mountains" width="600" height="400">
    </a>
 
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152635.jpg">
      <img src="imgbarberia/20220607_152635.jpg" alt="Mountains" width="600" height="400">
    </a>
 
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152646.jpg">
      <img src="imgbarberia/20220607_152646.jpg" alt="Mountains" width="600" height="400">
    </a>
 
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="imgbarberia/20220607_152711.jpg">
      <img src="imgbarberia/20220607_152711.jpg" alt="Mountains" width="600" height="400">
    </a>
 
  </div>
</div>

<div class="clearfix"></div>




			
		</section>

		<br><br><br>
   <?php include_once('includes/footer.php');?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
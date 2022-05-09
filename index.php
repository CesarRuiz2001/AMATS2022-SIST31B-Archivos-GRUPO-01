<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Practica 1</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body style="background-color:#95afc0;">
	
  <!-- Navbar -->
  <div class="w3-top">
  
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="?pagina=index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Inicio</a>
  
  
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Ejercicios practica 1 <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
	<a href="?pagina=Ejercicio2.php" > Ejercicio 2 </a><br>
	<a href="?pagina=Ejercicio3.php" > Ejercicio 3 </a><br>
	<a href="?pagina=Ejercicio4.php" > Ejercicio 4 </a><br>
	<a href="?pagina=Ejercicio5.php" > Ejercicio 5 </a><br>
	<a href="?pagina=Ejercicio6.php" > Ejercicio 6 </a><br>
	<a href="?pagina=Ejercicio7.php" > Ejercicio 7 </a><br>
	<a href="?pagina=Ejercicio8.php" > Ejercicio 8 </a><br>
	<a href="?pagina=Ejercicio9.php" > Ejercicio 9 </a><br>
	<a href="?pagina=Ejercicio10.php" > Ejercicio 10 </a><br>
	<a href="?pagina=Ejercicio11.php" > Ejercicio 11 </a><br>
      
    </div>
	
  </div>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Ejercicios practica 2  <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
	<a href="?pagina=P2Ejercicio1.php" > Ejercicio 1 </a><br>
	<a href="?pagina=P2Ejercicio2.php" > Ejercicio 2 </a><br>
	<a href="?pagina=P2Ejercicio3.php" > Ejercicio 3 </a><br>
	<a href="?pagina=P2Ejercicio4.php" > Ejercicio 4 </a><br>
	<a href="?pagina=P2Ejercicio5.php" > Ejercicio 5 </a><br>
	<a href="?pagina=P2Ejercicio6.php" > Ejercicio 6 </a><br>
      
    </div>
	
  </div>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Ejercicios practica 3 <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
	<a href="?pagina=P3Ejercicio1.php" > Ejercicio 1 </a><br>
	<a href="?pagina=P3Ejercicio2.php" > Ejercicio 2 </a><br>
	<a href="?pagina=P3Ejercicio3.php" > Ejercicio 3 </a><br>
	<a href="?pagina=P3Ejercicio4.php" > Ejercicio 4 </a><br>
	<a href="?pagina=P3Ejercicio5.php" > Ejercicio 5 </a><br>
	<a href="?pagina=P3Ejercicio6.php" > Ejercicio 6 </a><br>
	<a href="?pagina=P3Ejercicio7.php" > Ejercicio 7 </a><br>
	<a href="?pagina=P3Ejercicio8.php" > Ejercicio 8 </a><br>
	<a href="?pagina=P3Ejercicio9.php" > Ejercicio 9 </a><br>
	<a href="?pagina=P3Ejercicio10.php" > Ejercicio 10 </a><br>
	<a href="?pagina=P3Ejercicio11.php" > Ejercicio 11 </a><br>
	<a href="?pagina=P3Ejercicio12.php" > Ejercicio 12 </a><br>
	<a href="?pagina=P3Ejercicio13.php" > Ejercicio 13 </a><br>
	<a href="?pagina=P3Ejercicio14.php" > Ejercicio 14 </a><br>
	<a href="?pagina=P3Ejercicio15.php" > Ejercicio 15 </a><br>
	<a href="?pagina=P3Ejercicio16.php" > Ejercicio 16 </a><br>
      
    </div>
	
  </div>
 </div>
 <br><br><br>
 <h1 align="center">EJERCICIOS DE APLICACI&Oacute;N PHP</h1>

	
	
	<div id=body>
	            <?php
				      if(isset($_GET["pagina"]))
					  {
						  require_once($_GET["pagina"]);

					  }
	            ?>
	</div>
	
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="pie">Escuela especializada en ingenieria ITCA FEPADE</footer>

</body>


</html>
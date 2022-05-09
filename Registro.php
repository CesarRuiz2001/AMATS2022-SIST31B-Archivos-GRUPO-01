# AMATS2022-SIST31B-Archivos-GRUPO-01
Repositorio para manejar las distintas versiones de los archivos del proyecto de modulo. 

<?php

	$user=$_POST['usuario'];
	$pass= $_POST['pass'];

	require("conexiones.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE usuario='$user'");
		if($pass){
			if($checkemail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario colocado, verifique sus datos");</script> ';
					echo "<script>location.href='../registro.php'</script>";	
			}else{
				
				mysqli_query($mysqli,"INSERT INTO usuarios VALUES('','$user','$user','$user@gmail.com','$pass')");

				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				echo "<script>location.href='../index.php'</script>";	
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>

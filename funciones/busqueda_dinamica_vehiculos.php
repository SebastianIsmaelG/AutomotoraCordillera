
<?php

			include 'C:\xampp\htdocs\Proyectos\automotora2.0\paginas_funciones\dbcall.php';

			$sql = "SELECT v.codigo_vehiculo as id ,v.modelo as vm, m.marca as mm FROM vehiculos as v INNER JOIN marcas as m ON m.codigo_marca=v.marca";
			$resultset = mysqli_query($cnn, $sql) or die("database error:". mysqli_error($cnn));

			$array_vehiculos = array();

			while( $rows = mysqli_fetch_array($resultset) ) {
				$modelo = utf8_encode($rows['id']." ".$rows['mm']." ".$rows['vm']);//TOMA DE LA DB Y LO ASOCIA
				array_push($array_vehiculos,$modelo);//LO GUARDA EN EL ARRAY VEHICULOS

			}

?>

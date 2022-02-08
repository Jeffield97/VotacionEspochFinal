<?php

	$ruta = '../resources/Upload';	

	$cabeceras = [
		'FACULTAD',
		'CARRERA',
		'NIVEL',
		'PRIMER APELLIDO',
		'SEGUNDO APELLIDO',
		'PRIMER NOMBRE',
		'SEGUNDO NOMBRE',
	];

	foreach ($_FILES as $key) {

		$nombre=$key["name"];
		$ruta_temporal=$key["tmp_name"];		
		
		$fecha=getdate();
		$nombre_v=$fecha["mday"]."-".$fecha["mon"]."-".$fecha["year"]."_".$fecha["hours"]."-".$fecha["minutes"]."-".$fecha["seconds"].".csv";		

		$destino=$ruta.$nombre_v;
		$explo=explode(".",$nombre);


		if($explo[1] != "csv"){
			$alert=1;
		}else{

			if(move_uploaded_file($ruta_temporal, $destino)){
				$alert=2;
			}

		}

	}

	$x=0;
	$data=array();
	$fichero=fopen($destino, "r");
	$datos= fgetcsv($fichero,7000);
	//print(count($datos));
	if (
		$datos === false
		|| count($cabeceras) != count($datos)
		//|| count(array_diff_assoc($cabeceras, $datos)) > 0
	) {
		echo '<script language="javascript">alert("El formato del archivo no es el adecuado");</script>';
	}else{

		while(($datos= fgetcsv($fichero,7000)) != FALSE){

			$x++;
			if(($x>1) and $datos[2]>3){

				// $data[]='('.$datos[0].',"'.$datos[1].'","'.$datos[2].'","'.$datos[3].'",'.$datos[4].')';
				// $data[]='('.$datos[0].',"'.$datos[1].'","'.$datos[2].'","'.$datos[3].'",'.$datos[4].')';
				//insert to $data 7 values
				$data[]='("'.$datos[0].'","'.$datos[1].'","'.$datos[2].'","'.$datos[3].'","'.$datos[4].'","'.$datos[5].'","'.$datos[6].'","'.$datos[5].".".$datos[3]."@espoch.edu.ec".'")';
				//$data[]='("'.$datos[1].'")';

			}

		}
		$conn = mysqli_connect("localhost", "root", "Jeffield", "laravel_voting");
		$inserta="insert into padron (facultad,carrera,nivel,primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,correo) values ". implode(",", $data);
		mysqli_query($conn,$inserta);
		fclose($fichero);
		//unlink($destino);
		echo '<script language="javascript">alert("Subida del padrón correctamente");</script>';
		//redirect('/subir_archivo');
		redirect('/');
	}
?>

@extends ('layouts.main')

@section('content')

@endsection


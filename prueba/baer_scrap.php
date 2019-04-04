<?php
ini_set('max_execution_time', (60*60*7));
$datos="";
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include 'libs/simple_html_dom.php';
function curl_download($Url){
	if (!function_exists('curl_init')){
		die('Recuerda que el cURL debe tener instalado el cURL, esta instalacion no lo tiene; instalala e intenta de nueva.');
	}
	$html = new simple_html_dom();
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $Url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$html->load( curl_exec($ch));
	curl_close($ch);
	$nac="";
	$ced1="";
	$ced="";
	$nom="";
	$edo="";
	$mun="";
	$par="";
	$cen="";
	$dir="";
	$output="";
	$rows = $html->find('td');
	$m=0;
	foreach($rows as $rows) {
		$fila = $rows->plaintext;
		if(strpos($fila,"Nombre")) {
			$var8=trim(str_replace("Usted fue reubicado a este Centro de Votación","",$fila));
			$var9=trim(str_replace("REGISTRO ELECTORAL","",$var8));
			$var10=trim(str_replace("Consulta de Datos","",$var9));
			$var11=trim(str_replace("DATOS DEL ELECTOR","",$var10));
			$var12=trim(str_replace("Registro Electoral Definitivo Julio 2017","",$var11));
			$var13=trim(str_replace("para las Elecciones Regionales del 15 octubre de 2017","",$var12));
			$var14=trim(str_replace("Imprimir","",$var13));
			$var15=trim(str_replace("Cerrar","",$var14));
			$var16=trim(str_replace("Votación","",$var15));
			$output[$m]=$dir;
			$m++;
			return $var14;
		} else {
			return "";
		}
	}
}
$hora1 = date('H:i:s A') ;
echo "Hora de inicio de ejecusión del script: ".$hora1."<p>";
$m=1;
$conn = pg_connect("host=localhost port=5432 dbname=scv user=postgres password=VentuAri-03");
// $conn = pg_connect("host=localhost port=5432 dbname=identificacion user=postgres password=postgres");
//$sql = "SELECT cedula FROM trab ORDER BY cedula";
$sql = "SELECT cedula FROM cedulas ORDER BY cedula";
$res =pg_query($conn,$sql);
$filas = pg_num_rows($res);
echo "CONEXION: $conn<br/> SQL: $sql <br/>RESOURCES: $res <br/>FILAS: $filas<br/>";
for ($x=0;$x<$filas;$x++) {
	$data = pg_fetch_array($res, $x, PGSQL_NUM);
	$n = $data[0];
	$usuarios =  curl_download('http://www.cne.gob.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula='.$n);
	$usuarios = str_replace("'"," ", $usuarios);
	$nac = substr($usuarios,strpos($usuarios,"V"),1);
	$cedula = trim(str_replace("- Cédula: "," ",str_replace("E"," ",str_replace("-"," ",str_replace("V"," ",str_replace("Cédula: "," ",substr($usuarios,5,strpos($usuarios,"	Nombre:")-9)))))));
	$nombre = trim(substr($usuarios,strpos($usuarios,"	Nombre:")+9,((strpos($usuarios,"	Estado:")-9)-strpos($usuarios,"	Nombre:"))-1));
	$estado = trim(substr($usuarios,strpos($usuarios,"	Estado:")+9,((strpos($usuarios,"	Municipio:")-9)-strpos($usuarios,"	Estado:"))-1));
	$municipio = trim(substr($usuarios,strpos($usuarios,"	Municipio:")+11,((strpos($usuarios,"	Parroquia:"))-strpos($usuarios,"	Municipio:")-11)-1));
	$parroquia = trim(substr($usuarios,strpos($usuarios,"	Parroquia:")+11,((strpos($usuarios,"	Centro:"))-strpos($usuarios,"	Parroquia:")-11)-1));
	$centro = trim(substr($usuarios,strpos($usuarios,"	Centro:")+11,((strpos($usuarios,"	Dirección:"))-strpos($usuarios,"	Centro:")-11)-1));
	$direccion = trim(str_replace("Dirección:"," ",substr($usuarios,strpos($usuarios,"Dirección:")+12,((strpos($usuarios,"Cerrar"))-strpos($usuarios,"Dirección:")-13))));
	if ($cedula !="") {
		$nombre_archivo = "baer.sql"; 
		$archivo = fopen($nombre_archivo, "a");
		if($archivo = fopen($nombre_archivo, "a")) {
			$mensaje1 = "INSERT INTO cne_baer (cedula,nombre,estado,municipio,parroquia,centro) VALUES ($cedula,'$nombre','$estado','$municipio','$parroquia','$centro');";
			$mensaje2=str_replace("</tdsta[ descripcion ]> 			", "", $mensaje1);
			$mensaje=str_replace("</td> 				 							 		 		 		 			 				 				 					 					  	   	 		 		 			 			  ", "", $mensaje2);
			fwrite($archivo,  $mensaje. "\n");
			echo "N° $m ============================================"."<br/>";
			echo $cedula."<br/>";
			echo $nombre."<br/>";
			echo $estado."<br/>";
			echo $municipio."<br/>";
			echo $parroquia."<br/>";
			echo $centro."<br/>";
			echo "=================================================="."<br/>";

		}
		fclose($archivo);
		echo $cedula."<br/>";
		$m++; 
	}
}
$hora2 = date('H:i:s A') ;
echo "<p>Hora de finalización de ejecución del script: ".$hora2;
?>

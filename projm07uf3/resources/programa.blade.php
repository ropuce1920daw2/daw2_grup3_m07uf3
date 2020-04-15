<!DOCTYPE >
<html>
<head>
<title>Añadir Programa</title>
</head>
<body>

<form action="" method="POST">

<br>
<b>Introduce Un canal de Programas<br><br>
</b>
Nombre
<input type="text" name="nomPrograma">
<br>
</b>
id
<input type="number" name="idPrograma">
<br>
</b>
Descripcion
<input type="text" name="DesPrograma">
<br>
</b>
tipus
<input type="text" name="tipusPrograma">
<br>
</b>
clasificacio
<input type="number" name="clasificacioPrograma">
<br>
</b>
idCanalpro
<?php
$dbhost='localhost';
$dbusername='m07';
$dbuserpassword='daw2';
$baseDades='Digital';
$taula='canals';
$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		echo "Problema de connexió a la BD<br><br>";
	}
$consulta = "select idcanal from $taula;";

if(!$connbd -> multi_query($consulta)) echo "Error de sentència múltiple";
	else{
		do{
			$resultat=$connbd->store_result();//s'agafa el resultat d'una consulta
      ?>
<select>
      <option value="0">Seleccione</option>
      <?php
			while ($fila = $resultat->fetch_assoc()) {
				foreach ($fila as $valor_columna) {
					echo "<option name='idCanalpro' value='".$valor_columna."'>".$valor_columna."<opcion>";
				}
				
			}
	?>
</select>
  <?php				 
		}while($connbd->more_results() && $connbd->next_result()); //mentre no finalitzin les consultes
	}
	//Tancant connexió
	$connbd->close();		
?>

<br><br>
<input value="Enviar datos" type="submit">
</form>
<?php
if(isset($_POST['submit'])){

}

?>
</body>
</html>
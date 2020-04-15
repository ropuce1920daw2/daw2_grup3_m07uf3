<!DOCTYPE >
<html>
<head>
<title>Añadir Programa</title>
</head>
<body>
<form action="AñadirPrograma.php"	 method=post  class="mx-auto	" style="width: 500px; margin-top: 10%;">
<br>
<b>Introduce Un canal de Programas<br><br>
</b>
id
<input type="number" name="id_programa">
<br>
</b>
Nombre
<input type="text" name="nom_programa">
<br>
</b>
Descripcion
<input type="text" name="descripcio">
<br>
</b>
clasificacio
<input type="text" name="clasificacio">
<br>
</b>
tipus
<input type="text" name="tipus">
<br>
</b>
idCanal
<?php
$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';
$taula='canal';
$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		echo "Problema de connexió a la BD<br><br>";
	}
$consulta = "select * from $taula;";

if(!$connbd -> multi_query($consulta)) echo "Error de sentència múltiple";
	else{
		do{
			$resultat=$connbd->store_result();//s'agafa el resultat d'una consulta
      ?>
<select name="id_canal">
      <option  value="0">Seleccione</option>
      <?php
			while ($fila = $resultat->fetch_assoc()) {
			echo '<option value="'.$fila[id_canal].'">'.$fila[nom_canal].'</option>';
				
				
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
<button type="submit" name="submit" class="btn btn-primary">Afegir Usuari</button>
</form>
<?php
if(isset($_POST['submit'])){

	$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';
$taula='programa';
$var1=$_POST['id_programa'];
$var2=$_POST['nom_programa'];
$var3=$_POST['descripcio'];
$var4=$_POST['clasificacio'];
$var5=$_POST['tipus'];
$var6=(int) $_POST['id_canal'];
	try{
		$connexio = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		echo "$var1,'$var2','$var3','$var4',$var5,dd $var6<br><br><br> ";
		$entrada = "INSERT INTO ".$taula." VALUES($var1,'$var2','$var3','$var4','$var5',$var6)";
		$connexio->exec($entrada);
		$error = $connexio->errorInfo();		
		if ($error[0] != 0){
			echo "Error introduint el nou registre<br>";
			print_r($error);	
		}
		else{
			echo "El nou registre s'ha introduït amb èxit<br>";
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.projm07uf3.net/">	
			<?php	
		}
		$connexio=null;//Tancant connexió
	} 
	catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		die();
	}



}
?>
</body>
</html>
<!DOCTYPE >
<html>
<head>
<title>Añadir Canal</title>
</head>
<body>
<form action="graella.php"	 method=post  class="mx-auto	" style="width: 500px; margin-top: 10%;">
<br>
<b>Introduce Un canal de Television<br><br>
</b>
Dia
<input type="text" name="dia">
<br>
</b>
Hora
<input type="text" name="hora">
<br>
</b>

id
<input type="number" name="id_graella">
<br>
idpro
<?php
$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';
$taula='programa';
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
<select name="id_programa">
      <option  value="0">Seleccione</option>
      <?php
	  print_r($fila);
			while ($fila = $resultat->fetch_assoc()) {
			echo '<option value="'.$fila[id_programa].'">'.$fila[nom_programa].'</option>';
				
			}
	?>
</select>
  <?php				 
		}while($connbd->more_results() && $connbd->next_result()); //mentre no finalitzin les consultes
	}
	//Tancant connexió
	$connbd->close();		
?>
<br>
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
      <option value="0">Seleccione</option>
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
$taula='graella';
$var1=$_POST['id_graella'];
$var2= $_POST['dia'];
$var3=$_POST['hora'];
$var4=$_POST['id_programa'];
$var5=$_POST['id_canal'];

	try{
		$connexio = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		echo "$var1,'$var2','$var3','$var4',$var5<br><br><br> ";
		$entrada = "INSERT INTO ".$taula." VALUES($var1,'$var2','$var3','$var4','$var5');";
		$connexio->exec($entrada);
		$error = $connexio->errorInfo();		
		if ($error[0] != 0){
			echo "Error introduint el nou registre<br>";
			print_r($error);
					
		}
		else{
			echo "El nou registre s'ha introduït amb èxit<br>";
			?>
			<!-- <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.projm07uf3.net/">	 -->
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

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
try{
	$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
	//$consulta = "select * from $taula;";
	$consulta = $connbd -> prepare("select * from $taula");//Prepara
	$consulta->execute();//Vincula i executa		
	?>
	<select name="id_canal">
	<option value="0">Seleccione</option>
	<?php
	while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
		echo '<option value="'.$fila[id_canal].'">'.$fila[nom_canal].'</option>';
	}
	?>
	</select>
	<?php
}catch(PDOException $e){
	print "Error!!! ".$e->getMessage()."<br>";
	die();
}		
?>

<br><br>
<button type="submit" name="submit" class="btn btn-primary">Afegir Programa</button>
</form>
<?php
if(isset($_POST['submit'])){
$taula='programa';
	try{
		$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$sentencia = $connbd -> prepare("insert into $taula(id_programa,nom_programa,descripcio,clasificacio,tipus,id_canal) values (?,?,?,?,?,?)");
		if (!$sentencia){
			echo "Error de preparació: (" . $connbd->errno . ") " . $connbd->error;
		} 
		$sentencia->bindParam(1, $var1);//vinculem la posicio 1 amb la variable codi
		$sentencia->bindParam(2, $var2);//vinculem la posicio 2 amb la variable nom
		$sentencia->bindParam(3, $var3);//vinculem la posicio 3 amb la variable cognom
		$sentencia->bindParam(4, $var4);//vinculem la posicio 4 amb la variable adresa
		$sentencia->bindParam(5, $var5);
		$sentencia->bindParam(6, $var6);

		$var1=$_POST['id_programa'];
		$var2=$_POST['nom_programa'];
		$var3=$_POST['descripcio'];
		$var4=$_POST['clasificacio'];
		$var5=$_POST['tipus'];
		$var6=(int) $_POST['id_canal'];
		if (!$sentencia->execute()) {
			echo "Error d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		}

		echo "$var1,'$var2','$var3','$var4',$var5,dd $var6<br><br><br> ";
		/*$entrada = "INSERT INTO ".$taula." VALUES($var1,'$var2','$var3','$var4','$var5',$var6)";
		$connexio->exec($entrada);*/
		/*$error = $connexio->errorInfo();		
		if ($error[0] != 0){
			echo "Error introduint el nou registre<br>";
			print_r($error);	
		}
		else{*/
			echo "El nou registre s'ha introduït amb èxit<br>";
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.projm07uf3.net/">	
			<?php	
		//}
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
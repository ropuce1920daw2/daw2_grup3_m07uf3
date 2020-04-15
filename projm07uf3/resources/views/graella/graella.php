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

try{
	$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
	//$consulta = "select * from $taula;";
	$consulta = $connbd -> prepare("select * from $taula");//Prepara
	$consulta->execute();//Vincula i executa		
	?>
	<select name="id_programa">
	<option value="0">Seleccione</option>
	<?php
	while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
		echo '<option value="'.$fila[id_programa].'">'.$fila[nom_programa].'</option>';
	}
	?>
	</select>
	<?php
}catch(PDOException $e){
	print "Error!!! ".$e->getMessage()."<br>";
	die();
}		
	
?>
<br>
idCanal
<?php
$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';
$taula='canal';

try{
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
<button type="submit" name="submit" class="btn btn-primary">Afegir Graella</button>
</form>
<?php
if(isset($_POST['submit'])){
$taula='graella';



try{
	$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
	//print_r($conndb);
	$sentencia = $connbd -> prepare("insert into $taula(id_graella,dia,hora,id_programa,id_canal) values (?,?,?,?,?)");
	if (!$sentencia){
		echo "Error de preparació: (" . $connbd->errno . ") " . $connbd->error;
	} 
	$sentencia->bindParam(1, $var1);//vinculem la posicio 1 amb la variable codi
	$sentencia->bindParam(2, $var2);//vinculem la posicio 2 amb la variable nom
	$sentencia->bindParam(3, $var3);//vinculem la posicio 3 amb la variable cognom
	$sentencia->bindParam(4, $var4);//vinculem la posicio 4 amb la variable adresa
	$sentencia->bindParam(5, $var5);

	$var1=$_POST['id_graella'];
$var2= $_POST['dia'];
$var3=$_POST['hora'];
$var4=$_POST['id_programa'];
$var5=$_POST['id_canal'];
	if (!$sentencia->execute()) {
		echo "Error d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
	}

	echo "$var1,'$var2','$var3','$var4',$var5<br><br><br> ";
		echo "El nou registre s'ha introduït amb èxit<br>";
		?>
		<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.projm07uf3.net/">	
		<?php	
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

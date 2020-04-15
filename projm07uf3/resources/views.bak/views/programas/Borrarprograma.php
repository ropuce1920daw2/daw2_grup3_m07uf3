<?php
$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';

$mysqli = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
if ($mysqli->connect_errno){
echo "Problema de connexió a la BD";
}
else {
echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
}
$consulta = 'SELECT * FROM programa';
$resultat = $mysqli->query($consulta) or die('Consulta fallida: ' . $mysqli->errno . $mysqli->error);
echo "<b>Entrades de la base de dades: </b>";
echo "<table>\n";
echo "\t<tr>\n";
echo "\t\t<th>idPrograma</th>\n";
echo "\t\t<th>nom</th>\n";
echo "\t\t<th>tipus </th>\n";
echo "\t\t<th>clasificacio</th>\n";
echo "\t\t<th>idCanalpro</th>\n";
echo "\t</tr>\n";
while ($fila = $resultat->fetch_assoc()) {
echo "\t<tr>\n";
foreach ($fila as $valor_columna) {
echo "\t\t<td> $valor_columna </td>\n";
}
echo "\t</tr>\n";
}
echo "</table>\n";
echo "<br><b>Total registres:</b> " .$resultat->num_rows;
$mysqli->close();




?>
<h1>Seleciona el programa que quieras borrar</h1>
<form action="Borrarprograma.php"	 method=post  class="mx-auto	" style="width: 500px; margin-top: 10%;">
idPrograma
<?php
/*$dbhost='localhost';
$dbusername='m07';
$dbuserpassword='daw2';
$baseDades='Digital';*/
$taula='programa';
$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		echo "Problema de connexió a la BD<br><br>";
	}
$consulta = "select id_programa from $taula;";

if(!$connbd -> multi_query($consulta)) echo "Error de sentència múltiple";
	else{
		do{
			$resultat=$connbd->store_result();//s'agafa el resultat d'una consulta
      ?>
<select name="idprograma">
      <option value="0">Seleccione</option>
	  <?php
			while ($fila = $resultat->fetch_assoc()) {
			echo '<option value="'.$fila[id_programa].'">'.$fila[id_programa].'</option>';
			}
	?>
</select>
  <?php				 
		}while($connbd->more_results() && $connbd->next_result()); //mentre no finalitzin les consultes
	}
	//Tancant connexió
    $connbd->close();	
    ?>

 <button type="submit" name="submit" class="btn btn-primary">Afegir Usuari</button>
</form>
<?php	
if(isset($_POST['submit'])){

        /*$dbhost='localhost';
    $dbusername='m07';
    $dbuserpassword='daw2';
    $baseDades='Digital';*/
    $taula='graella';
    $var1=(int) $_POST['idprograma'];
  
    
        try{
            $connexio = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
            
            $entrada = "Delete From programa Where id_programa=$var1";
            $connexio->exec($entrada);
            $error = $connexio->errorInfo();		
            if ($error[0] != 0){
                echo "Error Borrat el registre<br>";
                print_r($error);	
            }
            else{
                echo "Elregistre s'ha Borrat amb èxit<br>";
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

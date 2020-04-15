<?php
$dbhost='localhost';
$dbusername='admin';
$dbuserpassword='fjeclot';
$baseDades='projm07uf3';
$taula = "programa";

try{
    $connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
    //$consulta = "select * from $taula;";
    $consulta = $connbd -> prepare("select * from $taula");//Prepara
    $consulta->execute();//Vincula i executa		
    echo "<table>\n";
    echo "\t<tr>\n";
    echo "\t\t<th>idPrograma</th>\n";
    echo "\t\t<th>nom</th>\n";
    echo "\t\t<th>tipus </th>\n";
    echo "\t\t<th>clasificacio</th>\n";
    echo "\t\t<th>descripcio</th>\n";
    echo "\t\t<th>idCanal</th>\n";
    echo "\t</tr>\n";
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($fila as $valor_columna) {
            echo "\t\t<td> $valor_columna </td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
}catch(PDOException $e){
    print "Error!!! ".$e->getMessage()."<br>";
    die();
}	




?>
<h1>Seleciona el programa que quieras borrar</h1>
<form action="Borrarprograma.php"	 method=post  class="mx-auto	" style="width: 500px; margin-top: 10%;">
idPrograma
<?php


$consulta = $connbd -> prepare("select * from $taula");//Prepara
$consulta->execute();//Vincula i executa		
?>

<select name="idprograma">
<option value="0">Seleccione</option>
<?php
while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
echo '<option value="'.$fila[id_programa].'">'.$fila[nom_programa].'</option>';
}
?>
</select>

 <button type="submit" name="submit" class="btn btn-primary">Borrar Programa</button>
</form>
<?php	
if(isset($_POST['submit'])){

    $var1=(int) $_POST['idprograma'];
  
    

    try{

        $sentencia = $connbd -> prepare("Delete From $taula Where id_programa=?");
        $sentencia->execute(array($var1));
        echo "El registre s'ha Borrat amb èxit<br>";
        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://www.projm07uf3.net/">	
        <?php
        $connexio=null;//Tancant connexió
    } 
    catch(PDOException $e){
        print "Error!!! ".$e->getMessage()."<br>";
        die();
    }
            $connexio=null;//Tancant connexió
    
    
    
    }

?>

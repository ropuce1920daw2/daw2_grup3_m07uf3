<?php
        $dbhost='localhost';
        $dbusername='admin';
        $dbuserpassword='fjeclot';
        $baseDades='projm07uf3';
        $taula="graella";

        try{
            $connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
            //$consulta = "select * from $taula;";
            $consulta = $connbd -> prepare("select * from $taula");//Prepara
            $consulta->execute();//Vincula i executa		
            echo "<table>\n";
            echo "\t<tr>\n";
            echo "\t\t<th>idgraella </th>\n";
            echo "\t\t<th>hora</th>\n";
            echo "\t\t<th>dia </th>\n";
            echo "\t\t<th>id programa</th>\n";
            echo "\t\t<th>id canal</th>\n";
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
<h1>Seleciona la graella que quieras borrar</h1>
<form action="Borrargraella.php"	 method=post  class="mx-auto	" style="width: 500px; margin-top: 10%;">
idGraella
<?php



$consulta = $connbd -> prepare("select * from $taula");//Prepara
$consulta->execute();//Vincula i executa		
?>

<select name="idgraella">
<option value="0">Seleccione</option>
<?php
while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
echo '<option value="'.$fila[id_graella].'">'.$fila[id_graella].'</option>';
}
?>
</select>
<?php

    ?>

 <button type="submit" name="submit" class="btn btn-primary">Borrar Graella</button>
</form>
<?php	
if(isset($_POST['submit'])){

    $var1=(int) $_POST['idgraella'];
  

    try{

        $sentencia = $connbd -> prepare("Delete From $taula Where id_graella=?");
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

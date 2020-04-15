<?php

$opcio = $_GET['opcion'];

switch ($opcio){
    case "graella":
        header('Location: http://www.projm07uf3.net/graellas');
        exit();
    break;
    case "programa":
        header('Location: http://www.projm07uf3.net/programa');
        exit();
    break;
    case "canal":
        header('Location: http://www.projm07uf3.net/canal');
        exit();
    break;
    case "canal_crear":
        header('Location: http://www.projm07uf3.net/canals/create');
        exit();
    break;
    case "canal_eliminar":
        header('Location: http://localhost/projm07uf3/resources/views/canals/BorrarCanal.php');
        exit();
    break;
    case "graella_crear":
        header('Location: http://localhost/projm07uf3/resources/views/graella/graella.php');
        exit();
    break;
    case "graella_eliminar":
        header('Location: http://localhost/projm07uf3/resources/views/graella/Borrargraella.php');
        exit();
    break;
    case "programa_crear":
        header('Location: http://localhost/projm07uf3/resources/views/programas/AñadirPrograma.php');
        exit();
    break;
    case "programa_eliminar":
        header('Location: http://localhost/projm07uf3/resources/views/programas/Borrarprograma.php');
        exit();
    break;
}
?>
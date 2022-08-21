<?php

require "datebase.php";

if(isset($_POST['save_task'])){
    $azienda = mysqli_real_escape_string($db, $_POST['azienda']);
    $odl = mysqli_real_escape_string($db, $_POST['odl']);
    $cliente = mysqli_real_escape_string($db, $_POST['cliente']);
    $evo = mysqli_real_escape_string($db, $_POST['evo']);
    $gdp = mysqli_real_escape_string($db, $_POST['gdp']);
    $router = mysqli_real_escape_string($db, $_POST['router']);
    $box = mysqli_real_escape_string($db, $_POST['box']);
    $parabola = mysqli_real_escape_string($db, $_POST['parabola']);
    $alimentador = mysqli_real_escape_string($db, $_POST['alimentador']);
    $tipo = mysqli_real_escape_string($db, $_POST['tipo']) ;
    $fecha = mysqli_real_escape_string($db, $_POST['fecha']);

    $query = "INSERT INTO `materiale`(`azienda`, `odl`, `cliente`, `evo`, `gdp`, `router`, `box`, `parabola`, `alimentador`, `tipo`, `fecha`) VALUES ('$azienda','$odl','$cliente','$evo','$gdp','$router','$box','$parabola','$alimentador','$tipo','$fecha');";

    $resultado = mysqli_query($db, $query);
    if(!$resultado){
        die("Query Failed");
    }
    header("Location: index.php?mensaje=1");
}
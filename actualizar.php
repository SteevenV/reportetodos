.<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    //Valida un id valido
    if (!$id) {
        header('Location: index.php');
    }

    $mensaje = $_GET['mensaje'] ?? null;
    require "datebase.php";

    //Obtener los Datos 
    $consulta = "SELECT * FROM materiale WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $resumen = mysqli_fetch_assoc($resultado);

    $azienda = $resumen['azienda'];
    $tipo = $resumen['tipo'];
    $odl = $resumen['odl'];
    $cliente = $resumen['cliente'];
    $evo = $resumen['evo'];
    $gdp = $resumen['gdp'];
    $router = $resumen['router'];
    $box = $resumen['box'];
    $parabola = $resumen['parabola'];
    $alimentador = $resumen['alimentador'];
    $fecha = $resumen['fecha'];


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
    
        $query = "UPDATE `materiale`SET azienda = '${azienda}', odl = '${odl}', cliente = '${cliente}', evo = '${evo}', gdp = '${gdp}', router = '${router}', box = '${box}', parabola = '${parabola}', alimentador = '${alimentador}', tipo = '${tipo}', fecha = '${fecha}' WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if($resultado){
            header("Location: index.php?resultado=2");

        }
    
    }

?>

<?php include 'includes/header.php'; ?>
<main class="contenedor ">
    <?php if (intval($mensaje) === 1) : ?>
        <p class="alerta exito">Registrado Correctamente</p>
    <?php endif; ?>
    <h2 class="text-center">Modifica tu Registro</h2>

    <form method="POST" class="formulario">

        <fieldset>
            <legend>Empresa(Azienda)</legend>
            <div class="campo">
                <label for="tipo">Azienda:</label>
                <select id="azienda" name="azienda" required>
                    <option value=""><?php echo $azienda; ?></option>
                    <option value="EOLO">EOLO</option>
                    <option value="LINKEM">LINKEM</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend>Materiale</legend>
            <div class="campo">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value=""><?php echo $tipo; ?></option>
                    <option value="Guasto">Guasto</option>
                    <option value="Retiro">Retiro</option>
                </select>
            </div>

            <div class="campo">
                <label for="odl">Nº ODL: </label>
                <input id="odl" name="odl" type="text" placeholder="ODL"
                value="<?php echo $odl; ?>">
            </div>

            <div class="campo">
                <label for="cliente">Cliente:</label>
                <input id="cliente" name="cliente" type="text" placeholder="Cliente"
                value="<?php echo $cliente; ?>">
            </div>

            <div class="campo">
                <label for="evo">R. OFF/EVO:</label>
                <input id="evo" name="evo" type="text" placeholder="OFF/EVO"
                value="<?php echo $evo; ?>">

            </div>
            <div class="campo">
                <label for="gdp">R. G/GDP:</label>
                <input id="gdp" name="gdp" type="text" placeholder="G/GDP"
                value="<?php echo $gdp; ?>">
            </div>


            <div class="campo">
                <label for="router">ROUTER:</label>
                <input id="router" name="router" type="text" placeholder="ROUTER"
                value="<?php echo $router; ?>">
            </div>

            <div class="campo">
                <label for="box">EOLOBOX:</label>
                <input id="box" name="box" type="text" placeholder="EOLOBOX"
                value="<?php echo $box; ?>">
            </div>

            <div class="campo">
                <label for="parabola">PARABOLA:</label>
                <input id="parabola" name="parabola" type="text" placeholder="PARABOLA"
                value="<?php echo $parabola; ?>">
            </div>

            <div class="campo">
                <label for="alimentador">ALIMENT:</label>
                <input id="alimentador" name="alimentador" type="text" placeholder="ALIMENTATORE"
                value="<?php echo $alimentador; ?>">
            </div>

            <div class="campo">
                <label>fecha :</label>
                <input id="fecha" name="fecha" type="date" 
                value="<?php echo $fecha; ?>" required>
            </div>
        </fieldset>

        <input class="btn" type="submit" name="save_task" value="Guardar Repportino">
    </form>

</main>
<?php include 'includes/footer.php'; ?>
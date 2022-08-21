<?php
$mensaje = $_GET['mensaje'] ?? null;
require "datebase.php";

?>
<?php include 'includes/header.php'; ?>
<main class="contenido-principal contenedor ">
    <?php if(intval($mensaje) === 1): ?>
        <p class="alerta exito">Registrado Correctamente</p>
     <?php endif; ?>
    <h2 class="text-center">Ingresa un Nuevo Repportino</h2>

    <form action="guardar.php" method="POST" class="formulario">

        <fieldset>
            <legend>Empresa(Azienda)</legend>
            <div class="campo">
                <label for="tipo">Azienda:</label>
                <select id="azienda" name="azienda" required>
                    <option value="">-- Seleccione -- </option>
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
                    <option value="">-- Seleccione -- </option>
                    <option value="Guasto">Guasto</option>
                    <option value="Retiro">Retiro</option>
                </select>
            </div>

            <div class="campo">
                <label for="odl">Nº ODL: </label>
                <input id="odl" name="odl" type="text" placeholder="ODL">
            </div>

            <div class="campo">
                <label for="cliente">Cliente:</label>
                <input id="cliente" name="cliente" type="text" placeholder="Cliente">
            </div>

            <div class="campo">
                <label for="evo">R. OFF/EVO:</label>
                <input id="evo" name="evo" type="text" placeholder="G/GDP">
            </div>
            <div class="campo">
                <label for="gdp">R. G/GDP:</label>
                <input id="gdp" name="gdp" type="text" placeholder="OFF/EVO">
            </div>


            <div class="campo">
                <label for="router">ROUTER:</label>
                <input id="router" name="router" type="text" placeholder="ROUTER">
            </div>

            <div class="campo">
                <label for="box">EOLOBOX:</label>
                <input id="box" name="box" type="text" placeholder="EOLOBOX">
            </div>

            <div class="campo">
                <label for="parabola">PARABOLA:</label>
                <input id="parabola" name="parabola" type="text" placeholder="PARABOLA">
            </div>

            <div class="campo">
                <label for="alimentador">ALIMENT:</label>
                <input id="alimentador" name="alimentador" type="text" placeholder="ALIMENTATORE">
            </div>

            <div class="campo">
                <label>fecha :</label>
                <input id="fecha" name="fecha" type="date" required>
            </div>
        </fieldset>

        <input class="btn" type="submit" name="save_task" value="Guardar Repportino">
    </form>

</main>
<?php include 'includes/footer.php'; ?>
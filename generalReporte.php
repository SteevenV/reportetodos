<?php include 'includes/header.php'; ?>
<main class="contenido-principal contenedor ">
    <h2 class="text-center">Imprimir Rapportino Diario</h2>

    <form action="reporteDiario.php" method="POST" class="formulario">
        <fieldset>
            <legend>Dame preferancias</legend>

            <div class="campo">
                <label>De Que fecha:</label>
                <input id="queFecha" name="queFecha" type="date" required>
            </div>

            <div class="campo">
                <label for="tipo">nombre tecnico:</label>
                <select id="tecnico" name="tecnico" required>
                    <option value="">-- Seleccione -- </option>
                    <option value="Michael Espinel">Michael Espinel</option>
                </select>
            </div>

            <button class="btn" type="submit">Buscar Registrar </button>
    </form>

</main>
<?php include 'includes/footer.php'; ?>
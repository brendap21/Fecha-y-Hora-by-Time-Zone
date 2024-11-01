<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FECHA Y HORA POR ZONA HORARIA</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <main class="presentacion__contenido">
        <div class="seccion__titulo__logo">
            <div class="presentacion__logo">
                <img class="Logo" src="./assets/Logo.png" alt="Logotipo">
            </div>

            <h1 class="presentacion__titulo">
                FECHA Y HORA POR ZONA HORARIA
            </h1>

            <h2 class="presentacion_subtitulo">
                Esta aplicación te permite seleccionar un país y obtener su fecha y hora de acuerdo con la zona horaria seleccionada, donde el resultado es obtenido desde el servidor en distintos formatos provistos por php.
            </h2>
        </div>

        <div class="container">
            <form method="POST" action="">
                <label for="timezone">SELECCIONA UNA ZONA HORARIA:</label>
                <select name="timezone" id="timezone">
                    <?php
                        // Lista de zonas horarias comunes
                        $zonasHorarias = DateTimeZone::listIdentifiers();
                        foreach ($zonasHorarias as $zona) {
                            // Mantiene seleccionada la última zona horaria seleccionada
                            $seleccionada = (isset($_POST['timezone']) && $_POST['timezone'] == $zona) ? 'selected' : '';
                            echo "<option value=\"$zona\" $seleccionada>$zona</option>";
                        }
                    ?>
                </select>
                <button type="submit">MOSTRAR FECHA Y HORA</button>
            </form>

            <?php
                if (isset($_POST['timezone'])) {
                    // Establece la zona horaria seleccionada
                    $zonaHoraria = $_POST['timezone'];
                    date_default_timezone_set($zonaHoraria);

                    // Obtiene la fecha y hora en varios formatos
                    $formato1 = date("d-m-Y H:i:s");
                    $formato2 = date("Y/m/d H:i");
                    $formato3 = date("l, F j, Y g:i A");
                    $formato4 = date("D, d M Y H:i:s T");
                    $formato5 = date("Y-m-d\TH:i:sP");

                    // Imprime los resultados en un contenedor separado
                    echo "<div class='resultados'>";
                    echo "<h2>FECHA Y HORA EN: $zonaHoraria</h2>";
                    echo "<div class='resultadoscontainer'>";
                    echo "<p>Formato 1: (d-m-Y H:i:s): $formato1</p>";
                    echo "<p>Formato 2: (Y/m/d H:i): $formato2</p>";
                    echo "<p>Formato 3: (l, F j, Y g:i A): $formato3</p>";
                    echo "<p>Formato 4: (D, d M Y H:i:s T): $formato4</p>";
                    echo "<p>Formato 5: (ISO 8601): $formato5</p>";
                    echo "</div>"; // Cierre del div resultadoscontainer
                    echo "</div>"; // Cierre del div resultados
                }
            ?>

        </div>

        <footer class="footer">
            <p>Desarrollado por Brenda Paola Navarro Alatorre</p>
        </footer>

    </main>
</body>

</html>

<?php
if (isset($_GET)) {
    try {
        // Ruta al script Python
        $pythonScript = $target_dir . "gpio.py";

        // Argumento que se pasará al script Python (opcional)
        $argument = '';

        // Comando para ejecutar el script Python con el argumento
        $command = escapeshellcmd("python3 $pythonScript $argument");

        // Ejecutar el comando y capturar la salida
        $output = [];
        $return_var = 0;

        exec($command, $output, $return_var);

        // Mostrar la salida del script Python
        echo "<h1>Salida del Script Python:</h1>";
        echo "<pre>" . implode("\n", $output) . "</pre>";

        // Mostrar el código de retorno
        echo "<h2>Código de retorno:</h2>";
        echo $return_var;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

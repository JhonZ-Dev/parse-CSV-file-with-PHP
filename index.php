<?php 
function parseCSV($filename) {

    if (!file_exists($filename)) {
        throw new Exception("El archivo no existe.");

    }
    $csvData = file($filename);
    if ($csvData === false) {
        throw new Exception("Error al leer el archivo.");
    }
}


?>
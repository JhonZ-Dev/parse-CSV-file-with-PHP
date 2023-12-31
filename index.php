<?php 
function parseCSV($filename) {

    if (!file_exists($filename)) {
        throw new Exception("El archivo no existe.");

    }
    $csvData = file($filename);
    if ($csvData === false) {
        throw new Exception("Error al leer el archivo.");
    }
    $columns = str_getcsv(array_shift($csvData)); // Obtener nombres de columnas
    $result = [];
    foreach ($csvData as $row) {
        $rowData = str_getcsv($row);
        $assocRow = array_combine($columns, $rowData);
        $result[] = $assocRow;
    }

    return $result;

}

//ejemplo de uso
try {
    $csvFilename = 'ejemplo.csv';
    $data = parseCSV($csvFilename);

    foreach ($data as $row) {
        foreach ($row as $column => $value) {
            echo "$column: $value\t";
        }
        echo "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
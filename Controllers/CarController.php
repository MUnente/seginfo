<?php
    $renavam = $_POST["renavam"];
    $carName = $_POST["carName"];
    $carColor = $_POST["carColor"];
    $typeCar = $_POST["typeCar"];
    $array_errors = array();

    function formHasErrors() {
        global $renavam, $carName, $carColor, $typeCar, $array_errors;
        $hasErrors = false;

        if (trim($renavam) != "") {
            if (!is_numeric($renavam)) {
                array_push($array_errors, "Renavam inválido");
            }
        }
        else {
            array_push($array_errors, "Renavam não informado");
        }
        
        if (trim($carName) == "") {
            array_push($array_errors, "Nome do carro não informado");
        }

        if (trim($carColor) == "") {
            array_push($array_errors, "Cor do carro não informado");
        }

        if (trim($typeCar) == "" || (trim($typeCar) < 1 || trim($typeCar) > 3)) {
            array_push($array_errors, "Tipo do carro não informado");
        }

        if (count($array_errors) > 0)
            $hasErrors = true;

        return $hasErrors;
    }

    if (formHasErrors()) {
        foreach ($array_errors as $value)
            echo "$value <br />";
    }
    else {
        echo "Hello, World!";
    }
    
    // echo $_POST["renavam"];
    // echo "<br />";
    // echo $_POST["carName"];
    // echo "<br />";
    // echo $_POST["carColor"];
    // echo "<br />";
    // echo $_POST["typeCar"];

?>
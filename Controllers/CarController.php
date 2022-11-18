<?php
    include_once "../Models/Car.php";
    include_once "../Models/ETypeCar.php";
    include_once "../Repository/CarRepository.php";

    $car = new Car($_POST["renavam"], $_POST["carName"], $_POST["color"], $_POST["typeCar"]);
    $array_errors = array();

    function formHasErrors() {
        global $car, $array_errors;
        $hasErrors = false;
        $typeCars = array(
            ETypeCar::SUV->value,
            ETypeCar::Sedan->value,
            ETypeCar::Hatchback->value,
            ETypeCar::Convertible->value,
            ETypeCar::SportCar->value,
            ETypeCar::Pickup->value
        );

        if (trim($car->getRenavam()) != "") {
            if (!is_numeric($car->getRenavam()) || strlen($car->getRenavam()) != 11) {
                array_push($array_errors, "Renavam inválido");
            }
        }
        else {
            array_push($array_errors, "Renavam não informado");
        }
        
        if (trim($car->getCarName()) == "") {
            array_push($array_errors, "Nome do carro não informado");
        }

        if (trim($car->getColor()) == "") {
            array_push($array_errors, "Cor do carro não informado");
        }

        if (trim($car->getTypeCarId()) == "" || !in_array(trim($car->getTypeCarId()), $typeCars)) {
            array_push($array_errors, "Tipo do carro não informado ou inválido");
        }

        if (count($array_errors) > 0)
            $hasErrors = true;

        return $hasErrors;
    }

    if (formHasErrors()) {
        foreach ($array_errors as $value) {
            echo "$value <br />";
        }

        print "<br /><a href='../index.php'>Voltar</a>";
    }
    else {
        try {
            $carRepository = new CarRepository();
            $carRepository->InsertCar($car);

            echo "Hello, World!";
        }
        catch (Exception $ex) {
            print $ex->getMessage();
            print "<br /><a href='../index.php'>Voltar</a>";
        }
    }
?>
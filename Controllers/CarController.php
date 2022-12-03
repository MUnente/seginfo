<?php
    include_once "../Models/Car.php";
    include_once "../Models/ETypeCar.php";
    include_once "../Models/EActionController.php";
    include_once "../Repository/CarRepository.php";

    if (isset($_GET['action']))
        $action = intval($_GET['action']);
    else
        $action = 0;

    function getFormErrors(Car $car) {
        $array_errors = array();
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

        return $array_errors;
    }

    function createHtmlTable($carsList) {
        print "<table border='1'>";
        print "<tr>";
        print "<th>Renavam</th>";
        print "<th>Car name</th>";
        print "<th>Color</th>";
        print "<th>Type car</th>";
        print "</tr>";

        foreach ($carsList as $car) {
            print "<tr>";
            print "<td>".$car->getRenavam()."</td>";
            print "<td>".$car->getCarName()."</td>";
            print "<td>".$car->getColor()."</td>";
            print "<td>".$car->getTypeCarId()."</td>";
            print "</tr>";
        }

        print "</table>";
    }

    if ($action <= 0) {
        print "<br />URL inválida.";
    }
    else {
        if ($action == EActionController::Select->value) {
            try {
                $carRepository = new CarRepository();
                $carsList = $carRepository->SelectCars();

                if (count($carsList) == 0) {
                    print "<br />Não há carros cadastrados por enquanto.";
                    exit;
                }

                print "<h1 style='text-align: center'>Listagem de carros</h1>";

                createHtmlTable($carsList);
                print "<br /><a href='../index.php'>Voltar</a>";
            }
            catch (Exception $ex) {
                print $ex->getMessage();
                print "<br /><a href='../index.php'>Voltar</a>";
            }
        }
        else if ($action == EActionController::Insert->value) {
            $car = new Car($_POST["renavam"], $_POST["carName"], $_POST["color"], $_POST["typeCar"]);
            $array_errors = getFormErrors($car);

            if (count($array_errors) > 0) {
                foreach ($array_errors as $value) {
                    echo "$value <br />";
                }
    
                print "<br /><a href='../index.php'>Voltar</a>";
            }
            else {
                try {
                    $carRepository = new CarRepository();
                    $carRepository->InsertCar($car);
                    
                    header("Location: CarController.php?action=1");
                }
                catch (Exception $ex) {
                    print $ex->getMessage();
                    print "<br /><a href='../index.php'>Voltar</a>";
                }
            }
        }
    }
?>
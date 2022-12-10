<?php
    include("../Services/session.php");
    include_once "../Models/Car.php";
    // include_once "../Models/ETypeCar.php";
    // include_once "../Models/EActionController.php";
    include_once "../Repository/CarRepository.php";

    if (isset($_GET['action']))
        $action = intval($_GET['action']);
    else
        $action = 0;

    function getFormErrors(Car $car) {
        $array_errors = array();
        $typeCars = array(
            1,
            2,
            3,
            4,
            5,
            6
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
        print "<br /><a href='../Views/menu.php'>Voltar</a>";
    }
    else {
        if ($action == 1) {
            try {
                $carRepository = new CarRepository();
                $carsList = $carRepository->SelectCars();

                if (count($carsList) == 0) {
                    print "<br />Não há carros cadastrados por enquanto.";
                    print "<br /><a href='../Views/menu.php'>Voltar</a>";
                    exit;
                }

                print "<h1 style='text-align: center'>Listagem de carros</h1>";

                createHtmlTable($carsList);
                print "<br /><a href='../Views/menu.php'>Voltar</a>";
            }
            catch (Exception $ex) {
                print $ex->getMessage();
                print "<br /><a href='../Views/menu.php'>Voltar</a>";
            }
        }
        else if ($action == 2) {
            $car = new Car(htmlspecialchars($_POST["renavam"]), htmlspecialchars($_POST["carName"]), htmlspecialchars($_POST["color"]), htmlspecialchars($_POST["typeCar"]));
            $array_errors = getFormErrors($car);

            if (count($array_errors) > 0) {
                foreach ($array_errors as $value) {
                    echo "$value <br />";
                }
    
                print "<br /><a href='../Views/form.php'>Voltar</a>";
            }
            else {
                try {
                    $carRepository = new CarRepository();
                    $carRepository->InsertCar($car);
                    
                    header("Location: CarController.php?action=1");
                }
                catch (Exception $ex) {
                    print $ex->getMessage();
                    print "<br /><a href='../Views/form.php'>Voltar</a>";
                }
            }
        }
    }
?>
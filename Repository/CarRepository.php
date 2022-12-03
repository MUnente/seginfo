<?php
    include_once "../Models/Car.php";
    include_once "../Models/Connection.php";

    class CarRepository {
        public function InsertCar($car) {
            try {
                $conn = Connection::connect();

                $stmt = $conn->prepare("INSERT INTO car(renavam, carName, color, typeCarId) VALUES(:renavam, :carName, :color, :typeCarId)");
                $stmt->bindValue(":renavam", $car->getRenavam());
                $stmt->bindValue(":carName", $car->getCarName());
                $stmt->bindValue(":color", $car->getColor());
                $stmt->bindValue(":typeCarId", $car->getTypeCarId());

                $stmt->execute();
            }
            catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        }

        public function SelectCars() {
            try {
                $carsList = array();
                $conn = Connection::connect();

                $data = $conn->query("SELECT * FROM car")->fetchAll();

                foreach ($data as $row) {
                    $car = new Car($row["renavam"], $row["carName"], $row["color"], $row["typeCarId"]);
                    array_push($carsList, $car);
                }

                return $carsList;
            } 
            catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        }
    }
?>
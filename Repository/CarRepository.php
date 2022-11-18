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
    }
?>
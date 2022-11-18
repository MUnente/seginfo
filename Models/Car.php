<?php
    class Car {
        private $renavam;
        private $carName;
        private $color;
        private $typeCarId;

        public function __construct($renavam, $carName, $color, $typeCarId) {
            $this->renavam = $renavam;
            $this->carName = $carName;
            $this->color = $color;
            $this->typeCarId = $typeCarId;
        }

        public function getRenavam() {
            return $this->renavam;
        }

        public function setRenavam($renavam) {
            $this->renavam = $renavam;
        }

        public function getCarName() {
            return $this->carName;
        }

        public function setCarName($carName) {
            $this->carName = $carName;
        }

        public function getColor() {
            return $this->color;
        }

        public function setColor($color) {
            $this->color = $color;
        }

        public function getTypeCarId() {
            return $this->typeCarId;
        }

        public function setTypeCarId($typeCarId) {
            $this->typeCarId = $typeCarId;
        }
    }
?>
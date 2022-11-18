<?php
    class Connection {
        public static function connect() {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=cars", "root", "");
                return $conn;
            }
            catch (Exception $ex) {
                print $ex->getMessage();
                exit;
            }
        }
    }
?>
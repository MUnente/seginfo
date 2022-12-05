<?php
    include_once "../Models/User.php";
    include_once "../Models/Connection.php";

    class UserRepository {
        public function Login($user) {
            try {
                $userResult = new User();
                $conn = Connection::connect();

                $stmt = $conn->prepare("SELECT id, username FROM user WHERE email = :emailLogin AND password = SHA2(:passwordLogin, 256)");
                $stmt->bindValue(":emailLogin", $user->getEmail());
                $stmt->bindValue(":passwordLogin", $user->getPassword());
                
                $stmt->execute();

                if ($stmt->rowCount() <= 0)
                    return null;
                
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $userResult->setId($rs->id);
                    $userResult->setUsername($rs->username);
                }

                return $userResult;
            } 
            catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        }

        public function Register($user) {
            try {
                $userResult = new User();
                $conn = Connection::connect();
                
                $stmt = $conn->prepare("INSERT INTO user(username, email, password) VALUES(:usernameRegister, :emailRegister, SHA2(:passwordRegister, 256))");
                $stmt->bindValue(":usernameRegister", $user->getUsername());
                $stmt->bindValue(":emailRegister", $user->getEmail());
                $stmt->bindValue(":passwordRegister", $user->getPassword());

                $stmt->execute();
            }
            catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        }

        
    }
?>
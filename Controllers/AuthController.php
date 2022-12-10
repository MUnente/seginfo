<?php
    include_once "../Models/User.php";
    // include_once "../Models/EAuthType.php";
    include_once "../Repository/UserRepository.php";

    if (isset($_GET['action']))
        $action = intval($_GET['action']);
    else
        $action = 0;

    function getFormErrors($user, $typeForm) {
        $array_errors = array();

        if ($typeForm == 2) {
            if (trim($user->getUsername()) == "") {
                array_push($array_errors, "Nome é requerido");
            }
        }
        
        if (trim($user->getEmail()) == "") {
            array_push($array_errors, "E-mail é requerido");
        }
        
        if (trim($user->getPassword()) == "") {
            array_push($array_errors, "Senha é requerida");
        }
        else {
            if (strlen($user->getPassword()) != 8) {
                array_push($array_errors, "Senha precisa conter 8 caracteres");
            }
        }

        return $array_errors;
    }

    function saveUserInSession($userResult) {
        session_start();
        
        $_SESSION = array();
        $_SESSION['id'] = $userResult->getId(); 
        $_SESSION['username'] = $userResult->getUsername();
        $_SESSION['timeout'] = time();
        
        header("Location: ../Views/menu.php");
    }

    if ($action <= 0) {
        print "<br />URL inválida.";
        print "<br /><a href='../index.php'>Voltar</a>";
    }
    else {
        $userResult = new User();

        if ($action == 1) {
            try {
                $userForm = new User();
                $userForm->setEmail(htmlspecialchars($_POST["email"]));
                $userForm->setPassword(htmlspecialchars($_POST["password"]));
                $array_errors = getFormErrors($userForm, $action);
                
                if (count($array_errors) > 0) {
                    foreach ($array_errors as $value) {
                        echo "$value <br />";
                    }
        
                    print "<br /><a href='../index.php'>Voltar</a>";
                }
                else {
                    $userRepository = new UserRepository();
                    $userResult = $userRepository->Login($userForm);

                    if (is_null($userResult)) {
                        print "<br />Usuário não encontrado.";
                        print "<br /><a href='../index.php'>Voltar</a>";
                        exit;
                    }
                    
                    saveUserInSession($userResult);
                }
            }
            catch (Exception $ex) {
                print $ex->getMessage();
                print "<br /><a href='../index.php'>Voltar</a>";
            }
        }
        else if ($action == 2) {
            try {
                $userForm = new User();
                $userForm->setUsername(htmlspecialchars($_POST["username"]));
                $userForm->setEmail(htmlspecialchars($_POST["email"]));
                $userForm->setPassword(htmlspecialchars($_POST["password"]));
                $array_errors = getFormErrors($userForm, $action);
    
                if (count($array_errors) > 0) {
                    foreach ($array_errors as $value) {
                        echo "$value <br />";
                    }
        
                    print "<br /><a href='../index.php'>Voltar</a>";
                }
                else {
                    $userRepository = new UserRepository();
                    $userRepository->Register($userForm);

                    print "<br />Usuário cadastrado com sucesso. Por favor, faça o login para acessar o sistema.";
                    print "<br /><a href='../index.php'>Voltar</a>";
                }
            }
            catch (Exception $ex) {
                print $ex->getMessage();
                print "<br /><a href='../index.php'>Voltar</a>";
            }
        }
        else if ($action == 3) {
            session_start();
            session_destroy();
            header('Location: ../index.php');
        }
    }
?>
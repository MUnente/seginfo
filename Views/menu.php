<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Sistema de Carros</title>

    </head>
    <body>
        <?php
            include("../Services/session.php");

            print "<h1 style='text-align: center'>Sistema de carros</h1>";

            print "<h2>Olá, ".$_SESSION['username']."</h2>";

            print "<a href='../Controllers/CarController.php?action=1'>Listar carros cadastrados</a>";
            print "<br /><a href='./form.php'>Cadastrar carro</a>";
            print "<br /><a href='../Controllers/AuthController.php?action=3'>Logout</a>";
        ?>

    </body>
</html>


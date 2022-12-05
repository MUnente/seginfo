<?php
    $limitTime = 120;

    session_start();

    if (!isset($_SESSION['id'])) {
        print "<h2>Área restrita</h2>";
        print "<p><a href='../index.php'>Voltar</a></p>";
        exit;
    }
    else {
        $expire = time() - $_SESSION['timeout'];

        if ($expire > $limitTime) {
            session_destroy();
            header("Location: ../index.php");
        }
    }

    $_SESSION['timeout'] = time();
?>
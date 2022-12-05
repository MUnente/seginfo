<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Autenticação</title>

        <style>
            .title {
                text-align: center;
            }

            .container {
                display: flex;
                justify-content: center;
            }

            .form_container + .form_container {
                margin-left: 100px;
            }
            
            .row {
                display: flex;
            }

            .row + .row {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <h1 class="title">Autenticação do sistema</h1>
        <section class="container">
            <section class="form_container">
                <h2>Login</h2>
                <form action="./Controllers/AuthController.php?action=1" method="post">
                    <div class="row">
                        <label for="email">E-mail:&nbsp</label>
                        <input type="email" name="email" maxlength="30" />
                    </div>
                    <div class="row">
                        <label for="password">Senha:&nbsp</label>
                        <input type="password" name="password" maxlength="8" />
                    </div>
                    <div class="row">
                        <button type="Submit">Logar</button>
                    </div>
                </form>
            </section>
            <section class="form_container">
                <h2>Registrar conta</h2>
                <form action="./Controllers/AuthController.php?action=2" method="post">
                    <div class="row">
                        <label for="username">Nome:&nbsp</label>
                        <input type="text" name="username" maxlength="15" />
                    </div>
                    <div class="row">
                        <label for="email">E-mail:&nbsp</label>
                        <input type="email" name="email" maxlength="30" />
                    </div>
                    <div class="row">
                        <label for="password">Senha:&nbsp</label>
                        <input type="password" name="password" maxlength="8" />
                    </div>
                    <div class="row">
                        <button type="Submit">Registrar</button>
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>


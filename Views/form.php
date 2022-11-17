<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cadastro de Carros</title>

        <style>
            .title {
                text-align: center;
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
        <h1 class="title">Cadastro de Carros</h1>
        
        <form action="./Controllers/carController.php" method="post">
            <div class="row">
                <label for="renavam">Renavam:&nbsp</label>
                <input type="text" name="renavam" maxlength="11" />
            </div>
            <div class="row">
                <label for="carName">Nome:&nbsp</label>
                <input type="text" name="carName" maxlength="50" />
            </div>
            <div class="row">
                <label for="carColor">Cor do carro:&nbsp</label>
                <input type="text" name="carColor" maxlength="20" />
            </div>
            <div class="row">
                <label for="typeCar">Tipo de carro:&nbsp</label>
                <select name="typeCar">
                    <option>--Selecione--</option>
                    <option value="1">SUV</option>
                    <option value="2">Sedan</option>
                    <option value="3">Hatch</option>
                </select>
            </div>
            <div class="row">
                <button type="Submit">Cadastrar</button>
            </div>
        </form>
    </body>
</html>

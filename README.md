# Seginfo - Cars

Este é um projeto destinado ao trabalho da matéria de Segurança da Informação do 6° semestre do curso de Análise e Desenvolvimento de Sistemas do IFSP - Campus Capivari. O projeto foi desenvolvido utilizando a linguagem PHP (Versão 8), banco de dados MySQL e o pacote de serviços XAMPP.

Para a execução do projeto, é necessário:
- Ter instalado em sua máquina o pacote de serviços XAMPP ou WampServer (ou outros similares);
- Execute os serviços Apache e o SGBD MySQL;
- Caso você esteja utilizando o XAMPP, coloque a pasta do projeto no diretório `/opt/lampp/htdocs`. Caso esteja utilizando outro serviço, busque saber onde fica o diretório htdocs do seu serviço;
- Pegue o script presente no diretório `./.github/cars.sql` e execute-o no serviço PHPMyAdmin para a criação da base de dados;
- Após isso, acesse, em seu navegador, a URL `https://localhost/seginfo`.

Observações:
- Se o projeto apresentar "Permissão Negada", talvez seja necessário dar permissão a pasta inteira do projeto em seu sistema. Se você estiver rodando em Linux, você poderá executar o comando `sudo chmod -r 777 seginfo`;
- O sistema foi desenvolvido para acessar o banco de dados através do usuário Root, sem nenhuma senha. Caso o seu MySQL esteja configurado com um usuário e você deseja utilizá-lo neste projeto, acesse o diretório deste repositório `./Models/Connection.php`. Na linha 5, no parâmetro onde está escrito "root", altere para o nome do seu usuário e no último parâmetro informe a senha desse mesmo usuário.

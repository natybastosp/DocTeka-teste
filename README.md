<h1 align="center">:file_cabinet:README.md</h1>

## :memo: Descrição

Este projeto tem o objetovo de receber uma tabela me CSV, e então salvar os dados em um bando de dados.

## :books: Funcionalidades

-   <b>Index.html </b>: Página inicial do projeto. Está pagina utiliza HTML e CSS para a estilização. Nela temos um formulário que recebe os dados do usuário e os envia para o arquivo process_csv.php.

-   <b>style.css </b>: Arquivo de estilização da página.Utiliza CSS para a estilização do index.html.

-   <b>server.php </b>: Arquivo que recebe os dados do formulário e salva no banco de dados. (de forma manual). Caractereisticas do codigo:

    -   Define as configurações do banco de dados, incluindo o host, nome do banco de dados, nome de usuário e senha.

    -   Especifica o caminho para um arquivo CSV que será lido e processado.
    -   Tenta estabelecer uma conexão com o banco de dados MySQL usando as configurações fornecidas.
    -   Configura o tratamento de erros para que as exceções sejam lançadas em caso de problemas.
    -   Abre o arquivo CSV para leitura.
    -   Define o delimitador de campo para vírgula.
    -   Pula a primeira linha do arquivo CSV, que é geralmente o cabeçalho.
    -   Substitui vírgulas por pontos nos valores do peso e do custo para garantir que sejam números -cimais válidos.
    -   Exibe os dados extraídos para cada linha do CSV.

    -   Cria uma consulta SQL para inserir os dados no banco de dados na tabela "frete".
    -   Prepara e executa a consulta SQL usando o PDO (PHP Data Objects).
    -   Fecha o arquivo CSV após concluir a leitura e inserção de dados.
    -   Se tudo correr bem, exibe uma mensagem indicando que os dados do arquivo CSV foram inseridos no banco de dados.
    -   Em caso de erro, mostra uma mensagem de erro com informações detalhadas sobre o problema.

-   <b>process_csv.php </b>: Tentativa de receber os dados do formulário e salvar no banco de dados. (de forma automática)
    -   Recebe o arquivo CSV, vindo do fomulario do index.html e salva em uma variável.
    -   Define as configurações do banco de dados, incluindo o host, nome do banco de dados, nome de usuário e senha.
    -   Tenta estabelecer uma conexão com o banco de dados MySQL usando as configurações fornecidas.
    -   Seu comportamento se assemelha ao do server.php, porém não foi possível fazer a conexão com o banco de dados.

## :wrench: Tecnologias utilizadas

-   HTML
-   CSS
-   PHP
-   Laravel
-   MYSQL
-   Vue.js

## :rocket: Rodando o projeto

Para rodar o repositório é necessário clonar o mesmo, dar o seguinte comando para iniciar o projeto:

```
git clone https://github.com/natybastosp/DocTeka-teste.git
```

Para instalar e inicar o MYSQL

```
sudo apt install mysql-server
```

```
sudo systemctl start mysql.service
```

```
sudo mysql
```

```
sudo apt install software-properties-common
```

Para configurar o MYSQL

```
sudo systemctl status mysql
```

```
sudo service mysql start
```

```
CREATE TABLE frete (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_postcode VARCHAR(255),
    to_postcode VARCHAR(255),
    from_weight DECIMAL(10, 2),
    to_weight DECIMAL(10, 2),
    cost DECIMAL(10, 2)
);
CREATE USER 'naty'@'localhost' IDENTIFIED BY 'naty123';
GRANT ALL ON pricetable.* TO 'naty'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;
```

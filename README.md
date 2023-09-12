<h1 align="center">:file: README.md</h1>

## :memo: Descrição

Este projeto tem o objetovo de receber uma tabela me CSV, e então salvar os dados em um bando de dados.

## :books: Funcionalidades

-   <b>Index.html </b>: Página inicial do projeto.
-   <b>style.css </b>: Arquivo de estilização da página.
-   <b>server.php </b>: Arquivo que recebe os dados do formulário e salva no banco de dados. (de forma manual)
-   <b>process_csv.php </b>: Tentativa de receber os dados do formulário e salvar no banco de dados. (de forma automática)

## :wrench: Tecnologias utilizadas

-   HTML
-   CSS
-   PHP
-   Laravel
-   MYSQL

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

<?php

// Configurações do banco de dados
$host = 'localhost';
$dbname = 'pricetable';
$username = 'naty';
$password = 'naty123';

$arquivoCSV = __DIR__ . '/resources/assets/price-table.csv';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ler o arquivo CSV,
    $file = fopen($arquivoCSV, 'r');
    fgetcsv($file); // Ignorar a primeira linha (cabeçalho)

    while (($freight = fgetcsv($file, 0, ';')) !== false) { // Defina o delimitador como ';'
        $from_postcode = $freight[0];
        $to_postcode = $freight[1];
        $from_weight = $freight[2];
        $to_weight = $freight[3];
        $cost = $freight[4];

        // Substitua as vírgulas por pontos no campo de custo (separador decimal)
        $from_weight = str_replace(',','.', (str_replace('.', '', $from_weight)));
        $to_weight= str_replace(',', '.', (str_replace ('.', '', $to_weight)));
        $cost = str_replace(',', '.', $cost);


        echo "Inserindo dados para From Postcode: $from_postcode, To Postcode: $to_postcode, From Weight: $from_weight, To Weight: $to_weight, Cost: $cost\n";

        $queryMySQL = "INSERT INTO frete (from_postcode, to_postcode, from_weight, to_weight, cost) VALUES ('$from_postcode', '$to_postcode', '$from_weight', '$to_weight', '$cost')";

        $stmt = $pdo->prepare($queryMySQL);
        $stmt->execute();
    }

    fclose($file);
    echo "Dados do Arquivo CSV foram inseridos no Database '$dbname' na tabela frete";

} catch (PDOException $e) {
    die("Erro na execucao: " . $e->getMessage());
}

require_once __DIR__ . '/public/index.php';
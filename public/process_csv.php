<?php
// Check if a file was uploaded
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
    $uploadedFile = $_FILES['csvFile']['tmp_name'];

    // Your database configuration
    $host = 'localhost';
    $dbname = 'pricetable';
    $username = 'naty';
    $password = 'naty123';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Open the uploaded CSV file
        $file = fopen($uploadedFile, 'r');
        fgetcsv($file); // Ignore the first line (header)

        while (($freight = fgetcsv($file, 0, ',')) !== false) { // Assume CSV delimiter is a comma ","
            // Extract data from the CSV row
            $from_postcode = $freight[0];
            $to_postcode = $freight[1];
            $from_weight = $freight[2];
            $to_weight = $freight[3];
            $cost = $freight[4];

            // Substitua as vírgulas por pontos no campo de custo (separador decimal)
            $from_weight = str_replace(',', '.', (str_replace('.', '', $from_weight)));
            $to_weight = str_replace(',', '.', (str_replace('.', '', $to_weight)));
            $cost = str_replace(',', '.', $cost);

            // Prepare and execute the MySQL INSERT statement
            $queryMySQL = "INSERT INTO frete (from_postcode, to_postcode, from_weight, to_weight, cost) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($queryMySQL);
            $stmt->execute([$from_postcode, $to_postcode, $from_weight, $to_weight, $cost]);
        }

        fclose($file);

        // Redirect back to the HTML page with a success message
        header("Location: index.html?status=success");
        exit;

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    // Redirect back to the HTML page with an error message
    header("Location: index.html?status=error");
    exit;
}
?>
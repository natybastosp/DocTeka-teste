Route::get('/frete', function () {
try {
$host = 'localhost';
$dbname = 'pricetable';
$username = 'naty';
$password = 'naty123';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM frete";
$stmt = $pdo->query($query);
$freteData = $stmt->fetchAll(PDO::FETCH_ASSOC);

return view('frete.index', ['freteData' => $freteData]);
} catch (PDOException $e) {
die("Erro na execução: " . $e->getMessage());
}
});
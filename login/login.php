<?php
// Database credentials
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

// Check if POST data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tel = $_POST['tel'] ?? null;
    $pwd = $_POST['pwd'] ?? null;
	
	$tel = preg_replace('/[^\d+]/', '', $tel);


    if ($tel && $pwd) {
        // Validate credentials
        $stmt = $pdo->prepare("SELECT lead_id, clientphone FROM users WHERE clientphone = :tel AND clientpassword = :pwd");
        $stmt->execute([
            ':tel' => $tel,
            ':pwd' => $pwd,
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Set cookies
            setcookie('lead_id', $user['lead_id'], time() + (86400 * 30), "/"); // 30 days
            setcookie('clientphone', $user['clientphone'], time() + (86400 * 30), "/");

            echo json_encode(['status' => 'success', 'message' => 'Вход успешен']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Неверный телефон или пароль']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Требуется телефон и пароль']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Неверный метод запроса']);
}
?>

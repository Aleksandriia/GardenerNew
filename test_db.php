<?php
require_once 'config/db.php';

$database = new Database();
$conn = $database->getConnection();

echo "<h2>✅ Подключение к БД успешно!</h2>";
echo "<p>Версия PostgreSQL: " . $conn->getAttribute(PDO::ATTR_SERVER_VERSION) . "</p>";

// Проверим таблицы
$stmt = $conn->query("SELECT table_name FROM information_schema.tables 
                      WHERE table_schema = 'public' 
                      ORDER BY table_name");
$tables = $stmt->fetchAll();

echo "<h3>Найдено таблиц: " . count($tables) . "</h3>";
echo "<ul>";
foreach($tables as $table) {
    echo "<li>" . htmlspecialchars($table['table_name']) . "</li>";
}
echo "</ul>";
?>
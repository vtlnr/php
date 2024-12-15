<?php
// Подключение к базе данных
$conn = new mysqli('localhost', 'username', 'password', 'labwork');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $background_color = $_POST['background_color'];
    $font_color = $_POST['font_color'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, background_color, font_color) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $background_color, $font_color);
    $stmt->execute();
    $stmt->close();
}
?>
 

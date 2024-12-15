<?php
session_start();
$conn = new mysqli('localhost', 'username', 'password', 'labwork');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        setcookie("background_color", $user['background_color'], time() + (86400 * 30), "/");
        setcookie("font_color", $user['font_color'], time() + (86400 * 30), "/");
        header("Location: index.php");
    }
    $stmt->close();
}
?>
 

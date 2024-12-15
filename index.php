<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Пользователь авторизован
} else {
    // Перенаправление на страницу авторизации
    header("Location: login.php");
    exit; // Не забудьте добавить exit, чтобы остановить выполнение скрипта
}

$background_color = isset($_COOKIE['background_color']) ? $_COOKIE['background_color'] : 'white';
$font_color = isset($_COOKIE['font_color']) ? $_COOKIE['font_color'] : 'black';
?>
<style>
    body {
        background-color: <?php echo $background_color; ?>;
        color: <?php echo $font_color; ?>;
    }
</style>

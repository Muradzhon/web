<h1 style='color: green;'>Site<b>1.net</b></h1>
<?php
$servername = "db";
$database = "MYDB";
$username = "testuser";
$password = "testuser";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>
<?php phpinfo(); ?>


<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "gry";
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "error: " . mysqli_connect_error();
}
$sql = "INSERT INTO gry VALUES ('Call of Duty: Modern Warfare II', 'Reboot serii FPS, oferujący realistyczną kampanię fabularną...', 190, 150, 'callOfDuty2.jpg');";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "piekarnia";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    echo "error: " . mysqli_connect_error();
}
$sql = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM `wyroby` WHERE Rodzaj = 'INNE';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "$row[Rodzaj], $row[Nazwa], $row[Gramatura], $row[Cena]<br>";
    }
}
mysqli_close($conn);


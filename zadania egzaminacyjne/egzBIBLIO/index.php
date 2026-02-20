<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteka</title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteka";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo "blad serwera: " . $conn->connect_error;
}
$sql = "SELECT tytul, id_cz, data_odd FROM `ksiazka` JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY wypozyczenia.data_odd ASC LIMIT 15;
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "$row[tytul]:, $row[id_cz], $row[data_odd]<br>";
    }
}
$conn->close();
?>
</body>
</html>

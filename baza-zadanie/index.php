<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>baza</title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "medica";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu 
    ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["nazwa"];
        echo " ";
        echo $row["cecha"];
        echo "<br>";
    }
}
mysqli_close($conn);
?>
</body>
</html>

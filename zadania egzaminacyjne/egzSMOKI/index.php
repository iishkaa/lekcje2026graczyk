<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "smoki";
    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT nazwa, dlugosc, szerokosc FROM `smok` WHERE pochodzenie = 'Polska';
    ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "$row[nazwa]: $row[dlugosc], $row[szerokosc]<br>";
        }
    }
    mysqli_close($conn);
?>


</body>
</html>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="obraz2.png">
    <link rel="stylesheet" href="styl.css">
    <title>Przychodnia
        Medica</title>
</head>
<body>
<header>
    <h1>Abonamenty w przychodni
        Medica”</h1>
</header>
<article>
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "medica";
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT nazwa, cena, opis FROM abonamenty;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h3>Pakiet" ." " . $row["nazwa"] . "- cena ". $row["cena"] . "</h3><br>";
            echo "<p>" . $row["opis"] . "</p>";
        }
    }
    mysqli_close($conn);
?>
    <a href="opis.php">Dowiedz się więcej</a>
</article>
<main>
    <section><h2>Standardowy</h2>
        <ul>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "medica";
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT nazwa, cecha FROM abonamenty JOIN
    szczegolyabonamentu ON abonamenty.id = Abonamenty_id 
    JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["cecha"] . "</li>";
                }
            }
            mysqli_close($conn);
            ?>
        </ul></section>

    <section>
        <h2>Premium</h2>
        <ul>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "medica";
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT nazwa, cecha FROM abonamenty JOIN
    szczegolyabonamentu ON abonamenty.id = Abonamenty_id 
    JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["cecha"] . "</li>";
                }
            }
            mysqli_close($conn);
            ?>
        </ul>
    </section>
    <section><h2>Dziecko</h2>
        <ul>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "medica";
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT nazwa, cecha FROM abonamenty JOIN
    szczegolyabonamentu ON abonamenty.id = Abonamenty_id 
    JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["cecha"] . "</li>";
                }
            }
            mysqli_close($conn);
            ?>
        </ul>
    </section>
</main>
<footer>
    <p><img src="obraz2.png" alt="przychodnia">
    Stronę przygotował: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

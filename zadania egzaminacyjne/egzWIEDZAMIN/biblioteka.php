<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
</header>
<section>
    <h3>Nasze dzisiejsze propozycje:</h3>
    <table>
        <tr>
            <th>Autor</th>
            <th>Tytuł</th>
            <th>Katalog</th>
        </tr>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "biblioteka";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }
        $sql = "SELECT * FROM `ksiazki` ORDER BY RAND() LIMIT 5;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["autor"] . "</td>";
                echo "<td>" . $row["tytul"] . "</td>";
                echo "<td>" . $row["kod"] . "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($conn);
        ?>
    </table>
</section>
<main>
    <article class="one">
        <img src="ksiazka1.jpg" alt="okładka książki"><br>
        <p>Według różnych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.
        </p>
    </article>
    <article class="two">
        <img src="ksiazka2.jpg" alt="okładka książki"><br>
        <p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...
        </p>
    </article>
    <article class="three">
        <img src="ksiazka3.jpg" alt="okładka książki"><br>
        <p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...
        </p>
    </article>
</main>
<footer>
    <p>Stronę wykonał: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

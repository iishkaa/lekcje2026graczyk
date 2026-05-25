<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Serwis konfiguracji samochodów</h1>
</header>
<nav>
    <h2>Samochody</h2>
    <h2>Konfigurator</h2>
    <h2>Kontakt</h2>
</nav>
<main>
    <section class="left">
        <table>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "samochody";
            $conn = new mysqli($host, $user, $password, $db);
            if ($conn->connect_error) {
                echo "error: " . $conn->connect_error;
            }
            $sql = "SELECT pojazdy.marka, pojazdy.model, pojazdy.cena,kolory.nazwa, kolory.doplata FROM `pojazdy` JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = 'alfa';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $cena = $row["cena"];
                    $doplata = $row["doplata"];
                    $cenaCalkowita = $cena + $doplata;
                    echo "<tr>";
                    echo "<td>" . $row["marka"] . "</td>";
                    echo "<td>" . $row["model"] . "</td>";
                    echo "<td>" . $row["nazwa"] . "</td>";
                    echo "<td>" . $cenaCalkowita . "</td>";


                }
            }
            mysqli_close($conn);
            ?>

        </table>
    </section>
    <section class="between">
        <table>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "samochody";
            $conn = new mysqli($host, $user, $password, $db);
            if ($conn->connect_error) {
                echo "error: " . $conn->connect_error;
            }
            $sql1 = "SELECT  marka, model, cena FROM `pojazdy` ORDER BY RAND() LIMIT 1;";
            $sql3 = "SELECT  marka, model, cena FROM `pojazdy` ORDER BY RAND() LIMIT 1;";
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql3);
            if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                    $marka1 = $row["marka"];
                    $model1 = $row["model"];
                    $cena1 = $row["cena"];
                }
            }
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    $marka2 = $row["marka"];
                    $model2 = $row["model"];
                    $cena2 = $row["cena"];
                }
            }
            mysqli_close($conn);
            ?>
            <tr>
                <th colspan="2">Konfiguracja</th>
                <th>Cena</th>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="a1.jpg" alt="Konfiguracja 1">
                </td>
            </tr>
            <tr>
                <!--skrypt-->
                <td>Marka</td>
                <td>
                    <?php
                        echo $marka1;
                    ?>
                </td>
                <td rowspan="2">
                    <?php
                        echo $cena1;
                    ?>
                </td>
            </tr>
            <tr>
                <!--skrypt-->
                <td>Model</td>
                <td>
                    <?php
                        echo $model1
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="a2.jpg" alt="Konfiguracja 2">
                </td>
            </tr>
            <tr>
                <!--skrypt-->
                <td>Marka</td>
                <td>
                    <?php
                        echo $marka2;
                    ?>
                </td>
                <td rowspan="2">
                    <?php
                    echo $cena2;
                    ?>
                </td>
            </tr>
            <tr>
                <!--skrypt-->
                <td>Model</td>
                <td>
                    <?php
                        echo $model2;
                    ?>
                </td>
            </tr>
        </table>
    </section>
    <section class="right">
        <h3>111 222 333</h3>
        <img src="a3.png" alt="Samochód">
    </section>
</main>
<footer>
    <p>Stronę wykonał: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

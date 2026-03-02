<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<main>
    <aside>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "opony";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM opony ORDER BY cena ASC LIMIT 10";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $producent = $row['producent'];
            $model = $row['model'];
            $sezon = $row['sezon'];
            $cena = $row['cena'];

            if ($sezon == 'letnia') {
                $obraz = 'lato.png';
            } elseif ($sezon == 'zimowa') {
                $obraz = 'zima.png';
            } else {
                $obraz = 'uniwer.png';
            }

            echo '<div class="opona">';
            echo '<img src="' . $obraz . '" alt="' . $sezon . '">';
            echo '<h4>Opona: ' . $producent . ' ' . $model . '</h4>';
            echo '<h3>Cena: ' . $cena . '</h3>';
            echo '</div>';
        }
        mysqli_close($conn);
        ?>
        <p><a href="https://opona.pl/">więcej ofert</a> </p>
    </aside>

    <section class="one">
        <img src="opona.png" alt="Opona">
        <h2>Opona dnia</h2>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "opony";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $producent = $row['producent'];
            $model = $row['model'];
            $sezon = $row['sezon'];
            $cena = $row['cena'];

            echo '<h2>' . $producent . ' model ' . $model . '</h2>';
            echo '<h2>Sezon: ' . $sezon . '</h2>';
            echo '<h2>Tylko ' . $cena . ' zł!</h2>';
        }
        mysqli_close($conn);
        ?>
    </section>
    <section class="two">
        <h2>Najnowsze zamówienie</h2>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "opony";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT zamowienie.id, zamowienie.ilosc, opony.model, opony.cena 
           FROM zamowienie 
           JOIN opony ON zamowienie.nr_kat = opony.nr_kat 
           ORDER BY RAND() 
           LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $ilosc = $row['ilosc'];
            $model = $row['model'];
            $cena = $row['cena'];
            $wartosc = $ilosc * $cena;

            echo '<h2>' . $id . ' ' . $ilosc . ' sztuki modelu ' . $model . '</h2>';
            echo '<h2>Wartość zamówienia ' . $wartosc . ' zł</h2>';
        } else {
            echo '<h2>Brak zamówień w bazie</h2>';
        }
        mysqli_close($conn);
        ?>
    </section>
</main>
<footer>
    <p>Stronę wykonał: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

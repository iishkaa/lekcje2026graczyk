<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>System informacji dla
        maturzystów</h1>
</header>
<aside>
    <img src="ma.jpg" alt="Matura">
    <img src="tu.jpg" alt="Matura">
    <img src="ra.jpg" alt="Matura">
</aside>
<section class="one">
    <h3>Wybierz ucznia z listy:</h3>
    <?php
        $conn4 = new mysqli("localhost", "root", "", "matura");
        if ($conn4->connect_error){
            echo "error: " . mysqli_connect_error();
        }
        $sql4 = "SELECT id, imie, nazwisko FROM `maturzysta` WHERE szkola = 'T3' ORDER BY nazwisko ASC;";
        $result4 = $conn4->query($sql4);
        if ($result4->num_rows > 0){
            while ($row = $result4->fetch_assoc()){
                $id = $row["id"];
                $imie = $row["imie"];
                $nazwisko = $row["nazwisko"];
                echo "<a href='wynik.php?id=$id&imie=$imie&nazwisko=$nazwisko'>$id. $imie $nazwisko</a><br>";
            }
        }
    ?>
</section>
<section class="two">
    <section class="bloki">
        <h4>Przedmioty</h4>
        <?php
            $conn = new mysqli("localhost", "root", "", "matura");
            if ($conn->connect_error){
                echo "error: " . mysqli_connect_error();
            }
            $sql = "SELECT DISTINCT przedmiot FROM `arkusz`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $przedmiot = $row["przedmiot"];
                    echo $przedmiot . " ";
                }
            }
            $conn->close();
        ?>
    </section>
    <section class="bloki">
        <h4>Lata</h4>
        <?php
            $conn1 = new mysqli("localhost", "root", "", "matura");
            if ($conn1->connect_error){
                echo "error" . mysqli_connect_error();
            }
            $sql1 = "SELECT MIN(rok), MAX(rok) FROM `arkusz`;";
            $result1 = $conn1->query($sql1);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()){
                    $najstarsza = $row["MIN(rok)"];
                    $najmlodsza = $row["MAX(rok)"];
                        echo $najstarsza . " - " . $najmlodsza;
                }
            }
            $conn1->close();
        ?>
    </section>
    <section class="bloki">
        <h4>Najlepszy wynik</h4>
        <?php
            $conn2 = new mysqli("localhost", "root", "", "matura");
            if ($conn2->connect_error){
                echo "error:" . mysqli_connect_error();
            }
            $sql2 = "SELECT maturzysta_id AS id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
            $result2 = $conn2->query($sql2);
            if ($result2->num_rows > 0){
                while ($row = $result2->fetch_assoc()){
                    $najlepszyWynik = $row["Wynik"];
                    echo $najlepszyWynik . "%";
                }
            }
            $conn2->close();
        ?>
    </section>
    <section class="bloki">
        <h4>Najgorszy wynik</h4>
        <?php
            $conn3 = new mysqli("localhost", "root", "", "matura");
            if ($conn3->connect_error){
                echo "error: " . mysqli_connect_error();
            }
            $sql3 = "SELECT maturzysta_id AS id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";
            $result3 = $conn3->query($sql3);
            if ($result3->num_rows > 0){
                while ($row = $result3->fetch_assoc()){
                    $najgorszyWynik = $row["Wynik"];
                    echo $najgorszyWynik . "%";
                }
            }
            $conn3->close();
        ?>
    </section>
</section>
<footer>
    <p>Stronę wykonał: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

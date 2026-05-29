<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Zdrowy bazarek</h1>
</header>
<nav>
    <?php
    $conn = new mysqli("localhost", "root", "", "bazar");
    if ($conn->connect_error){
        echo "error" . mysqli_connect_error();
    }
    $sql = "SELECT nazwa, plik FROM `towar` LIMIT 10;";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $nazwa = $row["nazwa"];
            $plik = $row["plik"];
            echo "<img src=" . '"' . $plik . '"' . "alt=" . '"' . $nazwa . '"' . ">";
        }
    }
    ?>
</nav>
<main>
    <aside>
        <img src="market.png" alt="bazarek">
    </aside>
    <section>
        <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>
        <form action="" method="post">
            <select name="owoc" id="owoc">
                <option value=""></option>
                <?php
                    $conn = new mysqli("localhost", "root", "", "bazar");
                    if ($conn->connect_error){
                        echo "error: " . mysqli_connect_error();
                    }
                    $sql = "SELECT id, nazwa FROM `towar`;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $id = $row["id"];
                            $nazwa = $row["nazwa"];
                            echo "<option value=" . '"' . $id . '"' . ">" . $nazwa . "</option>";
                        }
                    }
                ?>
            </select>
            <input type="number" name="liczbaOwocow" id="liczbaOwocow">
            <input type="submit" value="Wyślij" name="btn" id="btn"> <!--wysylka do skrypt3-->
        </form>
        <?php

        if (isset($_POST["btn"])){
            $towarId = $_POST["owoc"];
            $kg = $_POST["liczbaOwocow"];

            $conn1 = new mysqli("localhost", "root", "", "bazar");

            if ($conn1->connect_error){
                die("Błąd połączenia: " . $conn1->connect_error);
            }

            $sql1 = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $towarId";

            $result1 = $conn1->query($sql1);

            if ($result1->num_rows > 0){

                $row = $result1->fetch_assoc();

                $rodzaj = $row["rodzaj"];
                $nazwa = $row["nazwa"];
                $cena = $row["cena"];

                $wartosc = $cena * $kg;

                echo "<p>$rodzaj $nazwa wartość: $wartosc zł</p>";

                $sql2 = "INSERT INTO zamowienie(id_towar, id_sklep, liczba_kg)
         VALUES($towarId, 2, $kg)";

                $conn1->query($sql2);
            }

            $conn1->close();
        }

        ?>
    </section>
</main>
<footer>
    <p>Stronę opracował: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

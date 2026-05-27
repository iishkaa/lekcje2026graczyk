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
            <input type="number" name="liczbaOwocow">
            <button>Zamów</button> <!--wysylka do skrypt3-->
        </form>
        <!--skrypt3-->
    </section>
</main>
<footer>
    <p>Stronę opracował: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>

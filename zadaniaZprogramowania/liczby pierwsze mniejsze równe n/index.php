<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liczby pierwsze mniejsze równe n</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <h1>Liczby pierwsze mniejsze równe n</h1>
    <h2>Michalina Wolna 3p_2</h2>
    <hr>
<p>Napisz program, który dla danej liczby n podanej przez użytkownika
        wyświetla wszystkie liczby pierwsze mniejsze lub równe n . Liczba pierwsza to
        liczba naturalna większa od 1, która dzieli się tylko przez 1 i
        samą siebie. Użytkownik wprowadza n w formularzu, a program
        weryfikuje, czy jest to liczba całkowita dodatnia, znajduje
        liczby pierwsze i wyświetla je w czytelny sposób.
</p>
<p>
        Wskazówki dla ucznia:
        Zweryfikuj, czy n jest liczbą całkowitą dodatnią za pomocą is_numeric() i sprawdzenia, czy po konwersji na int nie traci wartości.
        Sprawdź, czy n jest większe od 1, ponieważ liczby pierwsze zaczynają się od 2.
        Dla każdej liczby od 2 do n sprawdź, czy jest pierwsza, testując podzielność przez liczby nieparzyste od 3 do pierwiastka z tej liczby, pomijając liczby parzyste (oprócz 2).
        Jeśli n jest bardzo duże, rozważ użycie Sita Eratostenesa, ale pamiętaj o ograniczeniach pamięci – możesz dodać limit na n (np n <= 1000000).
        Wyświetl liczby pierwsze w elemencie pre dla zachowania formatowania.
        Zabezpiecz dane wejściowe za pomocą htmlspecialchars() przy pobieraniu, aby chronić przed XSS.
</p>

</section>
<section>
    <form action="" method="post">
        <fieldset>
            <legend>Podaj dane:</legend>
            <label for="number">Liczba n: </label><br>
            <input type="number" name="number" id="number">
            <input  type="submit" name="button" id="button" value="Znajdź liczby pierwsze">
        </fieldset>

    </form>

</section>
<section class="wynik">
    <?php
    if (isset($_POST['button'])) {
        $number = htmlspecialchars($_POST['number']);
        if (!is_numeric($number) || (int)$number != $number) {
            echo "Podaj liczbę całkowitą dodatnią!";
        }
        if ($number <= 1) {
            echo "Podaj liczbe wieksza od 1!";
        }
        elseif ($number > 1000000) {
            echo "Liczba jest za duża.";
        }
        echo "Liczba n : " . $number;
        echo "<br>";
        echo "Liczby pierwsze mniejsze lub równe $number:";
        echo "<br>";
        echo "<pre>";
        for ($i = 2; $i <= $number; $i++) {
            $pierwsza = true;
            if ($i == 2) {
                echo $i . ", ";
                continue;
            }

            if ($i % 2 == 0) {
                continue;
            }

            for ($j = 3; $j <= sqrt($i); $j += 2) {

                if ($i % $j == 0) {
                    $pierwsza = false;
                    break;
                }
            }

            if ($pierwsza) {
                echo $i . ", ";
            }
        }

        echo "</pre>";
    }
    ?>
</section>
</body>
</html>

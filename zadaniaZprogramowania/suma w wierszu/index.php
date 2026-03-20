<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suma w wierszu</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<section>
    <h1>Zadanie 97 - suma w wierszu</h1>
    <h2>Michalina Wolna 3p_2</h2>
    <hr>
    <p>Napisz program, który wczytuje liczby do tablicy o wymiarach n x m i
        oblicza sumę wartości we wskazanym wierszu. Numer wiersza podaje użytkownik (numerowanie od 0).
        Użytkownik wprowadza n, m, liczby do komponentu textarea oddzielone przecinkami oraz numer wiersza.
        Program powinien zweryfikować, czy n, m i numer wiersza są liczbami całkowitymi, czy podane wartości
        są liczbami,
        czy ich liczba zgadza się z n x m, a następnie wyświetlić tablicę i sumę wartości w wybranym wierszu.</p>
</section>
<section>
    <form action="" method="post">
        <fieldset>
            <legend>wymiary tablicy i wierszy:</legend>
            <label for="n">Liczba wierszy (n): </label><br>
            <input type="number" id="n" name="n"><br>
            <label for="m">Liczba kolumn (m): </label><br>
            <input type="number" id="m" name="m"><br>
            <label for="nrWiersza">Numer wiersza (0 do n-1): </label><br>
            <input type="number" id="nrWiersza" name="nrWiersza"><br>
        </fieldset>
        <br>
        <fieldset>
            <legend>Wartości tablicy (liczby oddzielone przecinkami): </legend>
            <textarea name="wartosciTab" id="wartosciTab" cols="30" rows="10"></textarea>
        </fieldset>
        <br>
        <input type="submit" value="Wyślij" name="submit" id="submit">
    </form>
    <br>
</section>
<?php
if (isset($_POST['submit'])) {
    $n = (int)$_POST['n'];
    $m = (int)$_POST['m'];
    $nrWiersza = (int)$_POST['nrWiersza'];
    $tabPrzed = $_POST["wartosciTab"];
    $tabPo = array_map('trim', explode(',', $tabPrzed));
    $tabPo = array_filter($tabPo, 'strlen');
    $result = '';
    if ($n <= 0 || $m <= 0) {
        $result = "Błąd: wymiary muszą być dodatnie!";
    }
    elseif (count($tabPo) !== $n * $m) {
        $result = "Błąd: liczba elementów nie zgadza się z n x m!";
    }
    else {
        foreach ($tabPo as $val) {
            if (!is_numeric($val)) {
                $result = "Błąd: wszystkie wartości muszą być liczbami!";
                break;
            }
        }
    }
    if ($result === '') {
        $tabPo = array_map('intval', $tabPo);
        $matrix = [];
        $index = 0;

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $matrix[$i][$j] = $tabPo[$index++];
            }
        }
        if ($nrWiersza < 0 || $nrWiersza >= $n) {
            $result = "Błąd: niepoprawny numer wiersza!";
        } else {
            $suma = array_sum($matrix[$nrWiersza]);

            $result = "Tablica:<br>";
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $m; $j++) {
                    $result .= $matrix[$i][$j] . " ";
                }
                $result .= "<br>";
            }

            $result .= "<br>Suma wiersza $nrWiersza = $suma";
        }
    }
    echo $result;
}
?>
</body>
</html>
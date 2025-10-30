<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h2><em>Koło szachowe gambit pionae</em></h2>
</header>

<section class="lewy">
    <h4>Polecane linki</h4>
    <ul>
        <li><a href="kwerenda1.png">kwerenda1</a></li>
        <li><a href="kwerenda2.png">kwerenda2</a></li>
        <li><a href="kwerenda3.png">kwerenda3</a></li>
        <li><a href="kwerenda4.png">kwerenda4</a></li>
    </ul>
    <img src="logo.png" alt="Logo koła">
</section>

<section class="prawy">
    <h3>Najlepsi gracze naszego koła</h3>

    <table>
        <tr>
            <th>Pseudonim</th>
            <th>Tytuł</th>
            <th>Ranking</th>
            <th>Klasa</th>
        </tr>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "szachy");

        $zapytanie1 = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy ORDER BY ranking DESC LIMIT 10";
        $wynik = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_assoc($wynik)) {
            echo "<tr>";
            echo "<td>{$wiersz['pseudonim']}</td>";
            echo "<td>{$wiersz['tytul']}</td>";
            echo "<td>{$wiersz['ranking']}</td>";
            echo "<td>{$wiersz['klasa']}</td>";
            echo "</tr>";
        }
        mysqli_free_result($wynik);
        ?>
    </table>

    <form method="POST">
        <input type="submit" name="losuj" value="Losuj nową parę graczy">
    </form>

    <?php
    if (isset($_POST['losuj'])) {
        $zapytanie2 = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
        echo "<h4>";
        while ($wiersz2 = mysqli_fetch_assoc($wynik2)) {
            echo $wiersz2['pseudonim'] . " " . $wiersz2['klasa'] . " ";
        }

    }

    mysqli_close($polaczenie);
    ?>

    <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
</section>

<footer>
    <p>Stronę wykonał: 123456789</p>
</footer>

</body>
</html>
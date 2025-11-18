<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
</header>

<section class="lewy">
    <h3>Konkursowe nagrody</h3>

    <form method="POST">
        <input type="submit" name="losuj" value="Losuj nowe nagrody">
    </form>

    <table>
        <tr>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
        </tr>

        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "konkurs");

        if ($polaczenie) {
            if (isset($_POST['losuj'])) {
                $zapytanie = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5";
            } else {
                $zapytanie = "SELECT nazwa, opis, cena FROM nagrody";
            }

            $wynik = mysqli_query($polaczenie, $zapytanie);

            while ($wiersz = mysqli_fetch_assoc($wynik)) {
                echo "<tr>";
                echo "<td>{$wiersz['nazwa']}</td>";
                echo "<td>{$wiersz['opis']}</td>";
                echo "<td>{$wiersz['cena']}</td>";
                echo "</tr>";
            }

            mysqli_free_result($wynik);
            mysqli_close($polaczenie);
        }
        ?>
    </table>
</section>

<section class="prawy">
    <img src="puchar.png" alt="Puchar dla wolontariusza">
    <h4>Polecane linki</h4>
    <ul>
        <li><a href="kwerenda1.png">Kwerenda1</a></li>
        <li><a href="kwerenda2.png">Kwerenda2</a></li>
        <li><a href="kwerenda3.png">Kwerenda3</a></li>
        <li><a href="kwerenda4.png">Kwerenda4</a></li>
    </ul>
</section>

<footer>
    <p>Numer zdającego: 123456789</p>
</footer>

</body>
</html>

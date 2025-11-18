<?php
$polaczenie = mysqli_connect("localhost", "root", "", "firma")
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Firma szkoleniowa</title>
</head>
<body>
    <header>
        <img src="baner.jpg" alt="Szkolenia">
    </header>
    <main>
        <menu>
            <ul>
                <li><a href=index.html>Strona główna</a>
                <li><a href=szkolenia.php>Szkolenia</a>
            </ul>
        </menu>
        <?php
        $zapytanie1 = "SELECT szkolenia.Data, szkolenia.Temat FROM szkolenia ORDER BY szkolenia.Data ASC";
        $wynik = mysqli_query($polaczenie, $zapytanie1);
        while ($data = mysqli_fetch_assoc($wynik)) {

            echo "<tr>";
            echo "<td>{$data['Data']} {$data['Temat']}</td>";
            echo "<br>";
            echo "</tr>";
        }
        mysqli_free_result($wynik);
        ?>
    </main>
    <footer>
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Zapraszamy do <em>udziału</em> w <em>szkoleniach</em> z branży IT</p>
    </footer>
</body>
</html>

<?php
mysqli_close($polaczenie)
?>
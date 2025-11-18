<?php
$polaczenie=mysqli_connect("localhost", "root", "", "mieszalnia")
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="icon" type="image/png" href="fav.png" sizes="32x32">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<img src="baner.png" alt="Mieszalnia farb">
    <form>
        <form method="POST">
        Data odbioru od:  <input type="date" name="data_odbioru">
        do:  <input type="date" name="do">      
        <input type="submit" value="wyszukaj">
    <?php
    if (isset($_POST['data'])) {
        $zapytanie2 = "SELECT k.nazwisko, k.imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON k.id = z.id_klienta WHERE z.data_odbioru BETWEEN '2021-11-05' AND '2021-11-07' ORDER BY z.data_odbioru ASC";
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);
    }
    ?>
    </form>
    <header>
        <table border=1>
            <th>Nr zamowienia</th>
            <th>Nazwisko</th>
            <th>Imię</th>
            <th>Kolor</th>
            <th>Pojemność [ml]</th>
            <th>Data odbioru</th>

        <?php
        $zapytanie1 = "SELECT k.nazwisko, k.imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM klienci k JOIN zamowienia z ON k.id = z.id_klienta ORDER BY z.data_odbioru ASC";
        $wynik = mysqli_query($polaczenie, $zapytanie1);
        while ($wiersz = mysqli_fetch_assoc($wynik)) {
            echo "<tr>";
            echo "<td>{$wiersz['id']}</td>";
            echo "<td>{$wiersz['nazwisko']}</td>";
            echo "<td>{$wiersz['imie']}</td>";
            echo "<td>{$wiersz['kod_koloru']}</td>";
            echo "<td>{$wiersz['pojemnosc']}</td>";
            echo "<td>{$wiersz['data_odbioru']}</td>";
            echo "</tr>";
        }
        mysqli_free_result($wynik);
        ?>
        </table>
    </header>
    <footer>
        <h3>Egzamin INF.03</h3>
        <a>Autor: 123456789</a>
    </footer>
</body>
</html>

<?php
mysqli_close($polaczenie)
?>
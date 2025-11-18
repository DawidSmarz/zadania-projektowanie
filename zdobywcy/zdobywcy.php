
<?php
$polaczenie=mysqli_connect('localhost', 'root', '', 'zdobywcy');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ZDOBYWCY GÓR</title>
</head>
<body>
    <header>
        <h1>Klub zdobywcyów gór polskich</h1>
    </header>
    <nav>
        <a href=kwerenda1>kwerenda1</a>
        <a href=kwerenda2>kwerenda2</a>
        <a href=kwerenda3>kwerenda3</a>
        <a href=kwerenda4>kwerenda4</a>
    </nav>

    <section class=lewy>
        <img src=logo.png alt="logo zdobywcy">
        <h3>razem z nami</h3>
        <ul>
        <li>wyjazdy</li>
        <li>szkolenia</li>
        <li>rekreacja</li>
        <li>wypoczynek</li>
        <li>wyzwania</li>
        </ul>
    </section>
    <aside class=prawy>
        <h2>Dołącz do naszego zespołu!</h2>
        <a>Wpisz swoje dane do formularza</a>
    <form method="POST" action="">
        Nazwisko: <input type="text" name="nazwisko">
        Imię: <input type="text" name="imie">
        Funkcja: <select name="funkcja">
        <option value="uczestnik">uczestnik</option>
        <option value="przewodnik">przewodnik</option>
        <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
        <option value="organizator">organizator</option>
        <option value="ratownik">ratownik</option>
</select>
        Email: <input type="email" name="mail">
        <input type="submit" name="zapisz" value="Dodaj">
    </form>
        <table border=1>
        <tr>
            <th>Nazwisko</th>
            <th>Imię</th>
            <th>Funkcja</th>
            <th>Email</th>
        </tr>
<?php
$qDane = "SELECT nazwisko, imie, funkcja, email FROM osoby";
$resDane = mysqli_query($polaczenie, $qDane);
if ($resDane) {
    while ($w = mysqli_fetch_assoc($resDane)){
        echo "<tr>";
        echo "<td>{$w['nazwisko']}</td>";
        echo "<td>{$w['imie']}</td>";
        echo "<td>{$w['funkcja']}</td>";
        echo "<td>{$w['email']}</td>";
        echo "</tr>";
    }
    mysqli_free_result($resDane);
}
?>
</table>

<?php
if (isset($_POST['zapisz'])){
    $nazwisko=$_POST['nazwisko'];
    $imie=$_POST['imie'];
    $funkcja=$_POST['funkcja'];
    $mail=$_POST['mail'];


$zapytanie="INSERT INTO osoby (nazwisko, imie, funkcja, email) VALUES ('$nazwisko', '$imie', '$funkcja', '$mail')";
if(mysqli_query($polaczenie, $zapytanie))
{
    echo"osoba dodana";
}
}
?>  
    </aside>
<footer>
    <p>Stronę wykonał: 123456789</p>
</footer>
</body>
</html>

<?php
mysqli_close($polaczenie);
?>
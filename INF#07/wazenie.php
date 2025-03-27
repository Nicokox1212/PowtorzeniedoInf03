<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Ważenie samochodów ciężarowych</title>
</head>
<body>
    <header>
        <section class="baner1">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section class="baner2">
        <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <section class="xd">
    <section class="lewy">
    <h2>Lokalizacje wag</h2>
    <ol>
        <?php 
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
            $zapytanie = "SELECT ulica FROM lokalizacje;";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            while($obiekt = mysqli_fetch_row($wynik)) {
                echo '<li>'.$obiekt[0].'</li>';
            }
            mysqli_close($polaczenie);

        ?>
    </ol>

    <h2>Kontakt</h2>
    
    <a href="mailto:nicowazenie@wroclaw.pl">napisz</a>

    </section>
    <section class="srodkowy">
    <h2>Alerty</h2>

    <table>
        <tr>
            <th>rejestracja</th>
            <th>ulica</th>
            <th>waga</th>
            <th>dzien</th>
            <th>czas</th>
        </tr>
        <?php 
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
            $zapytanie = "SELECT w.rejestracja , w.waga , w.dzien , w.czas, l.ulica FROM `wagi` w INNER JOIN lokalizacje l ON w.lokalizacje_id = l.id WHERE w.waga > 5; ";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            while($obiekt = mysqli_fetch_row($wynik)) {
                echo "<tr><td>".$obiekt[0]."</td><td>".$obiekt[4]."</td><td>".$obiekt[1]."</td><td>".$obiekt[2]."</td><td>".$obiekt[3]."</td>";
            }
            mysqli_close($polaczenie);


            ?>

    </table>

    </section>
    <section class="prawy">
    <img src="obraz2.jpg" alt="tir">
    </section>
    </section>


    <?php 
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
            $zapytanie = "INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5',FLOOR(1 + RAND() * (10 - 1 +1)),'DW12345','2025-03-24','16:53:00');";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            
            mysqli_close($polaczenie);
            header(header: "refresh: 10")

            ?>

    <footer>
        <p>Strone wykonal Nicola Allocca</p>
    </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <section class="baner">
            <h1>Biblioteka w Książkowicach Wielkich</h1>
        </section>


    </header>
<section class="main">
    <section class="lewy">
        <h3>Polecamy dzieła autorów:</h3>
        <ol>
            
            <?php 
            $conn = mysqli_connect("localhost", "root", "", "biblioteka"); 
            $zapytanie = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko ASC;";
            $query = mysqli_query($conn, $zapytanie);
            while($obiekt = mysqli_fetch_row($query)){
            echo "<li>".$obiekt[0]."".$obiekt[1]."</li>";
            }
            mysqli_close($conn) 
            ?>
           
            
        </ol>

    </section>

    <section class="srodkowy">
        <h3>ul. Czytelnicza 25, Książkowice&nbspWielkie</h3>
        <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a> </p>
        <img src="biblioteka.png" alt="książki">
    </section>

    <section class="wszystkieprawe">

        <section class="prawygorny">
            <h3>Dodaj czytelnika</h3>
            <form action="biblioteka.php" method="POST">
                imie:<input type="text" name="imie" ><br>
                nazwisko:<input type="text" name="nazwisko" ><br>
                symbol:<input type="number" name="symbol"><br>
                <button onclick="">DODAJ</button>
            </form>
        </section>

        <section class="prawydolny">
            <?php
            $conn1 = mysqli_connect("localhost", "root", "", "biblioteka"); 
            
            
            if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["symbol"]) ){
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];
                $symbol = $_POST["symbol"];
                $zapytanie1 = "INSERT INTO czytelnicy( imie, nazwisko, kod) VALUES ('$imie','$nazwisko','$symbol');";
                $query1 = mysqli_query($conn1, $zapytanie1);
                echo "Czytelnik $imie  $nazwisko zostal dodany do nowej bazy";

            }
            mysqli_close($conn1) 
            ?>
            
        </section>
    </section>
</section>



    <footer>
        <p>Porjekt strony: Nicola Allocca</p>
    </footer>


    
</body>
</html>
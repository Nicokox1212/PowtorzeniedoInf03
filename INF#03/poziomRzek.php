<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
    <header>
        <section class="baner1">
                <img src="obraz1.png" alt="Mapa Polski">
        </section>

        <section class="baner2">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>

    </header>

        <section class="menu">
            <form action="poziomRzek.php" method="POST">
                <input type="radio" name="stan" value="Wszystkie"><label> Wszystkie </label></input>
                <input type="radio" name="stan" value="Ponad stan ostrzegwaczy"><label >Ponad stan ostrzegwaczy </label></input>
                <input type="radio" name="stan" value="Ponad stan alarmowy"><label >Ponad stan alarmowy </label></input>

                <button type=submit>Pokaz</button>
            </form>

            
        </section>
        <section class="xd">
        <section class="lewy">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegwaczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                    
                </tr>

                <?php 
                $connect = mysqli_connect("localhost", "root", "", "rzeki");
                if (isset($_POST["stan"])){
                    $stan = $_POST["stan"];
                    if ($stan == "Wszystkie"){
                        $zapytanie = "SELECT w.nazwa , w.rzeka , w.stanOstrzegawczy , w.stanAlarmowy , p.stanWody FROM wodowskazy w INNER JOIN pomiary p ON p.wodowskazy_id = w.id WHERE p.dataPomiaru = '2022-05-05';";

                    }
                    else if
                        ($stan == "Ponad stan ostrzegwaczy"){
                            $zapytanie = "SELECT w.nazwa , w.rzeka , w.stanOstrzegawczy , w.stanAlarmowy , p.stanWody FROM wodowskazy w INNER JOIN pomiary p ON p.wodowskazy_id = w.id WHERE p.stanWody > w.stanOstrzegawczy AND p.dataPomiaru = '2022-05-05';";
                        }

                    

                    else if
                        ($stan == "Ponad stan alarmowy"){
                            $zapytanie = "SELECT w.nazwa , w.rzeka , w.stanOstrzegawczy , w.stanAlarmowy , p.stanWody FROM wodowskazy w INNER JOIN pomiary p ON p.wodowskazy_id = w.id WHERE p.stanWody > w.stanAlarmowy AND p.dataPomiaru = '2022-05-05';";
                        }
                    
                    $query = mysqli_query($connect, $zapytanie);
                    while($obiekt = mysqli_fetch_row($query)  ){
                        echo "<tr><td>".$obiekt[0]."<td><td>".$obiekt[1]."<td><td>".$obiekt[2]."<td><td>".$obiekt[3]."<td><td>".$obiekt[4]."</td></tr>";
                    } 
                }

                ?>
            </table>
            
        </section>

        <section class="prawy">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>



            </ul>
            <h3>Średnie stany wód</h3>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "rzeki");
            $zapytanie1 = "SELECT dataPomiaru,AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;" ;
            $query = mysqli_query($conn, $zapytanie1);
            while($obiekt = mysqli_fetch_row($query) ){
                echo "<p>".$obiekt[0].":".$obiekt[1]."</p>";
                
            }

            mysqli_close($conn) 
            ?>

            <a href=https://komunikaty.pl>Dowiedz się wiecej</a>
            <img src="obraz2.jpg" alt="rzeka">
            
        </section>
    </section>

        <section class="stopka">
            <footer>
                <p>Strone wykonal: Nicola Allocca</p>
            </footer>
        </section>





    
</body>
</html>
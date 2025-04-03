<?php
 $conn = mysqli_connect('localhost', 'root', '', 'wedkarstwo');
 $lowisko = $_POST['number'];
$data = $_POST['data'];
$sedzia = $_POST['sedzia'];
 $zapytanie = "INSERT INTO zawody_wedkarskie(Karty_wedkarskie_id,Lowisko_id, data_zawodow, sedzia) VALUES (0, ".$lowisko.",'".$data."',".$sedzia."');";
 $wynik = mysqli_query($conn,$zapytanie);

 mysqli_close($conn) 
?>

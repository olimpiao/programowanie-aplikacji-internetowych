<?php

if($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Błąd wywołania formularza.";
    exit();
}

//Sprawdzenie, czy parametry istnieją
if (!isset($_POST['kwotaKredytu']) || !isset($_POST['czasTrwania']) || !isset($_POST['oprocentowanieRoczne'])) {
    echo "Błąd! Wszystkie dane muszą być uzupełnione.";
    exit();
}


$kwotaKredytu = $_POST['kwotaKredytu'];
$czasTrwania = $_POST['czasTrwania'];
$oprocentowanieRoczne = $_POST['oprocentowanieRoczne'];

//Walidacja typu liczbowego
if(!is_numeric($kwotaKredytu) || !is_numeric($czasTrwania) || !is_numeric($oprocentowanieRoczne)) {
    echo "Błąd! Wszystkie parametry muszą być liczbami.";
    exit();
}

//Walidacja zakresu liczbowego
if($kwotaKredytu < 1000 || $kwotaKredytu > 2000000) {
    echo "Błąd! Kwotę kredytu należy podać w zł w zakresie od 1000 do 2000000 zł.";
    exit();
}

if($czasTrwania < 1 || $czasTrwania > 35) {
    echo "Błąd! Czas trwania należy podać w latach w zakresie od 1 roku do 35 lat.";
    exit();
}

if($oprocentowanieRoczne < 0.1 || $oprocentowanieRoczne > 20) {
    echo "Błąd! Oprocentowanie należy podać w procentach w zakresie od 0.1 do 20%.";
    exit();
}

//Konwersja do typu liczbowego
$kwotaKredytu = (float)$kwotaKredytu;
$czasTrwania = (float)$czasTrwania;
$oprocentowanieRoczne = (float)$oprocentowanieRoczne;

//Obliczenie wyniku
$liczbaRat = $czasTrwania * 12;
$oprocentowanieMiesieczne = $oprocentowanieRoczne / 12 /100;
$rataMiesieczna = ($kwotaKredytu * $oprocentowanieMiesieczne * (1 + $oprocentowanieMiesieczne) ** $liczbaRat) / 
((1 + $oprocentowanieMiesieczne) ** $liczbaRat - 1);

include 'index.html'; //Wynik wyświetla się pod formularzem

echo "<div class='container col-md-4 mt-5 alert alert-success text-center'>Miesięczna rata będzie wynosić: <strong>" 
. number_format($rataMiesieczna, 2, ',', ' ') . "</strong> zł </div>";

?>
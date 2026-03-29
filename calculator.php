<?php

$errors = array();
$kwotaKredytu = null;
$czasTrwania = null;
$oprocentowanieRoczne = null;
$rataMiesieczna = null;

//1. Przyjęcie parametrów i walidacja
function validate(&$kwotaKredytu, &$czasTrwania, &$oprocentowanieRoczne, &$errors)
{
    //Sprawdzenie, czy parametry istnieją
    if (!isset($_POST['kwotaKredytu']) || !isset($_POST['czasTrwania']) || !isset($_POST['oprocentowanieRoczne'])) {
        $errors[] = "Błąd! Wszystkie dane muszą być uzupełnione.";
        return false;
    }

    $kwotaKredytu = $_POST['kwotaKredytu'];
    $czasTrwania = $_POST['czasTrwania'];
    $oprocentowanieRoczne = $_POST['oprocentowanieRoczne'];

    //Walidacja typu liczbowego
    if (!is_numeric($kwotaKredytu) || !is_numeric($czasTrwania) || !is_numeric($oprocentowanieRoczne)) {
        $errors[] = "Błąd! Wszystkie parametry muszą być liczbami.";
    }

    //Walidacja zakresu liczbowego
    if ($kwotaKredytu < 1000 || $kwotaKredytu > 2000000) {
        $errors[] = "Błąd! Kwotę kredytu należy podać w zł w zakresie od 1000 do 2000000 zł.";
    }

    if ($czasTrwania < 1 || $czasTrwania > 35) {
        $errors[] = "Błąd! Czas trwania należy podać w latach w zakresie od 1 roku do 35 lat.";
    }

    if ($oprocentowanieRoczne < 0.1 || $oprocentowanieRoczne > 20) {
        $errors[] = "Błąd! Oprocentowanie należy podać w procentach w zakresie od 0.1 do 20%.";
    }

    if (count($errors)) {
        return false;
    }

    //Konwersja do typu liczbowego
    $kwotaKredytu = (float)$kwotaKredytu;
    $czasTrwania = (float)$czasTrwania;
    $oprocentowanieRoczne = (float)$oprocentowanieRoczne;

    return true;
}

//2. Wykonanie akcji (działania)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (validate($kwotaKredytu, $czasTrwania, $oprocentowanieRoczne, $errors)) {
        $liczbaRat = $czasTrwania * 12;
        $oprocentowanieMiesieczne = $oprocentowanieRoczne / 12 / 100;
        $rataMiesieczna = ($kwotaKredytu * $oprocentowanieMiesieczne * (1 + $oprocentowanieMiesieczne) ** $liczbaRat) /
            ((1 + $oprocentowanieMiesieczne) ** $liczbaRat - 1);
    }
}

//3. Wygenerowanie odpowiedzi
include "templates/calculator_view.php";

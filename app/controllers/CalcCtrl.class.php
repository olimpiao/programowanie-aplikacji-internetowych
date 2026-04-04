<?php

namespace app\controllers;

use core\App;

class CalcCtrl
{
    private $result;
    private $kwotaKredytu;
    private $czasTrwania;
    private $oprocentowanieRoczne;

    // pobranie danych
    public function getParams()
    {
        $this->kwotaKredytu = $_POST['kwotaKredytu'] ?? null;
        $this->czasTrwania = $_POST['czasTrwania'] ?? null;
        $this->oprocentowanieRoczne = $_POST['oprocentowanieRoczne'] ?? null;
    }

    // walidacja
    public function validate()
    {
        if (! (isset($this->kwotaKredytu) && isset($this->czasTrwania) && isset($this->oprocentowanieRoczne))) {
            return false;
        }

        if ($this->kwotaKredytu == "" || $this->czasTrwania == "" || $this->oprocentowanieRoczne == "") {
            App::getMessages()->addMessage(new \core\Message("Błąd! Wszystkie dane muszą być uzupełnione.", \core\Message::ERROR));
        }

        if (App::getMessages()->isError()) return false;

        if (!is_numeric($this->kwotaKredytu) || !is_numeric($this->czasTrwania) || !is_numeric($this->oprocentowanieRoczne)) {
            App::getMessages()->addMessage(new \core\Message("Błąd! Wszystkie parametry muszą być liczbami.", \core\Message::ERROR));
        }

        if (App::getMessages()->isError()) return false;

        if ($this->kwotaKredytu < 1000 || $this->kwotaKredytu > 2000000) {
            App::getMessages()->addMessage(new \core\Message("Błąd! Kwotę kredytu należy podać w zakresie od 1000 do 2 000 000 zł.", \core\Message::ERROR));
        }

        if ($this->czasTrwania < 1 || $this->czasTrwania > 35) {
            App::getMessages()->addMessage(new \core\Message("Błąd! Czas trwania należy podać w latach w zakresie od 1 roku do 35 lat.", \core\Message::ERROR));
        }

        if ($this->oprocentowanieRoczne < 0.1 || $this->oprocentowanieRoczne > 20) {
            App::getMessages()->addMessage(new \core\Message("Błąd! Oprocentowanie należy podać w zakresie od 0.1% do 20%.", \core\Message::ERROR));
        }

        return !App::getMessages()->isError();
    }

    // obliczenia
    public function process()
    {
        $this->getParams();

        if ($this->validate()) {
            $kwotaKredytu = floatval($this->kwotaKredytu);
            $czasTrwania = floatval($this->czasTrwania);
            $oprocentowanieRoczne = floatval($this->oprocentowanieRoczne);

            $liczbaRat = $czasTrwania * 12;
            $oprocentowanieMiesieczne = $oprocentowanieRoczne / 12 / 100;

            $wynik = ($kwotaKredytu * $oprocentowanieMiesieczne * (1 + $oprocentowanieMiesieczne) ** $liczbaRat) /
                ((1 + $oprocentowanieMiesieczne) ** $liczbaRat - 1);

            $this->result = number_format($wynik, 2, '.', '');
        }
    }

    // akcja: pokaż formularz
    public function action_calcShow()
    {
        $this->generateView();
    }

    public function action_calcCompute()
    {
        $this->process();
        $this->generateView();
    }

    // akcja: oblicz
    public function generateView()
    {
        //App::getSmarty()->assign('errors', $this->errors);
        App::getSmarty()->assign('result', $this->result);
        App::getSmarty()->display('CalcView.tpl');
    }
}

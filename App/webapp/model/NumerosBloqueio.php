<?php


class NumerosBloqueio
{
    private $numerosBloqueio;
    public $seletorNumeros;

    public function __construct() {
        $this->seletorNumeros = new SeletorNumeros();
        $this->iniciar();
    }

    public function iniciar() {
        for($i = 1; $i <= 9; $i++) {
            $this->numerosBloqueio[''.$i] = false;
        }
    }

    public function bloquearNumeros($numeros, $somaDados) {

    }

    public function checkFinalJogada($numeros, $somaDados) {

    }

    public function getFinalPointSum() {

    }
}
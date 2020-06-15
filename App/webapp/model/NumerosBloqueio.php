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
        if($this->seletorNumeros->checkSelectionTotal($somaDados)) {

        }
    }

    public function checkFinalJogada($numeros, $somaDados) {
        switch ($somaDados) {
            case 2:
                if($this->numerosBloqueio['2']) {
                    return true;
                }
                break;
            case 3:
                if($this->numerosBloqueio['3'] || ($this->numerosBloqueio['2'] == true && $this->numerosBloqueio['1'] == true)) {
                    return true;
                }
                break;
            case 4:
                if($this->numerosBloqueio['4'] && $this->numerosBloqueio['3'] && $this->numerosBloqueio['1']) {
                    return true;
                }
                break;
            case 5:
                if($this->numerosBloqueio['5'] && $this->numerosBloqueio['4'] && $this->numerosBloqueio['3'] && $this->numerosBloqueio['2'] && $this->numerosBloqueio['1']) {
                    return true;
                }
                break;
            case 6:
                if($this->numerosBloqueio['6'] && $this->numerosBloqueio['5'] && $this->numerosBloqueio['4'] && $this->numerosBloqueio['2'] && $this->numerosBloqueio['1']) {
                    return true;
                }
                break;
            case 7:
                if($this->numerosBloqueio['7'] && $this->numerosBloqueio['6'] && $this->numerosBloqueio['5'] && $this->numerosBloqueio['4'] && $this->numerosBloqueio['3'] && $this->numerosBloqueio['2'] && $this->numerosBloqueio['1']) {
                    return true;
                }
                break;
            case 8:
                if($this->numerosBloqueio['8'] && $this->numerosBloqueio['7'] && $this->numerosBloqueio['6'] && $this->numerosBloqueio['5'] && $this->numerosBloqueio['3'] && $this->numerosBloqueio['2'] && $this->numerosBloqueio['1']) {
                    return true;
                }
                break;
            case 9:
                if($this->numerosBloqueio['9'] && $this->numerosBloqueio['8'] && $this->numerosBloqueio['7'] && $this->numerosBloqueio['6'] && $this->numerosBloqueio['5'] && $this->numerosBloqueio['4'] && $this->numerosBloqueio['3'] && $this->numerosBloqueio['2'] && $this->numerosBloqueio['1']) {
                    return true;
                }
        }
    }

    public function getFinalPointSum() {

    }
}
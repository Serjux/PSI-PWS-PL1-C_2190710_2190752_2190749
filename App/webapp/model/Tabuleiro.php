<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1, $resultadoDado2;
    public $numerosBloqueioP1, $numerosBloqueioP2;

    public function __construct() {
        $this->dado = new Dado();
        $this->numerosBloqueioP1 = new NumerosBloqueio();
        $this->numerosBloqueioP2 = new NumerosBloqueio();
    }

    public function rolarDados() {
        $this->resultadoDado1 = $this->dado->rolarDado();
        $this->resultadoDado2 = $this->dado->rolarDado();
    }

    public function checkFinalJogadaP1($soma) {
        if (checkFinalJogada($this->numerosBloqueioP1, $soma) == false ){
            //Passa para o jogador 2
        }
    }

    public function checkFinalJogadaP2($soma) {
        if (checkFinalJogada($this->numerosBloqueioP1, $soma) == false ){
            //Passa para o jogador 2
        }
    }

    public function checkFinalJogo($soma) {

    }

    public function getVencedor() {

    }

    public function getPointsVencedor() {

    }
}
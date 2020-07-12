<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1, $resultadoDado2, $somaDados;
    public $numerosBloqueioP1, $numerosBloqueioP2;

    public function __construct() {
        $this->dado = new Dado();
        $this->numerosBloqueioP1 = new NumerosBloqueio();
        $this->numerosBloqueioP2 = new NumerosBloqueio();
    }

    public function rolarDados() {
        $this->resultadoDado1 = $this->dado->rolarDado();
        $this->resultadoDado2 = $this->dado->rolarDado();
        $this->somaDados = $this->resultadoDado1 + $this->resultadoDado2;
    }

    public function checkFinalJogadaP1($soma) {
        if($this->numerosBloqueioP1->checkFinalJogada($soma)) {
            return true;
        }
        return false;
    }

    public function checkFinalJogadaP2($soma) {
        if($this->numerosBloqueioP2->checkFinalJogada($soma)) {
            return true;
        }
        return false;
    }

    public function checkFinalJogo($soma) {
        if($this->checkFinalJogadaP2($soma)) {
            return true;
        }
        return false;
    }

    public function getVencedor() {
        if($this->numerosBloqueioP1->getFinalPointSum() < $this->numerosBloqueioP2->getFinalPointSum()) {
            // Jogador 1 vence
            return 1;
        }
        else if($this->numerosBloqueioP1->getFinalPointSum() > $this->numerosBloqueioP2->getFinalPointSum()) {
            // Jogador 2 vence
            return 2;
        }
        else {
            // Empate
            return 3;
        }
    }

    public function getPointsVencedor() {
        $pontos = 0;

        if($this->getVencedor() == 1) {
            $pontos = $this->numerosBloqueioP2->getSomaNumerosBloqueados() - $this->numerosBloqueioP1->getSomaNumerosBloqueados();
        }
        else if($this->getVencedor() == 2) {
            $pontos = $this->numerosBloqueioP1->getSomaNumerosBloqueados() - $this->numerosBloqueioP2->getSomaNumerosBloqueados();
        }

        return $pontos;
    }
}
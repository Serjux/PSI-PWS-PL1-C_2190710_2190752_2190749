<?php


class GameEngine
{
    public $tabuleiro;
    private $estadoJogo;

    public function iniciarJogo() {
        $this->tabuleiro = new Tabuleiro();
        $this->estadoJogo = 1;
    }

    public function getEstadoJogo() {
        return $this->estadoJogo;
    }

    public function updateEstadoJogo($estado) {
        $this->estadoJogo = $estado;
    }

    public function rolarDados() {
        $this->tabuleiro->rolarDados();
    }

    public function verificarNumeroSelecionado($numeroDados) {
        //Estado de jogo 2.1, selecionamento após a rotação dos dados

    }
}
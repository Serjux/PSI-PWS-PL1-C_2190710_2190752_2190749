<?php

public function Inicio(){
    //Rodar os dados e obter os numeros

    $tabuleiro = new Tabuleiro();
    echo $resultadoDado1 = $tabuleiro ->rolarDados();
    echo $resultadoDado2 = $tabuleiro ->rolarDados();
    $soma = $resultadoDado1 + $resultadoDado2;

    $numerosBloqueioP1 = $tabuleiro;
    $numerosBloqueioP2 = $tabuleiro;

    if (($numerosBloqueioP1+$numerosBloqueioP2)==$soma) {
        //bloquear os numeros usados

    }
    else {
        this.$soma = $numerosBloqueioP2 + $numerosBloqueioP1;
        echo 'Usou numeros errados. A sua soma é' .this.$soma  . $soma ;
    }

}
<?php


class SeletorNumeros
{
    private $numerosSelecionados = array();

    public function validateNumber($userNumber, $numerosBloqueio) {
        return !$numerosBloqueio[$userNumber];
        /*if($numerosBloqueio[$userNumber] == true) {
            return false;
        }
        else {
            return true;
        }*/
    }

    public function updateSelection($userNumber) {
        if($this->selectionHasNumber($userNumber)) {
            $indice = array_search($userNumber, $this->numerosSelecionados);
            unset($this->numerosSelecionados[$indice]);
        }
        else {
            array_push($this->numerosSelecionados);
        }
    }

    public function checkSelectionTotal($totalDados) {
        $soma = 0;

        foreach($this->numerosSelecionados as $numero) {
            $soma += $numero;
        }

        return ($soma == $totalDados);
        /*if($soma == $totalDados) {
            return true;
        }
        else {
            return false;
        }*/
    }

    public function clearSelection() {
        // Remover todos os elementos do vetor this->numerosSelecionados
    }

    public function selectionHasNumber($number) {
        // Usar este método na vista, para sabermos qual o link a colocar no botão
        return in_array($number, $this->numerosSelecionados);
    }
}
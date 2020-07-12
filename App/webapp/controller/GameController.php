<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\Redirect;

class GameController
{
    public function index() {
        return View::make('game.index');
    }

    public function iniciarJogo() {
        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
        }
        else {
            $engine = Session::get('gameEngine');
        }
        $engine->iniciarJogo();
        Session::set('gameEngine', $engine);

        return View::make('game.tabuleiro', ['ge'=> $engine]);
    }

    public function rolarDados() {
        $engine = Session::get('gameEngine');

        if($engine->getEstadoJogo() != 2 && $engine->getEstadoJogo() != 4) {
            $engine->rolarDados();
        }

        if($engine->getEstadoJogo() == 1) {
            $engine->updateEstadoJogo(2);
        }
        else if($engine->getEstadoJogo() == 3) {
            $engine->updateEstadoJogo(4);
        }

        if($engine->tabuleiro->checkFinalJogadaP1($engine->tabuleiro->somaDados)) {
            $engine->updateEstadoJogo(4);
        }
        if($engine->tabuleiro->checkFinalJogadaP2($engine->tabuleiro->somaDados)) {
            $engine->updateEstadoJogo(5);

            $user = Session::get('user');
            $score = new Score();
            $score->score = $engine->tabuleiro->getPointsVencedor();
            $score->idutilizador = $user->idutilizador;

            $score->save();
        }

        \Tracy\Debugger::barDump($engine, 'Game Engine');

        Session::set('gameEngine', $engine);

        return View::make('game.tabuleiro', ['ge' => $engine]);
    }

    public function selecionarNumero($numero) {
        /* @var GameEngine $engine */
        $engine = Session::get('gameEngine');

        if($engine->getEstadoJogo() == 2) {
            $engine->tabuleiro->numerosBloqueioP1->seletorNumeros->updateSelection($numero);
            if($engine->tabuleiro->numerosBloqueioP1->bloquearNumeros($engine->tabuleiro->somaDados)) {
                $engine->updateEstadoJogo(1);
                $engine->tabuleiro->numerosBloqueioP1->seletorNumeros->clearSelection();
            }
        }
        else if($engine->getEstadoJogo() == 4) {
            $engine->tabuleiro->numerosBloqueioP2->seletorNumeros->updateSelection($numero);
            if($engine->tabuleiro->numerosBloqueioP2->bloquearNumeros($engine->tabuleiro->somaDados)) {
                $engine->updateEstadoJogo(3);
                $engine->tabuleiro->numerosBloqueioP2->seletorNumeros->clearSelection();
            }
        }

        \Tracy\Debugger::barDump($engine, 'Game Engine');

        Session::set('gameEngine', $engine);
        return View::make('game.tabuleiro', ['ge' => $engine]);
    }

    //Interligações para as paginas
    public function paginaLogin() {
        return View::make('game.login');
    }

    public function pontuacoes() {
        $pontuacoestotais = Score::find('all', array('group' => 'idutilizador', 'order' => 'score desc', 'limit' => 10, 'select' => 'SUM(score) AS score, idutilizador'));
        return View::make('game.pontuacoes', ['mp' => $pontuacoestotais]);
    }

    public function registo() {
        return View::make('game.registo');
    }

    public function perfil($userid) {
        $pontuacoesRecentes = Score::find('all', array('conditions' => 'idutilizador='.$userid, 'order' => 'datahora desc'));
        $user = User::find($userid);

        return View::make('game.perfil', ['pr' => $pontuacoesRecentes, 'user' => $user]);
    }

    public function alteracoes() {
        if(!Session::has('user')) {
            Redirect::toRoute('jogo/index');
        }
        $user = Session::get('user');

        return View::make('game.alteracoes', ['dd' => $user]);
    }

    public function gestao() {
        if(!Session::has('user')) {
            Redirect::toRoute('jogo/index');
        }
        $user = Session::get('user');
        if($user->nivelacesso != 2) {
            Redirect::toRoute('jogo/index');
        }
        return View::make('game.gestor');
    }
}
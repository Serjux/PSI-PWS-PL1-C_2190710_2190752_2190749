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
        $engine->rolarDados();
        $engine->updateEstadoJogo();
        Session::set('gameEngine', $engine);

        return View::make('game.tabuleiro', ['ge'=> $engine]);
    }
    //Interligações para as paginas
    public function paginaLogin() {
        return View::make('game.login');
    }

    public function pontuacoes() {
        return View::make('game.pontuacoes');
    }

    public function registo() {
        return View::make('game.registo');
    }

    public function perfil() {
        if(!Session::has('user')) {
            Redirect::toRoute('jogo/index');
        }
        /* @var User $user */
        $user = Session::get('user');

        $pontuacoesRecentes = Score::find('all', array('conditions' => 'idutilizador='.$user->idutilizador, 'order' => 'datahora desc', 'limit' => 5));

        return View::make('game.perfil', ['pr' => $pontuacoesRecentes]);
    }

    public function alteracoes() {
        return View::make('game.alteracoes');
    }
}
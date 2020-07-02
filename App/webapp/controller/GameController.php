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
        $engine->updateEstadoJogo(2);
        Session::set('gameEngine', $engine);

        return View::make('game.tabuleiro', ['ge'=> $engine]);
    }

    //Interligações para as paginas
    public function paginaLogin() {
        return View::make('game.login');
    }

    public function pontuacoes() {
        $pontuacoestotais = Score::find('all', array('order' => 'score asc', 'limit' => 10));
        return View::make('game.pontuacoes', ['mp' => $pontuacoestotais]);
    }

    public function registo() {
        return View::make('game.registo');
    }

    public function perfil() {
        if(!Session::has('user')) {
            Redirect::toRoute('jogo/index');
        }
        $user = Session::get('user');

        $pontuacoesRecentes = Score::find('all', array('conditions' => 'idutilizador='.$user->idutilizador, 'order' => 'datahora desc', 'limit' => 5));

        return View::make('game.perfil', ['pr' => $pontuacoesRecentes]);
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
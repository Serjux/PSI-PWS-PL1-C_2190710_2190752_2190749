<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;

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
}
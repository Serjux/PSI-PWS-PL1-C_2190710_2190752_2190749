<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;

class GameController
{
    public function index() {
        return View::make('game.index');
    }

    public function tabuleiro() {
        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
            Session::set('gameEngine', $engine);
        }
        else {
            $engine = Session::get('gameEngine');
        }

        return View::make('game.tabuleiro');
    }
}
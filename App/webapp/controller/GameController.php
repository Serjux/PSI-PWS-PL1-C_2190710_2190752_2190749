<?php
use ArmoredCore\WebObjects\View;

class GameController
{
    public function index() {
        return View::make('game.index');
    }
}
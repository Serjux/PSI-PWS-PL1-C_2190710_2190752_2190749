<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');

// Jogo
Router::get('jogo/index', 'GameController/index');
Router::get('jogo/iniciarjogo', 'GameController/iniciarJogo');
Router::get('jogo/rolardados','GameController/rolarDados');
Router::get('jogo/selecionarnumero', 'GameController/selecionarNumero');

// Páginas Normais
Router::get('jogo/login', 'GameController/paginaLogin');
Router::get('jogo/scoreboard', 'GameController/pontuacoes');
Router::get('jogo/registo','GameController/registo');
Router::get('jogo/perfil','GameController/perfil');
Router::get('jogo/alteracoesperfil', 'GameController/alteracoes');
Router::get('jogo/gestao','GameController/gestao');
Router::resource('users', 'UsersController');


/************** End of URLEncoder Routing Rules ************************************/
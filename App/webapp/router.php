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

Router::get('jogo/index', 'GameController/index');
Router::get('jogo/iniciarjogo', 'GameController/iniciarJogo');
Router::get('jogo/rolardados','GameController/rolarDados');
Router::get('jogo/login', 'GameController/paginaLogin');
Router::get('jogo/scoreboard', 'GameController/pontuacoes');
Router::get('jogo/registo','GameController/registo');




/************** End of URLEncoder Routing Rules ************************************/
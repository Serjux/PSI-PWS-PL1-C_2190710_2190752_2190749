<?php
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;

class UsersController
{
    public function registo() {
        $user = new User();

        $user->nomecompleto = Post::get('nome').' '.Post::get('apelido');
        $user->username = Post::get('username');
        $user->password = md5(Post::get('password'));
        $user->email = Post::get('email');
        $user->datanasc = Post::get('datanasc');

        if($user->is_valid()) {
            $user->save();
            Redirect::toRoute('jogo/login');
        }
        else {
            Redirect::flashToRoute('jogo/registo',  ['user' => $user]);
        }
    }

    public function login() {
        if(User::exists(array('username' => Post::get('username'), 'password' => md5(Post::get('password'))))) {
            $user = User::find(array('username' => Post::get('username')));
            if($user->bloqueado != 1) {
                Session::set('user', $user);
                Redirect::toRoute('jogo/index');
            }
            else {
                Redirect::flashToRoute('jogo/login', ['bloqueado' => true, 'errado' => false]);
            }
        }
        else {
            Redirect::flashToRoute('jogo/login', ['errado' => true, 'bloqueado' => false]);
        }
    }

    public function logout() {
        Session::destroy();
        Redirect::toRoute('jogo/index');
    }

    public function alterar() {
        $user = Session::get('user');

        $user->nomecompleto = Post::get('nome');
        $user->password = md5(Post::get('password'));
        $user->email = Post::get('email');
        $user->datanasc = Post::get('datanasc');

        if($user->is_valid() && Post::get('password') != '') {
            $user->save();
            Redirect::toRoute('jogo/index');
        }
        else {
            Redirect::toRoute('jogo/alteracoesperfil');
        }
    }

    public function bloquear($id) {
        $user = User::find($id);
        if($user->bloqueado == 0) {
            $user->bloqueado = 1;
        }
        else {
            $user->bloqueado = 0;
        }
        $user->save();
        Redirect::toRoute('jogo/gestao');
    }
}
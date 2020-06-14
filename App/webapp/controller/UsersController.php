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
            Session::set('user', $user);
            Redirect::toRoute('jogo/index');
        }
        else {
            Redirect::toRoute('jogo/login');
        }
    }

    public function logout() {
        Session::destroy();
        Redirect::toRoute('jogo/index');
    }
}
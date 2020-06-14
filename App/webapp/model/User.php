<?php


class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array (
        array('username'),
        array('password'),
        array('email'),
        array('nomecompleto'),
        array('datanasc')
    );
}
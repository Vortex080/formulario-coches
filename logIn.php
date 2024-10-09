<?php

    function iniciaSession(){
        session_start();
    }

    function cierraSession() {
        session_destroy();
    }

    function logIn($nombre){
        $_SESSION['user'] = $nombre;
    }

    function logOut($user) {
        $_SESSION[$user] = '';
        cierraSession();
    }

    function statusLogIn() {
        return isset($_SESSION['user']);
    }

    function escribirSession($user, $valor){
        iniciaSession();
        $_SESSION[$valor] = $user;
    }

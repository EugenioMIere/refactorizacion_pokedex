<?php

//namespace controller;

class PublicController
{ // Controlador para el usuario NO logueado.
    private $presenter;
    private $model;

    public function __construct($model, $presenter)
    {
        $this->presenter = $presenter;
        $this->model = $model;
    }

    public function home(){
        $pokemones = $this->model->getPokemons();
        $this->presenter->render("view/home.mustache", ["pokemones" => $pokemones]);
    }

    public function login(){
        if (isset($_POST["user"]) && isset($_POST["password"]){
            $user = $_POST["user"];
            $password = $_POST["password"];
            if ($this->autentificar($user, $password)){
                $_SESSION["authenticated"] = true;
                $_SESSION["user"] = $user;
            } 
        } 
    } 
    private function autentificar(){
        return $this->model->verificarUsuario($user, $password);
    }
}




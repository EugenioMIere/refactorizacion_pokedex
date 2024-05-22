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
        session_start();
    }

    public function home(){
        $pokemones = $this->model->getPokemons();
        $this->presenter->render("view/home.mustache", ["pokemones" => $pokemones]);
    }

    public function login(){
        if (isset($_POST["user"]) && isset($_POST["password"])) { 
            $user = $_POST["user"];
            $password = $_POST["password"];
            if ($this->autentificar($user, $password)) {
                $_SESSION["authenticated"] = true;
                $_SESSION["user"] = $user;
                $this->presenter->render("view/home.mustache", ["user" => "$_SESSION["user"]"]);
            } else {
                // En caso de que la autentificacion de false
                $this->presenter->render("view/home.mustache", ["user" => "Credenciales incorrectas"]);
            }
        } else {
            // Manejar el caso donde los datos de usuario o contraseña no están establecidos
            $this->presenter->render("view/home.mustache");
        }
    } 
    private function autentificar($user, $password){
        $usuarios = $this->model->verificarUsuario($user, $password);
        if ($usuarios){
            foreach ($usuarios as $usuario){
                if ($usuario["usuario"] === $user && $usuario["password"] === $password){
                    return true;
                }
            }
        }
        return false;
    }
}




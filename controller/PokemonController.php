<?php

//namespace controller;

class PokemonController
{ // Controlador para el usuario NO logueado.
    private $presenter;
    private $model;


    public function __construct($model, $presenter)
    {
        $this->presenter = $presenter;
        $this->model = $model;
    }

    public function home(){

        $pokemon = $this->model->filter('Abra');
        $this->presenter->render("view/pokemonView.mustache", ["pokemon" => $pokemon]);
    }

    public function buscarPokemon(){
        $pokemonBuscado = $this->model->filter($this->obtenerPokemonBuscado());
        $this->presenter->render("view/pokemonView.mustache", ["pokemon" => $pokemonBuscado]);
    }
    private function obtenerPokemonBuscado(){
        if (isset($_POST['search'])){
            return $_POST['search'];
        }
    }


}
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
    } /* en la vista: {{#pokemones}}
                       <tr>
                       <td> {{id}} </td>
                       <td> {{nombre}} </td> ....
           {{/pokemones}}
           */
    }

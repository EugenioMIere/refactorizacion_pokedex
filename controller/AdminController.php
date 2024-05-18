<?php

namespace controller;

class AdminController
{ // Controlador para el ADMIN
    private $presenter;
    private $model;

    public function __construct($model, $presenter)
    {
        $this->presenter = $presenter;
        $this->model = $model;
    }

    public function crearPokemon(){
        if ($this->informacionCompleta()){
            $pokemon = $this->informacionCompleta();
            $this->model->create($pokemon);
        }
    }

    public function actualizarPokemon(){
        if ($this->informacionCompleta()){
            $pokemonAActualizar = $this->informacionCompleta();
            $this->model->update($pokemonAActualizar);
        }
    }

    public function eliminarPokemon(){
        if ($this->nombreCompleto()){
            $nombre = $this->nombreCompleto();
            $this->model->delete($nombre);
        }
    }

    private function nombreCompleto(){
        if (isset($_GET['nombre'])){
            return $_GET['nombre'];
        } return false;
    }
    private function informacionCompleta(){
        $data = "";
        if (empty($_POST['imagen']) || empty($_POST['tipo']) || empty($_POST['decsripcion']) || empty($_POST['numero']) || empty($_POST['nombre'])){
            return false;
        } else {
            $data = [
                'imagen' => $_POST['imagen'],
                'tipo' => $_POST['tipo'],
                'descripcion' => $_POST['descripcion'],
                'numero' => $_POST['numero'],
                'nombre' => $_POST['nombre']
            ];
        } return $data;
    }


}

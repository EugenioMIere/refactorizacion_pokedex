<?php

namespace model;

class PokemonModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    public function getAll(){
        // Obtener pokemon de la BDD
        return $this->database->query("SELECT * FROM pokemon");
    }

    public function create($pokemon){
        // Codigo para crear pokemones
        $imagen = $pokemon['imagen'];
        $numero = $pokemon['numero'];
        $nombre = $pokemon['nombre'];
        $tipo = $pokemon['tipo'];
        $descripcion = $pokemon['descripcion'];

        $sql = "INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) VALUES ($numero, $imagen, $nombre, $tipo, $descripcion)";
        $this->database->query($sql);
    }
    public function update($pokemon){
        // Codigo para actualizar pokemones existentes
        $imagen = $pokemon['imagen'];
        $numero = $pokemon['numero'];
        $nombre = $pokemon['nombre'];
        $tipo = $pokemon['tipo'];
        $descripcion = $pokemon['descripcion'];

        $sql = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo', descripcion = '$descripcion', imagen = $imagen WHERE nombre = '$nombre'";
        $this->database->query($sql);
    }

    public function delete($nombre){
        // Codigo para eliminar pokemones
            $sql = "DELETE from pokemon WHERE nombre = '$nombre'";
            $this->database->query($sql);
    }

    /* public function filter($nombreBuscado){
        // Codigo pata filtrar pokemones
        $sql = "SELECT * from pokemon WHERE nombre = '$nombreBuscado'";
        return $this->database->query($sql);
    */
}

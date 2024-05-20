<?php

//use controller\AdminController;
//use controller\PublicController;
//use model\PokemonModel;

include_once ("controller/AdminController.php");
include_once ("controller/PublicController.php");
include_once ("controller/PokemonController.php");

include_once ("model/PokemonModel.php");

include_once ("helper/Database.php");
include_once ("helper/Router.php");

include_once ("helper/Presenter.php");
include_once ("helper/MustachePresenter.php");

include_once('vendor/mustache/src/Mustache/Autoloader.php');
class Configuration
{
    // CONTROLLERS
    public static function getPublicController(){
        return new PublicController(self::getPokemonModel(), self::getPresenter());
    }

    public static function getPokemonController(){
        return new PokemonController(self::getPokemonModel(), self::getPresenter());
    }

    public static function getAdminController(){
        return new AdminController(self::getPokemonModel(), self::getPresenter());
    }

    // MODELS
    private static function getPokemonModel(){
        return new PokemonModel(self::getDatabase());
    }

    // HELPERS

    public static function getDatabase(){

        $config = self::getConfig();
        return new Database($config["servername"], $config["username"], $config["password"], $config["database"]);
    }
    private static function getConfig(){
        return parse_ini_file("config/config.ini");
    }

    public static function getRouter()
    {
        return new Router("getPublicController", "home" );
    }

    private static function getPresenter()
    {
        return new MustachePresenter("view/template");
    }


}
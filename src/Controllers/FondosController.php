<?php
namespace Controllers;
use Lib\Pages;
use Models\Fondo;

class FondosController{
   
    private Pages $pages;
    private Fondo $model;
    
    function __construct(){
        $this->pages = new Pages();
        $this->model = new Fondo;
    }

    public function mostrar_fondos(){
        $fondos = $this->model->obtenerFondos();
        $this->pages->render('fondos/ver_fondos', ["fondos"=>$fondos]);
    }
}
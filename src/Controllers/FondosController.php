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

    public function ordenarPorTitulo(){
        $fondos = $this->model->obtenerFondos();
        usort($fondos, function($a, $b) {
            return strcmp($a->titulo, $b->titulo);
        });
        $this->pages->render('fondos/ver_fondos', ["fondos"=>$fondos]);
    }

    public function buscarPorTitulo(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['titulo']) {
                $fondos = $this->model->buscarFondo($_POST['titulo']);
            } else {
                $fondos = $this->model->obtenerFondos();
            }
        }
        $this->pages->render('fondos/ver_fondos', ["fondos"=>$fondos]);
    }
}
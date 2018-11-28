<?php
class CategoriaController {
    public function index() {
        // Guardamos todos los posts en una variable
        $cats = Categoria::all();
        require_once('views/categoria/index.php');
    }
    
    public function show() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }

        $cat = Categoria::find($_GET['id']);
        //$categoria = $post->id_categoria;
        require_once('views/categoria/show.php');
    }
    
    public function formCreate() {
        require_once('views/categoria/formInsert.php');
    }

    public function create() {
        if (!isset($_POST['nom'])){
            return call('pages', 'error');
        }
        
        Categoria::insert($_POST['nom'], $_POST['sub_categoria']);

        require_once('views/categoria/formInsert.php');
    }
    
    public function delete() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
       
        Categoria::eliminar($_GET['id']);
        $cats = Categoria::all();
        require_once('views/categoria/index.php');
    }
}
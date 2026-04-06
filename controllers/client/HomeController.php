<?php

class HomeController
{   
    private $productModel;

    public function __construct() {
        $this->productModel = new CategoryModel();
    }

    public function index() 
    {   
        $view = 'home';
        $data = $this->productModel->getAll();
        require_once PATH_VIEW_MAIN_CLIENT;
    }
}
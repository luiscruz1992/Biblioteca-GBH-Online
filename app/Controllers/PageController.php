<?php

namespace App\Controllers;

/**
 * Description of PageController
 *
 * @author escanor
 */
class PageController extends \Controller {

    private $data;

    public function __construct() {
        $this->data = array("url" => URL_BASE);
    }

    public function index() {
        $this->data['JSName'] = "home";
        $this->view("header", $this->data);
        $this->view("home", $this->data);
        $this->view("footer", $this->data);
    }

    public function book($id) {
        $this->data['JSName'] = "book";
        $this->data['id'] = $id;        
        $this->view("header", $this->data);
        $this->view("book", $this->data);
        $this->view("footer", $this->data);
    }

}

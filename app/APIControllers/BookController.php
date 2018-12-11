<?php

namespace App\APIControllers;

use \App\Models\Mdl_books as books;

/**
 * Description of BookController
 *
 * @author escanor
 */
class BookController {

    public function __construct() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Credentials: true");
        header('Content-Type: application/json');
    }

    /**
     * Get list of books
     */
    public function getBooks() {
        if (books::get()->count()) {
            // set response code - 200 OK
            http_response_code(200);
            // make it json format
            echo json_encode(books::get());
        } else {
            // set response code - 404 Not found
            http_response_code(404);
            // tell the user books does not exist
            echo json_encode(array("message" => html_entity_decode("No se ha encontrado ning&uacute;n registro")));
        }
    }

    /**
     * Get list of books by id
     * @param type $id
     */
    public function getBook($id) {
        $book = books::find($id);
        if ($book) {
            // set response code - 200 OK
            http_response_code(200);
            // make it json format
            echo json_encode($book);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
            // tell the user books does not exist
            echo json_encode(array("message" => "Este registro no existe"));
        }
    }

    /**
     * Get list of books by name
     * @param type $name
     */
    public function getSearch($name = "") {
        if (books::where('name', 'LIKE', '%' . $name . '%')->get()->count()) {
            // set response code - 200 OK
            http_response_code(200);
            // make it json format
            $book = books::where('name', 'LIKE', '%' . $name . '%')->get();
            echo json_encode($book);
        } else {
            // set response code - 404 Not found
            http_response_code(404);
            // tell the user books does not exist
            echo json_encode(array("message" => html_entity_decode("No se ha encontrado ning&uacute;n registro")));
        }
    }

}

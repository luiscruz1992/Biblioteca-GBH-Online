<?php

/**
 * Description of Controller
 *
 * @author escanor
 */
class Controller {
    
    /*     * *
     * This method receives the data from the controller in the form of an 
     * array, traverses them and creates a dynamic variable with the associative 
     * index and gives it the value that contains that position of the array, 
     * then loads the helpers for the views and loads the view that it comes as 
     * a parameter. In summary, a method to render views.
     */
    public function view($view, $params = null) {
        if ($params) {
            foreach ($params as $id_assoc => $val) {
                ${$id_assoc} = $val;
            }
        }
        require ROOT_DIR . '/app/Views/' . $view . '.php';
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Juliett
 * Date: 09.08.2015
 * Time: 16:37
 */

class controller_404 extends controller {
    function __construct()
    {
        $this->model = new model_404();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('404_view.php', 'template_view.php', $data);
    }
}
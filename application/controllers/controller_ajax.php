<?php
class Controller_ajax Extends Controller {
    function __construct() {
        if (!($this->is_ajax()))
            die();
        $this->model = new Model_ajax;
    }

    function action_delete_image() {
        if (empty($_POST))
            die();
        echo $this->model->delete_image();
    }
    function action_delete_event() {
        if (empty($_POST))
            die();
        echo $this->model->delete_event();
    }
    function action_delete_dress() {
        if (empty($_POST))
            die();
        echo $this->model->delete_dress();
    }

}
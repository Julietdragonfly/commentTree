<?php

class controller  {

    public $model;
    public $view;
    protected $template_view = 'template_view.php';

    function __construct()
    {
        $this->view = new View();
    }
    protected function redirect($url) {
        header("Location: http://".SITE_PATH."/$url");
        exit();
    }
    protected function is_ajax() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            return true;
        else
            return false;
    }
    protected function check_logged() {
        if (empty($_SESSION['user']))
            $this->redirect('');
    }
    function action_index()
    {
    }
    function action_view()
    {

    }
}
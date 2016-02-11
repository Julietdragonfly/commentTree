<?php

class controller_vk_auth Extends Controller{
    function __construct() {
        $this->conf = new configuration();
        $this->vk = new vk_auth();
        $this->model = new model_vk_auth();
        $this->view = new view();
    }

    function action_index() {
        $url = $this->vk->get_code_url();
        header('Location: '.$url);
    }
    function action_get_token() {
        $this->model->authorize();
        $this->redirect('main');
    }
    function action_exit() {
        $this->model->user_exit();
        $this->redirect('main');
    }
}
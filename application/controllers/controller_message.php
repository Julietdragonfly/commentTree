<?php


class controller_message extends controller {
    function __construct()
    {
        $this->model = new model_message();
        $this->view = new view();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('message_view.php', $this->template_view, $data);
    }
    function action_add()
    {
        if (empty($_POST))
            $this->view->generate('message_view.php',$this->template_view,$this->model->get_data());
        else {
            $this->model->add_message();
            $this->redirect('message');
        }
    }
    function action_edit()
    {
        if (empty($_POST))
            $this->view->generate('message_view.php',$this->template_view,$this->model->get_data());
        else {
            $this->model->edit_message();
            $this->redirect('message');
        }
    }
}
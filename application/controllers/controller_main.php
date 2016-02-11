<?php


class controller_main extends controller {
    function __construct()
    {
        $this->model = new model_main();
        $this->view = new view();
    }


    function action_index()
    {
        $data = $this->model->get_data();
        if ($data['user']==0)
            $this->view->generate('main_view.php', $this->template_view, $data);
        else
            $this->redirect('message');

    }
}
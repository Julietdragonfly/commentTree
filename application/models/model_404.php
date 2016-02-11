<?php


class model_404 extends model {
    public function get_data(){

        $data = array();
        $data['seo']['title'] = "Страница не найдена";
        $data['user'] = $this->get_user();
        return ($data);

    }
}
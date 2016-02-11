<?php

require_once __DIR__ . '/database.php';
class model
{
    protected $db;


    function __construct()
    {
        $this->db = new database;
    }


    public function get_data()
    {

    }

    public function get_id()
    {
        if ($get_start = strripos($_SERVER['REQUEST_URI'], '?'))
            $clear_uri = substr($_SERVER['REQUEST_URI'], 0, $get_start);
        else
          $clear_uri = $_SERVER['REQUEST_URI'];

        $routes = explode('/', $clear_uri);
        if (isset($routes[3])) {

            $result = intval($routes[3]);
            return $result;

        } else
            return -1;
    }
    protected function get_user() {
        if ((!(empty($_SESSION['logged'])))&&(!(empty($_SESSION['uid'])))) {
            $id = $_SESSION['uid'];
            $this->db->query("SELECT fio FROM users WHERE id=$id;");
            return $this->db->fetch(0);
        }
        else
            return 0;
    }




    public function build_comment($cats,$parent_id,$ansver,$fio){
        if(is_array($cats) and isset($cats[$parent_id])){
            $tree = '<ul>';

                foreach($cats[$parent_id] as $cat){
                    $date = Dates::output_date($cat['date_update']);
                    $time = Dates::output_time($cat['date_update']);
                    $id = $cat['id'];
                    $author = $cat['author'];
                    $tree .= '<li>'.'<div><p>'.$date.' '.$time.' '.$author.'</p>';
                    $tree .= "<p class=\"message_p\" id=\"message_full_".$id."\">";
                    $tree .= $cat['message'].'</p>';
                    if($ansver==true){
                        $tree .= "<p class=\"half\">";
                        $tree .= "<a data-toggle=\"modal\" href=\"#modal\" data-target=\"#modal\" data-id=\"$id\" id=\"modal_act\">Ответить</a>";
                        $tree .= '</p>';
                    }
                    if($fio==$author){
                        $tree .= "<p class=\"half\">";
                        $tree .= "<a data-toggle=\"modal\" href=\"#modal_1\" data-target=\"#modal_1\" data-id=\"$id\" id=\"modal_edit\">Редактировать</a>";
                        $tree .= '</p>';
                    }
                    $tree .= '</div>';
                    $tree .=  $this->build_comment($cats,$cat['id'],$ansver,$fio);
                    $tree .= '</li>';
                }

            $tree .= '</ul>';
        }
        else return null;
        return $tree;
    }


}
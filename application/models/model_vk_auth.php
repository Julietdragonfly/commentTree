<?php

class model_vk_auth Extends Model{
    function __construct() {
        $this->vk = new VK_auth;
        $this->db = new database;
    }

    function authorize() {
        extract($this->vk->authorize());
        $this->db->query("SELECT id FROM users WHERE social_id='$uid';");
        if ($this->db->num_rows() == 0) {
            $fio = $first_name.' '.$last_name;
            $this->db->query("INSERT INTO users(fio,social_id) VALUES ('$fio','$uid');");
            $id = $this->db->last_id();
        }
        else {
            $fetch = $this->db->fetch(0);
            $id = $fetch['id'];
            $fio = $fetch['fio'];
        }
        setcookie('uid',base64_encode($id),time()+640800,'/');
        $_SESSION['logged'] = 1;
        $_SESSION['uid'] = $id;
        $_SESSION['fio'] = $fio;
    }

    public function user_exit(){
        setcookie('uid','',time()-3600);
        setcookie('basket','',time()-3600);
        session_unset();
        session_destroy();
    }

}

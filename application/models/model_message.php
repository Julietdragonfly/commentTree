<?php

class model_message extends model {

    public function get_data(){
        $data = array();
        $data['menu']= 4152;
        $data['user']= $this->get_user();
        $cats = array();
        $data['seo']['title']= "Сообщения";
        $this->db->query("SELECT * FROM messages WHERE parent_id =0 ORDER BY date_update DESC");
        if ($this->db->num_rows() == 0)
            return false;
        $data['message']=$this->db->fetch();
        $this->db->query("SELECT * FROM messages WHERE parent_id <>0 ORDER BY date_update");
        $data['message_child']=$this->db->fetch();
        foreach($data['message'] as $parent) {
            $cats[$parent['parent_id']][$parent['id']] =  $parent;
        }
        foreach($data['message_child'] as $child) {
            $cats[$child['parent_id']][$child['id']] =  $child;
        }
        if(!empty($_SESSION['uid'])){
            $ansver = true;
        }else {
            $ansver = false;
        }
        $fio = $data['user']['fio'];
        $data['tree'] = $this->build_comment($cats,0,$ansver,$fio);
        return $data;
    }
    public function add_message(){
        extract($this->db->real_escape_array($_POST,1));
        $date = date('Y-m-d H:i:s');
        if (!isset($parent_id)){
            $parent_id = 0;
        }
        $user = $this->get_user();
        $author = $user['fio'];
        $this->db->query("INSERT INTO messages (
                                                message,
                                                parent_id,
                                                author,
                                                date_create,
                                                date_update
                                            ) VALUES (
                                                '$message',
                                                '$parent_id',
                                                '$author',
                                                '$date',
                                                '$date'
                                            )
                                    ;");

    }
    public function edit_message(){
        extract($this->db->real_escape_array($_POST,1));
        $date = date('Y-m-d H:i:s');

        $this->db->query("UPDATE messages SET
                                                message = '$message'
                                           WHERE id = $id;
                                    ;");

    }

}
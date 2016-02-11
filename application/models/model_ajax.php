<?php
	class Model_ajax Extends Model {
		function delete_image() {
			$id = $_POST['id'];
			$this->db->query("SELECT img FROM projects_img WHERE id=$id");
			$temp = $this->db->fetchr(0);
			Files::delete_image($temp['img'],'project');
			$this->db->query("DELETE FROM projects_img WHERE id=$id;");
			return 'success';
		}
	}
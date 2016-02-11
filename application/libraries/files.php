<?php
	class Files {
		public static function upload($filename,$type,$id) {
			if ($tmp_name = $_FILES["$filename"]['tmp_name']) {
				$name = $_FILES["$filename"]["name"];
				$num = strripos($name,'.');
				$new_name = $id.'.'.substr($name,$num+1);
				$dir = $_SERVER['DOCUMENT_ROOT'].'/img/'.$type.'/';
				if (!(move_uploaded_file($tmp_name,$dir.$new_name)))
					$check = 1;		
			}
			else
				$new_name = '';
			return $new_name;
		}

		public static function upload_default($filename,$path) {
			if ($tmp_name = $_FILES["$filename"]['tmp_name']) {
				$name = $_FILES["$filename"]["name"];
				$dir = $_SERVER['DOCUMENT_ROOT'].'/'.$path;
				if (!(move_uploaded_file($tmp_name,$dir.$name)))
					$check = 1;		
			}
			else
				$name = '';
			return $name;
		}

		public static function upload_image($filename,$where) {
			if ($tmp_name = $_FILES["$filename"]['tmp_name']) {

                $type = substr($_FILES["$filename"]['type'], strripos($_FILES["$filename"]['type'], '/') + 1);
                $name = date('Ymd').Framework::password_gen(20,0).'.'.$type;

                $dir = $_SERVER['DOCUMENT_ROOT'].'/img/'.$where.'/';
				//$dir = ' '.$where.'/';
				if (!(move_uploaded_file($tmp_name, $dir.$name)))
					return false;
			}
			else {
				return false;}

			return $name;
		}

		public static function delete_image($image,$from) {
			$path = $_SERVER['DOCUMENT_ROOT'].'/img/'.$from.'/'.$image;
			return Files::delete($path);
		}

		public static function delete($filename) {
			if (file_exists($filename)) {
				unlink($filename);
				if (file_exists($filename))
					return false;
				else
					return true;
			}
			else
				return false;
		}

		public static function get_dir_extended($dir,$path_prefix) {
        	$files = array();
        	if ($handle = opendir($_SERVER['DOCUMENT_ROOT'].'/'.$dir)) {
				while (false !== ($file = readdir($handle))) {
				    if ($file != "." && $file != "..") {
				    	array_push($files, array(
				    								'path' => $path_prefix,
				    								'file' => $file
				    							)
				    	);
				    }
				}
				closedir($handle);
				return $files;
			}
			else
				return false;
        }

        public static function get_dir($dir) {
        	$files = array();
        	if ($handle = opendir($_SERVER['DOCUMENT_ROOT'].'/'.$dir)) {
				while (false !== ($file = readdir($handle))) {
				    if ($file != "." && $file != "..") {
				    	echo $file;
				    	array_push($files, $file);
				    } 
				}
				closedir($handle);
				return $files;
			}
			else
				return false;
        }
	}
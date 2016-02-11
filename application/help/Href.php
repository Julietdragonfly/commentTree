<?php
class Href {
    static function a($params) {
        return 'http://'.SITE_PATH.'/'.$params;
    }
    static function img($src,$params="") {
        return "<img src=\"http://".SITE_PATH."/img/".$src."\" $params>";
    }
    static function css($file) {
        return "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://".SITE_PATH.'/css/'.$file."\">";
    }

    static function script($file) {
        return "<script type=\"text/javascript\" src=\"http://".SITE_PATH.'/js/'.$file."\"></script>";
    }


}
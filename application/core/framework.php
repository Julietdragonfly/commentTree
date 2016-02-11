<?php
	class framework Extends configuration {

		public static function href($params) {
			return 'http://'.SITE_PATH.'/'.$params;
		}

		public static function alphabet() {
			$characters = array();
			for ($i=65;$i<=90;$i++) {
				array_push($characters, chr($i));
			}
			return $characters;
		}

		public static function alphabet_ru() {
			$characters = array();
			// for ($i=192;$i<=223;$i++) {
			// 	array_push($characters, chr($i));
			// }
			array_push($characters, 'А');
			array_push($characters, 'Б');
			array_push($characters, 'В');
			array_push($characters, 'Г');
			array_push($characters, 'Д');
			array_push($characters, 'Е');
			array_push($characters, 'Ж');
			array_push($characters, 'З');
			array_push($characters, 'И');
			array_push($characters, 'К');
			array_push($characters, 'Л');
			array_push($characters, 'М');
			array_push($characters, 'Н');
			array_push($characters, 'О');
			array_push($characters, 'П');
			array_push($characters, 'Р');
			array_push($characters, 'С');
			array_push($characters, 'Т');
			array_push($characters, 'У');
			array_push($characters, 'Ф');
			array_push($characters, 'Х');
			array_push($characters, 'Ц');
			array_push($characters, 'Ч');
			array_push($characters, 'Ш');
			array_push($characters, 'Щ');
			array_push($characters, 'Э');
			array_push($characters, 'Ю');
			array_push($characters, 'Я');
			return $characters;
		}

		public static function week() {
			$data = array();
			$today = date('Y-m-d').' 12:00:00';
			for ($i=0;$i<7;$i++) {
				$data[$i]['date'] = date('Y-m-d',strtotime($today));
				$data[$i]['today'] = $today;
				$week_day = date('w',strtotime($today));
				switch ($week_day) {
					case 1:
						$data[$i]['week_day'] = 'ПН';
						break;
					case 2:
						$data[$i]['week_day'] = 'ВТ';
						break;
					case 3:
						$data[$i]['week_day'] = 'СР';
						break;
					case 4:
						$data[$i]['week_day'] = 'ЧТ';
						break;
					case 5:
						$data[$i]['week_day'] = 'ПТ';
						break;
					case 6:
						$data[$i]['week_day'] = 'СБ';
						break;
					case 0;
						$data[$i]['week_day'] = 'ВС';
						break;	
					default:
						$data[$i]['week_day'] = 'error';
						break;

				}
				$today = date('Y-m-d',strtotime($today)+86400).' 12:00:00';
			}
			return $data;
		}

		public static function convert_to_upper($str) {
			$str = iconv('UTF-8','windows-1251',$str);
			$str = strtoupper($str);
			return iconv('windows-1251','UTF-8',$str);
		}

		public static function debug_mysql() {
			echo mysql_error();
			die();
		}

		public static function debug_data($data) {
			header('Content-type: text/plain;');
			print_r($data);
			die();
		}

		public static function password_gen($length,$big_chars=0) {
			$chars="abcdefghijklmnopqrstuvwxyz1234567890";
			if ($big_chars == 1)
				$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$size=StrLen($chars)-1; 
			$password=null; 
			while($length--){
    			$password.=$chars[rand(0,$size)]; 
			}
			return $password;
		}

		public static function mysql_encode($string) {
			return iconv('windows-1251','UTF-8',$string);
		}

		public static function mysql_decode($string) {
			return iconv('UTF-8','windows-1251',$string);
		}

		public static function transliterate($st) {
			$st=strtr($st,"абвгдеёзийклмнопрстуфхъыэ_",
    			"abvgdeeziyklmnoprstufh'iei");
			$st=strtr($st,"АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_",
    			"ABVGDEEZIYKLMNOPRSTUFH'IEI");
			 $st=strtr($st, 
                    array(
                        "ж"=>"zh", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", 
                        "щ"=>"shch","ь"=>"", "ю"=>"yu", "я"=>"ya",
                        "Ж"=>"ZH", "Ц"=>"TS", "Ч"=>"CH", "Ш"=>"SH", 
                        "Щ"=>"SHCH","Ь"=>"", "Ю"=>"YU", "Я"=>"YA",
                        "ї"=>"i", "Ї"=>"Yi", "є"=>"ie", "Є"=>"Ye"
                        )
             );
		  return $st;
		}

	}
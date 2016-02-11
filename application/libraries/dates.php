<?php
	class Dates{
		
		public static function date_diff($date1,$date2,$arg) {
			$date1 = strtotime($date1);
			$date2 = strtotime($date2);
			if ($arg == 'd')
				$diff = round(($date2-$date1)/60/60/24);
			else if ($arg == 'h')
				$diff = round(($date2-$date1)/60/60);
			else if ($arg == 'm')
				$diff = round(($date2-$date1)/60);
			else if ($arg == 's')
				$diff = $date2-$date1;
			return $diff;
		}

		public static function date_add_days($date,$days) {
			$date_start = strtotime($date.' 12:00:00');
			$date_end = $date_start+60*60*24*$days;
			return date('Y-m-d',$date_end);

		}

		public static function date_deduct_days($date,$days) {
			$date_start = strtotime($date.' 12:00:00');
			$date_end = $date_start-60*60*24*$days;
			return date('Y-m-d',$date_end);
		}

		public static function output_date($date) {
			return date('d.m.Y',strtotime($date));
		}

		public static function output_time($date) {
			return date('H:i',strtotime($date));
		}

//		public static function output_date_time($date) {
//			return $this->output_date($date).' '.$this->output_time($date);
//		}

		public static function mysql_date($date) {
			return date('Y-m-d',strtotime($date));
		}

		public static function mysql_date_time($date) {
			return date('Y-m-d H:i:s',strtotime($date));
		}

		public static function mysql_date_today() {
			return date('Y-m-d H:i:s');
		}

		public static function monthes_list_extended() {
			$temp = array();
			$temp[0] = Dates::monthes_list();
			$temp[1] = array(
								1 => 'января',
								2 => 'февраля',
								3 => 'марта',
								4 => 'апреля',
								5 => 'мая',
								6 => 'июня',
								7 => 'июля',
								8 => 'августа',
								9 => 'сентября',
								10 => 'октября',
								11 => 'ноября',
								12 => 'декабря'
							);
			return $temp;
		}

		public static function monthes_list() {
				$temp = array(
							1 => 'Январь',
							2 => 'Февраль',
							3 => 'Март',
							4 => 'Апрель',
							5 => 'Май',
							6 => 'Июнь',
							7 => 'Июль',
							8 => 'Август',
							9 => 'Сентябрь',
							10 => 'Октябрь',
							11 => 'Ноябрь',
							12 => 'Декабрь'
						);
				return $temp;
		}

	}
?>
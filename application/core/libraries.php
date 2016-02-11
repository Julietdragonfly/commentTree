<?php
	class libraries Extends configuration{
		function __construct() {
			$this->load_lib('files');
			$this->load_lib('dates');
			$this->load_lib('vk_auth');
			//$this->load_lib('image');
		}

		private function load_lib($lib) {
			include $this->libraries_path.$lib.'.php';
		}
	}
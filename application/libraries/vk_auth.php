<?php
	class vk_auth {
		private $vk_id = 4697609;
		private $vk_key = 'qfblILm0M80NMXeJ4CpF';
		private $vk_auth_path = 'https://oauth.vk.com/authorize';
		private $vk_token_path = 'https://oauth.vk.com/access_token';

		public function get_code_url() {
			$params = array(
					'client_id' => $this->vk_id,
					'scope' => 'email',
					'redirect_uri' => 'http://'.SITE_PATH.'/vk_auth/get_token',
					'response_type' => 'code',
					'v' => '5.27',
			);
			return urldecode($this->vk_auth_path.'?'.http_build_query($params));
		}

		public function authorize() {
			if (!(empty($_GET['code']))) {
				$data = $this->get_token();
				$info = $this->get_info($data);
				$info['response'][0]['email'] = $data['email'];
				return $info['response'][0];
			}
		}

		private function get_token() {	
			$code = $_GET['code'];
			$params = array(
				'client_id' => $this->vk_id,
				'client_secret' => $this->vk_key,
				'code' => $code,
				'redirect_uri' => 'http://'.SITE_PATH.'/vk_auth/get_token',
			);
			$data = json_decode(file_get_contents(urldecode($this->vk_token_path.'?'.http_build_query($params))),true);
			$result['user_id'] = $data['user_id'];
			$result['email'] = $data['email'];
			$result['access_token'] = $data['access_token'];
			return $result;
		}

		private function get_info($token) {
			if ($token) {
				$params = array(
					'uids'			=> $token['user_id'],
					'fields'		=> 'uid,first_name,last_name',
					'access_token'	=> $token['access_token']
				);
				$info = json_decode(file_get_contents('https://api.vk.com/method/users.get'.'?'.urldecode(http_build_query($params))),true);	
			}
			return $info;
		}
	}
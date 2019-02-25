<?php
if(!class_exists('InstarGram_API')){
	class InstarGram_API{
		private $url_resquest;
		private $access_token;

		public function setRequest($url){
			$this->url_resquest = $url;
			return $url;
		}

		public function setAccesstoken($token){
			$this->access_token = $token;
			return $token;
		}
		public function getAPI(){
			$url = $this->setRequest('https://api.instagram.com/v1/');
			$access_token = $this->setAccesstoken(get_option('access-token-field'));
			$api_request = $url.'users/self/media/recent/?access_token='.$access_token;
			$data = file_get_contents($api_request); 
			$content = json_decode($data); 
			return $content;
		}
	}
}
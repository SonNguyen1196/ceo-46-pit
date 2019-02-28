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
			if (get_option('access-token-field')){
				$access_token = $this->setAccesstoken(get_option('access-token-field'));
				$api_request = $url.'users/self/media/recent/?access_token='.$access_token;
				$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_VERBOSE, true);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_USERAGENT, $agent);
				curl_setopt($curl, CURLOPT_URL,$api_request);
				$result=curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				$content = json_decode($result, true);

				if ($err) {
					return $err;
				} else {
					return $content;
				}
			}
			return null;
		}
	}
}
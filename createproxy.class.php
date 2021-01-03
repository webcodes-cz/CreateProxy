<?php
/*
Name: CreateProxy Simple PHP API Class
Documentation and methods can be found here: https://createproxy.com/api
Version: 1.0
*/
namespace CreateProxy;

class CreateProxyClient {
	static $API_URL = 'https://createproxy.com/api/request/{TYPE}/{ACTION}/';

	function __construct($api_key) {

		if(strlen($api_key) != 32) {
			throw new CreateProxyException('API key must be 32 characters long!');
		}

		$this->api_key = $api_key;
	}

	public function request($type, $action, $params = array()) {
		$params['api_key'] = $this->api_key;
		$url = str_replace(array('{TYPE}', '{ACTION}'), array($type, $action), self::$API_URL);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "$url");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['SERVER_NAME']);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_ENCODING,"gzip,deflate");
		$result=curl_exec($ch);
        curl_close($ch);
		if($result === false) {
			throw new CreateProxyException('failed to perform HTTP request');
		}
		$response = json_decode($result, true);
		if(!$response) {
			throw new CreateProxyException('CreateProxy responded with invalid response');
		} else if(!isset($response['type'])) {
			throw new CreateProxyException('CreateProxy responded with incorrect status key');
		} else if($response['type'] == 'error') {
			if(isset($response['title']) AND isset($response['message'])) {
				throw new CreateProxyException($response['title']. ': ' . $response['message']);
			} else if(isset($response['message'])){
				throw new CreateProxyException('API ERROR: ' . $response['message']);
			} else {
				throw new CreateProxyException('API UNDEFINNED ERROR');
			}
		}
		return $response;
	}
	
}
class CreateProxyException extends \Exception {}
?>

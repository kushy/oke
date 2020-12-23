<?php
class FindMyiPhone {

	private $username;
	private $password;

	public $devices = array();

	private $email_updates = true;

	private $host = 'fmipmobile.icloud.com';
	private $scope;

	private $client_context = array(
		'appName' => 'FindMyiPhone',
		'appVersion' => '3.0',
		'buildVersion' => '376',
		'clientTimestamp' => 0,
		'deviceUDID' => null,
		'inactiveTime' => 1,
		'osVersion' => '7.0.3',
		'productType' => 'iPhone6,1'
	);

	private $server_context = array(
		'callbackIntervalInMS' => 10000,
		'classicUser' => false,
		'clientId' => null,
		'cloudUser' => true,
		'deviceLoadStatus' => '200',
		'enableMapStats' => false,
		'isHSA' => false,
		'lastSessionExtensionTime' => null,
		'macCount' => 0,
		'maxDeviceLoadTime' => 60000,
		'maxLocatingTime' => 90000,
		'preferredLanguage' => 'en-us',
		'prefsUpdateTime' => 0,
		'sessionLifespan' => 900000,
		'timezone' => null,
		'trackInfoCacheDurationInSecs' => 86400,
		'validRegion' => true
	);


	/**
	 * Constructor
	 * Checks requred extensions, sets username/password and gets url host for the user.
	 * @param $username - iCloud Apple ID
	 * @param $password - iCloud Password
	 */
	public function __construct($username, $password) {
		if (!extension_loaded('curl')) {
			throw new FindMyiPhoneException('PHP extension cURL is not loaded.');
		}

		$this->username = $username;
		$this->password = $password;

		$this->init_client();
	}




	/**
	 * Init Client
	 * 
	 */
	private function init_client() {
		$post_data = json_encode(array(
			'clientContext' => $this->client_context
		));

		$headers = $this->parse_curl_headers($this->make_request('initClient', $post_data, true));
if(isset($headers['X-Apple-MMe-Host'])){
		$this->host = $headers['X-Apple-MMe-Host'];
		$this->scope = $headers['X-Apple-MMe-Scope'];
		throw new FindMyiPhoneException(true);
}
else{
	throw new FindMyiPhoneException(false);
}
		$this->refresh_client();
	}


	/**
	 * Refresh Client
	 * 
	 */
	public function refresh_client() {
		$post_data = json_encode(array(
			'clientContext' => $this->client_context,
			'serverContext' => $this->server_context
		));

		/*foreach (json_decode($this->make_request('refreshClient', $post_data))->content as $id => $device) {
			$this->devices[$id] = $device;
		}*/
	}


	

	/**
	 * Make request to the Find My iPhone server.
	 * @param $method - the method
	 * @param $post_data - the POST data
	 * @param $return_headers - also return headers when true
	 * @param $headers - optional headers to send
	 * @return HTTP response
	 */
	private function make_request($method, $post_data, $return_headers = false, $headers = array()) {
		if(!is_string($method)) throw new FindMyiPhoneException('Expected $method to be a string');
		if(!$this->is_json($post_data)) throw new FindMyiPhoneException('Expected $post_data to be json');
		if(!is_array($headers)) throw new FindMyiPhoneException('Expected $headers to be an array');
		if(!is_bool($return_headers)) throw new FindMyiPhoneException('Expected $return_headers to be a bool');
		if(!isset($this->scope)) $this->scope = $this->username;

		array_push($headers, 'Accept-Language: en-us');
		array_push($headers, 'Content-Type: application/json; charset=utf-8');
		array_push($headers, 'X-Apple-Realm-Support: 1.0');
		array_push($headers, 'X-Apple-Find-Api-Ver: 3.0');
		array_push($headers, 'X-Apple-Authscheme: UserIdGuest');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_TIMEOUT => 9,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_AUTOREFERER => true,
			CURLOPT_VERBOSE => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post_data,
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_HEADER => $return_headers,
			CURLOPT_URL => sprintf("https://%s/fmipservice/device/%s/%s", $this->host, $this->scope, $method),
			CURLOPT_USERPWD => $this->username . ':' . $this->password,
			CURLOPT_USERAGENT => 'FindMyiPhone/376 CFNetwork/672.0.8 Darwin/14.0.0'
		));

		$http_result = curl_exec($curl);
		curl_close($curl);

		return $http_result;
	}


	/**
	 * Parse cURL headers
	 * @param $response - cURL response including the headers
	 * @return array of headers
	 */
	private function parse_curl_headers($response) {
		$headers = array();
		foreach (explode("\r\n", substr($response, 0, strpos($response, "\r\n\r\n"))) as $i => $line) {
			if ($i === 0) {
				$headers['http_code'] = $line;
			} else {
				list($key, $value) = explode(': ', $line);
				$headers[$key] = $value;
			}
		}
		return $headers;
	}

	/**
	 * Finds whether a variable is json.
	 */
	private function is_json($var) {
		json_decode($var);
		return (json_last_error() == JSON_ERROR_NONE);
	}
}

class FindMyiPhoneException extends Exception {}

?>

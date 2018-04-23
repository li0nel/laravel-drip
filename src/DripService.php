<?php

namespace li0nel\Drip;

use Carbon\Carbon;
use GuzzleHttp\Client;

class DripService {
	private $api_key;
	private $account_id;
	private $client;

	public function __construct($api_key, $account_id) {
		$this->api_key = $api_key;
		$this->account_id = $account_id;


		$this->client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://api.getdrip.com/v2/'.$this->account_id.'/',
			// You can set any number of default request options.
			'timeout'  => 5.0,
		]);

	}

	public function registerEvent($user, $action, $properties = null) {
		$response = $this->client->request(
			'POST',
			'events',
			[
				'headers' => ['Authorization' => 'Basic '.base64_encode($this->api_key)],
				'json' => [
					'events' => [
						[
							'email'     => $user->email,
							'action'    => $action,
							'properties'=> $properties,
							'occurred_at'=> Carbon::now()->toDateTimeString()
						]
					]
				]
		]);

		return $response->getStatusCode() === 204;
	}

	public function addTag($user, $tag) {
		$response = $this->client->request(
			'POST',
			'tags',
			[
				'headers' => ['Authorization' => 'Basic '.base64_encode($this->api_key)],
				'json' => [
					'tags' => [
						[
							'email'  => $user->email,
							'tag'    => $tag
						]
					]
				]
			]);

		return $response->getStatusCode() === 201;
	}
}

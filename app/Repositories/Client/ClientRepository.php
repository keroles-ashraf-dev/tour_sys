<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\Client\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
	/**
	 * create new record
	 * 
	 * @param array $data
	 * @return Model
	 */
	public function create($data)
	{
		$client = Client::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'phone' => $data['phone'],
		]);

		return $client;
	}
}

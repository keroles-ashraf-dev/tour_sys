<?php

namespace App\Repositories\Client;

interface ClientRepositoryInterface
{
    /**
     * Create new record
     * 
     * @param array $data
     * @return Model
     */
    public function create($data);
}

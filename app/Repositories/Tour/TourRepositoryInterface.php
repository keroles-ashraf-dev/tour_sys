<?php

namespace App\Repositories\Tour;

interface TourRepositoryInterface
{
    /**
     * Get all records
     * 
     * @return array
     */
    public function all();

    /**
     * Get record of passed id
     * 
     * @param string $slug
     * @return \Illuminate\Support\Collection
     */
    public function get($slug);

    /**
     * Create new record
     * 
     * @param array $data
     * @return void
     */
    public function create($data);
}

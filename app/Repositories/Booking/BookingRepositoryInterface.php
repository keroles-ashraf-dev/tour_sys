<?php

namespace App\Repositories\Booking;

interface BookingRepositoryInterface
{
    /**
     * Get all records
     * 
     * @param int $id
     * @return array
     */
    public function get($id);

    /**
     * Create new record
     * 
     * @param array $data
     * @return void
     */
    public function create($data);
}

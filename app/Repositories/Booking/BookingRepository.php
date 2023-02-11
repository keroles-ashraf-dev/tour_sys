<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Deal;
use App\Repositories\Booking\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
	/**
	 * get all records
	 * 
	 * @param int $id
	 * @return array
	 */
	public function get($id)
	{
		$deals = Deal::where('tour_id', '=', $id)
			->orderBy('min_adults_count', 'desc')
			->orderBy('min_children_count', 'desc')
			->get();

		return $deals;
	}

	/**
	 * create new record
	 * 
	 * @param array $data
	 * @return Model
	 */
	public function create($data)
	{
		$booking = Booking::create([
			'tour_id' => $data['tour-id'],
			'client_id' => $data['client-id'],
			'adults_count' => $data['adults-count'],
			'children_count' => $data['children-count'],
			'adult_price' => $data['adult-price'],
			'child_price' => $data['child-price'],
			'date' => $data['date'],
		]);

		return $booking;
	}
}

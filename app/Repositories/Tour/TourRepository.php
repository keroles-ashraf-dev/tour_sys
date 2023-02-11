<?php

namespace App\Repositories\Tour;

use App\Models\Tour;
use App\Models\TourTranslation;
use App\Repositories\Tour\TourRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TourRepository implements TourRepositoryInterface
{
	/**
	 * get all records
	 * 
	 * @return array
	 */
	public function all()
	{
		$tours = DB::table('tours As t')
			->select(['t.id', 't.slug', 'tt.name', 't.adult_price', 't.child_price'])
			->leftJoin('tour_translations As tt', 't.id', '=', 'tt.tour_id')
			->where('tt.locale', '=', app()->getLocale())
			->get();

		return $tours;
	}

	/**
	 * get record of given id
	 * 
	 * @param string $slug
	 * @return \Illuminate\Support\Collection
	 */
	public function get($slug)
	{
		$tour = DB::table('tours As t')
			->select(['t.id', 't.slug', 'tt.name', 't.adult_price', 't.child_price'])
			->leftJoin('tour_translations As tt', 't.id', '=', 'tt.tour_id')
			->where('t.slug', '=', $slug)
			->where('tt.locale', '=', app()->getLocale())
			->first();

		return $tour;
	}

	/**
	 * create new record
	 * 
	 * @param array $data
	 * @return void
	 */
	public function create($data)
	{
		$tour = Tour::create([
			'slug' => $data['slug'],
			'adult_price' => $data['adult-price'],
			'child_price' => $data['child-price'],
		]);

		// store translatable columns in db
		foreach (config('app.app_locales') as $code => $name) {
			TourTranslation::create([
				'tour_id' => $tour->id,
				'locale' => $code,
				'name' => $data['name_' . $code],
			]);
		}
	}
}

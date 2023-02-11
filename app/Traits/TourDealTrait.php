<?php

namespace App\Traits;

trait TourDealTrait
{
	/**
	 * Pick the proper deal for the given booking
	 * 
	 * @return array
	 */
	public function pickProperDeal($deals, $tour, $adultsCount, $childrenCount)
	{
		$adultPrice = $tour->adult_price;
		$childPrice = $tour->child_price;

		foreach ($deals as $deal) {

			// first check if there deal for adults and children
			if (
				!is_null($deal->min_adults_count) &&
				!is_null($deal->min_children_count) &&
				$adultsCount >= $deal->min_adults_count &&
				$childrenCount >= $deal->min_children_count
			) {
				$adultDiscPrice = $tour->adult_price * $deal->adult_discount;
				$childDiscPrice = $tour->child_price * $deal->child_discount;

				if ($adultPrice > $adultDiscPrice && $childPrice > $childDiscPrice) {

					$adultPrice = $adultDiscPrice;
					$childPrice = $childDiscPrice;

					continue;
				}
			}
			// second check if there deal for adults if (first) fail
			if (
				!is_null($deal->min_adults_count)
				&& $adultsCount >= $deal->min_adults_count
			) {
				$discPrice = $tour->adult_price * $deal->adult_discount;

				if ($adultPrice > $discPrice) {

					$adultPrice = $discPrice;
				}
			}
			// third check if there deal for children if (first) fail
			if (
				!is_null($deal->min_children_count) &&
				$childrenCount >= $deal->min_children_count
			) {
				$discountedPrice = $tour->child_price * $deal->child_discount;

				if ($childPrice > $discountedPrice) {

					$childPrice = $discountedPrice;
				}
			}
		}

		return ['adultPrice' => $adultPrice, 'childPrice' => $childPrice];
	}
}

<?php

namespace App\Http\Livewire;

use App\Traits\TourDealTrait;
use App\Models\Tour;
use App\Repositories\Booking\BookingRepositoryInterface;
use Livewire\Component;

class Booking extends Component
{
    use TourDealTrait;

    public $tour;
    public $deals;
    public $adultsCount = 0;
    public $childrenCount = 0;
    public $adultPrice = 0;
    public $childPrice = 0;
    public $total = 0;

    /**
     * Booking repository instance
     * 
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    /**
     * Initiate component
     * 
     * @return void
     */
    public function mount(BookingRepositoryInterface $bookingRepository)
    {
        $this->tour = Tour::where('slug', $this->tour)->first();

        $this->adultPrice = $this->tour->adult_price;
        $this->childPrice = $this->tour->child_price;

        $this->bookingRepository = $bookingRepository;

        $this->deals = $this->bookingRepository->get($this->tour->id);
    }

    /**
     * Render component
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('booking.livewire.create', [
            'slug'          => $this->tour->slug,
            'adultsCount'   => $this->adultsCount,
            'childrenCount' => $this->tour->childrenCount,
            'adultPrice'    => $this->tour->adultPrice,
            'childPrice'    => $this->tour->childPrice,
            'total'         => $this->tour->total,
        ]);
    }

    /**
     * Increment adults count
     * 
     * @return void
     */
    public function incrementAdult()
    {
        $this->adultsCount++;
        $this->updatePrices();
    }

    /**
     * Decrement adults count
     * 
     * @return void
     */
    public function decrementAdult()
    {
        if ($this->adultsCount - 1 < 0) return;
        $this->adultsCount--;
        $this->resetPrices();
        $this->updatePrices();
    }

    /**
     * Increment children count
     * 
     * @return void
     */
    public function incrementChild()
    {
        $this->childrenCount++;
        $this->updatePrices();
    }

    /**
     * Decrement children count
     * 
     * @return void
     */
    public function decrementChild()
    {
        if ($this->childrenCount - 1 < 0) return;
        $this->childrenCount--;
        $this->resetPrices();
        $this->updatePrices();
    }

    /**
     * Update adult price
     * 
     * @return void
     */
    public function updatePrices()
    {
        $results = $this->pickProperDeal($this->deals, $this->tour, $this->adultsCount, $this->childrenCount);

        $this->adultPrice = $results['adultPrice'];
        $this->childPrice = $results['childPrice'];

        $this->updateTotalPrice();
    }

    /**
     * Update total price
     * 
     * @return void
     */
    public function updateTotalPrice()
    {
        $adultsTotal = $this->adultPrice * $this->adultsCount;
        $childrenTotal = $this->childPrice * $this->childrenCount;
        $this->total = $adultsTotal + $childrenTotal;
    }

    /**
     * Reset prices
     * 
     * @return void
     */
    public function resetPrices()
    {
        $this->adultPrice = $this->tour->adult_price;
        $this->childPrice = $this->tour->child_price;
    }
}

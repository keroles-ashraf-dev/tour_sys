<?php

namespace App\Http\Controllers;

use App\Repositories\Booking\BookingRepositoryInterface;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Traits\TourDealTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use TourDealTrait;

    /**
     * Booking repository instance
     * 
     * @var TourRepositoryInterface
     */
    private $tourRepository;

    /**
     * Booking repository instance
     * 
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    /**
     * Client repository instance
     * 
     * @var ClientRepositoryInterface
     */
    private $clientRepository;

    /**
     * Constructor
     * 
     * @param BookingRepositoryInterface $bookingRepository
     */
    public function __construct(
        TourRepositoryInterface $tourRepository,
        BookingRepositoryInterface $bookingRepository,
        ClientRepositoryInterface $clientRepository,
    ) {
        $this->tourRepository = $tourRepository;
        $this->bookingRepository = $bookingRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|exists:tours,slug',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|min:10',
            'adults-count' => 'required_without:children-count|integer|max:10',
            'children-count' => 'required_without:adults-count|integer|max:10',
            'date' => 'required|after:yesterday',
        ]);

        // get booking tour information
        $tour = $this->tourRepository->get($request->slug);

        // get prices for passed adults and children (just validate prices to not depend on frontend)
        $deals = $this->bookingRepository->get($tour->id);
        $results = $this->pickProperDeal($deals, $tour, $request['adults-count'], $request['children-count']);

        // store client data
        $clientData = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ];
        $client = $this->clientRepository->create($clientData);

        // store booking data
        $bookingData = [
            'tour-id' => $tour->id,
            'client-id' => $client->id,
            'adults-count' => $request['adults-count'],
            'children-count' => $request['children-count'],
            'adult-price' => $results['adultPrice'],
            'child-price' => $results['childPrice'],
            'date' => $request['date']
        ];
        $this->bookingRepository->create($bookingData);

        session()->flash('message', __('messages.successfully_booking_created'));
        return redirect(route('tours.index'));
    }
}

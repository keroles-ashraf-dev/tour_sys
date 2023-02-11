<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tour\TourCollection;
use App\Repositories\Tour\TourRepositoryInterface;

class TourController extends Controller
{
    /**
     * Tour repository instance
     * 
     * @var TourRepositoryInterface
     */
    private $tourRepository;

    /**
     * Constructor
     * 
     * @param TourRepositoryInterface $tourRepository
     */
    public function __construct(TourRepositoryInterface $tourRepository)
    {
        $this->tourRepository = $tourRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tours = $this->tourRepository->all();

        return new TourCollection($tours);
    }
}

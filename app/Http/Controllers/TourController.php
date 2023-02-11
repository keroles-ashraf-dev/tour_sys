<?php

namespace App\Http\Controllers;

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

        return view('tour.tours', compact(['tours']));
    }

    /**
     * Show given the resource.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $tour = $this->tourRepository->get($slug);

        return view('tour.show', compact(['tour']));
    }
}

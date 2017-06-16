<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Booking;
use Illuminate\Http\Request;
use Session;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{

    /**
     * BookingController constructor.
     */
    public function __construct() {

        $this->middleware('auth')->except(['store']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $booking = Booking::paginate(25);

        return view('booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'date'        => 'required|date_format:Y-m-d',
            'customer_id' => 'required|integer|exists:customers,id',
            'cleaner_id'  => 'required|integer|exists:cleaners,id',
            'start_at'    => 'required|date_format:H:i',
            'end_at'      => 'required|date_format:H:i'
        ]);
        
        $requestData = $request->all();
        
        Booking::create($requestData);

        Session::flash('flash_message', 'Booking added!');

        return redirect('booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Booking $booking)
    {

        return view('booking.edit', compact('booking'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Booking $booking, Request $request)
    {

        $this->validate($request, [
            'date'        => 'required|date_format:Y-m-d',
            'customer_id' =>'required|integer|exists:customers,id',
            'cleaner_id'  =>'required|integer|exists:cleaners,id',
            'start_at'    => 'required|date_format:H:i',
            'end_at'      => 'required|date_format:H:i'
        ]);
        
        $requestData = $request->all();
        
        $booking->update($requestData);

        Session::flash('flash_message', 'Booking updated!');

        return redirect('booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Booking $booking)
    {
        Booking::destroy($booking->getKey());

        Session::flash('flash_message', 'Booking deleted!');

        return redirect('booking');
    }
}

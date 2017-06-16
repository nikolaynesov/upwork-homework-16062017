<?php

namespace App\Http\Controllers;

use App\Booking;
use App\City;
use App\Cleaner;
use App\Customer;
use Illuminate\Http\Request;
use DateTime;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('home', compact('cities'));
    }

    //TODO: Requires refactoring
    public function BookByPhoneNumber(Request $request) {

        $this->validate($request, [
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'phone_number' => 'required',
            'date'         => 'required|date',
            'time'         => 'required|date_format:H:i',
            'duration'     => 'required|integer|max:8',
            'city'         => 'required|integer|exists:cities,id'
        ]);

        $result = false;

        $available_to = with(new DateTime($request->time))->modify('+'.$request->duration.' hours')->format('H:i:s');

        $customer = Customer::where('phone_number', $request->phone_number)->first();

        if (empty($customer)) {

            $customer = Customer::create([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number

            ]);

        }

        $customer = Customer::firstOrCreate(['phone_number'=>$request->phone_number]);

        $cleaner = Cleaner::where('available_from', '<=', $request->time)

            ->where('available_to', '>=', $available_to)
            ->whereHas('cities', function ($query) use ($request) {

                $query->where('cities.id', $request->city);

            })
            ->whereDoesntHave('bookings', function ($query) use ($request, $available_to) {

                $query->where(function ($sub) use ($request) {

                    $sub->where('bookings.start_at', '<=', $request->time)->where('bookings.end_at', '>=', $request->time);

                })->orWhere(function ($sub) use  ($available_to) {

                    $sub->where('bookings.start_at', '<=', $available_to)->where('bookings.end_at', '>=', $available_to);

                });

            })
            ->first();


        if (!empty($cleaner)) {

            $result = Booking::create([

                'date' => $request->date,
                'customer_id' => $customer->id,
                'cleaner_id' => $cleaner->id,
                'start_at' => $request->time,
                'end_at' => $available_to

            ]);



        }

        return view('submit-result', compact('result'));

    }


}

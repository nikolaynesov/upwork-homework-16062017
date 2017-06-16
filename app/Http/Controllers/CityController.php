<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class CityController extends Controller
{

    /**
     * CityController constructor.
     */
    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::paginate(25);

        return view('city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('city.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        City::create($request->all());

        Session::flash('flash_message', 'City added!');

        return redirect('city');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        $city->update($request->all());

        Session::flash('flash_message', 'City updated!');

        return redirect('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        City::destroy($city->getKey());

        Session::flash('flash_message', 'City deleted!');

        return redirect('city');
    }
}

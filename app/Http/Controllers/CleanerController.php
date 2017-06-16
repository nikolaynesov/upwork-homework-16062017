<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cleaner;
use Illuminate\Http\Request;
use Session;

/**
 * Class CleanerController
 * @package App\Http\Controllers
 */
class CleanerController extends Controller
{

    /**
     * CleanerController constructor.
     */
    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cleaner = Cleaner::paginate(25);

        return view('cleaner.index', compact('cleaner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cities = City::all();
        return view('cleaner.create', compact('cities'));
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
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'quality_score' => 'required|string|integer|between:0.0,5.0',
            'available_from' => 'required|date_format:H:i',
            'available_to'   => 'required|date_format:H:i',
            'cities'         => 'array',
            'cities.*'       => 'exists:cities,id'
        ]);

        $cleaner = Cleaner::create($request->all());

        if (!empty($request->cities)) {

            $cleaner->cities()->sync($request->cities);

        }

        Session::flash('flash_message', 'Cleaner added!');

        return redirect('cleaner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Cleaner $cleaner)
    {
        return view('cleaner.show', compact('cleaner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Cleaner $cleaner)
    {
        $cities = City::all();
        return view('cleaner.edit', compact('cleaner', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Cleaner $cleaner, Request $request)
    {

        $this->validate($request, [
            'first_name'    => 'required|string|max:100',
            'last_name'     =>'required|string|max:100',
            'quality_score' =>'required|integer|between:0,5',
            'available_from' => 'required|date_format:H:i',
            'available_to'   => 'required|date_format:H:i',
            'cities'         => 'array',
            'cities.*'       => 'exists:cities,id'
        ]);

        $cleaner->update($request->all());

        if (!empty($request->cities)) {

            $cleaner->cities()->sync($request->cities);

        }

        Session::flash('flash_message', 'Cleaner updated!');

        return redirect('cleaner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Cleaner $cleaner)
    {
        Cleaner::destroy($cleaner->id);

        Session::flash('flash_message', 'Cleaner deleted!');

        return redirect('cleaner');
    }
}

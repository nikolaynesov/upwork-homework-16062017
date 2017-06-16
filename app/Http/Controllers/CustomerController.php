<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use Illuminate\Http\Request;
use Session;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{

    /**
     * CustomerController constructor.
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
        $customer = Customer::paginate(25);

        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customer.create');
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
            'first_name'   => 'required|string|max:100',
            'last_name'    =>'required|string|max:100',
            'phone_number' =>'required'
        ]);
        
        $requestData = $request->all();
        
        Customer::create($requestData);

        Session::flash('flash_message', 'Customer added!');

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Customer $customer, Request $request)
    {
        $this->validate($request, [
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100'
        ]);

        $requestData = $request->all();
        
        $customer->update($requestData);

        Session::flash('flash_message', 'Customer updated!');

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->getKey());

        Session::flash('flash_message', 'Customer deleted!');

        return redirect('customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signup(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:100',
            'last_name' =>'required|string|max:100',
            'phone_number' =>'required'
        ]);

        $requestData = $request->all();

        Customer::create($requestData);

        Session::flash('flash_message', 'Customer added!');

        return redirect('customer');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomingRequest;
use App\Http\Requests\UpdateIncomingRequest;
use App\Models\Customer;
use App\Models\Incoming;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');
        $incomings = Incoming::search($search)
            ->latest()
            ->paginate(10);

        return view('pages.incomings.index', compact('incomings', 'search'));
    }

    public function create(): View
    {
        $customers = Customer::where('is_delivery_bpost', true)->pluck('name', 'id');

        return view('pages.incomings.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incoming  $Incoming
     * @return \Illuminate\Http\Response
     */
    public function show(Incoming $Incoming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function edit(Incoming $incoming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomingRequest  $request
     * @param  \App\Models\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomingRequest $request, Incoming $incoming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incoming $incoming)
    {
        //
    }
}

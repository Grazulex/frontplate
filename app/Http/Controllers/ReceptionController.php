<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionRequest;
use App\Http\Requests\UpdateReceptionRequest;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Cash;

class ReceptionController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $receptions = Reception::search($search)
            ->latest()
            ->paginate(10);

        return view('pages.receptions.index', compact('receptions', 'search'));
    }

    public function create(): View
    {
        return view('pages.receptions.create');
    }

    public function store(StoreReceptionRequest $request): RedirectResponse
    {
        $reception = Reception::create($request->validated());

        Cash::create([
            "user_id"   => User::find(1)->id,
            "amount"    =>  "-".($reception->amount_cash/100),
            "comment"   =>  "Reception ". $reception->created_at
        ]);

        return redirect()
            ->route('receptions.index')
            ->withSuccess('Reception has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceptionRequest  $request
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceptionRequest $request, Reception $reception)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        //
    }
}

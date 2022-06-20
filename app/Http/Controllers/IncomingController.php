<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomingRequest;
use App\Http\Requests\UpdateIncomingRequest;
use App\Models\Customer;
use App\Models\Incoming;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class IncomingController extends Controller
{
    /**
     *
     * @param Request $request
     * @return View
     * @throws BadRequestException
     * @throws BindingResolutionException
     */
    public function index(Request $request): View
    {
        $search = $request->get('search', '');
        $incomings = Incoming::search($search)
            ->with(['customer', 'close'])
            ->withCount(['plates as normal_plates_count'=> function ($query) {
                $query->where('is_cod', false)
                ->where('is_rush', false);
            }])
            ->withCount(['plates as cod_plates_count'=> function ($query) {
                $query->where('is_cod', true);
            }])
            ->withCount(['plates as rush_plates_count'=> function ($query) {
                $query->where('is_rush', true);
            }])
            ->withSum(['plates as normal_plates_sum'=> function ($query) {
                $query->where('is_cod', false)
                ->where('is_rush', false);
            }], 'amount')
            ->withSum(['plates as cod_plates_sum'=> function ($query) {
                $query->where('is_cod', true);
            }], 'amount')
            ->withSum(['plates as rush_plates_sum'=> function ($query) {
                $query->where('is_rush', true);
            }], 'amount')
            ->latest()
            ->paginate(10);

        return view('pages.incomings.index', compact('incomings', 'search'));
    }

    /**
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function create(): View
    {
        $customers = Customer::where('is_delivery_bpost', true)->pluck('name', 'id');

        return view('pages.incomings.create', compact('customers'));
    }

    /**
     *
     * @param StoreIncomingRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function store(StoreIncomingRequest $request): RedirectResponse
    {
        $incoming = Incoming::firstOrCreate(array_merge($request->validated(), ['close_id'=>null]));

        return redirect()
            ->route('incomings.step2', $incoming)
            ->withSuccess('Incoming has been created successfully.');
    }

    /**
     *
     * @param Incoming $incoming
     * @return View
     * @throws BindingResolutionException
     */
    public function step2(Incoming $incoming): View
    {
        return view('pages.incomings.step2', compact('incoming'));
    }


    /**
     *
     * @param Incoming $incoming
     * @return ViewView|Factory
     * @throws BindingResolutionException
     */
    public function show(Incoming $incoming)
    {
        return view('pages.incomings.show', compact('incoming'));
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCloseRequest;
use App\Http\Requests\UpdateCloseRequest;
use App\Models\Cash;
use App\Models\Close;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CloseController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $closes = Close::search($search)
            ->latest()
            ->withCount('cashes')
            ->paginate(10);

        return view('pages.closes.index', compact('closes', 'search'));
    }

    public function create(): View
    {
        $cashes = Cash::whereNull('close_id')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.closes.create', compact('cashes'));
    }

    public function store(StoreCloseRequest $request): RedirectResponse
    {
        $close = Close::create($request->validated());

        $cashes = Cash::whereNull('close_id')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($cashes as $cash)
        {
            $cash->close_id = $close->id;
            $cash->update();
        }

        return redirect()
            ->route('closes.index')
            ->withSuccess('Close has been created successfully.');
    }

    public function show(Close $close): View
    {
        return view('pages.closes.show', compact('close'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Close  $close
     * @return \Illuminate\Http\Response
     */
    public function edit(Close $close)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCloseRequest  $request
     * @param  \App\Models\Close  $close
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCloseRequest $request, Close $close)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Close  $close
     * @return \Illuminate\Http\Response
     */
    public function destroy(Close $close)
    {
        //
    }
}

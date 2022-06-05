<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCloseRequest;
use App\Http\Requests\UpdateCloseRequest;
use App\Models\Cash;
use App\Models\Close;
use App\Models\Reception;
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
            ->withCount('receptions')
            ->paginate(10);

        return view('pages.closes.index', compact('closes', 'search'));
    }

    public function create(): View
    {
        $cashes = Cash::whereNull('close_id')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $receptions = Reception::whereNull('close_id')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.closes.create', compact('cashes', 'receptions'));
    }

    public function store(StoreCloseRequest $request): RedirectResponse
    {
        $close = Close::create($request->validated());

        $cashes = Cash::whereNull('close_id')->get();
        foreach ($cashes as $cash) {
            $cash->close_id = $close->id;
            $cash->update();
        }

        $diff=0;
        $receptions = Reception::whereNull('close_id')->get();
        foreach ($receptions as $reception) {
            $diff=$diff - $reception->amount_cash;
            $reception->close_id = $close->id;
            $reception->update();
        }

        $close->diff = $diff;
        $close->update();

        return redirect()
            ->route('closes.index')
            ->withSuccess('Close has been created successfully.');
    }

    public function show(Close $close): View
    {
        return view('pages.closes.show', compact('close'));
    }
}

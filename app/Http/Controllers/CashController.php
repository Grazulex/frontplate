<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCashRequest;
use App\Http\Requests\UpdateCashRequest;
use App\Models\Cash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $cashes = Cash::search($search)
            ->latest()
            ->with('user')
            ->with('close')
            ->paginate(10);
        return view('pages.cashes.index', compact('cashes', 'search'));
    }

    public function create(): View
    {
        $users = User::pluck('name', 'id');

        return view('pages.cashes.create', compact('users'));
    }

    public function store(StoreCashRequest $request): RedirectResponse
    {
        Cash::create($request->validated());

        return redirect()
            ->route('cashes.index')
            ->withSuccess('Cash has been created successfully.');
    }

    public function edit(Cash $cash): View
    {
        $users = User::pluck('name', 'id');

        return view('pages.cashes.edit', compact('cash', 'users'));
    }

    public function update(UpdateCashRequest $request, Cash $cash): RedirectResponse
    {
        $cash->update($request->validated());

        return redirect()
            ->route('cashes.index')
            ->withSuccess('Cash has been updated successfully.');
    }

    public function destroy(Cash $cash): RedirectResponse
    {
        $cash->delete();

        return redirect()
            ->route('cashes.index')
            ->withSuccess('Cashe has been deleted successfully');
    }
}

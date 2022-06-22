<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $items = Item::search($search)
            ->latest()
            ->paginate(10);

        return view('pages.items.index', compact('items', 'search'));
    }

    public function create(): View
    {
        return view('pages.items.create');
    }

    public function store(StoreItemRequest $request): RedirectResponse
    {
        $item = Item::create($request->validated());

        return redirect()
            ->route('items.index')
            ->withSuccess('Item has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item): View
    {
        return view('pages.items.edit', compact('item'));
    }

    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $item->update($request->validated());

        return redirect()
            ->route('items.index')
            ->withSuccess('Item has been updated successfully.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->withSuccess('Item has been deleted successfully');
    }
}

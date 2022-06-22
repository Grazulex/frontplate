<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\CustomerItem;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $customers = Customer::search($search)
            ->latest()
            ->withCount('incomings')
            ->withCount('items')
            ->paginate(10);

        return view('pages.customers.index', compact('customers', 'search'));
    }

    public function create(): View
    {
        return view('pages.customers.create');
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $customer = Customer::create($request->validated());

        if ($request->file()) {
            $fileName = $customer->id . '.' . $request->file('process_file')->getClientOriginalExtension();
            $filePath = $request->file('process_file')->storeAs('uploads/process', $fileName, 'public');
            $customer->process_file = '/storage/' . $filePath;
            $customer->save();
        }

        return redirect()
            ->route('customers.index')
            ->withSuccess('Customer has been created successfully.');
    }

    public function edit(Customer $customer): View
    {
        $items = Item::select('items.*', 'customer_items.quantity')
            ->leftJoin('customer_items', function ($leftJoin) use ($customer) {
                $leftJoin->on(function ($query) use ($customer) {
                    $query->on('items.id', 'customer_items.item_id')
                    ->where("customer_items.customer_id", $customer->id);
                });
            })
            ->orderBy('name')
            ->get();

        return view('pages.customers.edit', compact('customer', 'items'));
    }

    public function process(Customer $customer): StreamedResponse
    {
        $filename = $customer->id . '.pdf';

        //dd('storage/uploads/process/'.$filename);

        $headers = array(
            "Content-type"        => "application/pdf",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function () use ($filename) {
            readfile('storage/uploads/process/' . $filename);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        if ($request->file()) {
            $fileName = $customer->id . '.' . $request->file('process_file')->getClientOriginalExtension();
            $filePath = $request->file('process_file')->storeAs('uploads/process', $fileName, 'public');
            $customer->process_file = '/storage/' . $filePath;
            $customer->save();
        }

        if ($request->quantity) {
            foreach ($request->quantity as $key => $value) {
                $pack = CustomerItem::firstOrCreate(['customer_id' => $customer->id, 'item_id'=>$key]);
                if ((int)$value > 0) {
                    $pack->quantity = $value;
                    $pack->update();
                } else {
                    $pack->delete();
                }
            }
        }
        return redirect()
            ->route('customers.index')
            ->withSuccess('Customer has been updated successfully.');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->withSuccess('Customer has been deleted successfully');
    }
}

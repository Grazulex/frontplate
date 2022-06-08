<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');

        $customers = Customer::search($search)
            ->latest()
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
            $fileName = $customer->id.'.'.$request->file('process_file')->getClientOriginalExtension();
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
        return view('pages.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        if ($request->file()) {
            $fileName = $customer->id.'.'.$request->file('process_file')->getClientOriginalExtension();
            $filePath = $request->file('process_file')->storeAs('uploads/process', $fileName, 'public');
            $customer->process_file = '/storage/' . $filePath;
            $customer->save();
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

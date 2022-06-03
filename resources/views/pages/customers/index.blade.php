@extends('layouts.master', ['title' => 'Customers - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('customers.index') }}">Customers</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Customers - Listing</h3>
        @if ($message = Session::get('success'))
            <div class="border-t-4 border-success rounded-b text-success px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif

        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Name</th>
                    <th class="ltr:text-left rtl:text-right uppercase">delivery type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">is inmotiv Customer ?</th>
                    <th class="ltr:text-left rtl:text-right uppercase">process type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">process file</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>
                           {{ $customer->delivery_type->name }}
                        </td>
                        <td>{{ $customer->is_inmotiv_customer }}</td>
                        <td>
                            {{ $customer->process_type->name }}
                        </td>
                        <td>{{ $customer->process_file }}</td>
                        <td>{{ $customer->process_file }}</td>
                        <td>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                <a href="{{ route('customers.show', $customer->id) }}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>                                
                            </form>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="8">{{ __('No customers found.') }}</td>
                    </tr>
 
                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $customers->links('pagination::tailwind') }} 
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

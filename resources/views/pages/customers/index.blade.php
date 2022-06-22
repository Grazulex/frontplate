@extends('layouts.master', ['title' => 'Customers - Listing'])

@section('workspace')
    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('customers.index') }}">Customers</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="flex flex-row justify-between">
            <div class="text-xl">Customers - Listing</div>
            <div><a href="{{ route('customers.create') }}" class="border-solid border-2 border-info rounded-full text-center p-2"><i class="las la-plus"></i></a></div>
        </div>
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
                    <th class="ltr:text-left rtl:text-right uppercase">Delivery type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Is inmotiv Customer ?</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Process type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Packs</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Incomings</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>
                            <div
                                class="badge uppercase {{ $customer->delivery_type->name == App\Enums\DeliveryTypeEnums::BPOST->name ? 'badge_primary' : 'badge_secondary' }}">
                                {{ $customer->delivery_type->name }}
                            </div>
                        </td>
                        <td>
                            @if ($customer->is_inmotiv_customer)
                                <i class="las la-check-circle"></i>
                            @endif
                        </td>
                        <td>
                            <div
                                class="badge uppercase {{ $customer->process_type->name == App\Enums\ProcessTypeEnums::INMOTIV->name ? 'badge_primary' : 'badge_secondary' }}">
                                {{ $customer->process_type->name }}
                            </div>
                        </td>
                        <td>{{ $customer->items_count }}</td>
                        <td>{{ $customer->incomings_count }}</td>
                        <td>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @if ($customer->process_file)
                                    <a href="{{ route('customers.process', $customer->id) }}"
                                        class="border-solid border-2 border-success rounded-full text-center p-2"><i
                                            class="las la-file-pdf"></i></a>
                                @endif
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="border-solid border-2 border-primary rounded-full text-center p-2"><i
                                        class="las la-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="border-solid border-2 border-danger rounded-full text-center p-2"><i
                                        class="las la-trash"></i></button>
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

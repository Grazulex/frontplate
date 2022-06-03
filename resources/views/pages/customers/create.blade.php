@extends('layouts.master', ['title' => 'Customers - Create'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('customers.index') }}">Customers</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Customers - Create</h3>

        @if ($errors->any())
            <div>
                <div class="font-medium text-danger">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.store') }}" method="POST" class="relative mt-5">
            @csrf
            <label class="label block mb-2" for="amount">Name</label>
            <input value="{{ old('name') }}" id="name" name="name" type="text" class="form-control" placeholder="Enter customer name" required>

            <label class="label block mb-2" for="amount">Delivery Type</label>
            <div class="custom-select">
                <select class="form-control"
                    name="delivery_type" required>
                    @foreach(App\Enums\DeliveryTypeEnums::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('delivery_type') != $type->value ?: 'selected' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <div class="custom-select-icon la la-caret-down"></div>
            </div>

            <label class="label block mb-2" for="delivery_contact">Delivery Contact</label>
            <input value="{{ old('delivery_contact') }}" id="delivery_contact" name="delivery_contact" type="text" class="form-control" placeholder="Enter customer name">


            <label class="label block mb-2" for="delivery_street">Delivery Street</label>
            <input value="{{ old('delivery_street') }}" id="delivery_street" name="delivery_street" type="text" class="form-control" placeholder="Enter street name">


            <label class="label block mb-2" for="delivery_number">Delivery Number</label>
            <input value="{{ old('delivery_number') }}" id="delivery_number" name="delivery_number" type="text" class="form-control" placeholder="Enter street number">


            <label class="label block mb-2" for="delivery_box">Delivery Box</label>
            <input value="{{ old('delivery_box') }}" id="delivery_box" name="delivery_box" type="text" class="form-control" placeholder="Enter street box">

            <label class="label block mb-2" for="delivery_zip">Delivery Zip</label>
            <input value="{{ old('delivery_zip') }}" id="delivery_zip" name="delivery_zip" type="text" class="form-control" placeholder="Enter zip">

            <label class="label block mb-2" for="delivery_city">Delivery City</label>
            <input value="{{ old('delivery_city') }}" id="delivery_city" name="delivery_city" type="text" class="form-control" placeholder="Enter city">

            <label class="custom-checkbox">
                <input type="checkbox" id="is_delivery_grouped" name="is_delivery_grouped" value="true">
                <span></span>
                <span>Is delivery grouped ?</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="is_delivery_bpost" name="is_delivery_bpost"  value="true" checked>
                <span></span>
                <span>Is delivery by Bpost ?</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="is_inmotiv_customer" name="is_inmotiv_customer"  value="true">
                <span></span>
                <span>Is Inmotiv Customer ?</span>
            </label>

            <label class="label block mb-2" for="amount">Process Type</label>
            <div class="custom-select">
                <select class="form-control"
                    name="process_type" required>
                    @foreach(App\Enums\ProcessTypeEnums::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('process_type') != $type->value ?: 'selected' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <div class="custom-select-icon la la-caret-down"></div>
            </div>

            <label class="label block mb-2" for="amount">Location report Type</label>
            <div class="custom-select">
                <select class="form-control"
                    name="location_report_type" required>
                    @foreach(App\Enums\LocationReportTypeEnums::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('location_report_type') != $type->value ?: 'selected' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <div class="custom-select-icon la la-caret-down"></div>
            </div>

            <button type="submit" class="btn btn_primary uppercase">Save</button>

   
        </form>
    </div>

@endsection

@section('scripts')


@endsection

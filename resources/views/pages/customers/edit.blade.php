@extends('layouts.master', ['title' => 'Customers - Edit'])

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
        <h3>Customers - Edit {{ $customer->name }}</h3>

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

        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="relative mt-5">
            @csrf
            @method('PUT')
            <div class="flex mb-2">
                <div class="w-full">
                    <label class="label block mb-2" for="amount">Name</label>
                    <input value="{{ old('name', $customer->name) }}" id="name" name="name" type="text" class="form-control" placeholder="Enter customer name" required>
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-full">
                    <label class="label block mb-2" for="amount">Delivery Type</label>
                    <div class="custom-select">
                        <select class="form-control"
                            name="delivery_type" required>
                            @foreach(App\Enums\DeliveryTypeEnums::cases() as $type)
                                <option value="{{ $type->value }}" {{ old('delivery_type', $customer->delivery_type) != $type->value ?: 'selected' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="custom-select-icon la la-caret-down"></div>
                    </div>
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-full mr-2">
                    <label class="label block mb-2" for="delivery_contact">Delivery Contact</label>
                    <input value="{{ old('delivery_contact', $customer->delivery_contact) }}" id="delivery_contact" name="delivery_contact" type="text" class="form-control" placeholder="Enter customer name">
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="delivery_street">Delivery Street</label>
                    <input value="{{ old('delivery_street', $customer->delivery_street) }}" id="delivery_street" name="delivery_street" type="text" class="form-control" placeholder="Enter street name">
                </div>
                <div class="w-1/4 mr-2">
                    <label class="label block mb-2" for="delivery_number">Delivery Number</label>
                    <input value="{{ old('delivery_number', $customer->delivery_number) }}" id="delivery_number" name="delivery_number" type="text" class="form-control" placeholder="Enter street number">
                </div>
                <div class="w-1/4 mr-2">
                    <label class="label block mb-2" for="delivery_box">Delivery Box</label>
                    <input value="{{ old('delivery_box', $customer->delivery_box) }}" id="delivery_box" name="delivery_box" type="text" class="form-control" placeholder="Enter street box">
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="delivery_zip">Delivery Zip</label>
                    <input value="{{ old('delivery_zip', $customer->delivery_zip) }}" id="delivery_zip" name="delivery_zip" type="text" class="form-control" placeholder="Enter zip">
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="delivery_city">Delivery City</label>
                    <input value="{{ old('delivery_city', $customer->city) }}" id="delivery_city" name="delivery_city" type="text" class="form-control" placeholder="Enter city">
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/3 mr-2">
                    <label class="custom-checkbox">
                        <input type="checkbox" id="is_delivery_grouped" name="is_delivery_grouped" value="1" {{ old('is_delivery_grouped', $customer->is_delivery_grouped) != 1 ?: 'checked' }}>
                        <span></span>
                        <span>Is delivery grouped ?</span>
                    </label>
                </div>
                <div class="w-1/3 mr-2">
                    <label class="custom-checkbox">
                        <input type="checkbox" id="is_delivery_bpost" name="is_delivery_bpost"  value="1"  {{ old('is_delivery_bpost', $customer->is_delivery_bpost) != 1 ?: 'checked' }}>
                        <span></span>
                        <span>Is delivery by Bpost ?</span>
                    </label>
                </div>
                <div class="w-1/3 mr-2">
                    <label class="custom-checkbox">
                        <input type="checkbox" id="is_inmotiv_customer" name="is_inmotiv_customer"  value="1"  {{ old('is_inmotiv_customer', $customer->is_inmotiv_customer) != 1 ?: 'checked' }}>
                        <span></span>
                        <span>Is Inmotiv Customer ?</span>
                    </label>
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="amount">Process Type</label>
                    <div class="custom-select">
                        <select class="form-control"
                            name="process_type" required>
                            @foreach(App\Enums\ProcessTypeEnums::cases() as $type)
                                <option value="{{ $type->value }}" {{ old('process_type', $customer->process_type) != $type->value ?: 'selected' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="custom-select-icon la la-caret-down"></div>
                    </div>
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="amount">Location report Type</label>
                    <div class="custom-select">
                        <select class="form-control"
                            name="location_report_type" required>
                            @foreach(App\Enums\LocationReportTypeEnums::cases() as $type)
                                <option value="{{ $type->value }}" {{ old('location_report_type', $customer->location_report_type) != $type->value ?: 'selected' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="custom-select-icon la la-caret-down"></div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn_primary uppercase">Save</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')


@endsection

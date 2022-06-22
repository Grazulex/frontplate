@extends('layouts.master', ['title' => 'Items - Edit'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('items.index') }}">Items</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>edit</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Items - Edit {{ $item->name }}</div>

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

        <form action="{{ route('items.update', $item->id) }}" method="POST" class="relative mt-5">
            @csrf
            @method('PUT')
            <div class="flex mb-2">
                <div class="w-1/3 mr-2">
                    <label class="label block mb-2" for="name">Name</label>
                    <input value="{{ old('name', $item->name) }}" id="name" name="name" type="text" class="form-control" placeholder="Enter user name" required>
                </div>
                <div class="w-1/3 mr-2">
                    <label class="label block mb-2" for="reference_otm">Reference OTM</label>
                    <input value="{{ old('reference_otm', $item->reference_otm) }}" id="reference_otm" name="reference_otm" type="text" class="form-control" placeholder="Enter item reference of OTM" required>
                </div>
                <div class="w-1/3 mr-2">
                    <label class="label block mb-2" for="reference_customer">Reference customer</label>
                    <input value="{{ old('reference_customer', $item->reference_customer) }}" id="reference_customer" name="reference_customer" type="text" class="form-control" placeholder="Enter item reference of customer" required>
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

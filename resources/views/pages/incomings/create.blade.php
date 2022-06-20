@extends('layouts.master', ['title' => 'Incomings - Create'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('incomings.index') }}">Incomings</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Incomings - Create</div>

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

        <form action="{{ route('incomings.store') }}" method="POST" class="relative mt-5">
            @csrf
            <div class="flex mb-2">
                <div class="w-full mr-2">
                    <label class="label block mb-2" for="user_id">Customer</label>
                    <div class="custom-select">
                        <select class="form-control" id="customer_id" name="customer_id">
                            @foreach ($customers as $value => $label)
                                <option value="{{ $value }}" {{ old('user_id') != $value ?: 'selected' }}>{{ $label }}</option>
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

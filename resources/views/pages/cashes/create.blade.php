@extends('layouts.master', ['title' => 'Cashes - Create'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('cashes.index') }}">Cashes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Cashes - Create</h3>

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

        <form action="{{ route('cashes.store') }}" method="POST" class="relative mt-5">
            @csrf
            <div class="flex mb-2">
                <div class="w-full mr-2">
                    <label class="label block mb-2" for="user_id">User</label>
                    <div class="custom-select">
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach ($users as $value => $label)
                                <option value="{{ $value }}" {{ old('user_id') != $value ?: 'selected' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <div class="custom-select-icon la la-caret-down"></div>
                    </div>
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="amount">Amount</label>
                    <input value="{{ old('amount') }}" id="amount" name="amount" type="text" class="form-control" placeholder="Enter the amount">
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="comment">Comment</label>
                    <textarea id="comment" name="comment" class="form-control" rows="5">{{ old('comment') }}</textarea>
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

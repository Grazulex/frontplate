@extends('layouts.master', ['title' => 'Cashes - Edit'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('cashes.index') }}">Cashes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Edit #{{ $cash->id}}</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Cashes - Edit #{{ $cash->id }}</h3>

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

        <form action="{{ route('cashes.update', $cash->id) }}" method="POST" class="relative mt-5">
            @csrf
            @method('PUT')
            <label class="label block mb-2" for="user_id">User</label>
            <div class="custom-select">
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $value => $label)
                        <option value="{{ $value }}" {{ old('user_id', $cash->user_id) != $value ?: 'selected' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <div class="custom-select-icon la la-caret-down"></div>
            </div>

            <label class="label block mb-2" for="amount">Amount</label>
            <input value="{{ old('amount', ($cash->amount/100)) }}" id="amount" name="amount" type="text" class="form-control" placeholder="Enter text the amount">

            <label class="label block mb-2" for="comment">Comment</label>            
            <textarea id="comment" name="comment" class="form-control" rows="5">{{ old('comment', $cash->comment) }}</textarea>

            <button type="submit" class="btn btn_primary uppercase">Save</button>

        </form>
    </div>

@endsection

@section('scripts')


@endsection

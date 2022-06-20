@extends('layouts.master', ['title' => 'Receptions - Create'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('receptions.index') }}">Receptions</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Receptions - Create</div>

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

        <form action="{{ route('receptions.store') }}" method="POST" class="relative mt-5">
            @csrf
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="amount_cash">Amount Cash</label>
                    <input value="{{ old('amount_cash') }}" id="amount_cash" name="amount_cash" type="text" class="form-control" placeholder="Enter text the amount of cash">
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="amount_bbc">Amount bbc</label>
                    <input value="{{ old('amount_bbc') }}" id="amount_bbc" name="amount_bbc" type="text" class="form-control" placeholder="Enter text the amount of bbc">
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

@extends('layouts.master', ['title' => 'Incomings - Create - Step 2'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('incomings.index') }}">Incomings</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
            <li class="divider la la-arrow-right"></li>
            <li>Show #{{ $incoming->id }}/{{ $incoming->customer->name }}</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Incomings - Create - Step 2 #{{ $incoming->id }}/{{ $incoming->customer->name }}</h3>

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

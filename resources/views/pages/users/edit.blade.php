@extends('layouts.master', ['title' => 'Users - Edit'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>edit</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Users - Edit {{ $user->name }}</h3>

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

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="relative mt-5">
            @csrf
            @method('PUT')
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="name">Name</label>
                    <input value="{{ old('name', $user->name) }}" id="name" name="name" type="text" class="form-control" placeholder="Enter user name" required>
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="email">email</label>
                    <input value="{{ old('email', $user->email) }}" id="email" name="email" type="email" class="form-control" placeholder="Enter user email" required>
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

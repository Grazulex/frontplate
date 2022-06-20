@extends('layouts.master', ['title' => 'Users - Edit password'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>edit password</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Users - Edit password {{ $user->name }}</div>

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

        <form action="{{ route('users.update.password', $user->id) }}" method="POST" class="relative mt-5">
            @csrf
            <div class="flex mb-2">
                <div class="w-full mr-2">
                    <label class="label block mb-2" for="current_password">Old password</label>
                    <input id="current_password" name="current_password" type="password" class="form-control" required>
                </div>
            </div>
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="new_password">New password</label>
                    <input id="new_password" name="new_password" type="password" class="form-control" required>
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="confirm_password">New password (again)</label>
                    <input id="confirm_password" name="confirm_password" type="password" class="form-control" required>
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

@extends('layouts.master', ['title' => 'Notifications - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('notifications.index') }}">Notifications</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="flex flex-row justify-between">
            <div class="text-xl">Notifications - Listing</div>
            <form action="{{ route('notifications.destroy.all') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>
            </form>
        </div>
        @if ($message = Session::get('success'))
            <div class="border-t-4 border-success rounded-b text-success px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif
        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Content</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->created_at }}</td>
                        <td>{{ $notification->content }}</td>
                        <td>
                            <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No notifications found.') }}</td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $notifications->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

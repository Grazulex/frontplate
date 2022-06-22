@extends('layouts.master', ['title' => 'Users - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('items.index') }}">Items</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="flex flex-row justify-between">
            <div class="text-xl">Items - Listing</div>
            <div><a href="{{ route('items.create') }}" class="border-solid border-2 border-info rounded-full text-center p-2"><i class="las la-plus"></i></a></div>
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
                    <th class="ltr:text-left rtl:text-right uppercase">Name</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Reference OTM</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Reference customer</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->reference_otm }}</td>
                        <td>{{ $item->reference_customer }}</td>
                        <td>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('items.edit', $item->id) }}" class="border-solid border-2 border-primary rounded-full text-center p-2"><i class="las la-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('No Items found.') }}</td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $items->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

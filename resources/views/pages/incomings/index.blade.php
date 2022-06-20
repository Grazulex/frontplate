@extends('layouts.master', ['title' => 'Incomings - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('incomings.index') }}">Incomings</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="flex flex-row justify-between">
            <div class="text-xl">Incomings - Listing</div>
            <div><a href="{{ route('incomings.create') }}" class="border-solid border-2 border-info rounded-full text-center p-2"><i class="las la-plus"></i></a></div>
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
                    <th class="ltr:text-left rtl:text-right uppercase">Created at</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Customer</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Normal #</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Normal €</th>
                    <th class="ltr:text-left rtl:text-right uppercase">COD #</th>
                    <th class="ltr:text-left rtl:text-right uppercase">COD €</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Rush #</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Rush €</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Closing</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incomings as $incoming)
                    <tr>
                        <td>{{ $incoming->created_at }}</td>
                        <td>{{ $incoming->customer->name }}</td>
                        <td>{{ $incoming->normal_plates_count }}</td>
                        <td><x-format-amount :amount="$incoming->normal_plates_sum" currency="eur" locale="fr_BE" /></td>
                        <td>{{ $incoming->cod_plates_count }}</td>
                        <td><x-format-amount :amount="$incoming->cod_plates_sum" currency="eur" locale="fr_BE" /></td>
                        <td>{{ $incoming->rush_plates_count }}</td>
                        <td><x-format-amount :amount="$incoming->rush_plates_sum" currency="eur" locale="fr_BE" /></td>
                        <td>{{ optional($incoming->close)->created_at }}</td>
                        <td>
                            <form action="{{ route('incomings.destroy', $incoming->id) }}" method="POST">
                                <a href="{{ route('incomings.show', $incoming->id) }}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                                @csrf
                                @method('DELETE')
                                @if (!$incoming->close)
                                    <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">{{ __('No incoming found.') }}</td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $incomings->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

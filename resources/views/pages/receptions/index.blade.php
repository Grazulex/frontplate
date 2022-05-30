@extends('layouts.master', ['title' => 'Receptions - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('receptions.index')}}">Receptions</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Receptions - Listing</h3>
        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date receptions</th>
                    <th class="ltr:text-left rtl:text-right uppercase">COD Cash</th>
                    <th class="ltr:text-left rtl:text-right uppercase">COD Bbc</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Closing</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($receptions as $reception)
                    <tr>
                        <td>{{ $reception->created_at }}</td>
                        <td><x-format-amount :amount="$reception->amount_cash" currency="eur" locale="fr_BE" /></td>
                        <td><x-format-amount :amount="$reception->amount_bbc" currency="eur" locale="fr_BE" /></td>
                        <td>{{ optional($reception->close)->created_at }}</td>

                        <td>
                            <a href="{{ route('receptions.show', $reception->id)}}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="3">{{ __('No receptions found.') }}</td>
                    </tr>
 
                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $receptions->links('pagination::tailwind') }} 
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

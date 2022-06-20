@extends('layouts.master', ['title' => 'Closes - Show'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('closes.index') }}">Closes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Show {{ $close->created_at}}</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Closes - Show {{ $close->created_at}}</div>

        <table class="w-full table-fixed">
            <tbody>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Date</td>
                    <td>{{ $close->created_at }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Diff</td>
                    <td><x-format-amount :amount="$close->diff" currency="eur" locale="fr_BE" /></td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="card p-5 mt-5">
        <h4>Closes - Cashes {{ $close->created_at}}</h4>
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                    <th class="ltr:text-left rtl:text-right uppercase">User</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Amount</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Comment</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($close->cashes as $cash)
                <tr>
                    <td>{{ $cash->created_at }}</td>
                    <td>{{ $cash->user->name }}</td>
                    <td><x-format-amount :amount="$cash->amount" currency="eur" locale="fr_BE" /></td>
                    <td>{{ $cash->comment }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">{{ __('No cashes found.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <h4>Closes - Receptions {{ $close->created_at}}</h4>
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Amount cash</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Amount bbc</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($close->receptions as $reception)
                <tr>
                    <td>{{ $reception->created_at }}</td>
                    <td><x-format-amount :amount="$reception->amount_cash" currency="eur" locale="fr_BE" /></td>
                    <td><x-format-amount :amount="$reception->amount_bbc" currency="eur" locale="fr_BE" /></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('No receptions found.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <h4>Closes - Incomings {{ $close->created_at}}</h4>
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Customer</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Amount COD</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($close->incomings as $incoming)
                <tr>
                    <td>{{ $incoming->created_at }}</td>
                    <td>{{ $incoming->customer->name }}</td>
                    <td><x-format-amount :amount="$incoming->cod_plates_sum" currency="eur" locale="fr_BE" /></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('No incomings found.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')


@endsection

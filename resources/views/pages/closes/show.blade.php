@extends('layouts.master', ['title' => 'Closes - Show'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('closes.index') }}">Closes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Show {{ $close->created_at}}</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Closes - Show {{ $close->created_at}}</h3>

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
        <h4>Closes - Scans {{ $close->created_at}}</h4>
    </div>

@endsection

@section('scripts')


@endsection

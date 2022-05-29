@extends('layouts.master', ['title' => 'Plates - Show'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('plates.index') }}">Plates</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Show {{ $plate->reference}}</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Plates - Show {{ $plate->reference}}</h3>

        <table class="w-full table-fixed">
            <tbody>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Reference</td>
                    <td>{{ $plate->reference }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Order Date</td>
                    <td>{{ $plate->created_at }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Type</td>
                    <td>{{ $plate->type }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Origin</td>
                    <td>{{ $plate->origin->name }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Order ID</td>
                    <td>{{ $plate->order_id }}</td>
                </tr>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Customer</td>
                    <td>{{ $plate->customer }}</td>
                </tr>
                @if ($plate->production)
                    <tr>
                        <td class="ltr:text-left rtl:text-right uppercase">Production Date</td>
                        <td><a href="{{ route('productions.show', $plate->production->id) }}">{{ $plate->production->created_at }}</a></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>



    <div class="card p-5 mt-5">
        <h4>Plates - Details {{ $plate->reference}}</h4>
        <table class="w-full table-fixed">
            <tbody>
            @forelse ($plate->datas as $key => $data)
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">{{ $key }}</td>
                    <td>{{ $data }}</td>
                </tr>
            @empty   
                <tr>
                    <td colspan="2">{{ __('No datas found.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')


@endsection

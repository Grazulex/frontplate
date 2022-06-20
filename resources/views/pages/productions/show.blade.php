@extends('layouts.master', ['title' => 'Productions - Show'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('productions.index') }}">Productions</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Show {{ $production->created_at}}</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Productions - Show {{ $production->created_at}}</div>
        <table class="w-full table-fixed">
            <tbody>
                <tr>
                    <td class="ltr:text-left rtl:text-right uppercase">Date</td>
                    <td>{{ $production->created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>



    <div class="card p-5 mt-5">
        <h4>Production - Plates {{ $production->created_at}}</h4>
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Reference</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Origin</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Customer</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($production->plates as $plate)
                <tr>
                    <td><a href="{{ route('plates.show', $plate->id) }}">{{ $plate->reference }}</a></td>
                    <td>
                        {{ $plate->type }}
                        @if ($plate->is_incoming)
                            (*)
                        @endif
                    </td>
                    <td>{{ $plate->origin->name }}</td>
                    <td>{{ $plate->customer }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">{{ __('No plates found.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')


@endsection

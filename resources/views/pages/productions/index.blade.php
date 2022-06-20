@extends('layouts.master', ['title' => 'Productions - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('productions.index')}}">Productions</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Productions - Listing</div>
        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date production</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Plates</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productions as $production)
                    <tr>
                        <td>{{ $production->created_at }}</td>
                        <td>{{ $production->plates_count }}</td>

                        <td>
                            <a href="{{ route('productions.show', $production->id)}}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                            <a href="{{ route('productions.print', $production->id)}}" class="border-solid border-2 border-primary rounded-full text-center p-2"><i class="las la-file-csv"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No playes found.') }}</td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $productions->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

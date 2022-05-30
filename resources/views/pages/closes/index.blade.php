@extends('layouts.master', ['title' => 'Closes - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('closes.index')}}">Closes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Closes - Listing</h3>
        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date close</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Cashes</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Receptions</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($closes as $close)
                    <tr>
                        <td>{{ $close->created_at }}</td>
                        <td>{{ $close->cashes_count }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('closes.show', $close->id)}}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="4">{{ __('No closes found.') }}</td>
                    </tr>
 
                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $closes->links('pagination::tailwind') }} 
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

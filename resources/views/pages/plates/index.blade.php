@extends('layouts.master', ['title' => 'Plates - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="#">Plates</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Plates - Listing</h3>
        <table class="table table_hoverable w-full mt-3">
            <thead>
                <tr>
                    <th class="ltr:text-left rtl:text-right uppercase">Date order</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Reference</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Type</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Origin</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Order Id</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Customer</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Production</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plates as $plate)
                    <tr>
                        <td>{{ $plate->created_at }}</td>
                        <td>
                            <div class="@if(in_array($plate->type, $types) ) border-solid border-4 border-danger rounded-lg text-danger text-center @endif> uppercase">
                                {{ $plate->reference }}
                            </div>
                        </td>
                        <td>{{ $plate->type }}</td>
                        <td>
                            <div class="badge uppercase {{ $plate->origin->name ==  'ESHOP' ? 'badge_primary' : 'badge_secondary'  }}">
                                {{ $plate->origin->name }}
                            </div>
                        </td>
                        <td>{{ $plate->order_id }}</td>
                        <td data-bs-toggle="tooltip" data-bs-placement="right" title="{{ $plate->customer_key }}">{{ $plate->customer }}</td>
                        <td>
                            @if ($plate->production)
                                <a href="">
                                    {{ optional($plate->production)->created_at }}
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                            <a href="" class="border-solid border-2 border-info rounded-full text-center p-2"><i class="las la-pen"></i></a>
                            <a href="" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></a>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="8">{{ __('No playes found.') }}</td>
                    </tr>
 
                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $plates->links('pagination::tailwind') }} 
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

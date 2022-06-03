@extends('layouts.master', ['title' => 'Plates - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('plates.index') }}">Plates</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Plates - Listing</h3>
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
                            <form action="{{ route('plates.destroy', $plate->id) }}" method="POST">
                                <a href="{{ route('plates.show', $plate->id) }}" class="border-solid border-2 border-success rounded-full text-center p-2"><i class="las la-eye"></i></a>
                                @if (!$plate->production)
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>                                
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="8">{{ __('No plates found.') }}</td>
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

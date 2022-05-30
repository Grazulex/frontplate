@extends('layouts.master', ['title' => 'Cashes - Listing'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('cashes.index') }}">Cashes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Listing</li>
        </ul>
    </section>

    <div class="card p-5">
        <h3>Cashes - Listing</h3>
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
                    <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                    <th class="ltr:text-left rtl:text-right uppercase">User</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Amount</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Comment</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Total</th>
                    <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cashes as $cash)
                    <tr>
                        <td>{{ $cash->created_at }}</td>
                        <td>{{ $cash->user->name }}</td>
                        <td><x-format-amount :amount="$cash->amount" currency="eur" locale="fr_BE" /></td>
                        <td>{{ $cash->comment }}</td>
                        <td><x-format-amount :amount="$cash->total" currency="eur" locale="fr_BE" /></td>
                        <td>
                            <form action="{{ route('cashes.destroy', $cash->id) }}" method="POST">
                                <a href="{{ route('cashes.edit', $cash->id) }}" class="border-solid border-2 border-primary rounded-full text-center p-2"><i class="las la-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-solid border-2 border-danger rounded-full text-center p-2"><i class="las la-trash"></i></button>                                
                            </form>
                        </td>
                    </tr>
                @empty   
                    <tr>
                        <td colspan="6">{{ __('No cashes found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="row py-2">
            <div class="col-md-12">
                {{ $cashes->links('pagination::tailwind') }} 
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

@extends('layouts.master', ['title' => 'Closes - Create'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="text-3xl">Dashboard</div>
        <ul>
            <li><a href="{{ route('closes.index') }}">Closes</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
        </ul>
    </section>

    <div class="card p-5">
        <div class="text-xl">Closes - Create</div>

        @if ($errors->any())
            <div>
                <div class="font-medium text-danger">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('closes.store') }}" method="POST" class="relative mt-5">
            @csrf
            <h3>Cashes</h3>
            <table class="table table_hoverable w-full mt-3">
                <thead>
                    <tr>
                        <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                        <th class="ltr:text-left rtl:text-right uppercase">User</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Amount</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Comment</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Total</th>
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('No cashes found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h3>Receptions</h3>
            <table class="table table_hoverable w-full mt-3">
                <thead>
                    <tr>
                        <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Amount cash</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Amount bbc</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($receptions as $reception)
                        <tr>
                            <td>{{ $reception->created_at }}</td>
                            <td><x-format-amount :amount="$reception->amount_cash" currency="eur" locale="fr_BE" /></td>
                            <td><x-format-amount :amount="$reception->amount_bbc" currency="eur" locale="fr_BE" /></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('No receptions found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h3>Incomings</h3>
            <table class="table table_hoverable w-full mt-3">
                <thead>
                    <tr>
                        <th class="ltr:text-left rtl:text-right uppercase">Date</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Customer</th>
                        <th class="ltr:text-left rtl:text-right uppercase">Amount COD</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($incomings as $incoming)
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


            <button type="submit" class="btn btn_primary uppercase">Save</button>

        </form>
    </div>

@endsection

@section('scripts')


@endsection

@extends('layouts.master', ['title' => 'Incomings - Create - Step 2'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="{{ route('incomings.index') }}">Incomings</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Create</li>
            <li class="divider la la-arrow-right"></li>
            <li>Step 2 #{{ $incoming->id }}/{{ $incoming->customer->name }}</li>
        </ul>
    </section>

    <div class="card p-5" x-data="{
        count: 0,
        items: [],
        getIncominsPlates() {
            fetch('/api/incomings/cod?id='+{{ $incoming->id }}, {
                method: 'GET',
            })
            .then((response) => response.json())
            .then((json) => this.items = json);
        }
    }"
    x-init="getIncominsPlates()">
        <h3>Incomings - Create - Step 2 #{{ $incoming->id }}/{{ $incoming->customer->name }}</h3>
        <div class="font-medium text-danger text-3xl">
            Please, scan now the <span class="bg-social-pinterest text-warning uppercase">cod</span> plates please
        </div>

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

        <form action="{{ route('incomings.store') }}" method="POST" class="relative mt-5">
            @csrf
            <div class="flex mb-2">
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="plate">Plate</label>
                    <input id="plate" name="plate" type="text" class="form-control" autofocus tabindex="1">
                </div>
                <div class="w-1/2 mr-2">
                    <label class="label block mb-2" for="cod">COD</label>
                    <input id="cod" name="cod" type="text" class="form-control" tabindex="2">
                </div>
            </div>
            <hr>
            <div class="flex mb-2">
                <div class="w-1/6 mr-2">
                    <div
                        class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">COD #</p>
                            <div class="text-warning mt-5 text-3xl leading-none" x-text="items.length"></div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 mr-2">
                    <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">COD €</p>
                            <div class="text-warning mt-5 text-3xl leading-none" x-text="items.length"></div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 mr-2">
                    <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">non-COD #</p>
                            <div class="text-social-whatsapp mt-5 text-3xl leading-none">0</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 mr-2">
                    <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">Rush #</p>
                            <div class="text-info mt-5 text-3xl leading-none">0</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 mr-2">
                    <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">Rush €</p>
                            <div class="text-info mt-5 text-3xl leading-none">0</div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 mr-2">
                    <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <div>
                            <p class="mt-2">Total</p>
                            <div class="text-danger mt-5 text-3xl leading-none">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex mb-2">
                <div class="w-1/2">
                    <table class="table table_hoverable w-full mt-3">
                        <thead>
                            <tr>
                                <th class="ltr:text-left rtl:text-right uppercase">Plate</th>
                                <th class="ltr:text-left rtl:text-right uppercase">COD</th>
                                <th class="ltr:text-left rtl:text-right uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="item in items">
                                <tr>
                                    <td><span class="px-2 border-solid border-2 border-danger rounded-lg text-danger text-center uppercase" x-text="item.reference"></span></td>
                                    <td x-text="item.amount/100"></td>
                                    <td>del</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right mt-5">
                <button type="submit" class="btn btn_primary uppercase">Next</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')


@endsection

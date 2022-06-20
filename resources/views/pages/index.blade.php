@extends('layouts.master', ['title' => 'Dashboard'])

@section('workspace')

    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="#">Login</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Dashboard</li>
        </ul>
    </section>

    <div class="grid lg:grid-cols-2 gap-5">

        <!-- Summaries -->
        <div class="grid sm:grid-cols-3 gap-5">
            <a href="{{ route('plates.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <span class="text-warning text-5xl leading-none las la-car-alt"></span>
                        <p class="mt-2">Plates waiting for production</p>
                        <div class="text-warning mt-5 text-3xl leading-none">{{ $platesWaiting }}</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('productions.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <span class="text-primary text-5xl leading-none las la-tools"></span>
                        <p class="mt-2">Plates poducted (last 7 days)</p>
                        <div class="text-primary mt-5 text-3xl leading-none">{{ $platesproducted7days }}</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('productions.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <span class="text-primary text-5xl leading-none las la-tools"></span>
                        <p class="mt-2">Plates producted (last 24 hours)</p>
                        <div class="text-primary mt-5 text-3xl leading-none">{{ $platesproducted1days }}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-truck-moving"></span>
                    <p class="mt-2">Plates shipped (last 7 days)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-truck-moving"></span>
                    <p class="mt-2">Plates shipped (last 24 hours)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-danger text-5xl leading-none las la-plane-departure"></span>
                    <p class="mt-2">Next Day off</p>
                    <div class="text-danger mt-5 text-3xl leading-none">{{ $nextHoliday }}</div>
                </div>
            </div>
        </div>


        <!-- Summaries -->
        <div class="grid sm:grid-cols-3 gap-5">
            <a href="{{ route('plates.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <span class="text-info text-5xl leading-none las la-shipping-fast"></span>
                        <p class="mt-2">Bpost plates coming</p>
                        <div class="text-info mt-5 text-3xl leading-none">{{ $incomingsWaiting }}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
        </div>
    </div>

@endsection

@section('scripts')

@endsection

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
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-car"></span>
                    <p class="mt-2">Plates waiting</p>
                    <div class="text-primary mt-5 text-3xl leading-none">{{ $platesWaiting }}</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-industry"></span>
                    <p class="mt-2">Plates poducted (last 7 days)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">{{ $platesproducted7days }}</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-industry"></span>
                    <p class="mt-2">Plates producted (last 24 hours)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">{{ $platesproducted1days }}</div>
                </div>
            </div>            
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-truck"></span>
                    <p class="mt-2">Plates shipped (last 7 days)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <span class="text-primary text-5xl leading-none las la-truck"></span>
                    <p class="mt-2">Plates shipped (last 24 hours)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>            
        </div>        
    </div>

@endsection

@section('scripts')

@endsection

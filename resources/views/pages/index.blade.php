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
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-warning leading-none" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <p class="mt-2">Plates waiting</p>
                        <div class="text-warning mt-5 text-3xl leading-none">{{ $platesWaiting }}</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('productions.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-primary leading-none" viewBox="0 0 16 16">
                            <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                        </svg>
                        <p class="mt-2">Plates poducted (last 7 days)</p>
                        <div class="text-primary mt-5 text-3xl leading-none">{{ $platesproducted7days }}</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('productions.index') }}">
                <div
                    class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-primary leading-none" viewBox="0 0 16 16">
                            <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                        </svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-primary leading-none" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <p class="mt-2">Plates shipped (last 7 days)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-primary leading-none" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <p class="mt-2">Plates shipped (last 24 hours)</p>
                    <div class="text-primary mt-5 text-3xl leading-none">0</div>
                </div>
            </div>
            <div
                class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width:48px;height:48px;display:inline-block" fill="currentColor" class="text-5xl text-danger leading-none" viewBox="0 0 16 16">
                        <path d="M4.968 9.75a.5.5 0 1 0-.866.5A4.498 4.498 0 0 0 8 12.5a4.5 4.5 0 0 0 3.898-2.25.5.5 0 1 0-.866-.5A3.498 3.498 0 0 1 8 11.5a3.498 3.498 0 0 1-3.032-1.75zM7 5.116V5a1 1 0 0 0-1-1H3.28a1 1 0 0 0-.97 1.243l.311 1.242A2 2 0 0 0 4.561 8H5a2 2 0 0 0 1.994-1.839A2.99 2.99 0 0 1 8 6c.393 0 .74.064 1.006.161A2 2 0 0 0 11 8h.438a2 2 0 0 0 1.94-1.515l.311-1.242A1 1 0 0 0 12.72 4H10a1 1 0 0 0-1 1v.116A4.22 4.22 0 0 0 8 5c-.35 0-.69.04-1 .116z"/>
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-1 0A7 7 0 1 0 1 8a7 7 0 0 0 14 0z"/>
                    </svg>
                    <p class="mt-2">Next Day off</p>
                    <div class="text-danger mt-5 text-3xl leading-none">{{ $nextHoliday }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

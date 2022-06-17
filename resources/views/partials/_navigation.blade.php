<!-- Top Bar -->
<header class="top-bar">

    <!-- Menu Toggler -->
    <button type="button" class="menu-toggler la la-bars" data-toggle="menu"></button>

    <!-- Brand -->
    <span class="brand">{{ config('app.name') }}</span>

    <!-- Search -->
    <form class="hidden md:block ltr:ml-10 rtl:mr-10" action="#">
        <label class="form-control-addon-within rounded-full">
            <input type="text" class="form-control border-none" placeholder="Search" name="search">
            <button type="button"
                class="btn btn-link text-gray-300 dark:text-gray-700 dark:hover:text-primary text-xl leading-none la la-search ltr:mr-4 rtl:ml-4"></button>
        </label>
    </form>

    <!-- Right -->
    <div class="flex items-center ltr:ml-auto rtl:mr-auto">

        <!-- Dark Mode -->
        <label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
            <input id="darkModeToggler" type="checkbox">
            <span></span>
        </label>

        <!-- Fullscreen -->
        <button id="fullScreenToggler" type="button"
            class="hidden lg:inline-block btn-link ltr:ml-3 rtl:mr-3 px-2 text-2xl leading-none la la-expand-arrows-alt"
            data-toggle="tooltip" data-tippy-content="Fullscreen"></button>

        <!-- Notifications -->
        <x-notifications />

        <!-- User Menu -->
        <div class="dropdown">
            <button class="flex items-center ltr:ml-4 rtl:mr-4" data-toggle="custom-dropdown-menu"
                data-tippy-arrow="true" data-tippy-placement="bottom-end">
                <span class="avatar">{{ Auth::user()->initials() }}</span>
            </button>
            <div class="custom-dropdown-menu w-64">
                <div class="p-5">
                    <h5 class="uppercase">{{ Auth::user()->name }}</h5>
                    <p>Admin</p>
                </div>
                <hr>
                <div class="p-5">
                    <a href="{{ route('users.edit', Auth::user()) }}" class="flex items-center text-normal hover:text-primary">
                        <span class="la la-user-circle text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        View Profile
                    </a>
                    <a href="{{ route('users.edit.password', Auth::user()) }}" class="flex items-center text-normal hover:text-primary mt-5">
                        <span class="la la-key text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        Change Password
                    </a>
                </div>
                <hr>
                <div class="p-5">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a
                            href="route('logout')"
                            onclick="event.preventDefault();this.closest('form').submit();"
                            class="flex items-center text-normal hover:text-primary">
                                <span class="la la-power-off text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                                Logout
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Menu Bar -->
<!-- https://icons.getbootstrap.com/ -->
<aside class="menu-bar menu-sticky">
    <div class="menu-items">
        <div class="menu-header hidden">
            <a href="#" class="flex items-center mx-8 mt-8">
                <span class="avatar w-16 h-16">{{ Auth::user()->initials() }}</span>
                <div class="ltr:ml-4 rtl:mr-4 ltr:text-left rtl:text-right">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p class="mt-2">Admin</p>
                </div>
            </a>
            <hr class="mx-8 my-4">
        </div>
        <a href="{{ url('/') }}" class="link" data-toggle="tooltip-menu" data-tippy-content="Dashboard">
            <span class="icon la la-laptop"></span>
            <span class="title">Dashboard</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=plate]" data-toggle="tooltip-menu" data-tippy-content="Plate">
            <span class="icon las la-car"></span>
            <span class="title">Plates</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=cash]" data-toggle="tooltip-menu"
            data-tippy-content="Cash">
            <span class="icon las la-cash-register"></span>
            <span class="title">Cash Ledger</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=customer]" data-toggle="tooltip-menu"
            data-tippy-content="Customer">
            <span class="icon las la-users"></span>
            <span class="title">Customers</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=user]" data-toggle="tooltip-menu"
            data-tippy-content="User">
            <span class="icon las la-user-tie"></span>
            <span class="title">Users</span>
        </a>
    </div>

    <div class="menu-detail" data-menu="plate">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('plates.index') }}">
                <span class="icon las la-car"></span>
                Plates
            </a>
            <a href="{{ route('productions.index') }}">
                <span class="icon las la-industry"></span>
                Production files
            </a>
            <a href="{{ route('incomings.index') }}">
                <span class="icon las la-sign-in-alt"></span>
                Incomings
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('incomings.create') }}">
                <span class="icon las la-sign-in-alt"></span>
                Reception
            </a>
            <a href="{{ url('/ui/components/avatars') }}">
                <span class="icon las la-sign-out-alt"></span>
                Return Bpost
            </a>
        </div>
    </div>

    <div class="menu-detail" data-menu="cash">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('cashes.index') }}">
                <span class="las la-cash-register"></span>
                Cash ledgers
            </a>
            <a href="{{ route('receptions.index') }}">
                <span class="icon las la-sign-in-alt"></span>
                Reception
            </a>
            <a href="{{ route('closes.index') }}">
                <span class="icon las la-coins"></span>
                Closing
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('cashes.create') }}">
                <span class="las la-cash-register"></span>
                Cash Ledgers
            </a>
            <a href="{{ route('receptions.create') }}">
                <span class="icon las la-sign-in-alt"></span>
                Reception
            </a>
            <a href="{{ route('closes.create') }}">
                <span class="icon las la-coins"></span>
                Closing
            </a>
        </div>
    </div>

    <div class="menu-detail" data-menu="customer">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('customers.index') }}">
                <span class="icon las la-users"></span>
                Customers
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('customers.create') }}">
                <span class="icon las la-users"></span>
                Customer
            </a>
        </div>
    </div>

    <div class="menu-detail" data-menu="user">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('users.index') }}">
                <span class="icon las la-user-tie"></span>
                Users
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('users.create') }}">
                <span class="icon las la-user-tie"></span>
                User
            </a>
        </div>
    </div>
</aside>
@section('scripts')

@endsection
@include('partials._customizer')

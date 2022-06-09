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

        <!-- Apps -->
        <div class="dropdown self-stretch">
            <button type="button"
                class="flex items-center h-full btn-link ltr:ml-4 rtl:mr-4 lg:ltr:ml-1 lg:rtl:mr-1 px-2 text-2xl leading-none la la-box"
                data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom">
            </button>
            <div class="custom-dropdown-menu p-5 text-center">
                <div class="flex justify-around">
                    <a href="#" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-cog text-5xl leading-none"></span>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-users text-5xl leading-none"></span>
                        <span>Users</span>
                    </a>
                </div>
                <div class="flex justify-around">
                    <a href="#" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-book text-5xl leading-none"></span>
                        <span>Docs</span>
                    </a>
                    <a href="#" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-dollar text-5xl leading-none"></span>
                        <span>Shop</span>
                    </a>
                </div>
            </div>
        </div>

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
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 icon" viewBox="0 0 16 16">
            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z"/>
        </svg>
        <span class="title">Dashboard</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=plate]" data-toggle="tooltip-menu" data-tippy-content="Plate">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 icon" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <span class="title">Plates</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=cash]" data-toggle="tooltip-menu"
            data-tippy-content="Cash">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
            </svg>
            <span class="title">Cash Ledger</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=customer]" data-toggle="tooltip-menu"
            data-tippy-content="Customer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 icon" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>
            <span class="title">Customers</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=user]" data-toggle="tooltip-menu"
            data-tippy-content="User">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 icon" viewBox="0 0 16 16">
                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
            </svg>
            <span class="title">Users</span>
        </a>
    </div>

    <div class="menu-detail" data-menu="plate">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('plates.index') }}">
                <span class="las la-car"></span>
                Plates
            </a>
            <a href="{{ route('productions.index') }}">
                <span class="las la-industry"></span>
                Production files
            </a>
            <a href="{{ route('incomings.index') }}">
                <span class="las la-shipping-fast"></span>
                Incomings
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('incomings.create') }}">
                <span class="las la-redo"></span>
                Reception
            </a>
            <a href="{{ url('/ui/components/avatars') }}">
                <span class="las la-undo"></span>
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
                <span class="las la-wallet"></span>
                Reception
            </a>
            <a href="{{ route('closes.index') }}">
                <span class="las la-clipboard-list"></span>
                Closing
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('cashes.create') }}">
                <span class="las la-euro-sign"></span>
                Cash Ledgers
            </a>
            <a href="{{ route('receptions.create') }}">
                <span class="las la-mail-bulk"></span>
                Reception
            </a>
            <a href="{{ route('closes.create') }}">
                <span class="las la-balance-scale"></span>
                Closing
            </a>
        </div>
    </div>

    <div class="menu-detail" data-menu="customer">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('customers.index') }}">
                <span class="las la-users"></span>
                Customers
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('customers.create') }}">
                <span class="las la-user"></span>
                Customer
            </a>
        </div>
    </div>

    <div class="menu-detail" data-menu="user">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Listing</h6>
            <a href="{{ route('users.index') }}">
                <span class="las la-user-tie"></span>
                Users
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('users.create') }}">
                <span class="las la-user-tie"></span>
                User
            </a>
        </div>
    </div>
</aside>
@section('scripts')

@endsection
@include('partials._customizer')

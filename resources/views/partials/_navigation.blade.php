<!-- Top Bar -->
<header class="top-bar">

    <!-- Menu Toggler -->
    <button type="button" class="menu-toggler la la-bars" data-toggle="menu"></button>

    <!-- Brand -->
    <span class="brand">FrontPlate</span>

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
        <div class="dropdown self-stretch">
            <button type="button"
                class="relative flex items-center h-full btn-link ltr:ml-1 rtl:mr-1 px-2 text-2xl leading-none la la-bell"
                data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom-end">
                <span
                    class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary">3</span>
            </button>
            <div class="custom-dropdown-menu">
                <div class="flex items-center px-5 py-2">
                    <h5 class="mb-0 uppercase">Notifications</h5>
                    <button class="btn btn_outlined btn_warning uppercase ltr:ml-auto rtl:mr-auto">Clear All</button>
                </div>
                <hr>
                <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                    <a href="#">
                        <h6 class="uppercase">Heading One</h6>
                    </a>
                    <p>Lorem ipsum dolor, sit amet consectetur.</p>
                    <small>Today</small>
                </div>
                <hr>
                <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                    <a href="#">
                        <h6 class="uppercase">Heading Two</h6>
                    </a>
                    <p>Mollitia sequi dolor architecto aut deserunt.</p>
                    <small>Yesterday</small>
                </div>
                <hr>
                <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                    <a href="#">
                        <h6 class="uppercase">Heading Three</h6>
                    </a>
                    <p>Nobis reprehenderit sed quos deserunt</p>
                    <small>Last Week</small>
                </div>
            </div>
        </div>

        <!-- User Menu -->
        <div class="dropdown">
            <button class="flex items-center ltr:ml-4 rtl:mr-4" data-toggle="custom-dropdown-menu"
                data-tippy-arrow="true" data-tippy-placement="bottom-end">
                <span class="avatar">JD</span>
            </button>
            <div class="custom-dropdown-menu w-64">
                <div class="p-5">
                    <h5 class="uppercase">John Doe</h5>
                    <p>Editor</p>
                </div>
                <hr>
                <div class="p-5">
                    <a href="#" class="flex items-center text-normal hover:text-primary">
                        <span class="la la-user-circle text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        View Profile
                    </a>
                    <a href="#" class="flex items-center text-normal hover:text-primary mt-5">
                        <span class="la la-key text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        Change Password
                    </a>
                </div>
                <hr>
                <div class="p-5">
                    <a href="#" class="flex items-center text-normal hover:text-primary">
                        <span class="la la-power-off text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Menu Bar -->
<aside class="menu-bar menu-sticky">
    <div class="menu-items">
        <div class="menu-header hidden">
            <a href="#" class="flex items-center mx-8 mt-8">
                <span class="avatar w-16 h-16">JD</span>
                <div class="ltr:ml-4 rtl:mr-4 ltr:text-left rtl:text-right">
                    <h5>John Doe</h5>
                    <p class="mt-2">Editor</p>
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
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ url('/ui/components/alerts') }}">
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
            <a href="{{ url('pages/auth/forgot-password') }}">
                <span class="las la-clipboard-list"></span>
                Closing
            </a>
            <hr>
            <h6 class="uppercase">Inserts</h6>
            <a href="{{ route('cashes.create') }}">
                <span class="las la-euro-sign"></span>
                Cash Ledgers
            </a>
        </div>
    </div>
</aside>

@include('partials._customizer')
<div class="dropdown self-stretch">
    <button type="button"
        class="relative flex items-center h-full btn-link ltr:ml-1 rtl:mr-1 px-2 text-2xl leading-none la la-bell"
        data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom-end">
        <span
            class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary">{{ $notifications->count() }}</span>
    </button>
    <div class="custom-dropdown-menu">
        <div class="flex items-center px-5 py-2">
            <h5 class="mb-0 uppercase">Notifications</h5>
            <button class="btn btn_outlined btn_warning uppercase ltr:ml-auto rtl:mr-auto">Clear All</button>
        </div>
        @forelse ($notifications as $notification)
            <hr>
            <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                <a href="#">
                    <h6 class="uppercase">{{ $notification->created_at }}</h6>
                </a>
                <p>{{ $notification->content }}</p>
            </div>
        @empty
            <hr>
            <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                <small>no notifications</small>
            </div>
        @endforelse
    </div>
</div>

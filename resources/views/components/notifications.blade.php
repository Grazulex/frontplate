<style>
    [x-cloak] { display: none !important; }
</style>
<div class="relative" x-data="{
        open: false,
        count: 0,
        items: [],
        getNotifications() {
            fetch('/api/notifications', {
                method: 'GET',
            })
            .then((response) => response.json())
            .then((json) => this.items = json);
        }
    }"
    x-init="getNotifications()">
    <button type="button"
        class="relative flex items-center h-full btn-link ltr:ml-1 rtl:mr-1 px-2 text-2xl leading-none la la-bell"
        @click="open = ! open"

        >
        <span
            class="absolute top-0 right-0 -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary"
            x-text="items.length"
            >
        </span>
    </button>
   <div
    x-cloak
    class="absolute z-10 left-1/2 transform -translate-x-3/4 mt-3 px-2 w-screen max-w-xs sm:px-0"
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    @mouseleave="open = false"
    >
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="relative grid bg-white px-2">
        <template x-for="item in items">
                <div>
                    <hr>
                    <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                        <a href="#" @click="items = items.filter((currItem) => currItem != item)">
                            <h6 class="uppercase" x-text="item.created_at"></h6>
                            <p class="text-black" x-text="item.content"></p>
                        </a>
                    </div>
                </div>
            </template>
      </div>
    </div>
  </div>
</div>
@section('scripts')

@endsection

<div
    class="dropdown self-stretch"
    x-data="{
        open: false,
        count: {{ $notifications->count() }},
        items: null,
        getNotifications() {
            fetch('https://jsonplaceholder.typicode.com/posts')
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
            class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary"
            x-text="count"
            >
        </span>
    </button>
    <div x-show="open">
        <div class="flex items-center px-5 py-2">
            <h5 class="mb-0 uppercase">Notifications</h5>
            <button class="btn btn_outlined btn_warning uppercase ltr:ml-auto rtl:mr-auto">Clear All</button>
        </div>
        <template x-for="item in items">
            <div>
                <hr>
                <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                    <a href="#">
                        <h6 class="uppercase" x-text="item.id"></h6>
                        <p class="text-black" x-text="item.title"></p>
                    </a>
                </div>
            </div>
        </template>
    </div>
</div>
<script type="text/javascript">
    function getNotifications() {
        fetch('https://pokeapi.co/api/v2/pokemon/pikachu')
            .then((response) => response.json())
            .then((json) => this.pokemon = json);
    }
        function notifications() {
            return {
                open: true,
                readNotification(id) {
                    this.open = ! this.open;
                    alert(id);
                }
            };
        }
</script>

@section('scripts')

@endsection

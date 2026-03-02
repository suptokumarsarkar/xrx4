<div class="items_or_images settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('default')"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Slider Items') }}</h2>
    </div>
    <div class="panel_head flex space">
        <button style="width: 100%; text-align: right" class="pannel_button"
            onclick="openMenu('add_item');openMenuAddItem()"><i class="fa fa-plus"></i>
            {{ \App\Util::translate('Add Item') }}</button>
    </div>
    <div class="items items_dragger">


    </div>
</div>
@push('b_scripts')
    <script>
        $(document).ready(function() {
            refreshItems();
        });

        function refreshItems() {
            let x = getItems();
            if (x.length != 0) {
                $(".items").html("");
                for (let key in x) {
                    let data = x[key];
                    $(".items").append(`
        <div class="content-composer ps5" draggable="true" data-index='` + key + `' onclick="reloadItem(` +
                        getItemIndex(data.itemId) + `)">
            <div class="flex space" style="width: 100%; align-items: center;">
                <div class="b">
                    <img src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">
                </div>
                <div class="c">
                    <h3 class="name_t">` + data.sliderName + `</h3>
                    <p><span>{{ \App\Util::translate('Type') }}</span>: <span class="items_type">` + data.itemType + `</span>
                    </p>
                </div>
                <div class="d">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>
        </div>`);
                }
            } else {
                $(".items").html(`<div class='empty'>{{ \App\Util::translate('No Items') }}</div>`)
            }
        }
    </script>
@endpush

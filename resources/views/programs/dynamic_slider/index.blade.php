<div class="slider_overview flex">
    <div class="settings_pannel controller"
        @if (session('pannel_resize')) style="width: {{ session('pannel_resize') }}px" @endif>
        <div class="panel_settings flex">
            <div class="buttons">
                <button id="export_click" onclick="exportSlider()" title="{{ \App\Util::translate('Export') }}"><img
                        src="{{ asset('public/img/export.png') }}"></button>

                <button id="import_click" onclick="importSlider()" title="{{ \App\Util::translate('Import') }}"><img
                        src="{{ asset('public/img/import.png') }}" style="width: 15px"></button>
            </div>
            <button id="bottombar_click" title="{{ \App\Util::translate('Bottom Bar') }}"><img
                    src="{{ asset('public/img/dynamic/dock_bottom.png') }}"></button>
        </div>
        <div class="panel">
            @include('pages.slider.panel_default')
            @include('pages.slider.panel_theme_settings')
            @include('pages.slider.panel_items_or_images')
            @include('pages.slider.panel_items_prev_next_buttons')
            @include('pages.slider.panel_pagination')
            @include('pages.slider.panel_mouse_or_animation')
            @include('pages.slider.add_item')
            <div class="pannel_bottom flex">
                <button class="generate_code" onclick="generateCode()"><img
                        src="{{ asset('public/img/dynamic/code.png') }}">{{ \App\Util::translate('Generate Code') }}</button>
                <button class="download_zip" onclick="downloadSliderZip()"><img
                        src="{{ asset('public/img/dynamic/zip_icon.png') }}">{{ \App\Util::translate('Download Zip') }}</button>
            </div>
            <div class="pannel_resizer"></div>
        </div>
    </div>
    <div class="active_panel slider flex align-center"
        style="justify-content: center; @if (session('pannel_resize')) width: calc(100% - {{ session('pannel_resize') }}px)
        @else
        width: 100% @endif">
        <div class="slider_content" style="width: 100%; max-width: 90%">
            <div id="slider">
                <div class="slides">
                    <div class="slide">
                        <h1
                            style="
                        padding-top: 200px;
                        padding-bottom: 200px;">
                            {{ \App\Util::translate('Slide 1') }}</h1>
                    </div>
                    <div class="slide">
                        <h1
                            style="
                        padding-top: 200px;
                        padding-bottom: 200px;">
                            {{ \App\Util::translate('Slide 2') }}</h1>
                    </div>
                    <div class="slide">
                        <h1
                            style="
                        padding-top: 200px;
                        padding-bottom: 200px;">
                            {{ \App\Util::translate('Slide 3') }}</h1>
                    </div>
                    <div class="slide">
                        <h1
                            style="
                        padding-top: 200px;
                        padding-bottom: 200px;">
                            {{ \App\Util::translate('Slide 4') }}</h1>
                    </div>
                </div>
                <div class="pagination"></div>
                <button class="prev22">Previous</button>
                <button class="next22">Next</button>
            </div>
        </div>
        <div class="slider_content liveUpdate" style="width: 90%; max-width: 90%; display:none;">
            <div id="slider2">
                <div class="slides">
                    <div class="slide" style="display: block">
                        <h1 style="
            padding-top: 200px;
            padding-bottom: 200px;">
                            {{ \App\Util::translate('Slider Live Editor') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel_documentation" style="display: none;">
        <iframe src="{{url("public/html/slider_documentation.html")}}" width="100%" height="100%"></iframe>
    </div>
    <div class="panel_quick_template" style="display: none">

    </div>
</div>
@push('scripts')
    <script src="{{ asset('resources/js/slider.js') }}?{{ \App\Util::getVersion() }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script>
        // Initialize the slider plugin
        let items = [];
        let currentPreviewID = 0;
        let item_id = 0;
        let demag = 1;
        let cm_id_count = 0;

        if (demag) {
            for (let x = 1; x < 5; x++) {
                items.push({
                    "sliderName": "Slide " + x,
                    "itemType": "single",
                    "itemId": x - 1,
                    "styles": {
                        "backgroundColor": '#f3f3f3',
                    },
                    "backgroundType": "image",
                    "additionalClass": "",
                    "components": {
                        "single": [{
                            "type": "heading",
                            "id": 0,
                            "name": "HEADING",

                            "content": "<h2 class=\"single_heading \" data-connected=\"single\" data-connected-id=" +
                                (x - 1) +
                                " data-component=\"0\" style=\"font-family: Arial; font-style: normal; font-size: 40px; color: #000000; text-align: center; text-transform: none; line-height: 400px; font-weight: ; text-shadow: 1px 0px 0px red; \">Slide " +
                                x + "</h2>"
                        }]
                    }
                });
                item_id++;
            }
            cm_id_count++;
        }

        function dynamicContents(type) {
            switch (type) {
                case 'single':
                    return `<div class="slides">
                    <div class="slide" style="display: block;">
                        <div class="slider_container_` + type + `">
                            <div class="empty" style="
            padding-top: 100px;
            padding-bottom:100px;">{{ \App\Util::translate('Empty') }}</div>
                        </div>
                    </div>
                </div>`;

                default:
                    return `<div class="slides">
                    <div class="slide" style="display: block"><h1 style="
            padding-top: 200px;
            padding-bottom: 200px;">{{ \App\Util::translate('Slider Live Editor') }}</h1></div>
                </div>`;
            }
        }
        var slider = $('#slider').sliderPlugin({
            pagination: $("#paginationEnabled").val() !== 'false',
            navigation: $("#prevNextEnabled").val() !== 'false',
            navigationStyle: $("#prevNextStyle").val(),
            RightText: $("#Sl_Prev_Next_RightText").val(),
            leftText: $("#Sl_Prev_Next_LeftText").val(),
            RightIcon: $("#Sl_Prev_Next_RightIcon").val(),
            LeftIcon: $("#Sl_Prev_Next_LeftIcon").val(),
            paginationStyle: $("#paginationStyle").val(),
            paginationOutlet: $("#paginationOutlet").val(),
            mouseDrag: $("#mouseDragEnabled").val() !== 'false',
            dragCursor: $("#mouseDragCursor").val(),
            autoSlide: $("#autoSlide").val() !== 'false',
            loop: $("sliderLoop").val() !== 'false',
            autoSlideTime: $("#autoSlideTime").val(),
            animation: $("#animationType").val(),
            animationTime: $("#animationTime").val(),
            stopSlideOnHover: $("#stopSlideOnHover").val() !== 'false',
        });
        $(document).ready(function() {
            InitGui();

            loadContents(false);
            $("#bottombar_click").click(function(){
                $(".slider_overview").toggleClass("bottom_bar");
            });
            setTimeout(()=>{InitGui()},1000);

            let panelDragging = false,
                panelstartX, panelcurrentX;
            $(".pannel_resizer").off('mousedown touchstart').on('mousedown touchstart', function(event) {
                panelDragging = true;
                panelstartX = event.type === 'mousedown' ? event.pageX : event.originalEvent.touches[0].pageX;
                $(".pannel_resizer").addClass("dragging");
            });

            $(document).on('mousemove touchmove', function(event) {
                if (panelDragging) {
                    var x = event.type === 'mousemove' ? event.pageX : event.originalEvent.touches[0].pageX;
                    panelcurrentX = x;
                    if (x > 199) {
                        $(".settings_pannel.controller").css("width", x + "px");
                        $(".active_panel").css("width", "calc(100% - " + x + "px)");
                    }
                }
            });

            $(document).on('mouseup touchend', function(event) {
                if (panelDragging) {
                    $(".pannel_resizer").removeClass("dragging");
                    panelDragging = false;
                    $.ajax({
                        url: "{{ route('saveSession', ['id' => 'pannel_resize', 'value' => 'xxx']) }}",
                        data: 'pannel_resize=' + panelcurrentX + "&_token={{ csrf_token() }}",
                        type: 'POST'
                    });
                }
            });
        });
        $(window).resize(function() {
            InitGui();
        });

        function loadContents(r = true) {
            $("#slider .slides .preview").remove();
            slider.destroy();
            $("#slider .slides").html("");
            for (let i = 0; i < items.length; i++) {

                $("#slider2").html(dynamicContents(items[i].itemType));

                generateView(items[i]);
                let itemHtml = $("#slider2 .slides").html();
                setTimeout(() => {
                    $("#slider .slides").append(itemHtml);
                }, 10);
            }
            if (r) {
                openMenu("items_or_images");
            }
            setTimeout(() => {
                slider = $('#slider').sliderPlugin({
                    pagination: $("#paginationEnabled").val() !== 'false',
                    navigation: $("#prevNextEnabled").val() !== 'false',
                    navigationStyle: $("#prevNextStyle").val(),
                    RightText: $("#Sl_Prev_Next_RightText").val(),
                    leftText: $("#Sl_Prev_Next_LeftText").val(),
                    RightIcon: $("#Sl_Prev_Next_RightIcon").val(),
                    LeftIcon: $("#Sl_Prev_Next_LeftIcon").val(),
                    paginationStyle: $("#paginationStyle").val(),
                    paginationOutlet: $("#paginationOutlet").val(),
                    mouseDrag: $("#mouseDragEnabled").val() !== 'false',
                    dragCursor: $("#mouseDragCursor").val(),
                    autoSlide: $("#autoSlide").val() !== 'false',
                    loop: $("sliderLoop").val() !== 'false',
                    autoSlideTime: $("#autoSlideTime").val(),
                    animation: $("#animationType").val(),
                    animationTime: $("#animationTime").val(),
                    stopSlideOnHover: $("#stopSlideOnHover").val() !== 'false',
                });
            }, 20);
        }

        function addItem(data) {
            items.push(data);
            item_id++;
            refreshItems();
        }


        function getItems() {
            return items;
        }

        function getItemIndex(id) {
            for (let i = 0; i < items.length; i++) {
                if (items[i].itemId == id) return i;
            }
        }

        function resetInputs(type) {
            $(type + " input").val("");
            $(type + " select").val("");
            $(type + " textarea").val("");
        }


        function InitGui() {
            let windowHeight = $(window).outerHeight();
            let topHeader = $(".top_bar_1").innerHeight();
            let Header = $(".header_1").innerHeight();
            let sum = topHeader + Header;
            $(".settings_pannel").css("height", (windowHeight - sum) + "px");


        }


        function openMenuAddItem(e = -1) {
            if (e == -1) {
                addItem({
                    sliderName: "Generation-Z" + items.length,
                    itemType: "single",
                    itemId: item_id,
                    backgroundType: 'image',
                    additionalClass: '',
                    styles: {
                        marginTop: 0,
                        marginLeft: 0,
                        marginBottom: 0,
                        marginRight: 0,
                        marginUnit: 'px',
                        paddingTop: 0,
                        paddingLeft: 0,
                        paddingBottom: 0,
                        paddingRight: 0,
                        paddingUnit: 'px',
                        height: 0,
                        heightUnit: '%',
                        width: 100,
                        widthUnit: '%',
                        backgroundFile: '',
                        backgroundImage: '',
                        backgroundColor: '#f3f3f3',
                        backgroundLinearGradientDegree: '90deg',
                        backgroundLinearGradientColors: 'blue, green',
                        backgroundRadialGradientColors: 'blue, green',
                        backgroundRadialGradientType: 'circle',
                        backgroundPositionTop: 0,
                        backgroundPositionLeft: 0,
                        backgroundPositionUnit: 'px',
                        backgroundSize: 100,
                        backgroundSizeUnit: '%',
                        backgroundRepeat: 'repeat',
                        backdropFilterType: '',
                        backgropFIlterValue: '',
                        backgroundPositionUnit: 'px',
                        borderRadius: 0,
                        borderRadiusUnit: 'px',
                    }
                });
                loadItem(items[items.length - 1]);
                currentPreviewID = items[items.length - 1].itemId;
            } else {
                loadItem(items[e]);
                currentPreviewID = items[items.length - 1].itemId;
            }
            showPreview();
        }

        function addContent(block) {
            let item_type = $("#item_type").val();
            $("#slider2 .slider_container_" + item_type).find(".empty").remove();

            if (!items[getItemIndex(currentPreviewID)]['components']) {
                items[getItemIndex(currentPreviewID)]['components'] = [];
                items[getItemIndex(currentPreviewID)]['components'][item_type] = [];
            }

            let init = "init_" + block;
            let data = window[init](cm_id_count);

            items[getItemIndex(currentPreviewID)]['components'][item_type].push({
                type: block,
                id: cm_id_count,
                name: block.toUpperCase(),
                content: data
            });
            cm_id_count++;
            loadItem(items[getItemIndex(currentPreviewID)]);
            //openMenu("add_content_" + block, false);
        }

        function itemsIndex(type, id) {
            if (type == 'single') {
                for (let i = 0; i < items[getItemIndex(currentPreviewID)]['components'][type].length; i++) {
                    if (items[getItemIndex(currentPreviewID)]['components'][type][i].id == id) {
                        return i;
                    }
                }
            }
        }

        function reloadItem(key) {
            loadItem(items[key], items[key].itemId);
            showPreview();
        }

        function updateItemsOrder(draggedIndex, targetIndex) {
            let tmp = items[draggedIndex];
            items[draggedIndex] = items[targetIndex];
            items[targetIndex] = tmp;
            refreshItems();
        }

        function loadItem(item, update = -1) {
            if (update != -1) {
                currentPreviewID = update;
                showPreview();
                openMenu("add_item");
            }
            if (item.itemType == 'single') {
                setTimeout(() => {
                    loadComponents();
                }, 50);
            }
            $("#itemName").val(item.sliderName);
            $("#item_type").val(item.itemType);
            $("#itemBackgroundOptions").val(item.backgroundType);
            $("#itemAdditionalClass").val(item.additionalClass);
            // Margin Inputs
            $('#itemMarginTop').val(item.styles.marginTop);
            $('#itemMarginBottom').val(item.styles.marginBottom);
            $('#itemMarginLeft').val(item.styles.marginLeft);
            $('#itemMarginRight').val(item.styles.marginRight);
            $(`input[name='itemMarginUnit'][value='${item.styles.marginUnit}']`).prop('checked', true);

            // Padding Inputs
            $('#itemPaddingTop').val(item.styles.paddingTop);
            $('#itemPaddingBottom').val(item.styles.paddingBottom);
            $('#itemPaddingLeft').val(item.styles.paddingLeft);
            $('#itemPaddingRight').val(item.styles.paddingRight);
            $(`input[name='itemPaddingUnit'][value='${item.styles.paddingUnit}']`).prop('checked', true);

            // Width and Height Inputs
            $('#itemWidth').val(item.styles.width);
            $(`input[name='itemWidthUnit'][value='${item.styles.widthUnit}']`).prop('checked', true);
            $('#itemHeight').val(item.styles.height);
            $(`input[name='itemHeightUnit'][value='${item.styles.heightUnit}']`).prop('checked', true);

            // Background Inputs
            $('#ItemBackgroundImageURL').val(item.styles.backgroundImage);
            $('#backgroundColorCode').val(item.styles.backgroundColor);
            $('#itemBackgroundLinearGradientDegree').val(item.styles.backgroundLinearGradientDegree);
            $('#itemBackgroundLinearGradientColors').val(item.styles.backgroundLinearGradientColors);
            $('#itemBackgroundRadialGradientType').val(item.styles.backgroundRadialGradientType);
            $('#itemBackgroundRadialGradientColors').val(item.styles.backgroundRadialGradientColors);
            $('#itemBackgroundSize').val(item.styles.backgroundSize);
            $(`input[name='itemBackgroundSizeUnit'][value='${item.styles.backgroundSizeUnit}']`).prop('checked', true);
            $('#itemBorderRadius').val(item.styles.itemBorderRadius);
            $(`input[name='itemBorderRadiusUnit'][value='${item.styles.borderRadiusUnit}']`).prop('checked', true);

            // Background Position Inputs
            $('#itemBackgroundPositionTop').val(item.styles.backgroundPositionTop);
            $('#itemBackgroundPositionLeft').val(item.styles.backgroundPositionLeft);
            $(`input[name='itemBackgroundPositionUnit'][value='${item.styles.backgroundPositionUnit}']`).prop('checked',
                true);

            // Background Repeat Input
            $('#ItemBackgroundRepeat').val(item.styles.backgroundRepeat);

            // Backdrop Filter Inputs
            $('#ItemBackdropFilter').val(item.styles.backdropFilterType);
            $('#ItemBackdropFilterValue').val(item.styles.backgropFIlterValue);
            changeNewContents(item.itemType);
            generateView(item);
        }

        function updateItem(e) {
            e = getItemIndex(e);
            items[e].sliderName = $("#itemName").val();
            items[e].itemType = $("#item_type").val();
            items[e].backgroundType = $("#itemBackgroundOptions").val();
            items[e].additionalClass = $("#itemAdditionalClass").val();

            // Margin Inputs
            items[e].styles.marginTop = $('#itemMarginTop').val();
            items[e].styles.marginBottom = $('#itemMarginBottom').val();
            items[e].styles.marginLeft = $('#itemMarginLeft').val();
            items[e].styles.marginRight = $('#itemMarginRight').val();
            items[e].styles.marginUnit = $("input[name='itemMarginUnit']:checked").val();

            // Padding Inputs
            items[e].styles.paddingTop = $('#itemPaddingTop').val();
            items[e].styles.paddingBottom = $('#itemPaddingBottom').val();
            items[e].styles.paddingLeft = $('#itemPaddingLeft').val();
            items[e].styles.paddingRight = $('#itemPaddingRight').val();
            items[e].styles.paddingUnit = $("input[name='itemPaddingUnit']:checked").val();

            // Width and Height Inputs
            items[e].styles.width = $('#itemWidth').val();
            items[e].styles.widthUnit = $("input[name='itemWidthUnit']:checked").val();
            items[e].styles.height = $('#itemHeight').val();
            items[e].styles.heightUnit = $("input[name='itemHeightUnit']:checked").val();

            // Background Inputs
            items[e].styles.backgroundFile = $('#ItemBackgroundImageFile');
            items[e].styles.backgroundImage = $('#ItemBackgroundImageURL').val() ?? "";
            items[e].styles.backgroundColor = $('#backgroundColorCode').val() ?? "white";
            items[e].styles.backgroundLinearGradientDegree = $('#itemBackgroundLinearGradientDegree').val();
            items[e].styles.backgroundLinearGradientColors = $('#itemBackgroundLinearGradientColors').val();
            items[e].styles.backgroundRadialGradientType = $('#itemBackgroundRadialGradientType').val();
            items[e].styles.backgroundRadialGradientColors = $('#itemBackgroundRadialGradientColors').val();
            items[e].styles.backgroundSize = $('#itemBackgroundSize').val();
            items[e].styles.backgroundSizeUnit = $("input[name='itemBackgroundSizeUnit']:checked").val();

            // Background Position Inputs
            items[e].styles.backgroundPositionTop = $('#itemBackgroundPositionTop').val();
            items[e].styles.backgroundPositionLeft = $('#itemBackgroundPositionLeft').val();
            items[e].styles.backgroundPositionUnit = $("input[name='itemBackgroundPositionUnit']:checked").val();
            items[e].styles.borderRadius = $('#itemBorderRadius').val();
            items[e].styles.borderRadiusUnit = $("input[name='itemBorderRadiusUnit']:checked").val();

            // Background Repeat Input
            items[e].styles.backgroundRepeat = $('#ItemBackgroundRepeat').val();

            // Backdrop Filter Inputs
            items[e].styles.backdropFilterType = $('#ItemBackdropFilter').val();
            items[e].styles.backgropFIlterValue = $('#ItemBackdropFilterValue').val();
            generateView(items[e]);
        }

        function generateView(item) {
            updateItemStyles(item);
            if (item.components && item.components.single && item.components.single.length > 0) {
                let components = item.components.single;

                $(".liveUpdate .slider_container_single").html(makeHtmlOutput(components));
            }
        }


        function makeHtmlOutput(blocks) {
            let html = ``;
            for (let i = 0; i < blocks.length; i++) {
                html += blocks[i].content;
            }
            return html;
        }

        function updateItemStyles(item) {
            let backgroundStyle = 'none';
            let cssStyles = {};
            $(".liveUpdate .slide").attr("class", "slide " + item.additionalClass);
            // Background Type Handling
            if (item.backgroundType === 'linear-gradient') {
                backgroundStyle =
                    `linear-gradient(${item.styles.backgroundLinearGradientDegree}, ${item.styles.backgroundLinearGradientColors})`;
            } else if (item.backgroundType === 'radial-gradient') {
                backgroundStyle =
                    `radial-gradient(${item.styles.backgroundRadialGradientType}, ${item.styles.backgroundRadialGradientColors})`;
            } else if (item.backgroundType === 'image') {
                if(item.styles.backgroundImage !== undefined){
                    backgroundStyle = `url(${item.styles.backgroundImage})`;
                }
            }

            // Conditionally Add Styles
            if (item.styles.marginTop !== 0) cssStyles['margin-top'] = item.styles.marginTop + item.styles.marginUnit;
            if (item.styles.marginBottom !== 0) cssStyles['margin-bottom'] = item.styles.marginBottom + item.styles
                .marginUnit;
            if (item.styles.marginLeft !== 0) cssStyles['margin-left'] = item.styles.marginLeft + item.styles.marginUnit;
            if (item.styles.marginRight !== 0) cssStyles['margin-right'] = item.styles.marginRight + item.styles.marginUnit;

            if (item.styles.paddingTop !== 0) cssStyles['padding-top'] = item.styles.paddingTop + item.styles.paddingUnit;
            if (item.styles.paddingBottom !== 0) cssStyles['padding-bottom'] = item.styles.paddingBottom + item.styles
                .paddingUnit;
            if (item.styles.paddingLeft !== 0) cssStyles['padding-left'] = item.styles.paddingLeft + item.styles
                .paddingUnit;
            if (item.styles.paddingRight !== 0) cssStyles['padding-right'] = item.styles.paddingRight + item.styles
                .paddingUnit;

            if (item.styles.width !== 0) cssStyles['width'] = item.styles.width + item.styles.widthUnit;
            if (item.styles.height !== 0) cssStyles['height'] = item.styles.height + item.styles.heightUnit;
            if (item.styles.borderRadius !== 0) cssStyles['border-radius'] = item.styles.borderRadius + item.styles
                .borderRadiusUnit;
            if (item.backgroundType === 'image') {
                cssStyles['background'] = `${backgroundStyle} ${item.styles.backgroundColor}`;
            } else {
                cssStyles['background'] = backgroundStyle;
            }

            if (item.styles.backgroundSize) cssStyles['background-size'] = item.styles.backgroundSize + item.styles
                .backgroundSizeUnit;
            if (item.styles.backgroundPositionTop !== 0 || item.styles.backgroundPositionLeft !== 0) {
                cssStyles['background-position'] =
                    `${item.styles.backgroundPositionLeft}${item.styles.backgroundPositionUnit} ${item.styles.backgroundPositionTop}${item.styles.backgroundPositionUnit} `;
            }
            if (item.styles.backgroundRepeat) cssStyles['background-repeat'] = item.styles.backgroundRepeat;

            if (item.styles.backdropFilterType && item.styles.backdropFilterValue) {
                cssStyles['backdrop-filter'] = `${item.styles.backdropFilterType}(${item.styles.backdropFilterValue})`;
            }

            $(".liveUpdate").find(".slide").css(cssStyles);
            $(".liveUpdate").find(".slide").attr("sliderName", item.sliderName);
        }




        function openMenu(menu, closePrev = true) {
            if (closePrev) {
                closePreview();
            }

            $(".active_panel").show(0);
            $(".panel_documentation").hide(0);
            $('.settings').hide(0);
            $('.settings.' + menu).show(0);
        }
        function openDocumentations(){
            $(".active_panel").hide(0);
            $(".panel_documentation").show(0);
        }

        function showPreview() {
            $(".slider_content").hide(0);
            $(".liveUpdate").show(0);
        }

        function closePreview() {
            $(".slider_content").show(0);
            $(".liveUpdate").hide(0);
            loadContents(false);
        }

        function changeNewContents(open) {
            $("#newContents .content-composer").hide(0);
            $("#newContents .content-composer." + open).show(0);
            $("#slider2").html(dynamicContents($("#item_type").val()));
        }

        // save theme settings
        function themeSettingsData() {
            return {
                sliderWidth: $("#sliderWidth").val() ?? 100,
                sliderWidthSize: $("input[name=sliderWidthSize]:checked").val() ?? '%',
                sliderMaxWidth: $("#sliderMaxWidth").val() ?? 600,
                sliderMaxWidthSize: $("input[name=sliderMaxWidthSize]:checked").val() ?? 'px',
                sliderHeight: $("#sliderHeight").val() ?? 0,
                sliderHeightSize: $("input[name=sliderHeightSize]:checked").val() ?? 'px',
                sliderMaxHeight: $("#sliderMaxHeight").val() ?? 0,
                sliderMaxHeightSize: $("input[name=sliderMaxHeightSize]:checked").val() ?? 'px',
                headerColorCode: $("#headerColorCode").val(),
                textColorCode: $("#textColorCode").val(),
                sliderborderRadius: $("#sliderBorderRadius").val() ?? 0,
                sliderBorderRadiusSize: $("input[name=sliderBorderRadiusSize]:checked").val() ?? 'px',
                sliderBoxShadow: $("#sliderBoxShadow").val() ?? 0,
                sliderBoxShadowColor: $("#sliderBoxShadowColor").val() ?? '#eeeeee',
                sliderBoxShadowSize: $("input[name=sliderBoxShadowSize]:checked").val() ?? 'px',
            };
        }

        $(".settings.theme_settings input").change(function() {
            liveView();
        });
        $(".settings.theme_settings input").keyup(function() {
            liveView();
        });

        function liveView() {

            let data = themeSettingsData();
            if (data.sliderWidth != 0) {
                $(".slider_content").css("width", data.sliderWidth + data.sliderWidthSize);
            }
            if (data.sliderMaxWidth != 0) {
                $(".slider_content").css("max-width", data.sliderMaxWidth + data.sliderMaxWidthSize);
            }
            if (data.sliderHeight != 0) {
                $(".slider_content").css("height", data.sliderHeight + data.sliderHeightSize);
            }
            if (data.sliderMaxHeight != 0) {
                $(".slider_content").css("height", data.sliderMaxHeight + data.sliderMaxHeightSize);
            }

            if (data.sliderborderRadius != 0) {
                $(".slider_content .slide").css("border-radius", data.sliderborderRadius + data.sliderBorderRadiusSize);
            }

            if (data.sliderBoxShadow != 0) {
                $(".slider_content").css("box-shadow", '2px 2px ' + data.sliderBoxShadow + data.sliderBorderRadiusSize +
                    " 2px " + data.sliderBoxShadowColor);
            }
        }

        function generateCode() {
            // Get the HTML content of .slider_content
            const sliderContent = document.querySelector('.slider_content').innerHTML;

            // Extract slider configuration
            const sliderConfig = {
                pagination: $("#paginationEnabled").val() !== 'false',
                navigation: $("#prevNextEnabled").val() !== 'false',
                navigationStyle: $("#prevNextStyle").val(),
                RightText: $("#Sl_Prev_Next_RightText").val(),
                leftText: $("#Sl_Prev_Next_LeftText").val(),
                RightIcon: $("#Sl_Prev_Next_RightIcon").val(),
                LeftIcon: $("#Sl_Prev_Next_LeftIcon").val(),
                paginationStyle: $("#paginationStyle").val(),
                paginationOutlet: $("#paginationOutlet").val(),
                mouseDrag: $("#mouseDragEnabled").val() !== 'false',
                dragCursor: $("#mouseDragCursor").val(),
                autoSlide: $("#autoSlide").val() !== 'false',
                loop: $("#sliderLoop").val() !== 'false',
                autoSlideTime: $("#autoSlideTime").val(),
                animation: $("#animationType").val(),
                animationTime: $("#animationTime").val(),
                stopSlideOnHover: $("#stopSlideOnHover").val() !== 'false'
            };
            // Create the HTML layout
            const htmlLayout = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Modal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        #slider,
        #slider2 {
            position: relative;
            width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            font-size: 20px;
            /* Adjust based on your slide height */
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            display: none;
            /* Hide all slides initially */
        }


        .slide.active {
            display: block;
            /* Show only the active slide */
        }

    </style>
    <link href="{{ asset('resources/css/addons/dynamic_slider/assets/style.css') }}?{{ \App\Util::getVersion() }}"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"><\/script>
    <script src="{{url("resources/js/slider.js")}}"><\/script>
    <script>
        $(document).ready(function() {
            var slider = $('#slider').sliderPlugin(${JSON.stringify(sliderConfig, null, 4)});
        });
    <\/script>
    </head>
    <body>
    <div class="modal-content">${sliderContent}</div>
    </body>
    </html>`;

    // Format the HTML code
    const formattedHtml = formatHtmlCode(htmlLayout);

    // Open the st_model_13 modal with the generated content
    st_model_13.open();
    st_model_13.setTitle('Generated Slider Code');
    st_model_13.setContent(formattedHtml);

    // Trigger Prism to highlight the code
    Prism.highlightAll();

    // Set the "Copy" button
    st_model_13.setPrimaryButton('Copy', function() {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            // Modern browsers with Clipboard API support
            navigator.clipboard.writeText(htmlLayout)
                .then(function() {
                    console.log('Content copied to clipboard!');
                    st_model_13.close();
                })
                .catch(function(err) {
                    console.error('Failed to copy content: ', err);
                    fallbackCopyTextToClipboard(htmlLayout);
                });
        } else {
            // Fallback for older browsers
            fallbackCopyTextToClipboard(htmlLayout);
        }
    });
    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Fallback: Copying text command was ' + msg);
            st_model_13.close();
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }

        document.body.removeChild(textArea);
    }

    // Set the "Close" button
    st_model_13.setSecondaryButton('Close', function() {
    st_model_13.close();
    });
    }

    function formatHtmlCode(htmlString) {
    // Escape HTML special characters
    const escapedHtml = htmlString.replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');

    // Wrap the code in a pre and code tag with the appropriate class for Prism
    const formattedHtml = `<pre><code class="language-markup">${escapedHtml}</code></pre>`;

    return formattedHtml;
    }
    function downloadSliderZip() {
        // Get the HTML content of .slider_content
        const sliderContent = document.querySelector('.slider_content').innerHTML;

        // Extract slider configuration
        const sliderConfig = {
            pagination: $("#paginationEnabled").val() !== 'false',
            navigation: $("#prevNextEnabled").val() !== 'false',
            navigationStyle: $("#prevNextStyle").val(),
            RightText: $("#Sl_Prev_Next_RightText").val(),
            leftText: $("#Sl_Prev_Next_LeftText").val(),
            RightIcon: $("#Sl_Prev_Next_RightIcon").val(),
            LeftIcon: $("#Sl_Prev_Next_LeftIcon").val(),
            paginationStyle: $("#paginationStyle").val(),
            paginationOutlet: $("#paginationOutlet").val(),
            mouseDrag: $("#mouseDragEnabled").val() !== 'false',
            dragCursor: $("#mouseDragCursor").val(),
            autoSlide: $("#autoSlide").val() !== 'false',
            loop: $("#sliderLoop").val() !== 'false',
            autoSlideTime: $("#autoSlideTime").val(),
            animation: $("#animationType").val(),
            animationTime: $("#animationTime").val(),
            stopSlideOnHover: $("#stopSlideOnHover").val() !== 'false'
        };

        // Extract asset URLs from sliderContent
        const assetUrls = extractAssetUrls(sliderContent);

        // Update sliderContent with new asset paths
        const updatedSliderContent = updateAssetPaths(sliderContent);

        // Create the HTML layout
        const htmlLayout = `<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
    <link href="assets/style.css" rel="stylesheet">
    <script src="assets/jquery-3.6.0.min.js"><\/script>
    <script src="assets/slider.js"><\/script>
    <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }
    #slider,
    #slider2 {
        position: relative;
        width: 100%;
        margin: auto;
        overflow: hidden;
    }
    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    .slide {
        min-width: 100%;
        box-sizing: border-box;
        font-size: 20px;
        background-color: #f3f3f3;
        border: 1px solid #ddd;
        display: none;
    }
    .slide.active {
        display: block;
    }
    </style>
    </head>
    <body>
    <div class="modal-content" id="slider">${updatedSliderContent}</div>
    <script>
    $(document).ready(function() {
        var slider = $('#slider').sliderPlugin(${JSON.stringify(sliderConfig, null, 4)});
    });
    <\/script>
    </body>
    </html>`;

        // Create a new JSZip instance
        const zip = new JSZip();

        // Add index.html to the zip
        zip.file("index.html", htmlLayout);

        // Create assets folder in the zip
        const assetsFolder = zip.folder("assets");

        // Function to download a file and add it to the zip
        function downloadAndAddToZip(url, filename) {
            console.log(url);
            return fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error(`Failed to fetch ${url}: ${response.statusText}`);
                    return response.blob();
                })
                .then(blob => {
                    assetsFolder.file(filename, blob);
                    console.log(`Added ${filename} to assets folder`);
                })
                .catch(error => console.error(`Error downloading ${url}:`, error));
        }

        // Download and add assets to the zip
        const assetPromises = assetUrls.map(url => {
            const filename = url.split('/').pop();
            return downloadAndAddToZip(url, filename);
        });

        // Add jQuery, slider.js, and CSS files to the assets folder
        const additionalFiles = [
            { url: 'https://code.jquery.com/jquery-3.6.0.min.js', filename: 'jquery-3.6.0.min.js' },
            { url: '{{ url("resources/js/slider.js") }}', filename: 'slider.js' },
            { url: '{{ asset("resources/css/addons/dynamic_slider/assets/style.css") }}', filename: 'style.css' }
        ];

        additionalFiles.forEach(file => {
            assetPromises.push(downloadAndAddToZip(file.url, file.filename));
        });

        // Wait for all assets to be added, then generate and download the zip
        Promise.all(assetPromises)
            .then(() => {
                console.log('All assets downloaded and added to zip');
                return zip.generateAsync({type:"blob"});
            })
            .then(function(content) {
                const zipUrl = URL.createObjectURL(content);
                const link = document.createElement('a');
                link.href = zipUrl;
                link.download = "slider_package.zip";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(zipUrl);
                console.log('Zip file generated and download triggered');
            })
            .catch(error => console.error("Failed to generate or download zip:", error));
    }

    function extractAssetUrls(content) {
        const imgRegex = /<img[^>]+src=(['"])(https?:\/\/[^'"]+)\1/g;
        const videoRegex = /<video[^>]+src=(['"])(https?:\/\/[^'"]+)\1/g;
        const backgroundRegex = /background[^:]*:\s*[^;]*url\s*\(\s*(['"]?)(?:&quot;)?(https?:\/\/[^'"()&;]+)(?:&quot;)?(['"]?)\s*\)/g;
        const urls = new Set();

        function addUrl(url) {
            // Remove any surrounding quotes and decode HTML entities
            const cleanUrl = url.replace(/^["']|["']$/g, '').replace(/&quot;/g, '"').replace(/&#39;/g, "'").replace(/&amp;/g, '&');
            urls.add(cleanUrl);
        }

        let match;
        while (match = imgRegex.exec(content)) {
            addUrl(match[2]);
        }
        while (match = videoRegex.exec(content)) {
            addUrl(match[2]);
        }
        while (match = backgroundRegex.exec(content)) {
            addUrl(match[2]);
        }

        return Array.from(urls);
    }

    function updateAssetPaths(content) {
        content = content.replace(/(src=["']?)(https?:\/\/[^"'\s]+)(["']?\s*\/?>\s*)/g, (match, p1, p2, p3) => {
            const filename = p2.split('/').pop();
            return `${p1}assets/${filename}${p3}`;
        });

        content = content.replace(/(background[^:]*:\s*[^;]*url\s*\(\s*)(['"]?)(?:&quot;)?(https?:\/\/[^'"()&;]+)(?:&quot;)?(['"]?\s*\))/g, (match, p1, p2, p3, p4) => {
            const filename = p3.split('/').pop();
            return `${p1}${p2}assets/${filename}${p4}`;
        });

        return content;
    }

        function exportSlider() {
            // Convert items to JSON string
            let data = JSON.stringify(items);

            // Create a Blob with the JSON data
            const blob = new Blob([data], { type: 'application/json' });

            // Create a link element to trigger download
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'slider_items.json';

            // Append to body, click, and remove
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function importSlider() {
            // Create a file input element
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = '.json';

            // Add event listener for file selection
            input.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        try {
                            // Parse the JSON file content
                            const importedItems = JSON.parse(e.target.result);

                            // Check if the imported data has the expected structure
                            if (Array.isArray(importedItems) || typeof importedItems === 'object') {
                                // Replace current items with imported items
                                items = importedItems;

                                // Optional: Refresh slider or trigger update
                                // updateSlider(); // You would define this method

                                console.log('Items imported successfully');
                                item_id = items.length;
                                refreshItems();
                                loadContents(false);
                            } else {
                                console.error('Invalid file format: Expected an array or object');
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                        }
                    };

                    // Read the file as text
                    reader.readAsText(file);
                }
            });

            // Trigger file selection
            input.click();
        }

    </script>
@endpush
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-markup.min.js"></script>
    <link href="{{ asset('resources/css/addons/dynamic_slider/assets/style.css') }}?{{ \App\Util::getVersion() }}"
        rel="stylesheet">
    <style>
        #slider,
        #slider2 {
            position: relative;
            width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            font-size: 20px;
            /* Adjust based on your slide height */
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            display: none;
            /* Hide all slides initially */
        }


        .slide.active {
            display: block;
            /* Show only the active slide */
        }



    </style>
@endpush

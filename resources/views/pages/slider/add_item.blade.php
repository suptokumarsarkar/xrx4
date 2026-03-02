@push('b_scripts')
    <script>
        $(document).ready(function() {
            $(".content-composer.video input").on("keyup change", function() {
                createVideoItem();
            });


            $(".add_item.settings").find("input, select, textarea").on("change keyup", () => {
                setTimeout(() => {
                    updateItem(currentPreviewID);
                }, 100);
            });
            $(".prev_next_buttons.settings").find("input, select, textarea").on("change keyup", () => {
                setTimeout(() => {
                    loadContents(false);
                }, 100);
            });
            $(".pagination.settings").find("input, select, textarea").on("change keyup", () => {
                setTimeout(() => {
                    loadContents(false);
                }, 100);
            });
            $(".mouse_or_animation.settings").find("input, select, textarea").on("change keyup", () => {
                setTimeout(() => {
                    loadContents(false);
                }, 100);
            });

        });


        function videoItemData() {
            return {
                videoFile: $("#videoSlide"),
                itemType: $("#item_type").val(),
                sliderName: $("#itemName").val() == '' ? 'Generation-Z+' + items.length : $("#itemName").val(),
                videoFileUrl: $("#videoSlideUrl").val(),
                videoWidth: $("#videoWidth").val() == '' || $("#videoWidth").val() == 0 ? 100 : $("#videoWidth").val(),
                videoWidthSize: $("input[name=videoWidthSize]:checked").val() ?? '%',
                videoHeight: $("#videoHeight").val() == '' || $("#videoHeight").val() == 0 ? 0 : $("#videoHeight").val(),
                videoHeightSize: $("input[name=videoHeightSize]:checked").val() ?? '%',
                videoMarginTop: $("#videoMarginTop").val() == '' || $("#videoMarginTop")
                    .val() == 0 ? 0 : $("#videoMarginTop").val(),
                videoMarginBottom: $("#videoMarginBottom").val() == '' || $(
                    "#videoMarginBottom").val() == 0 ? 0 : $("#videoMarginBottom").val(),
                videoMarginLeft: $("#videoMarginLeft").val() == '' || $("#videoMarginLeft")
                    .val() == 0 ? 0 : $("#videoMarginLeft").val(),
                videoMarginRight: $("#videoMarginRight").val() == '' || $("#videoMarginRight")
                    .val() == 0 ? 0 : $("#videoMarginRight").val(),
                videoMarginSize: $("input[name=videoMarginSize]:checked").val() ?? 'px',

                videoPaddingTop: $("#videoPaddingTop").val() == '' || $("#videoPaddingTop")
                    .val() == 0 ? 0 : $("#videoPaddingTop").val(),
                videoPaddingBottom: $("#videoPaddingBottom").val() == '' || $(
                    "#videoPaddingBottom").val() == 0 ? 0 : $("#videoPaddingBottom").val(),
                videoPaddingLeft: $("#videoPaddingLeft").val() == '' || $("#videoPaddingLeft")
                    .val() == 0 ? 0 : $("#videoPaddingLeft").val(),
                videoPaddingRight: $("#videoPaddingRight").val() == '' || $(
                    "#videoPaddingRight").val() == 0 ? 0 : $("#videoPaddingRight").val(),
                videoPaddingSize: $("input[name=videoPaddingSize]:checked").val() ?? 'px',
                videoAlign: $("input[name=videoAlign]:checked").val() ?? 'center',
            };
        }

        function createVideoItem() {
            let data = videoItemData();
            if (data.videoAlign) {
                $("#slider2 .slide").css("text-align", data.videoAlign);
            }
            if (data.sliderName) {
                $("#slider2 .slide").attr("sliderName", data.sliderName);
            }
            if (data.itemType) {
                $("#slider2 .slide").attr("itemType", data.itemType);
            }
            const videoStyles = `
            width: ${data.videoWidth}${data.videoWidthSize}; ` + (data.videoHeight != 0 ? `
            height: ${data.videoHeight}${data.videoHeightSize};` : '') + `
            margin: ${data.videoMarginTop}${data.videoMarginSize} ${data.videoMarginRight}${data.videoMarginSize} ${data.videoMarginBottom}${data.videoMarginSize} ${data.videoMarginLeft}${data.videoMarginSize};
            padding: ${data.videoPaddingTop}${data.videoPaddingSize} ${data.videoPaddingRight}${data.videoPaddingSize} ${data.videoPaddingBottom}${data.videoPaddingSize} ${data.videoPaddingLeft}${data.videoPaddingSize};
        `;
            if (data.videoFileUrl != '') {
                const videoHtml = `<video autoplay muted loop  style="${videoStyles}">
                                    <source src="${data.videoFileUrl}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>`;
                $("#slider2 .slide").html(videoHtml);
            }
            if (data.videoFile[0].files[0]) {
                fileToBase64(data.videoFile[0].files[0], (base64) => {
                    const videoHtml = `<video autoplay muted loop  style="${videoStyles}">
                                    <source src="${base64}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>`;
                    $("#slider2 .slide").html(videoHtml);
                });
            }
        }

        function loadComponentPanel(type, itemId, componentID) {
            let componentData = items[itemId]['components'][type][componentID];
            openMenu("add_content_" + componentData['type'], false);
            window['setComponentValue' + componentData['type']](componentData);
        }

        function updateComponentOrder(draggedIndex, targetIndex, itemIndex, itemType, componentId) {
            let cp = items[itemIndex]['components'][itemType][draggedIndex]
            items[itemIndex]['components'][itemType][draggedIndex] = items[itemIndex]['components'][itemType][targetIndex];
            items[itemIndex]['components'][itemType][targetIndex] = cp;
            generateView(items[itemIndex]);
            loadComponents();
        }
        function removeCurrentItem(){
            items.splice(getItemIndex(currentPreviewID), 1);
            openMenu('items_or_images');
            refreshItems();
            generateView(items[getItemIndex(currentPreviewID)]);
        }

        function removeCurrentBlock() {
            let block_id = $(".dataComponent").val();
            let id = -1;
            for (let i = 0; i < items[getItemIndex(currentPreviewID)]['components']['single'].length; i++) {
                if (block_id == items[getItemIndex(currentPreviewID)]['components']['single'][i].id) {
                    id = i;
                }
            }
            if (id != -1) {
                items[getItemIndex(currentPreviewID)]['components']['single'].splice(id, 1);
                openMenu('add_item', false);
                loadComponents();
                generateView(items[getItemIndex(currentPreviewID)]);
            }
        }


        function loadComponents() {
            if (items[getItemIndex(currentPreviewID)]['components'] && items[getItemIndex(currentPreviewID)]['components'][items[getItemIndex(currentPreviewID)][
                    'itemType'
                ]].length > 0) {
                let html = ``;
                let components = items[getItemIndex(currentPreviewID)]['components'][items[getItemIndex(currentPreviewID)]['itemType']];

                for (let i = 0; i < components.length; i++) {
                    let component = components[i];
                    html += `
            <div class="ps5 parts" item-type="` + items[getItemIndex(currentPreviewID)]['itemType'] + `" item-index="` +
            getItemIndex(currentPreviewID) + `"  data-index="` + i + `"  draggable="true" onclick="loadComponentPanel('` +
                        items[getItemIndex(currentPreviewID)]['itemType'] +
                        `', ` + getItemIndex(currentPreviewID) + `,` + i + `)">
        <div class="flex space" style="width: 100%; align-items: center;">
            <div class="b">
                <img src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">
            </div>
            <div class="c">
                <h3 class="name_t">` + component['name'] + `</h3>
                <p><span>{{ \App\Util::translate('Type') }}</span>: <span class="items_type">` + component['type'] + `</span>
                </p>
            </div>
            <div class="d">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
            `;
                }

                $(".single-content-output").html(html);
                $(".single-content-output").css("width", "100%");
            } else {
                $(".single-content-output").html(`<div class="empty">{{ \App\Util::translate('No blocks') }}</div>`);
            }
        }
    </script>
@endpush
@include('pages.slider.components.add_content_heading')
@include('pages.slider.components.add_content_paragraph')
@include('pages.slider.components.add_content_button')
@include('pages.slider.components.add_content_link')
@include('pages.slider.components.add_content_image')
@include('pages.slider.components.add_content_video')

<div class="add_item settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('items_or_images');refreshItems()"><i
                class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Add Item') }}</h2>
        <button class="pannel_button" onclick="openMenu('default');refreshItems()" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <div class="content-composer">
        <div class="parts flex" style="width: 100%">
            <label for="item_type" style="width: 40%">
                {{ \App\Util::translate('Slide Name') }}
            </label>
            <div class="inputs flex">
                <input type="text" placeholder="Generation-Z" id="itemName" class="input">
            </div>
        </div>
        <div class="parts flex" style="width: 100%">
            <label for="item_type" style="width: 40%">
                {{ \App\Util::translate('Item Type') }}
            </label>
            <div class="inputs flex">
                <select name="item_type" id="item_type" class="input" onchange="changeNewContents(this.value)">
                    <option value="single">{{ \App\Util::translate('Single View') }}</option>
                    <option value="row">{{ \App\Util::translate('Row Views') }}</option>
                    <option value="video">{{ \App\Util::translate('Video') }}</option>
                </select>
            </div>
        </div>

    </div>

    <div class="parts" style="width: 95%">

        <div class="inputs" style="text-align: right; width: 100%">
            <button class="btn btn-primary btn-icon" onclick="removeCurrentItem()"><i class="fa fa-trash"></i>{{ \App\Util::translate('Remove Item') }}</button>
        </div>
    </div>
    <h2 class="v_title">{{ \App\Util::translate('Contents') }}</h2>
    <div class="contents" id="newContents">
        <div class="content-composer single">
            <div class="parts flex" style="align-items: center">
                <label for="item_type_vs_5" style="width: 30%">
                    {{ \App\Util::translate('Add Block') }}
                </label>
                <div class="inputs flex" style="width: 50%">
                    <select name="item_type_vs_5" id="item_type_vs_5" class="input">
                        <option value="heading">{{ \App\Util::translate('Heading') }}</option>
                        <option value="paragraph">{{ \App\Util::translate('Paragraph') }}</option>
                        <option value="button">{{ \App\Util::translate('Button') }}</option>
                        <option value="link">{{ \App\Util::translate('Link') }}</option>
                        <option value="image">{{ \App\Util::translate('Image') }}</option>
                        <option value="video">{{ \App\Util::translate('Video') }}</option>
                    </select>
                </div>
                <div class="buttons" style="width: 20%">
                    <button class="pannel_button width100" style="text-align: right;"
                        onclick="addContent(document.getElementById('item_type_vs_5').value)"><i class="fa fa-plus"></i>
                        {{ \App\Util::translate('Add') }}</button>
                </div>
            </div>
            <div class="single-content-output"></div>
        </div>
        <div class="content-composer video" style="display: none;">
            <div class="parts">
                <label for="videoSlide">
                    <img
                        src="{{ asset('public/img/dynamic/Attach_video.png') }}">{{ \App\Util::translate('Attach Video') }}
                </label>
                <div class="inputs flex" style="width: 100%">
                    <input type="file" name="video" id="videoSlide" class="input">
                </div>
                <div style="width: 100%; text-align: center;">{{ \App\Util::translate('or') }}</div>
                <div class="inputs flex" style="width: 100%">
                    <input type="text" name="videoSlide" id="videoSlideUrl"
                        placeholder="{{ \App\Util::translate('Enter Video URL') }}" class="input">
                </div>
            </div>

            <div class="parts">
                <label for="videoWidth">
                    {{ \App\Util::translate('Width') }}
                </label>
                <div class="inputs flex">
                    <input type="number" name="videoWidth" id="videoWidth" class="input">
                </div>
                <div class="generation-z">

                    <label><input type="radio" name="videoWidthSize"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoWidthSize"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoWidthSize" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>
            <div class="parts">

                <label for="videoHeight">
                    {{ \App\Util::translate('Height') }}
                </label>
                <div class="inputs flex">
                    <input type="number" name="videoHeight" id="videoHeight" class="input">
                </div>
                <div class="generation-z">

                    <label><input type="radio" name="videoHeightSize"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoHeightSize"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoHeightSize" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>
            <div class="parts">

                <label for="videoAlign">
                    {{ \App\Util::translate('Alignment') }}
                </label>
                <div class="generation-z">

                    <label><input type="radio" name="videoAlign"
                            value="left"><span>{{ \App\Util::translate('Left') }}</span></label>
                    <label><input type="radio" name="videoAlign" checked
                            value="center"><span>{{ \App\Util::translate('Center') }}</span></label>
                    <label><input type="radio" name="videoAlign" checked
                            value="right"><span>{{ \App\Util::translate('Right') }}</span></label>
                </div>
            </div>
            <div class="parts">

                <label for="videoMarginTop">
                    {{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%">
                    <input type="number" name="videoMarginTop" id="videoMarginTop" placeholder="top"
                        class="input">
                    <input type="number" name="videoMarginBottom" id="videoMarginBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="videoMarginLeft" id="videoMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="videoMarginRight" id="videoMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="videoMarginSize"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoMarginSize"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoMarginSize" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>
            <div class="parts">

                <label for="videoPaddingTop">
                    {{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%">
                    <input type="number" name="videoPaddingTop" id="videoPaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="videoPaddingBottom" id="videoPaddingBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="videoPaddingLeft" id="videoPaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="videoPaddingRight" id="videoPaddingRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">

                    <label><input type="radio" name="videoPaddingSize"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoPaddingSize"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoPaddingSize" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>
            <div class="width100" style="text-align: right; margin: 10px 0">
                <button class="pannel_button highlight"
                    onclick="createVideoItem();loadContents(videoItemData());resetInputs('.add_item');openMenu('items_or_images')"
                    style="width: auto"><i class="fa fa-save"
                        style="margin-right: 5px"></i>{{ \App\Util::translate('Save') }}</button>
            </div>
        </div>


    </div>
    @include('pages.slider.components.panel.slider_advanced_styles')
    {{-- <div class="content-composer">
        <label for="background_items">
            <img
                src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">{{ \App\Util::translate('Background Image Or Video') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="file" name="background" id="background_items" class="input">
        </div>
        <div style="width: 100%; text-align: center;">{{ \App\Util::translate('or') }}</div>
        <div class="inputs flex" style="width: 100%">
            <input type="text" name="background" id="background_items_text" placeholder="{{ \App\Util::translate('Enter URL or Color Code') }}" class="input">
        </div>

        <div class="generation-z" style="width: 100%; justify-content: right">
            <label><input type="radio" name="background_items_type"
                    value="image"><span>{{ \App\Util::translate('image') }}</span></label>
            <label><input type="radio" name="background_items_type"
                    value="video"><span>{{ \App\Util::translate('video') }}</span></label>
            <label><input type="radio" name="background_items_type"
                    value="color"><span>{{ \App\Util::translate('color') }}</span></label>
            <label><input type="radio" name="background_items_type"
                    value="none"><span>{{ \App\Util::translate('disable') }}</span></label>
        </div>
    </div>


    <div class="content-composer">
        <label for="header_items">
            <img
                src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">{{ \App\Util::translate('Header') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <textarea name="header" id="header_items" placeholder="{{ \App\Util::translate('Header Text') }}" class="input"></textarea>
        </div>
        <div class="inputs flex" style="width: 100%">
            <div class="inputs">
                <input type="text" name="header" id="header_size_items" placeholder="{{ \App\Util::translate('Font Size') }}" class="input">
            </div>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="header_size_items_type"
                        value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                <label><input type="radio" name="header_size_items_type"
                        value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                <label><input type="radio" name="header_size_items_type"
                        value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                <label><input type="radio" name="header_size_items_type"
                        value="auto"><span>{{ \App\Util::translate('auto') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="" style="width: 40%">{{ \App\Util::translate('Alignment') }}</label>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="alignment_header_size_items_type"
                        value="left"><span>{{ \App\Util::translate('left') }}</span></label>
                <label><input type="radio" name="alignment_header_size_items_type"
                        value="right"><span>{{ \App\Util::translate('right') }}</span></label>
                <label><input type="radio" name="alignment_header_size_items_type"
                        value="center"><span>{{ \App\Util::translate('center') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="custom_class_header_items" style="width: 50%">{{ \App\Util::translate('Custom Class') }}</label>
            <div class="generation-z" style="width: 60%; justify-content: right">
                <input type="text" id="custom_class_header_items" placeholder="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" title="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" class="input">
            </div>
        </div>
    </div>




    <div class="content-composer">
        <label for="content_items">
            <img
                src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">{{ \App\Util::translate('Content') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <textarea name="content" id="content_items" placeholder="{{ \App\Util::translate('Content Text') }}" class="input"></textarea>
        </div>
        <div class="inputs flex" style="width: 100%">
            <div class="inputs">
                <input type="text" name="content" id="content_size_items" placeholder="{{ \App\Util::translate('Font Size') }}" class="input">
            </div>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="content_size_items_type"
                        value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                <label><input type="radio" name="content_size_items_type"
                        value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                <label><input type="radio" name="content_size_items_type"
                        value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                <label><input type="radio" name="content_size_items_type"
                        value="auto"><span>{{ \App\Util::translate('auto') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="" style="width: 40%">{{ \App\Util::translate('Alignment') }}</label>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="alignment_content_size_items_type"
                        value="left"><span>{{ \App\Util::translate('left') }}</span></label>
                <label><input type="radio" name="alignment_content_size_items_type"
                        value="right"><span>{{ \App\Util::translate('right') }}</span></label>
                <label><input type="radio" name="alignment_content_size_items_type"
                        value="center"><span>{{ \App\Util::translate('center') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="custom_class_content_items" style="width: 50%">{{ \App\Util::translate('Custom Class') }}</label>
            <div class="generation-z" style="width: 60%; justify-content: right">
                <input type="text" id="custom_class_content_items" placeholder="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" title="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" class="input">
            </div>
        </div>
    </div>

    <div class="content-composer">
        <label for="button_items">
            <img
                src="{{ asset('public/img/dynamic/Quick_Templates.png') }}">{{ \App\Util::translate('Button') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <textarea name="button" id="button_items" placeholder="{{ \App\Util::translate('Button Text') }}" class="input"></textarea>
        </div>
        <div class="inputs flex" style="width: 100%">
            <div class="inputs">
                <input type="text" name="header" id="button_size_items" placeholder="{{ \App\Util::translate('Button Size') }}" class="input">
            </div>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="button_size_items_type"
                        value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                <label><input type="radio" name="button_size_items_type"
                        value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                <label><input type="radio" name="button_size_items_type"
                        value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                <label><input type="radio" name="button_size_items_type"
                        value="auto"><span>{{ \App\Util::translate('auto') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="" style="width: 40%">{{ \App\Util::translate('Alignment') }}</label>
            <div class="generation-z" style="width: 100%; justify-content: right">
                <label><input type="radio" name="alignment_button_size_items_type"
                        value="left"><span>{{ \App\Util::translate('left') }}</span></label>
                <label><input type="radio" name="alignment_button_size_items_type"
                        value="right"><span>{{ \App\Util::translate('right') }}</span></label>
                <label><input type="radio" name="alignment_button_size_items_type"
                        value="center"><span>{{ \App\Util::translate('center') }}</span></label>
            </div>
        </div>
        <div class="inputs flex" style="width: 100%">
            <label for="custom_class_button_items" style="width: 50%">{{ \App\Util::translate('Custom Class') }}</label>
            <div class="generation-z" style="width: 60%; justify-content: right">
                <input type="text" id="custom_class_button_items" placeholder="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" title="{{ \App\Util::translate('a b c - add spaces for multiple class') }}" class="input">
            </div>
        </div>
    </div> --}}
</div>

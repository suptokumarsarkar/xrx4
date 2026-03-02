@push('b_scripts')
    <script>
        function generateVIDEOTag(details, component) {
            // Default values
            const defaultText = "Slider Video";

            // Extract values from the details object
            const additional_class = details.additional_class || '';
            const videoWidth = details.videoWidth || '100';
            const videoWidthUnit = details.videoWidthUnit || '%';
            const videoHeight = details.videoHeight || '100';
            const videoHeightUnit = details.videoHeightUnit || '%';

            // Margins
            const marginTop = details.videoMarginTop || '0';
            const marginBottom = details.videoMarginBottom || '0';
            const marginLeft = details.videoMarginLeft || '0';
            const marginRight = details.videoMarginRight || '0';
            const marginUnit = details.videoMarginUnit || 'px';

            // Background Color
            const backgroundColor = details.videoBackgroundColor || '';

            // Border
            const borderWidth = details.videoBorderWidth || '0';
            const borderStyle = details.videoBorderStyle || 'none';
            const borderColor = details.videoBorderColor || '';
            const border = (borderWidth !== '0' && borderStyle !== 'none' && borderColor) ?
                `${borderWidth}${marginUnit} ${borderStyle} ${borderColor}` :
                '';

            // Border Radius
            const borderRadius = details.videoBorderRadius || '0';
            const borderRadiusUnit = details.videoBorderRadiusUnit || 'px';

            // Box Shadow
            const boxShadowX = details.videoBoxShadowX || '0';
            const boxShadowY = details.videoBoxShadowY || '0';
            const boxShadowBlur = details.videoBoxShadowBlur || '0';
            const boxShadowColor = details.videoBoxShadowColor || '#000000'; // Default shadow color
            const boxShadowUnit = details.videoBoxShadowUnit || 'px';
            const boxShadow = (boxShadowX !== '0' || boxShadowY !== '0' || boxShadowBlur !== '0' || boxShadowColor !==
                    '#000000') ?
                `${boxShadowX}${boxShadowUnit} ${boxShadowY}${boxShadowUnit} ${boxShadowBlur}${boxShadowUnit} ${boxShadowColor}` :
                '';

            // Construct the style attribute based on the provided details
            let style = '';

            // Add margin styles if they are not zero
            if (marginTop !== '0') {
                style += `margin-top: ${marginTop}${marginUnit}; `;
            }
            if (marginBottom !== '0') {
                style += `margin-bottom: ${marginBottom}${marginUnit}; `;
            }
            if (marginLeft !== '0') {
                style += `margin-left: ${marginLeft}${marginUnit}; `;
            }
            if (marginRight !== '0') {
                style += `margin-right: ${marginRight}${marginUnit}; `;
            }

            // Add background color if it is set
            if (backgroundColor) {
                style += `background-color: ${backgroundColor}; `;
            }

            // Add border if it has all necessary components
            if (border) {
                style += `border: ${border}; `;
            }

            // Add border radius if it is not zero
            if (borderRadius !== '0') {
                style += `border-radius: ${borderRadius}${borderRadiusUnit}; `;
            }

            // Add box shadow if it has an impact
            if (boxShadow) {
                style += `box-shadow: ${boxShadow}; `;
            }

            // Control attributes
            const controls = details.videoControls ? 'controls' : '';
            const loop = details.videoLoop ? 'loop' : '';
            const autoplay = details.videoLoop ? 'autoplay' : '';
            const muted = details.videoMuted ? 'muted' : '';

            let item_type = $("#item_type").val();

            // Create the video element
            const generateVIDEOTag =
                `<video class="${item_type}_video ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}" width="${videoWidth}${videoWidthUnit}" height="${videoHeight}${videoHeightUnit}" ${controls} ${loop} ${autoplay} ${muted}>
            <source src="${details.videoSource || 'http://22softwares.com/public/video/sample.mp4'}" type="video/mp4">
            ${details.videoContent || defaultText}
        </video>`;

            return generateVIDEOTag;
        }






        function init_video(component) {
            return generateVIDEOTag({}, component);
        }

        function setComponentValuevideo(data) {
            // Create a temporary DOM element to parse the HTML content
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = data.content;

            // Find the first element (assumes only one element in content)
            const element = tempDiv.firstElementChild;

            // Extract attributes from the element
            const dataComponent = element.getAttribute('data-component');
            const dataClasses = element.getAttribute('class') || '';
            const additionalClass = dataClasses.split(' ').slice(1).join(' '); // Exclude the first class

            // Extract styles from the element's style attribute
            const styleString = element.getAttribute('style');
            const styles = {};
            if (styleString) {
                styleString.split(';').forEach(style => {
                    if (style.trim()) {
                        const [property, value] = style.split(':').map(s => s.trim());
                        styles[property] = value;
                    }
                });
            }

            // Extract relevant values for the video tag
            const marginTop = styles['margin-top'] ? parseFloat(styles['margin-top']) : '';
            const marginBottom = styles['margin-bottom'] ? parseFloat(styles['margin-bottom']) : '';
            const marginLeft = styles['margin-left'] ? parseFloat(styles['margin-left']) : '';
            const marginRight = styles['margin-right'] ? parseFloat(styles['margin-right']) : '';
            const paddingTop = styles['padding-top'] ? parseFloat(styles['padding-top']) : '';
            const paddingBottom = styles['padding-bottom'] ? parseFloat(styles['padding-bottom']) : '';
            const paddingLeft = styles['padding-left'] ? parseFloat(styles['padding-left']) : '';
            const paddingRight = styles['padding-right'] ? parseFloat(styles['padding-right']) : '';
            const backgroundColor = styles['background-color'] || '';
            const border = styles['border'] || '';
            const borderRadius = styles['border-radius'] || '';
            const boxShadow = styles['box-shadow'] || '';
            const videoWidth = element.getAttribute('width') || '';
            const videoHeight = element.getAttribute('height') || '';
            const videoSource = element.firstElementChild.getAttribute('src') || '';
            const videoAltText = element.textContent || '';
            const videoControls = element.getAttribute('controls') !== null;
            const videoLoop = element.getAttribute('loop') !== null;
            const videoSound = element.getAttribute('sound') !== null;
            const videoAutoPlay = element.getAttribute('autoplay') !== null;

            // Set values to the inputs
            $(".dataComponent").val(dataComponent);
            $("#VideoClass").val(additionalClass);
            $('#videoSource').val(videoSource);
            $('#videoAltText').val(videoAltText);
            $('#videoMarginTop').val(marginTop);
            $('#videoMarginBottom').val(marginBottom);
            $('#videoMarginLeft').val(marginLeft);
            $('#videoMarginRight').val(marginRight);
            $(`input[name="videoMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#videoPaddingTop').val(paddingTop);
            $('#videoPaddingBottom').val(paddingBottom);
            $('#videoPaddingLeft').val(paddingLeft);
            $('#videoPaddingRight').val(paddingRight);
            $(`input[name="videoPaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);
            $('#videoBorder').val(border);
            $('#videoBorderRadius').val(borderRadius);
            $('#videoBoxShadow').val(boxShadow);
            $('#videoWidth').val(videoWidth);
            $('#videoHeight').val(videoHeight);
            $('#videoControls').prop('checked', videoControls);
            $('#videoLoop').prop('checked', videoLoop);
            $('#videoSound').prop('checked', videoSound);
            $('#videoAutoPlay').prop('checked', videoAutoPlay);
        }







        $(document).ready(function() {
            $("#video_content").find("input, select, textarea").on("keyup change", function() {
                setTimeout(() => {
                    let liveData = serializeFormToObject("#video_content");
                    let preview = generateVIDEOTag(liveData, $(".dataComponent").val());
                    let index = itemsIndex($("#item_type").val(), $(".dataComponent").val());

                    items[getItemIndex(currentPreviewID)]['components']['single'][index]
                        .content =
                        preview;
                    generateView(items[getItemIndex(currentPreviewID)]);
                }, 400);
            });
        });
    </script>
@endpush
<div class="add_content_video settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Video') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="video_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="videoContent" style="width: 40%">
                    {{ \App\Util::translate('Alt') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Video Details" name="videoContent" id="videoContent" class="input" rows="6"
                            style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="parts" style="width: 100%">
                <label for="videoSource">
                    {{ \App\Util::translate('upload or source') }}
                </label>
                <div class="inputs flex" style="width: 100%">
                    <input type="file" name="videoSourceFile" id="videoSourceFile" class="input ds-flie"
                        connection="videoSource">
                    <input type="url" name="videoSource" id="videoSource" class="input ds-file"
                        connection="videoSource" placeholder="{{ \App\Util::translate('Enter video URL') }}">
                </div>
            </div>

            <div class="parts">
                <label for="videoWidth" style="width: 100%">
                    {{ \App\Util::translate('Video Width') }}
                </label>
                <div class="inputs" style="width: 100%">
                    <input type="number" name="videoWidth" id="videoWidth" class="input" placeholder="100">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="videoWidthUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoWidthUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoWidthUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="videoHeight" style="width: 100%">
                    {{ \App\Util::translate('Video Height') }}
                </label>
                <div class="inputs" style="width: 100%">
                    <input type="number" name="videoHeight" id="videoHeight" class="input" placeholder="100">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="videoHeightUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoHeightUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoHeightUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>
            <div class="parts">
                <label for="videoControls">
                    {{ \App\Util::translate('Video Controls') }}
                </label>
                <div class="generation-z">
                    <label><input type="checkbox" id="videoControls"
                            name="videoControls"><span>{{ \App\Util::translate('Show Controls') }}</span></label>
                    <label><input type="checkbox" id="videoLoop"
                            name="videoLoop"><span>{{ \App\Util::translate('Loop') }}</span></label>
                    <label><input type="checkbox" id="videoSound"
                            name="videoSound"><span>{{ \App\Util::translate('Sound') }}</span></label>
                    <label><input type="checkbox" id="videoAutoPlay"
                            name="videoAutoPlay"><span>{{ \App\Util::translate('Auto Play') }}</span></label>
                </div>
            </div>



            <div class="parts flex" style="width: 100%">
                <label for="videoBorder" style="width: 40%">
                    {{ \App\Util::translate('Border') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Border Width -->
                    <input type="number" name="videoBorderWidth" id="videoBorderWidth" placeholder="Width"
                        class="input">
                    <!-- Border Style -->
                    <select name="videoBorderStyle" id="videoBorderStyle" class="input">
                        <option value="solid">{{ \App\Util::translate('Solid') }}</option>
                        <option value="dotted">{{ \App\Util::translate('Dotted') }}</option>
                        <option value="dashed">{{ \App\Util::translate('Dashed') }}</option>
                        <option value="double">{{ \App\Util::translate('Double') }}</option>
                    </select>
                    <!-- Border Color -->
                    <input type="text" name="videoBorderColor" id="videoBorderColorCode" class="input color-twig"
                        placeholder="Color Code">
                    <input type="color" id="videoBorderColor" value="#000000" class="input color-twig"
                        relation="videoBorderColorCode">
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="videoBorderRadius" style="width: 40%">
                    {{ \App\Util::translate('Border Radius') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="videoBorderRadius" id="videoBorderRadius" class="input"
                            style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="videoBorderRadiusUnit" value="px"
                                checked><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="videoBorderRadiusUnit"
                                value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                    </div>
                </div>
            </div>

            <div class="parts">
                <label for="videoBoxShadow" style="width: 40%">
                    {{ \App\Util::translate('Box Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Box Shadow Offset X -->
                    <input type="number" name="videoBoxShadowX" id="videoBoxShadowX" placeholder="X offset"
                        class="input">
                    <!-- Box Shadow Offset Y -->
                    <input type="number" name="videoBoxShadowY" id="videoBoxShadowY" placeholder="Y offset"
                        class="input">
                    <!-- Box Shadow Blur Radius -->
                    <input type="number" name="videoBoxShadowBlur" id="videoBoxShadowBlur"
                        placeholder="Blur radius" class="input">
                    <!-- Box Shadow Spread Radius -->
                    <input type="number" name="videoBoxShadowSpread" id="videoBoxShadowSpread"
                        placeholder="Spread radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Box Shadow Color -->
                    <input type="text" name="videoBoxShadowColor" id="videoBoxShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="videoBoxShadowColor" value="#000000" class="input color-twig"
                        relation="videoBoxShadowColorCode">
                </div>
            </div>



            <div class="parts">
                <label for="videoMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
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
                    <label><input type="radio" name="videoMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="videoPaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
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
                    <label><input type="radio" name="videoPaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="videoPaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="videoPaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="VideoClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="VideoClass" class="input"
                            style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="parts" style="width: 90%">

                <div class="inputs" style="text-align: right; width: 100%">
                    <button class="btn btn-primary btn-icon" onclick="removeCurrentBlock()"><i
                            class="fa fa-trash"></i>{{ \App\Util::translate('Remove Block') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    .add_content_video .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

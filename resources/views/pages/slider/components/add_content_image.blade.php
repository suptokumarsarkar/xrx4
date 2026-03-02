@push('b_scripts')
    <script>
        function generateIMGTag(details, component) {
            // Default values
            const defaultText = "Slider Image";

            // Extract values from the details object
            const additional_class = details.additional_class || '';
            const imageWidth = details.imageWidth || '100';
            const imageWidthUnit = details.imageWidthUnit || '%';
            const imageHeight = details.imageHeight || '100';
            const imageHeightUnit = details.imageHeightUnit || '%';

            // Margins
            const marginTop = details.imageMarginTop || '0';
            const marginBottom = details.imageMarginBottom || '0';
            const marginLeft = details.imageMarginLeft || '0';
            const marginRight = details.imageMarginRight || '0';
            const marginUnit = details.imageMarginUnit || 'px';

            // Background Color
            const backgroundColor = details.imageBackgroundColor || '';

            // Border
            const borderWidth = details.imageBorderWidth || '0';
            const borderStyle = details.imageBorderStyle || 'none';
            const borderColor = details.imageBorderColor || '';
            const border = (borderWidth !== '0' && borderStyle !== 'none' && borderColor) ?
                `${borderWidth}px ${borderStyle} ${borderColor}` :
                '';

            // Border Radius
            const borderRadius = details.imageBorderRadius || '0';
            const borderRadiusUnit = details.imageBorderRadiusUnit || 'px';

            // Box Shadow
            const boxShadowX = details.imageBoxShadowX || '0';
            const boxShadowY = details.imageBoxShadowY || '0';
            const boxShadowBlur = details.imageBoxShadowBlur || '0';
            const boxShadowColor = details.imageBoxShadowColor || '#000000'; // Default shadow color
            const boxShadowUnit = details.imageBoxShadowUnit || 'px';
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

            let item_type = $("#item_type").val();

            // Create the image element
            const generateIMGTag =
                `<img class="${item_type}_image ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}" src="${details.imageSource || 'http://22softwares.com/public/img/22-logo.png'}" alt="${details.imageContent || defaultText}" width="${imageWidth}${imageWidthUnit}" height="${imageHeight}${imageHeightUnit}">`;

            return generateIMGTag;
        }




        function init_image(component) {
            return generateIMGTag({}, component);
        }

        function setComponentValueimage(data) {
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

            // Extract relevant values for the img tag
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
            const imageWidth = element.getAttribute('width') || '';
            const imageHeight = element.getAttribute('height') || '';

            // Set values to the inputs
            $(".dataComponent").val(dataComponent);
            $("#ImageClass").val(additionalClass);
            $('#imageSource').val(element.getAttribute('src') || '');
            $('#imageAltText').val(element.getAttribute('alt') || '');
            $('#imageMarginTop').val(marginTop);
            $('#imageMarginBottom').val(marginBottom);
            $('#imageMarginLeft').val(marginLeft);
            $('#imageMarginRight').val(marginRight);
            $(`input[name="imageMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#imagePaddingTop').val(paddingTop);
            $('#imagePaddingBottom').val(paddingBottom);
            $('#imagePaddingLeft').val(paddingLeft);
            $('#imagePaddingRight').val(paddingRight);
            $(`input[name="imagePaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);
            $('#imageBorder').val(border);
            $('#imageBorderRadius').val(borderRadius);
            $('#imageBoxShadow').val(boxShadow);
            $('#imageWidth').val(imageWidth);
            $('#imageHeight').val(imageHeight);
        }





        $(document).ready(function() {
            $("#image_content").find("input, select, textarea").on("keyup change", function() {
                setTimeout(() => {
                    let liveData = serializeFormToObject("#image_content");
                    let preview = generateIMGTag(liveData, $(".dataComponent").val());
                    let index = itemsIndex($("#item_type").val(),$(".dataComponent").val());

                    items[getItemIndex(currentPreviewID)]['components']['single'][index]
                        .content =
                        preview;
                    generateView(items[getItemIndex(currentPreviewID)]);
                }, 200);
            });
        });
    </script>
@endpush
<div class="add_content_image settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Image') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="image_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="imageContent" style="width: 40%">
                    {{ \App\Util::translate('Alt') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Image Details" name="imageContent" id="imageContent" class="input" rows="6"
                            style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="parts" style="width: 100%">
                <label for="imageSource">
                    {{ \App\Util::translate('upload or source') }}
                </label>
                <div class="inputs flex" style="width: 100%">
                    <input type="file" name="imageSourceFile" id="imageSourceFile" class="input ds-flie"
                        connection="imageSource">
                    <input type="url" name="imageSource" id="imageSource" class="input ds-file"
                        connection="imageSource" placeholder="{{ \App\Util::translate('Enter image URL') }}">
                </div>
            </div>

            <div class="parts">
                <label for="imageWidth" style="width: 100%">
                    {{ \App\Util::translate('Image Width') }}
                </label>
                <div class="inputs" style="width: 100%">
                    <input type="number" name="imageWidth" id="imageWidth" class="input" placeholder="100">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="imageWidthUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="imageWidthUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="imageWidthUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="imageHeight" style="width: 100%">
                    {{ \App\Util::translate('Image Height') }}
                </label>
                <div class="inputs" style="width: 100%">
                    <input type="number" name="imageHeight" id="imageHeight" class="input" placeholder="100">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="imageHeightUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="imageHeightUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="imageHeightUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>



            <div class="parts flex" style="width: 100%">
                <label for="imageBorder" style="width: 40%">
                    {{ \App\Util::translate('Border') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Border Width -->
                    <input type="number" name="imageBorderWidth" id="imageBorderWidth" placeholder="Width"
                        class="input">
                    <!-- Border Style -->
                    <select name="imageBorderStyle" id="imageBorderStyle" class="input">
                        <option value="solid">{{ \App\Util::translate('Solid') }}</option>
                        <option value="dotted">{{ \App\Util::translate('Dotted') }}</option>
                        <option value="dashed">{{ \App\Util::translate('Dashed') }}</option>
                        <option value="double">{{ \App\Util::translate('Double') }}</option>
                    </select>
                    <!-- Border Color -->
                    <input type="text" name="imageBorderColor" id="imageBorderColorCode" class="input color-twig"
                        placeholder="Color Code">
                    <input type="color" id="imageBorderColor" value="#000000" class="input color-twig"
                        relation="imageBorderColorCode">
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="imageBorderRadius" style="width: 40%">
                    {{ \App\Util::translate('Border Radius') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="imageBorderRadius" id="imageBorderRadius" class="input"
                            style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="imageBorderRadiusUnit" value="px"
                                checked><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="imageBorderRadiusUnit"
                                value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                    </div>
                </div>
            </div>

            <div class="parts">
                <label for="imageBoxShadow" style="width: 40%">
                    {{ \App\Util::translate('Box Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Box Shadow Offset X -->
                    <input type="number" name="imageBoxShadowX" id="imageBoxShadowX" placeholder="X offset"
                        class="input">
                    <!-- Box Shadow Offset Y -->
                    <input type="number" name="imageBoxShadowY" id="imageBoxShadowY" placeholder="Y offset"
                        class="input">
                    <!-- Box Shadow Blur Radius -->
                    <input type="number" name="imageBoxShadowBlur" id="imageBoxShadowBlur"
                        placeholder="Blur radius" class="input">
                    <!-- Box Shadow Spread Radius -->
                    <input type="number" name="imageBoxShadowSpread" id="imageBoxShadowSpread"
                        placeholder="Spread radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Box Shadow Color -->
                    <input type="text" name="imageBoxShadowColor" id="imageBoxShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="imageBoxShadowColor" value="#000000" class="input color-twig"
                        relation="imageBoxShadowColorCode">
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="textAlign" style="width: 40%">
                    {{ \App\Util::translate('Text Align') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="textAlign" id="textAlign" class="input" style="width: 100%">
                            <option value="left" selected>{{ \App\Util::translate('Left') }}</option>
                            <option value="center">{{ \App\Util::translate('Center') }}</option>
                            <option value="right">{{ \App\Util::translate('Right') }}</option>
                            <option value="justify">{{ \App\Util::translate('Justify') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="parts">
                <label for="imageMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
                    <input type="number" name="imageMarginTop" id="imageMarginTop" placeholder="top"
                        class="input">
                    <input type="number" name="imageMarginBottom" id="imageMarginBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="imageMarginLeft" id="imageMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="imageMarginRight" id="imageMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="imageMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="imageMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="imageMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="imagePaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <input type="number" name="imagePaddingTop" id="imagePaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="imagePaddingBottom" id="imagePaddingBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="imagePaddingLeft" id="imagePaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="imagePaddingRight" id="imagePaddingRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="imagePaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="imagePaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="imagePaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="ImageClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="ImageClass" class="input"
                            style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="parts" style="width: 90%">

                <div class="inputs" style="text-align: right; width: 100%">
                    <button class="btn btn-primary btn-icon" onclick="removeCurrentBlock()"><i class="fa fa-trash"></i>{{ \App\Util::translate('Remove Block') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    .add_content_image .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

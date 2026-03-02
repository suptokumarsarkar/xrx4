@push('b_scripts')
    <script>
        function generateButtonTag(details, component) {
            let lineHeightValue = '0';
            if (isFirstCallZ === 0) {
                lineHeightValue = 200;
                isFirstCallZ = 1;
            }

            // Default values
            const defaultText = "Generation Z";

            // Extract values from the details object
            const text = details.buttonContent || defaultText;
            const additional_class = details.additional_class || '';
            const fontFamily = details.fontFamily || 'Arial';
            const fontStyle = details.fontStyle || 'normal';
            const fontSize = details.fontSize || '15'; // Default size
            const fontSizeUnit = details.fontSizeUnit || 'px';
            const lineHeight = details.lineHeight || "unset";
            const lineHeightUnit = details.lineHeightUnit || 'px';
            const fontWeight = details.fontWeight || ''; // No default weight
            const fontWeightUnit = details.fontWeightUnit || '';
            const color = details.ButtonColor || '#404040'; // Default color
            const textAlign = details.ButtonTextAlign || 'center';
            const textTransform = details.ButtonTextTransform || 'none';

            // Text Shadow
            const textShadowX = details.buttonTextShadowX || '0';
            const textShadowY = details.buttonTextShadowY || '0';
            const textShadowBlur = details.buttonTextShadowBlur || '0';
            const textShadowColor = details.buttonTextShadowColor || '#000000'; // Default shadow color
            const textShadowUnit = details.buttonTextShadowUnit || 'px';

            // Margins
            const marginTop = details.buttonMarginTop || '0';
            const marginBottom = details.buttonMarginBottom || '0';
            const marginLeft = details.buttonMarginLeft || '0';
            const marginRight = details.buttonMarginRight || '0';
            const marginUnit = details.buttonMarginUnit || 'px';

            // Paddings
            const paddingTop = details.buttonPaddingTop || '0';
            const paddingBottom = details.buttonPaddingBottom || '0';
            const paddingLeft = details.buttonPaddingLeft || '0';
            const paddingRight = details.buttonPaddingRight || '0';
            const paddingUnit = details.buttonPaddingUnit || 'px';

            // Background Color
            const backgroundColor = details.buttonBackgroundColor || '';

            // Border
            const borderWidth = details.buttonBorderWidth || '0';
            const borderStyle = details.buttonBorderStyle || 'none';
            const borderColor = details.buttonBorderColor || '';
            const border = (borderWidth !== '0' && borderStyle !== 'none' && borderColor) ?
                `${borderWidth}px ${borderStyle} ${borderColor}` :
                '';

            // Border Radius
            const borderRadius = details.buttonBorderRadius || '0';
            const borderRadiusUnit = details.buttonBorderRadiusUnit || 'px';

            // Box Shadow
            const boxShadowX = details.buttonBoxShadowX || '0';
            const boxShadowY = details.buttonBoxShadowY || '0';
            const boxShadowBlur = details.buttonBoxShadowBlur || '0';
            const boxShadowColor = details.buttonBoxShadowColor || '#000000'; // Default shadow color
            const boxShadowUnit = details.buttonBoxShadowUnit || 'px';
            const boxShadow = (boxShadowX !== '0' || boxShadowY !== '0' || boxShadowBlur !== '0' || boxShadowColor !==
                    '#000000') ?
                `${boxShadowX}${boxShadowUnit} ${boxShadowY}${boxShadowUnit} ${boxShadowBlur}${boxShadowUnit} ${boxShadowColor}` :
                '';

            // Construct the style attribute based on the provided details
            let style = `font-family: ${fontFamily}; `;
            style += `font-style: ${fontStyle}; `;
            style += `font-size: ${fontSize}${fontSizeUnit}; `;
            style += `color: ${color}; `;
            style += `text-align: ${textAlign}; `;
            style += `text-transform: ${textTransform}; `;

            // Handle line height
            if (lineHeightUnit === 'normal') {
                if (lineHeight !== '0') {
                    style += `line-height: ${lineHeight}; `;
                }
            } else if (lineHeightUnit) {
                if (lineHeight !== '0') {
                    style += `line-height: ${lineHeight}${lineHeightUnit}; `;
                }
            }
            if (fontWeightUnit === 'normal') {
                if (fontWeight !== '0') {
                    style += `font-weight: ${fontWeight}; `;
                }
            } else if (fontWeightUnit) {
                style += `font-weight: ${fontWeightUnit}; `;
            }

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

            // Add padding styles if they are not zero
            if (paddingTop !== '0') {
                style += `padding-top: ${paddingTop}${paddingUnit}; `;
            }
            if (paddingBottom !== '0') {
                style += `padding-bottom: ${paddingBottom}${paddingUnit}; `;
            }
            if (paddingLeft !== '0') {
                style += `padding-left: ${paddingLeft}${paddingUnit}; `;
            }
            if (paddingRight !== '0') {
                style += `padding-right: ${paddingRight}${paddingUnit}; `;
            }

            // Add text shadow styles if they have an impact
            if (textShadowX !== '0' || textShadowY !== '0' || textShadowBlur !== '0' || textShadowColor !== '#000000') {
                style +=
                    `text-shadow: ${textShadowX}${textShadowUnit} ${textShadowY}${textShadowUnit} ${textShadowBlur}${textShadowUnit} ${textShadowColor}; `;
            }

            // Add background color if it is not empty
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

            // Create the button element
            const generateButtonTag =
                `<button class="${item_type}_button ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}" onclick="${details.buttonClickEvent || ''}">${text}</button>`;

            return generateButtonTag;
        }



        function init_button(component) {
            return generateButtonTag({}, component);
        }

        function setComponentValuebutton(data) {
            // Create a temporary DOM element to parse the HTML content
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = data.content;

            // Find the first element (assumes only one element in content)
            const element = tempDiv.firstElementChild;

            // Extract styles from the element's style attribute
            const dataComponent = element.getAttribute('data-component');
            const dataClasses = element.getAttribute('class');
            let additionalClass = '';
            if (dataClasses) {
                // Split the class attribute into an array of class names
                const classArray = dataClasses.split(' ');

                // Remove the first class
                classArray.shift();

                // Join the remaining classes back into a string
                let resultClasses = classArray.join(' ');

                additionalClass = resultClasses; // This will give you the classes excluding the first one
            }            const styleString = element.getAttribute('style');
            const styles = {};
            if (styleString) {
                styleString.split(';').forEach(style => {
                    if (style.trim()) {
                        const [property, value] = style.split(':').map(s => s.trim());
                        styles[property] = value;
                    }
                });
            }

            // Extract values for inputs
            const fontFamily = styles['font-family'] || '';
            const fontStyle = styles['font-style'] || '';
            const fontSize = styles['font-size'] ? parseFloat(styles['font-size']) : '';
            const fontSizeUnit = styles['font-size'] ? styles['font-size'].replace(/[\d.]/g, '') : 'px';
            const color = styles['color'] || '';
            const textAlign = styles['text-align'] || '';
            const textTransform = styles['text-transform'] || '';
            let lineHeight = styles['line-height'] || '';
            const lineHeightUnit = styles['line-height'] ? (lineHeight.includes('px') ? 'px' : (lineHeight.includes('em') ?
                'em' : 'normal')) : '';
            lineHeight = parseFloat(lineHeight) || '';
            let fontWeight = styles['font-weight'] || '';
            const fontWeightUnit = styles['font-weight'] ? (fontWeight.includes('bold') ? 'bold' : (fontWeight.includes(
                'lighter') ? 'lighter' : 'bolder')) : 'normal';
            fontWeight = parseFloat(fontWeight) || '';
            const marginTop = styles['margin-top'] ? parseFloat(styles['margin-top']) : '';
            const marginBottom = styles['margin-bottom'] ? parseFloat(styles['margin-bottom']) : '';
            const marginLeft = styles['margin-left'] ? parseFloat(styles['margin-left']) : '';
            const marginRight = styles['margin-right'] ? parseFloat(styles['margin-right']) : '';
            const paddingTop = styles['padding-top'] ? parseFloat(styles['padding-top']) : '';
            const paddingBottom = styles['padding-bottom'] ? parseFloat(styles['padding-bottom']) : '';
            const paddingLeft = styles['padding-left'] ? parseFloat(styles['padding-left']) : '';
            const paddingRight = styles['padding-right'] ? parseFloat(styles['padding-right']) : '';

            // Extract text-shadow values if they exist
            const textShadow = styles['text-shadow'] || '';
            let textShadowX = '';
            let textShadowY = '';
            let textShadowBlur = '';
            let textShadowColor = '';
            let textShadowUnit = 'px';

            if (textShadow) {
                const shadowValues = textShadow.split(' ');
                if (shadowValues.length >= 4) {
                    textShadowX = parseFloat(shadowValues[0]) || '';
                    textShadowY = parseFloat(shadowValues[1]) || '';
                    textShadowBlur = parseFloat(shadowValues[2]) || '';
                    textShadowColor = shadowValues[3] || '';
                    textShadowUnit = shadowValues[0].replace(/[0-9.-]/g, '') ||
                    'px'; // Assumes units are the same for all dimensions
                }
            }

            // Extract background color, border, and border-radius values if they exist
            const backgroundColor = styles['background-color'] || '';
            const border = styles['border'] || '';
            const borderRadius = styles['border-radius'] || '';

            // Parse border and border-radius values if they exist
            let borderWidth = '';
            let borderStyle = '';
            let borderColor = '';
            let borderUnit = 'px';

            if (border) {
                const borderValues = border.split(' ');
                if (borderValues.length >= 3) {
                    borderWidth = parseFloat(borderValues[0]) || '';
                    borderStyle = borderValues[1] || '';
                    borderColor = borderValues[2] || '';
                    borderUnit = borderValues[0].replace(/[0-9.-]/g, '') ||
                    'px'; // Assumes units are the same for all dimensions
                }
            }

            // Parse border-radius values if they exist
            let borderRadiusValue = '';
            let borderRadiusUnit = 'px';

            if (borderRadius) {
                const radiusValues = borderRadius.split(' ');
                if (radiusValues.length > 0) {
                    borderRadiusValue = parseFloat(radiusValues[0]) || '';
                    borderRadiusUnit = radiusValues[0].replace(/[0-9.-]/g, '') ||
                    'px'; // Assumes units are the same for all dimensions
                }
            }

            // Extract box-shadow values if they exist
            const boxShadow = styles['box-shadow'] || '';
            let boxShadowX = '';
            let boxShadowY = '';
            let boxShadowBlur = '';
            let boxShadowColor = '';
            let boxShadowUnit = 'px';

            if (boxShadow) {
                const shadowValues = boxShadow.split(' ');
                if (shadowValues.length >= 4) {
                    boxShadowX = parseFloat(shadowValues[0]) || '';
                    boxShadowY = parseFloat(shadowValues[1]) || '';
                    boxShadowBlur = parseFloat(shadowValues[2]) || '';
                    boxShadowColor = shadowValues[3] || '';
                    boxShadowUnit = shadowValues[0].replace(/[0-9.-]/g, '') ||
                    'px'; // Assumes units are the same for all dimensions
                }
            }

            // Set values to the inputs
            $(".dataComponent").val(dataComponent);
            $("#ButtonClass").val(additionalClass);
            $("#buttonContent").val(element.textContent || '');
            $('#fontFamily').val(fontFamily);
            $('#fontStyle').val(fontStyle);
            $('#fontSize').val(fontSize);
            $(`input[name="fontSizeUnit"][value="${fontSizeUnit}"]`).prop('checked', true);
            $('#ButtonColor').val(color);
            $('#ButtonTextAlign').val(textAlign);
            $('#ButtonTextTransform').val(textTransform);
            $('#textlineHeight').val(lineHeight);
            $(`input[name="lineHeightUnit"][value="${lineHeightUnit}"]`).prop('checked', true);
            $('#fontWeight').val(fontWeight);
            $(`input[name="fontWeightUnit"][value="${fontWeightUnit}"]`).prop('checked', true);
            $('#buttonMarginTop').val(marginTop);
            $('#buttonMarginBottom').val(marginBottom);
            $('#buttonMarginLeft').val(marginLeft);
            $('#buttonMarginRight').val(marginRight);
            $(`input[name="buttonMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#buttonPaddingTop').val(paddingTop);
            $('#buttonPaddingBottom').val(paddingBottom);
            $('#buttonPaddingLeft').val(paddingLeft);
            $('#buttonPaddingRight').val(paddingRight);
            $(`input[name="buttonPaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);

            // Set values for text-shadow inputs
            $('#buttonTextShadowX').val(textShadowX);
            $('#buttonTextShadowY').val(textShadowY);
            $('#buttonTextShadowBlur').val(textShadowBlur);
            $('#buttonTextShadowColor').val(textShadowColor);
            $('#buttonTextShadowColorCode').val(textShadowColor);
            $(`input[name="buttonTextShadowUnit"][value="${textShadowUnit}"]`).prop('checked', true);

            // Set values for background color, border, border-radius, and box-shadow
            $('#buttonBackgroundColor').val(backgroundColor);
            $('#buttonBorder').val(borderWidth);
            $('#buttonBorderStyle').val(borderStyle);
            $('#buttonBorderColor').val(borderColor);
            $(`input[name="borderUnit"][value="${borderUnit}"]`).prop('checked', true);
            $('#buttonBorderRadius').val(borderRadiusValue);
            $(`input[name="borderRadiusUnit"][value="${borderRadiusUnit}"]`).prop('checked', true);
            $('#buttonBoxShadowX').val(boxShadowX);
            $('#buttonBoxShadowY').val(boxShadowY);
            $('#buttonBoxShadowBlur').val(boxShadowBlur);
            $('#buttonBoxShadowColor').val(boxShadowColor);
            $(`input[name="buttonBoxShadowUnit"][value="${boxShadowUnit}"]`).prop('checked', true);
            $('#linkClickEvent').val(element.getAttribute("onclick"));
        }




        $(document).ready(function() {
            $("#button_content").find("input, select, textarea").on("keyup change", function() {
                let liveData = serializeFormToObject("#button_content");
                let preview = generateButtonTag(liveData, $(".dataComponent").val());
                let index = itemsIndex($("#item_type").val(),$(".dataComponent").val());

                items[getItemIndex(currentPreviewID)]['components']['single'][index].content =
                    preview;
                generateView(items[getItemIndex(currentPreviewID)]);
            });
        });
    </script>
@endpush
<div class="add_content_button settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Button') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="button_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="buttonContent" style="width: 40%">
                    {{ \App\Util::translate('Content') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Generation-Z" name="buttonContent" id="buttonContent" class="input" rows="6"
                            style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="buttonClickEvent" style="width: 40%">
                    {{ \App\Util::translate('Click Event') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea name="buttonClickEvent" id="buttonClickEvent" class="input" style="width: 100%; height: 100px;"
                            placeholder="Enter JavaScript function or script here..."></textarea>
                    </div>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="fontFamily" style="width: 40%">
                    {{ \App\Util::translate('Font Family') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="fontFamily" id="fontFamily" class="input" style="width: 100%">
                            <option value="arial" selected>{{ \App\Util::translate('Arial') }}</option>
                            <option value="tahoma">{{ \App\Util::translate('Tahoma') }}</option>
                            <option value="verdana">{{ \App\Util::translate('Verdana') }}</option>
                            <option value="times">{{ \App\Util::translate('Times New Roman') }}</option>
                            <option value="georgia">{{ \App\Util::translate('Georgia') }}</option>
                            <option value="palatino">{{ \App\Util::translate('Palatino') }}</option>
                            <option value="garamond">{{ \App\Util::translate('Garamond') }}</option>
                            <option value="comic">{{ \App\Util::translate('Comic Sans MS') }}</option>
                            <option value="impact">{{ \App\Util::translate('Impact') }}</option>
                            <option value="trebuchet">{{ \App\Util::translate('Trebuchet MS') }}</option>
                            <option value="courier">{{ \App\Util::translate('Courier New') }}</option>
                            <option value="cursive">{{ \App\Util::translate('Cursive') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="fontStyle" style="width: 40%">
                    {{ \App\Util::translate('Font Style') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="fontStyle" id="fontStyle" class="input" style="width: 100%">
                            <option value="normal" selected>{{ \App\Util::translate('Normal') }}</option>
                            <option value="italic">{{ \App\Util::translate('Italic') }}</option>
                            <option value="bold">{{ \App\Util::translate('Bold') }}</option>
                            <option value="bold_italic">{{ \App\Util::translate('Bold Italic') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts">
                <label for="buttonTextShadow" style="width: 40%">
                    {{ \App\Util::translate('Text Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Text Shadow Offset X -->
                    <input type="number" name="buttonTextShadowX" id="buttonTextShadowX" placeholder="X offset"
                        class="input">

                    <!-- Text Shadow Offset Y -->
                    <input type="number" name="buttonTextShadowY" id="buttonTextShadowY" placeholder="Y offset"
                        class="input">

                    <!-- Text Shadow Blur Radius -->
                    <input type="number" name="buttonTextShadowBlur" id="buttonTextShadowBlur"
                        placeholder="Blur radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Text Shadow Color -->
                    <input type="text" name="buttonTextShadowColor" id="buttonTextShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="buttonTextShadowColor" value="#000000" class="input color-twig"
                        relation="buttonTextShadowColorCode">
                </div>
                <div class="generation-z" style="width: 100%; margin-top: 10px;">
                    <label><input type="radio" name="buttonTextShadowUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="buttonTextShadowUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="buttonTextShadowUnit" value="%"
                            checked><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="fontSize" style="width: 40%">
                    {{ \App\Util::translate('Font Size') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="fontSize" id="fontSize" class="input" style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="fontSizeUnit" value="px"
                                checked><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="fontSizeUnit"
                                value="em"><span>{{ \App\Util::translate('em') }}</span></label>
                        <label><input type="radio" name="fontSizeUnit"
                                value="rem"><span>{{ \App\Util::translate('rem') }}</span></label>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="lineHeight" style="width: 40%">
                    {{ \App\Util::translate('Line Height') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="lineHeight" id="textlineHeight" class="input"
                            style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="lineHeightUnit" value=""
                                checked><span>{{ \App\Util::translate('Normal') }}</span></label>
                        <label><input type="radio" name="lineHeightUnit"
                                value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="lineHeightUnit"
                                value="em"><span>{{ \App\Util::translate('em') }}</span></label>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="fontWeight" style="width: 40%">
                    {{ \App\Util::translate('Font Weight') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="fontWeight" id="fontWeight" class="input" min="100"
                            max="900" step="100" style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="fontWeightUnit" value="normal"
                                checked><span>{{ \App\Util::translate('Normal') }}</span></label>
                        <label><input type="radio" name="fontWeightUnit"
                                value="bold"><span>{{ \App\Util::translate('Bold') }}</span></label>
                        <label><input type="radio" name="fontWeightUnit"
                                value="bolder"><span>{{ \App\Util::translate('Bolder') }}</span></label>
                        <label><input type="radio" name="fontWeightUnit"
                                value="lighter"><span>{{ \App\Util::translate('Lighter') }}</span></label>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="ButtonColor" style="width: 40%">
                    {{ \App\Util::translate('Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="ButtonColor" id="ButtonColorCode" class="input color-twig"
                            relation="ButtonColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="ButtonColor" value="#ff0000" class="input color-twig"
                            relation="ButtonColorCode">
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="buttonBackgroundColor" style="width: 40%">
                    {{ \App\Util::translate('Background Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="buttonBackgroundColor" id="buttonBackgroundColorCode"
                            class="input color-twig" relation="buttonBackgroundColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="buttonBackgroundColor" value="#ffffff" class="input color-twig"
                            relation="buttonBackgroundColorCode">
                    </div>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="buttonBorder" style="width: 40%">
                    {{ \App\Util::translate('Border') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Border Width -->
                    <input type="number" name="buttonBorderWidth" id="buttonBorderWidth" placeholder="Width"
                        class="input">
                    <!-- Border Style -->
                    <select name="buttonBorderStyle" id="buttonBorderStyle" class="input">
                        <option value="solid">{{ \App\Util::translate('Solid') }}</option>
                        <option value="dotted">{{ \App\Util::translate('Dotted') }}</option>
                        <option value="dashed">{{ \App\Util::translate('Dashed') }}</option>
                        <option value="double">{{ \App\Util::translate('Double') }}</option>
                    </select>
                    <!-- Border Color -->
                    <input type="text" name="buttonBorderColor" id="buttonBorderColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="buttonBorderColor" value="#000000" class="input color-twig"
                        relation="buttonBorderColorCode">
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="buttonBorderRadius" style="width: 40%">
                    {{ \App\Util::translate('Border Radius') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="buttonBorderRadius" id="buttonBorderRadius" class="input"
                            style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="buttonBorderRadiusUnit" value="px"
                                checked><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="buttonBorderRadiusUnit"
                                value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                    </div>
                </div>
            </div>

            <div class="parts">
                <label for="buttonBoxShadow" style="width: 40%">
                    {{ \App\Util::translate('Box Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Box Shadow Offset X -->
                    <input type="number" name="buttonBoxShadowX" id="buttonBoxShadowX" placeholder="X offset"
                        class="input">
                    <!-- Box Shadow Offset Y -->
                    <input type="number" name="buttonBoxShadowY" id="buttonBoxShadowY" placeholder="Y offset"
                        class="input">
                    <!-- Box Shadow Blur Radius -->
                    <input type="number" name="buttonBoxShadowBlur" id="buttonBoxShadowBlur"
                        placeholder="Blur radius" class="input">
                    <!-- Box Shadow Spread Radius -->
                    <input type="number" name="buttonBoxShadowSpread" id="buttonBoxShadowSpread"
                        placeholder="Spread radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Box Shadow Color -->
                    <input type="text" name="buttonBoxShadowColor" id="buttonBoxShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="buttonBoxShadowColor" value="#000000" class="input color-twig"
                        relation="buttonBoxShadowColorCode">
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
            <div class="parts flex" style="width: 100%">
                <label for="ButonTextTransform" style="width: 40%">
                    {{ \App\Util::translate('Text Transform') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="ButonTextTransform" id="ButtonTextTransform" class="input"
                            style="width: 100%">
                            <option value="none" selected>{{ \App\Util::translate('None') }}</option>
                            <option value="uppercase">{{ \App\Util::translate('Uppercase') }}</option>
                            <option value="lowercase">{{ \App\Util::translate('Lowercase') }}</option>
                            <option value="capitalize">{{ \App\Util::translate('Capitalize') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts">
                <label for="buttonMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
                    <input type="number" name="buttonMarginTop" id="buttonMarginTop" placeholder="top"
                        class="input">
                    <input type="number" name="buttonMarginBottom" id="buttonMarginBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="buttonMarginLeft" id="buttonMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="buttonMarginRight" id="buttonMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="buttonMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="buttonMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="buttonMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="buttonPaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <input type="number" name="buttonPaddingTop" id="buttonPaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="buttonPaddingBottom" id="buttonPaddingBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="buttonPaddingLeft" id="buttonPaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="buttonPaddingRight" id="buttonPaddingRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="buttonPaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="buttonPaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="buttonPaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="ButtonClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="ButtonClass" class="input"
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
    .add_content_button .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

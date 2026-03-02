@push('b_scripts')
    <script>
        function generateATag(details, component) {
            let lineHeightValue = '0';
            if (isFirstCallZ === 0) {
                lineHeightValue = 200;
                isFirstCallZ = 1;
            }

            // Default values
            const defaultText = "Click Here";

            // Extract values from the details object
            const text = details.linkContent || defaultText;
            const additional_class = details.additional_class || '';
            const fontFamily = details.fontFamily || 'Arial';
            const fontStyle = details.fontStyle || 'normal';
            const fontSize = details.fontSize || '15'; // Default size
            const fontSizeUnit = details.fontSizeUnit || 'px';
            const lineHeight = details.lineHeight || lineHeightValue;
            const lineHeightUnit = details.lineHeightUnit || 'px';
            const fontWeight = details.fontWeight || ''; // No default weight
            const fontWeightUnit = details.fontWeightUnit || '';
            const color = details.LinkColor || '#404040'; // Default color
            const textAlign = details.LinkTextAlign || 'center';
            const textTransform = details.LinkTextTransform || 'none';

            // Text Shadow
            const textShadowX = details.linkTextShadowX || '0';
            const textShadowY = details.linkTextShadowY || '0';
            const textShadowBlur = details.linkTextShadowBlur || '0';
            const textShadowColor = details.linkTextShadowColor || '#000000'; // Default shadow color
            const textShadowUnit = details.linkTextShadowUnit || 'px';

            // Margins
            const marginTop = details.linkMarginTop || '0';
            const marginBottom = details.linkMarginBottom || '0';
            const marginLeft = details.linkMarginLeft || '0';
            const marginRight = details.linkMarginRight || '0';
            const marginUnit = details.linkMarginUnit || 'px';

            // Paddings
            const paddingTop = details.linkPaddingTop || '0';
            const paddingBottom = details.linkPaddingBottom || '0';
            const paddingLeft = details.linkPaddingLeft || '0';
            const paddingRight = details.linkPaddingRight || '0';
            const paddingUnit = details.linkPaddingUnit || 'px';

            // Background Color
            const backgroundColor = details.linkBackgroundColor || '';

            // Border
            const borderWidth = details.linkBorderWidth || '0';
            const borderStyle = details.linkBorderStyle || 'none';
            const borderColor = details.linkBorderColor || '';
            const border = (borderWidth !== '0' && borderStyle !== 'none' && borderColor) ?
                `${borderWidth}px ${borderStyle} ${borderColor}` :
                '';

            // Border Radius
            const borderRadius = details.linkBorderRadius || '0';
            const borderRadiusUnit = details.linkBorderRadiusUnit || 'px';

            // Box Shadow
            const boxShadowX = details.linkBoxShadowX || '0';
            const boxShadowY = details.linkBoxShadowY || '0';
            const boxShadowBlur = details.linkBoxShadowBlur || '0';
            const boxShadowColor = details.linkBoxShadowColor || '#000000'; // Default shadow color
            const boxShadowUnit = details.linkBoxShadowUnit || 'px';
            const boxShadow = (boxShadowX !== '0' || boxShadowY !== '0' || boxShadowBlur !== '0' || boxShadowColor !==
                    '#000000') ?
                `${boxShadowX}${boxShadowUnit} ${boxShadowY}${boxShadowUnit} ${boxShadowBlur}${boxShadowUnit} ${boxShadowColor}` :
                '';
            const textDecoration = details.linkTextDecoration || 'none';

            // Construct the style attribute based on the provided details
            let style = `font-family: ${fontFamily}; `;
            style += `font-style: ${fontStyle}; `;
            style += `font-size: ${fontSize}${fontSizeUnit}; `;
            style += `color: ${color}; `;
            style += `text-align: ${textAlign}; `;
            style += `text-transform: ${textTransform}; `;
            style += `text-decoration: ${textDecoration}; `;
            // Text Decoration

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

            // Create the link element
            const generateATag =
                `<a class="${item_type}_link ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}" href="${details.linkClickEvent || ''}">${text}</a>`;

            return generateATag;
        }



        function init_link(component) {
            return generateATag({}, component);
        }

        function setComponentValuelink(data) {
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
            }
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

            // Extract background color, border, border-radius, and box-shadow values if they exist
            const backgroundColor = styles['background-color'] || '';
            const border = styles['border'] || '';
            const borderRadius = styles['border-radius'] || '';
            const boxShadow = styles['box-shadow'] || '';

            // Extract text-decoration if it exists
            const textDecoration = styles['text-decoration'] || 'none';

            // Parse border values if they exist
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

            // Parse box-shadow values if they exist
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
            $("#LinkClass").val(additionalClass);
            $("#linkContent").val(element.textContent || '');
            $('#fontFamily').val(fontFamily);
            $('#fontStyle').val(fontStyle);
            $('#fontSize').val(fontSize);
            $(`input[name="fontSizeUnit"][value="${fontSizeUnit}"]`).prop('checked', true);
            $('#LinkColor').val(color);
            $('#LinkTextAlign').val(textAlign);
            $('#LinkTextTransform').val(textTransform);
            $('#textlineHeight').val(lineHeight);
            $(`input[name="lineHeightUnit"][value="${lineHeightUnit}"]`).prop('checked', true);
            $('#fontWeight').val(fontWeight);
            $(`input[name="fontWeightUnit"][value="${fontWeightUnit}"]`).prop('checked', true);
            $('#linkMarginTop').val(marginTop);
            $('#linkMarginBottom').val(marginBottom);
            $('#linkMarginLeft').val(marginLeft);
            $('#linkMarginRight').val(marginRight);
            $(`input[name="linkMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#linkPaddingTop').val(paddingTop);
            $('#linkPaddingBottom').val(paddingBottom);
            $('#linkPaddingLeft').val(paddingLeft);
            $('#linkPaddingRight').val(paddingRight);
            $(`input[name="linkPaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);

            // Set values for text-shadow inputs
            $('#linkTextShadowX').val(textShadowX);
            $('#linkTextShadowY').val(textShadowY);
            $('#linkTextShadowBlur').val(textShadowBlur);

            $('#linkTextShadowColor').val(textShadowColor);
            $('#linkTextShadowColorCode').val(textShadowColor);
            $(`input[name="linkTextShadowUnit"][value="${textShadowUnit}"]`).prop('checked', true);

            // Set values for background color, border, border-radius, and box-shadow
            $('#linkBackgroundColor').val(backgroundColor);
            $('#linkBorder').val(borderWidth);
            $('#linkBorderStyle').val(borderStyle);
            $('#linkBorderColor').val(borderColor);
            $(`input[name="borderUnit"][value="${borderUnit}"]`).prop('checked', true);
            $('#linkBorderRadius').val(borderRadiusValue);
            $(`input[name="borderRadiusUnit"][value="${borderRadiusUnit}"]`).prop('checked', true);
            $('#linkBoxShadowX').val(boxShadowX);
            $('#linkBoxShadowY').val(boxShadowY);
            $('#linkBoxShadowBlur').val(boxShadowBlur);
            $('#linkBoxShadowColor').val(boxShadowColor);
            $(`input[name="linkBoxShadowUnit"][value="${boxShadowUnit}"]`).prop('checked', true);

            // Set value for text-decoration
            $('#linkTextDecoration').val(textDecoration);
            $('#linkClickEvent').val(element.getAttribute("href"));
        }




        $(document).ready(function() {
            $("#link_content").find("input, select, textarea").on("keyup change", function() {
                let liveData = serializeFormToObject("#link_content");
                let preview = generateATag(liveData, $(".dataComponent").val());
                let index = itemsIndex($("#item_type").val(), $(".dataComponent").val());

                items[getItemIndex(currentPreviewID)]['components']['single'][index].content =
                    preview;
                generateView(items[getItemIndex(currentPreviewID)]);
            });
        });
    </script>
@endpush
<div class="add_content_link settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Link') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="link_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="linkContent" style="width: 40%">
                    {{ \App\Util::translate('Content') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Generation-Z" name="linkContent" id="linkContent" class="input" rows="6"
                            style="width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="linkClickEvent" style="width: 40%">
                    {{ \App\Util::translate('Link') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea name="linkClickEvent" id="linkClickEvent" class="input" style="width: 100%; height: 100px;"
                            placeholder="https://www.example.com/page"></textarea>
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
            <!-- Text Decoration Field -->
            <div class="parts flex" style="width: 100%">
                <label for="linkTextDecoration" style="width: 40%">
                    {{ \App\Util::translate('Text Decoration') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="linkTextDecoration" id="linkTextDecoration" class="input" style="width: 100%">
                            <option value="none">{{ \App\Util::translate('None') }}</option>
                            <option value="underline">{{ \App\Util::translate('Underline') }}</option>
                            <option value="overline">{{ \App\Util::translate('Overline') }}</option>
                            <option value="line-through">{{ \App\Util::translate('Line Through') }}</option>
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
                <label for="linkTextShadow" style="width: 40%">
                   {{ \App\Util::translate('Text Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Text Shadow Offset X -->
                    <input type="number" name="linkTextShadowX" id="linkTextShadowX" placeholder="X offset"
                        class="input">

                    <!-- Text Shadow Offset Y -->
                    <input type="number" name="linkTextShadowY" id="linkTextShadowY" placeholder="Y offset"
                        class="input">

                    <!-- Text Shadow Blur Radius -->
                    <input type="number" name="linkTextShadowBlur" id="linkTextShadowBlur"
                        placeholder="Blur radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Text Shadow Color -->
                    <input type="text" name="linkTextShadowColor" id="linkTextShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="linkTextShadowColor" value="#000000" class="input color-twig"
                        relation="linkTextShadowColorCode">
                </div>
                <div class="generation-z" style="width: 100%; margin-top: 10px;">
                    <label><input type="radio" name="linkTextShadowUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="linkTextShadowUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="linkTextShadowUnit" value="%"
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
                <label for="LinkColor" style="width: 40%">
                    {{ \App\Util::translate('Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="LinkColor" id="LinkColorCode" class="input color-twig"
                            relation="LinkColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="LinkColor" value="#ff0000" class="input color-twig"
                            relation="LinkColorCode">
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="linkBackgroundColor" style="width: 40%">
                    {{ \App\Util::translate('Background Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="linkBackgroundColor" id="linkBackgroundColorCode"
                            class="input color-twig" relation="linkBackgroundColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="linkBackgroundColor" value="#ffffff" class="input color-twig"
                            relation="linkBackgroundColorCode">
                    </div>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="linkBorder" style="width: 40%">
                    {{ \App\Util::translate('Border') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Border Width -->
                    <input type="number" name="linkBorderWidth" id="linkBorderWidth" placeholder="Width"
                        class="input">
                    <!-- Border Style -->
                    <select name="linkBorderStyle" id="linkBorderStyle" class="input">
                        <option value="solid">{{ \App\Util::translate('Solid') }}</option>
                        <option value="dotted">{{ \App\Util::translate('Dotted') }}</option>
                        <option value="dashed">{{ \App\Util::translate('Dashed') }}</option>
                        <option value="double">{{ \App\Util::translate('Double') }}</option>
                    </select>
                    <!-- Border Color -->
                    <input type="text" name="linkBorderColor" id="linkBorderColorCode" class="input color-twig"
                        placeholder="Color Code">
                    <input type="color" id="linkBorderColor" value="#000000" class="input color-twig"
                        relation="linkBorderColorCode">
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="linkBorderRadius" style="width: 40%">
                    {{ \App\Util::translate('Border Radius') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="number" name="linkBorderRadius" id="linkBorderRadius" class="input"
                            style="width: 100%">
                    </div>
                    <div class="generation-z" style="width: 100%">
                        <label><input type="radio" name="linkBorderRadiusUnit" value="px"
                                checked><span>{{ \App\Util::translate('px') }}</span></label>
                        <label><input type="radio" name="linkBorderRadiusUnit"
                                value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                    </div>
                </div>
            </div>

            <div class="parts">
                <label for="linkBoxShadow" style="width: 40%">
                    {{ \App\Util::translate('Box Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Box Shadow Offset X -->
                    <input type="number" name="linkBoxShadowX" id="linkBoxShadowX" placeholder="X offset"
                        class="input">
                    <!-- Box Shadow Offset Y -->
                    <input type="number" name="linkBoxShadowY" id="linkBoxShadowY" placeholder="Y offset"
                        class="input">
                    <!-- Box Shadow Blur Radius -->
                    <input type="number" name="linkBoxShadowBlur" id="linkBoxShadowBlur" placeholder="Blur radius"
                        class="input">
                    <!-- Box Shadow Spread Radius -->
                    <input type="number" name="linkBoxShadowSpread" id="linkBoxShadowSpread"
                        placeholder="Spread radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Box Shadow Color -->
                    <input type="text" name="linkBoxShadowColor" id="linkBoxShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="linkBoxShadowColor" value="#000000" class="input color-twig"
                        relation="linkBoxShadowColorCode">
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
                        <select name="ButonTextTransform" id="LinkTextTransform" class="input" style="width: 100%">
                            <option value="none" selected>{{ \App\Util::translate('None') }}</option>
                            <option value="uppercase">{{ \App\Util::translate('Uppercase') }}</option>
                            <option value="lowercase">{{ \App\Util::translate('Lowercase') }}</option>
                            <option value="capitalize">{{ \App\Util::translate('Capitalize') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts">
                <label for="linkMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
                    <input type="number" name="linkMarginTop" id="linkMarginTop" placeholder="top" class="input">
                    <input type="number" name="linkMarginBottom" id="linkMarginBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="linkMarginLeft" id="linkMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="linkMarginRight" id="linkMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="linkMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="linkMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="linkMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="linkPaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <input type="number" name="linkPaddingTop" id="linkPaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="linkPaddingBottom" id="linkPaddingBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="linkPaddingLeft" id="linkPaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="linkPaddingRight" id="linkPaddingRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="linkPaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="linkPaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="linkPaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="LinkClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="LinkClass" class="input"
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
    .add_content_link .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

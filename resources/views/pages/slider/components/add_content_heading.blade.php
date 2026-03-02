@push('b_scripts')
    <script>

        let isFirstCallZ = 0;

        function generateH2Tag(details, component) {
            let lineHeightValue = '0';
            if (isFirstCallZ == 0) {
                lineHeightValue = 200;
                isFirstCallZ = 1;
            }

            // Default values
            const defaultText = "Generation Z";

            // Extract values from the details object
            const text = details.headingContent || defaultText;
            const additional_class = details.HeadingClass || '';
            const fontFamily = details.fontFamily || 'Arial';
            const fontStyle = details.fontStyle || 'normal';
            const fontSize = details.fontSize || '30'; // Default size
            const fontSizeUnit = details.fontSizeUnit || 'px';
            const lineHeight = details.lineHeight || lineHeightValue;
            const lineHeightUnit = details.lineHeightUnit || 'px';
            const fontWeight = details.fontWeight || ''; // No default weight
            const fontWeightUnit = details.fontWeightUnit || '';
            const color = details.HeadingColor || '#404040'; // Default color
            const textAlign = details.headingTextAlign || 'center';
            const textTransform = details.textTransform || 'none';

            // Text Shadow
            const textShadowX = details.headingTextShadowX || '0';
            const textShadowY = details.headingTextShadowY || '0';
            const textShadowBlur = details.headingTextShadowBlur || '0';
            const textShadowColor = details.headingTextShadowColor || '#000000'; // Default shadow color
            const textShadowUnit = details.headingTextShadowUnit || 'px';

            // Margins
            const marginTop = details.headingMarginTop || '0';
            const marginBottom = details.headingMarginBottom || '0';
            const marginLeft = details.headingMarginLeft || '0';
            const marginRight = details.headingMarginRight || '0';
            const marginUnit = details.headingMarginUnit || 'px';

            // Paddings
            const paddingTop = details.headingPaddingTop || '0';
            const paddingBottom = details.headingPaddingBottom || '0';
            const paddingLeft = details.headingPaddingLeft || '0';
            const paddingRight = details.headingPaddingRight || '0';
            const paddingUnit = details.headingPaddingUnit || 'px';

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

            let item_type = $("#item_type").val();

            // Create the h2 element
            const h2Element =
                `<h2 class="${item_type}_heading ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}">${text}</h2>`;

            return h2Element;
        }



        function init_heading(component) {
            return generateH2Tag({}, component);
        }

        function setComponentValueheading(data) {
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

            // Set values to the inputs
            $(".dataComponent").val(dataComponent);
            $("#HeadingClass").val(additionalClass);
            $("#headingContent").val(element.textContent || '');
            $('#fontFamily').val(fontFamily);
            $('#fontStyle').val(fontStyle);
            $('#fontSize').val(fontSize);
            $(`input[name="fontSizeUnit"][value="${fontSizeUnit}"]`).prop('checked', true);
            $('#HeadingColor').val(color);
            $('#HeadingColorCode').val(color);
            $('#headingTextAlign').val(textAlign);
            $('#textTransform').val(textTransform);
            $('#textlineHeight').val(lineHeight);
            $(`input[name="lineHeightUnit"][value="${lineHeightUnit}"]`).prop('checked', true);
            $('#fontWeight').val(fontWeight);
            $(`input[name="fontWeightUnit"][value="${fontWeightUnit}"]`).prop('checked', true);
            $('#headingMarginTop').val(marginTop);
            $('#headingMarginBottom').val(marginBottom);
            $('#headingMarginLeft').val(marginLeft);
            $('#headingMarginRight').val(marginRight);
            $(`input[name="headingMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#headingPaddingTop').val(paddingTop);
            $('#headingPaddingBottom').val(paddingBottom);
            $('#headingPaddingLeft').val(paddingLeft);
            $('#headingPaddingRight').val(paddingRight);
            $(`input[name="headingPaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);

            // Set values for text-shadow inputs
            $('#headingTextShadowX').val(textShadowX);
            $('#headingTextShadowY').val(textShadowY);
            $('#headingTextShadowBlur').val(textShadowBlur);
            $('#headingTextShadowColor').val(textShadowColor);
            $('#headingTextShadowColor').val(textShadowColor);
            $('#headingTextShadowColorCode').val(textShadowColor);
            $(`input[name="headingTextShadowUnit"][value="${textShadowUnit}"]`).prop('checked', true);
        }


        $(document).ready(function() {
            $("#heading_content").find("input, select, textarea").on("keyup change", function() {
                let liveData = serializeFormToObject("#heading_content");
                let preview = generateH2Tag(liveData, $(".dataComponent").val());
                let index = itemsIndex($("#item_type").val(),$(".dataComponent").val());
                items[getItemIndex(currentPreviewID)]['components']['single'][index].content =
                    preview;
                generateView(items[getItemIndex(currentPreviewID)]);
            });
        });
    </script>
@endpush
<div class="add_content_heading settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Heading') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="heading_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="headingContent" style="width: 40%">
                    {{ \App\Util::translate('Content') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Generation-Z" name="headingContent" id="headingContent" class="input" rows="6"
                            style="width: 100%"></textarea>
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
                <label for="headingTextShadow" style="width: 40%">
                    {{ \App\Util::translate('Text Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Text Shadow Offset X -->
                    <input type="number" name="headingTextShadowX" id="headingTextShadowX" placeholder="X offset"
                        class="input">

                    <!-- Text Shadow Offset Y -->
                    <input type="number" name="headingTextShadowY" id="headingTextShadowY" placeholder="Y offset"
                        class="input">

                    <!-- Text Shadow Blur Radius -->
                    <input type="number" name="headingTextShadowBlur" id="headingTextShadowBlur"
                        placeholder="Blur radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Text Shadow Color -->
                    <input type="text" name="headingTextShadowColor" id="headingTextShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="headingTextShadowColor" value="#000000" class="input color-twig"
                        relation="headingTextShadowColorCode">
                </div>
                <div class="generation-z" style="width: 100%; margin-top: 10px;">
                    <label><input type="radio" name="headingTextShadowUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="headingTextShadowUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="headingTextShadowUnit" value="%"
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
                <label for="HeadingColor" style="width: 40%">
                    {{ \App\Util::translate('Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="HeadingColor" id="HeadingColorCode" class="input color-twig"
                            relation="HeadingColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="HeadingColor" value="#ff0000" class="input color-twig"
                            relation="HeadingColorCode">
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="headingTextAlign" style="width: 40%">
                    {{ \App\Util::translate('Text Align') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="headingTextAlign" id="headingTextAlign" class="input" style="width: 100%">
                            <option value="left" selected>{{ \App\Util::translate('Left') }}</option>
                            <option value="center">{{ \App\Util::translate('Center') }}</option>
                            <option value="right">{{ \App\Util::translate('Right') }}</option>
                            <option value="justify">{{ \App\Util::translate('Justify') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="textTransform" style="width: 40%">
                    {{ \App\Util::translate('Text Transform') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="textTransform" id="textTransform" class="input" style="width: 100%">
                            <option value="none" selected>{{ \App\Util::translate('None') }}</option>
                            <option value="uppercase">{{ \App\Util::translate('Uppercase') }}</option>
                            <option value="lowercase">{{ \App\Util::translate('Lowercase') }}</option>
                            <option value="capitalize">{{ \App\Util::translate('Capitalize') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="parts">
                <label for="headingMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
                    <input type="number" name="headingMarginTop" id="headingMarginTop" placeholder="top"
                        class="input">
                    <input type="number" name="headingMarginBottom" id="headingMarginBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="headingMarginLeft" id="headingMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="headingMarginRight" id="headingMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="headingMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="headingMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="headingMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="headingPaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <input type="number" name="headingPaddingTop" id="headingPaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="headingPaddingBottom" id="headingPaddingBottom" placeholder="bottom"
                        class="input">
                    <input type="number" name="headingPaddingLeft" id="headingPaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="headingPaddingRight" id="headingPaddingRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="headingPaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="headingPaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="headingPaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="HeadingClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="HeadingClass" class="input"
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
    .add_content_heading .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

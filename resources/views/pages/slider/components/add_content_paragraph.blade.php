@push('b_scripts')
    <script>
        function generatePTag(details, component) {
            let lineHeightValue = '0';
            if (isFirstCallZ == 0) {
                lineHeightValue = 200;
                isFirstCallZ = 1;
            }

            // Default values
            const defaultText = "Generation Z";

            // Extract values from the details object
            const text = details.paragraphContent || defaultText;
            const additional_class = details.ParagraphClass || '';
            const fontFamily = details.fontFamily || 'Arial';
            const fontStyle = details.fontStyle || 'normal';
            const fontSize = details.fontSize || '15'; // Default size
            const fontSizeUnit = details.fontSizeUnit || 'px';
            const lineHeight = details.lineHeight || lineHeightValue;
            const lineHeightUnit = details.lineHeightUnit || 'px';
            const fontWeight = details.fontWeight || ''; // No default weight
            const fontWeightUnit = details.fontWeightUnit || '';
            const color = details.ParagraphColor || '#404040'; // Default color
            const textAlign = details.paragraphTextAlign || 'left';
            const textTransform = details.textTransform || 'none';

            // Text Shadow
            const textShadowX = details.paragraphTextShadowX || '0';
            const textShadowY = details.paragraphTextShadowY || '0';
            const textShadowBlur = details.paragraphTextShadowBlur || '0';
            const textShadowColor = details.paragraphTextShadowColor || '#000000'; // Default shadow color
            const textShadowUnit = details.paragraphTextShadowUnit || 'px';

            // Margins
            const marginTop = details.paragraphMarginTop || '0';
            const marginBottom = details.paragraphMarginBottom || '0';
            const marginLeft = details.paragraphMarginLeft || '0';
            const marginRight = details.paragraphMarginRight || '0';
            const marginUnit = details.paragraphMarginUnit || 'px';

            // Paddings
            const paddingTop = details.paragraphPaddingTop || '0';
            const paddingBottom = details.paragraphPaddingBottom || '0';
            const paddingLeft = details.paragraphPaddingLeft || '0';
            const paddingRight = details.paragraphPaddingRight || '0';
            const paddingUnit = details.paragraphPaddingUnit || 'px';

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
            const PElement =
                `<p class="${item_type}_paragraph ${additional_class}" data-connected="${item_type}" data-connected-id="${currentPreviewID}" data-component="${component}" style="${style}">${text}</p>`;

            return PElement;
        }



        function init_paragraph(component) {
            return generatePTag({}, component);
        }

        function setComponentValueparagraph(data) {
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
            $("#ParagraphClass").val(additionalClass);
            $("#paragraphContent").val(element.textContent || '');
            $('#fontFamily').val(fontFamily);
            $('#fontStyle').val(fontStyle);
            $('#fontSize').val(fontSize);
            $(`input[name="fontSizeUnit"][value="${fontSizeUnit}"]`).prop('checked', true);
            $('#ParagraphColor').val(color);
            $('#ParagraphColorCode').val(color);
            $('#paragraphTextAlign').val(textAlign);
            $('#textTransform').val(textTransform);
            $('#textlineHeight').val(lineHeight);
            $(`input[name="lineHeightUnit"][value="${lineHeightUnit}"]`).prop('checked', true);
            $('#fontWeight').val(fontWeight);
            $(`input[name="fontWeightUnit"][value="${fontWeightUnit}"]`).prop('checked', true);
            $('#paragraphMarginTop').val(marginTop);
            $('#paragraphMarginBottom').val(marginBottom);
            $('#paragraphMarginLeft').val(marginLeft);
            $('#paragraphMarginRight').val(marginRight);
            $(`input[name="paragraphMarginUnit"][value="${styles['margin-unit'] || 'px'}"]`).prop('checked', true);
            $('#paragraphPaddingTop').val(paddingTop);
            $('#paragraphPaddingBottom').val(paddingBottom);
            $('#paragraphPaddingLeft').val(paddingLeft);
            $('#paragraphPaddingRight').val(paddingRight);
            $(`input[name="paragraphPaddingUnit"][value="${styles['padding-unit'] || 'px'}"]`).prop('checked', true);

            // Set values for text-shadow inputs
            $('#paragraphTextShadowX').val(textShadowX);
            $('#paragraphTextShadowY').val(textShadowY);
            $('#paragraphTextShadowBlur').val(textShadowBlur);

            $('#paragraphTextShadowColor').val(textShadowColor);
            $('#paragraphTextShadowColorCode').val(textShadowColor);
            $(`input[name="paragraphTextShadowUnit"][value="${textShadowUnit}"]`).prop('checked', true);
        }


        $(document).ready(function() {
            $("#paragraph_content").find("input, select, textarea").on("keyup change", function() {
                let liveData = serializeFormToObject("#paragraph_content");
                let preview = generatePTag(liveData, $(".dataComponent").val());
                let index = itemsIndex($("#item_type").val(), $(".dataComponent").val());

                items[getItemIndex(currentPreviewID)]['components']['single'][index].content =
                    preview;
                generateView(items[getItemIndex(currentPreviewID)]);
            });
        });
    </script>
@endpush
<div class="add_content_paragraph settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('add_item', false)"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Paragraph') }}</h2>
        <button class="pannel_button" onclick="openMenu('default')" style="width: 10%; text-align: right"><i
                class="fa fa-close"></i></button>

    </div>
    <form id="paragraph_content" action="javascript:void(0)">
        <input type="hidden" class="dataComponent" value="">
        <div class="content-composer">
            <div class="parts flex" style="width: 100%">
                <label for="paragraphContent" style="width: 40%">
                    {{ \App\Util::translate('Content') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <textarea placeholder="Generation-Z" name="paragraphContent" id="paragraphContent" class="input" rows="6"
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
                <label for="paragraphTextShadow" style="width: 40%">
                    {{ \App\Util::translate('Text Shadow') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <!-- Text Shadow Offset X -->
                    <input type="number" name="paragraphTextShadowX" id="paragraphTextShadowX" placeholder="X offset"
                        class="input">

                    <!-- Text Shadow Offset Y -->
                    <input type="number" name="paragraphTextShadowY" id="paragraphTextShadowY" placeholder="Y offset"
                        class="input">

                    <!-- Text Shadow Blur Radius -->
                    <input type="number" name="paragraphTextShadowBlur" id="paragraphTextShadowBlur"
                        placeholder="Blur radius" class="input">
                </div>
                <div class="inputs flex" style="width: 100%; margin-top: 10px; flex-wrap: nowrap">
                    <!-- Text Shadow Color -->
                    <input type="text" name="paragraphTextShadowColor" id="paragraphTextShadowColorCode"
                        class="input color-twig" placeholder="Color Code">
                    <input type="color" id="paragraphTextShadowColor" value="#000000" class="input color-twig"
                        relation="paragraphTextShadowColorCode">
                </div>
                <div class="generation-z" style="width: 100%; margin-top: 10px;">
                    <label><input type="radio" name="paragraphTextShadowUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="paragraphTextShadowUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="paragraphTextShadowUnit" value="%"
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
                        <input type="number" name="lineHeight" id="textlineHeight" class="input
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
                <label for="ParagraphColor" style="width: 40%">
                    {{ \App\Util::translate('Color') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="ParagraphColor" id="ParagraphColorCode" class="input color-twig"
                            relation="ParagraphColor" style="width: 100%">
                    </div>
                    <div style="text-align: right; width: 100%">
                        <input type="color" id="ParagraphColor" value="#ff0000" class="input color-twig"
                            relation="ParagraphColorCode">
                    </div>
                </div>
            </div>
            <div class="parts flex" style="width: 100%">
                <label for="paragraphTextAlign" style="width: 40%">
                    {{ \App\Util::translate('Text Align') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <select name="paragraphTextAlign" id="paragraphTextAlign" class="input"
                            style="width: 100%">
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
                <label for="paragraphMarginTop">
                    <img src="{{ asset('public/img/dynamic/Margin.png') }}">{{ \App\Util::translate('Margin') }}
                </label>
                <div class="inputs flex" style="width: 100%;flex-wrap: nowrap">
                    <input type="number" name="paragraphMarginTop" id="paragraphMarginTop" placeholder="top"
                        class="input">
                    <input type="number" name="paragraphMarginBottom" id="paragraphMarginBottom"
                        placeholder="bottom" class="input">
                    <input type="number" name="paragraphMarginLeft" id="paragraphMarginLeft" placeholder="left"
                        class="input">
                    <input type="number" name="paragraphMarginRight" id="paragraphMarginRight" placeholder="right"
                        class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="paragraphMarginUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="paragraphMarginUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="paragraphMarginUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts">
                <label for="paragraphPaddingTop">
                    <img src="{{ asset('public/img/dynamic/padding.png') }}">{{ \App\Util::translate('Padding') }}
                </label>
                <div class="inputs flex" style="width: 100%; flex-wrap: nowrap">
                    <input type="number" name="paragraphPaddingTop" id="paragraphPaddingTop" placeholder="top"
                        class="input">
                    <input type="number" name="paragraphPaddingBottom" id="paragraphPaddingBottom"
                        placeholder="bottom" class="input">
                    <input type="number" name="paragraphPaddingLeft" id="paragraphPaddingLeft" placeholder="left"
                        class="input">
                    <input type="number" name="paragraphPaddingRight" id="paragraphPaddingRight"
                        placeholder="right" class="input">
                </div>
                <div class="generation-z" style="width: 100%">
                    <label><input type="radio" name="paragraphPaddingUnit"
                            value="px"><span>{{ \App\Util::translate('px') }}</span></label>
                    <label><input type="radio" name="paragraphPaddingUnit"
                            value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
                    <label><input type="radio" name="paragraphPaddingUnit" checked
                            value="%"><span>{{ \App\Util::translate('%') }}</span></label>
                </div>
            </div>

            <div class="parts flex" style="width: 100%">
                <label for="ParagraphClass" style="width: 40%">
                    {{ \App\Util::translate('Additional Class') }}
                </label>
                <div class="inputs flex">
                    <div style="width: 100%">
                        <input type="text" name="additional_class" id="ParagraphClass" class="input"
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
    .add_content_paragraph .content-composer .inputs {
        flex-wrap: wrap;
        gap: 5px
    }
</style>

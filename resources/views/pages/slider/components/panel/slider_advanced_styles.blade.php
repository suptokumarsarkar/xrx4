<div class="content-composer flex space" style="cursor: pointer" onclick="opener('advanced_opener')">
    <h2 style="font-size: 14px; font-weight: 500;">{{ \App\Util::translate('Styles') }}</h2> <i
        class="fa fa-chevron-down"></i>
</div>
<div class="advanced_opener content-composer" style="display: none;">
    <div class="parts">
        <label for="itemMarginTop">
            {{ \App\Util::translate('Margin') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="number" name="itemMarginTop" id="itemMarginTop" placeholder="top" class="input">
            <input type="number" name="itemMarginBottom" id="itemMarginBottom" placeholder="bottom" class="input">
            <input type="number" name="itemMarginLeft" id="itemMarginLeft" placeholder="left" class="input">
            <input type="number" name="itemMarginRight" id="itemMarginRight" placeholder="right" class="input">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemMarginUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemMarginUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemMarginUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <div class="parts">
        <label for="itemPaddingTop">
            {{ \App\Util::translate('Padding') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="number" name="itemPaddingTop" id="itemPaddingTop" placeholder="top" class="input">
            <input type="number" name="itemPaddingBottom" id="itemPaddingBottom" placeholder="bottom" class="input">
            <input type="number" name="itemPaddingLeft" id="itemPaddingLeft" placeholder="left" class="input">
            <input type="number" name="itemPaddingRight" id="itemPaddingRight" placeholder="right" class="input">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemPaddingUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemPaddingUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemPaddingUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <div class="parts">
        <label for="itemWidth" style="width: 100%">
            {{ \App\Util::translate('Width') }}
        </label>
        <div class="inputs" style="width: 100%">
            <input type="number" name="itemWidth" id="itemWidth" class="input" placeholder="100">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemWidthUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemWidthUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemWidthUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <div class="parts">
        <label for="itemHeight" style="width: 100%">
            {{ \App\Util::translate('Height') }}
        </label>
        <div class="inputs" style="width: 100%">
            <input type="number" name="itemHeight" id="itemHeight" class="input" placeholder="100">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemHeightUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemHeightUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemHeightUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>
    <!-- Background Options -->
    <div class="parts">
        <label for="itemBackgroundOptions">
            {{ \App\Util::translate('Background') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <select name="itemBackgroundOptions" id="itemBackgroundOptions" class="input"
                onchange="resetAl55(this.value)">
                <option value="image">{{ \App\Util::translate('Image') }}</option>
                <option value="linear-gradient">{{ \App\Util::translate('Linear Gradient') }}</option>
                <option value="radial-gradient">{{ \App\Util::translate('Radial Gradient') }}</option>
            </select>
        </div>
    </div>

    @push('b_scripts')
        <script>
            function resetAl55(type) {
                if (type == 'linear-gradient') {
                    $("#vsbackgroundImage").hide(0);
                    $("#vsbackgroundLinearGradient").show(0);
                    $("#vsbackgroundRadialGradient").hide(0);
                } else if (type == 'radial-gradient') {
                    $(".vsbackgroundImage").hide(0);
                    $("#vsbackgroundLinearGradient").hide(0);
                    $("#vsbackgroundRadialGradient").show(0);
                } else {
                    $(".vsbackgroundImage").show(0);
                    $("#vsbackgroundLinearGradient").hide(0);
                    $("#vsbackgroundRadialGradient").hide(0);
                }
            }
        </script>
    @endpush
    <!-- Background Image URL -->
    <div class="parts" class="vsbackgroundImage">
        <label for="ItemBackgroundImageFile">
            {{ \App\Util::translate('Background Image') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="file" name="ItemBackgroundImageFile" id="ItemBackgroundImageFile" class="input ds-flie"
                connection="ItemBackgroundImageURL">
            <input type="url" name="ItemBackgroundImageURL" id="ItemBackgroundImageURL" class="input ds-file"
                connection="ItemBackgroundImageFile" placeholder="{{ \App\Util::translate('Enter image URL') }}">
        </div>
    </div>

    <!-- Background Color -->
    <div class="parts"class="vsbackgroundImage">
        <label for="backgroundColor">
            {{ \App\Util::translate('Background Color') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <div style="width: 100%">
                <input type="text" name="backgroundColor" id="backgroundColorCode" placeholder="red"
                    class="input color-twig" value="white" relation="backgroundColor" style="width: 100%">
            </div>
            <div style="text-align: right; width: 100%">
                <input type="color" id="backgroundColor" name="backgroundColorCode" value="#ffffff"
                    class="input color-twig" relation="backgroundColorCode">
            </div>
        </div>
    </div>


    <!-- Background Linear Gradient -->
    <div class="parts" id="vsbackgroundLinearGradient" style="display: none;">
        <label for="itemBackgroundLinearGradientDegree">
            {{ \App\Util::translate('Background Linear Gradient') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="text" name="itemBackgroundLinearGradientDegree" id="itemBackgroundLinearGradientDegree"
                class="input" placeholder="45deg">

            <input type="text" name="itemBackgroundLinearGradientColors" id="itemBackgroundLinearGradientColors"
                class="input" placeholder="#ff0000, #000000">
        </div>
    </div>

    <!-- Background Radial Gradient -->
    <div class="parts" id="vsbackgroundRadialGradient" style="display: none;">
        <label for="itemBackgroundRadialGradientType">
            {{ \App\Util::translate('Background Radial Gradient') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <div class="inputs flex" style="width: 100%">
                <input type="text" name="itemBackgroundRadialGradientType" id="itemBackgroundRadialGradientType"
                    class="input" placeholder="circle">

                <input type="text" name="itemBackgroundRadialGradientColors"
                    id="itemBackgroundRadialGradientColors" class="input" placeholder="#ff0000, #000000">
            </div>
        </div>
    </div>

    <!-- Background Size -->
    <div class="parts">
        <label for="itemBackgroundSize">
            {{ \App\Util::translate('Background Size') }}
        </label>
        <div class="inputs" style="width: 100%">
            <input type="text" name="itemBackgroundSize" id="itemBackgroundSize" class="input"
                placeholder="cover">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemBackgroundSizeUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemBackgroundSizeUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemBackgroundSizeUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <div class="parts">
        <label for="itemBackgroundPositionTop">
            {{ \App\Util::translate('Background Position') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <input type="number" name="itemBackgroundPositionTop" id="itemBackgroundPositionTop" placeholder="top"
                class="input">
            <input type="number" name="itemBackgroundPositionLeft" id="itemBackgroundPositionLeft"
                placeholder="left" class="input">
        </div>
        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemBackgroundPositionUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemBackgroundPositionUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemBackgroundPositionUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <!-- Background Repeat -->
    <div class="parts">
        <label for="ItemBackgroundRepeat">
            {{ \App\Util::translate('Background Repeat') }}
        </label>
        <div class="inputs flex" style="width: 100%">
            <select name="ItemBackgroundRepeat" id="ItemBackgroundRepeat" class="input">
                <option value="repeat">{{ \App\Util::translate('Repeat') }}</option>
                <option value="no-repeat">{{ \App\Util::translate('No Repeat') }}</option>
                <option value="repeat-x">{{ \App\Util::translate('Repeat X') }}</option>
                <option value="repeat-y">{{ \App\Util::translate('Repeat Y') }}</option>
            </select>
        </div>
    </div>



    <!-- Backdrop Filter -->
    <div class="parts">
        <label for="ItemBackdropFilter">
            {{ \App\Util::translate('Backdrop Filter') }}
        </label>
        <div class="inputs flex" style="width: 100%;">
            <select name="ItemBackdropFilter" id="ItemBackdropFilter" class="input">
                <option value="">{{ \App\Util::translate('Default') }}</option>
                <option value="blur">{{ \App\Util::translate('Blur') }}</option>
                <option value="brightness">{{ \App\Util::translate('Brightness') }}</option>
                <option value="contrast">{{ \App\Util::translate('Contrast') }}</option>
                <option value="grayscale">{{ \App\Util::translate('Grayscale') }}</option>
                <option value="hue-rotate">{{ \App\Util::translate('Hue Rotate') }}</option>
                <option value="invert">{{ \App\Util::translate('Invert') }}</option>
                <option value="opacity">{{ \App\Util::translate('Opacity') }}</option>
                <option value="saturate">{{ \App\Util::translate('Saturate') }}</option>
                <option value="sepia">{{ \App\Util::translate('Sepia') }}</option>
            </select>
            <input type="text" name="ItemBackdropFilterValue" id="ItemBackdropFilterValue" class="input"
                placeholder="value">
        </div>
    </div>

    <div class="parts" style="width: 100%">
        <label for="itemBorderRadius" style="width: 100%">
            {{ \App\Util::translate('Border Radius') }}
        </label>
        <div class="inputs" style="width: 100%">
            <input type="text" name="itemBorderRadius" id="itemBorderRadius" placeholder="5" class="input">
        </div>

        <div class="generation-z" style="width: 100%">
            <label><input type="radio" name="itemBorderRadiusUnit"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="itemBorderRadiusUnit"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>
            <label><input type="radio" name="itemBorderRadiusUnit" checked
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>
    </div>

    <div class="parts" style="width: 100%">
        <label for="itemAdditionalClass" style="width: 100%">
            {{ \App\Util::translate('Additional Class') }}
        </label>
        <div class="inputs" style="width: 100%">
            <input type="text" name="itemAdditionalClass" id="itemAdditionalClass" class="input">
        </div>
    </div>
    <div class="width100" style="text-align: right; margin: 10px 0">
        <button class="pannel_button highlight" onclick="openMenu('items_or_images')" style="width: auto">
            <i class="fa fa-save" style="margin-right: 5px"></i>{{ \App\Util::translate('Save') }}
        </button>
    </div>
</div>

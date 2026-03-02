<div class="theme_settings settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('default')"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Theme Settings') }}</h2>
    </div>
    <div class="content-composer">
        <label for="sliderWidth">
            {{ \App\Util::translate('Slider Width') }}
        </label>
        <div class="inputs">
            <input type="number" placeholder="100" id="sliderWidth" class="input">
        </div>

        <div class="generation-z">
            <label for="px-x"><input type="radio" name="sliderWidthSize" value="px"
                    id="px-x"><span>{{ \App\Util::translate('px') }}</span></label>
            <label for="per-x"><input type="radio" name="sliderWidthSize" value="%"
                    id="per-x"><span>{{ \App\Util::translate('%') }}</span></label>
            <label for="vw-x"><input type="radio" name="sliderWidthSize" value="vw"
                    id="vw-x"><span>{{ \App\Util::translate('vw') }}</span></label>
        </div>
    </div>
    <div class="content-composer">
        <label for="sliderMaxWidth">
            {{ \App\Util::translate('Slider Max Width') }}
        </label>
        <div class="inputs">
            <input type="number" id="sliderMaxWidth" placeholder="100" class="input">
        </div>
        <div class="generation-z">
            <label for="px-wx"><input type="radio" name="sliderMaxWidthSize" value="px"
                    id="px-wx"><span>{{ \App\Util::translate('px') }}</span></label>
            <label for="per-wx"><input type="radio" name="sliderMaxWidthSize" value="%"
                    id="per-wx"><span>{{ \App\Util::translate('%') }}</span></label>
            <label for="vw-wx"><input type="radio" name="sliderMaxWidthSize" value="vw"
                    id="vw-wx"><span>{{ \App\Util::translate('vw') }}</span></label>
        </div>
    </div>


    <div class="content-composer">
        <label for="sliderHeight">
            {{ \App\Util::translate('Slider Height') }}
        </label>
        <div class="inputs">
            <input type="number" placeholder="100" id="sliderHeight" class="input">
        </div>
        <div class="generation-z">
            <label for="px-hx"><input type="radio" name="sliderHeightSize" value="px"
                    id="px-hx"><span>{{ \App\Util::translate('px') }}</span></label>
            <label for="per-hx"><input type="radio" name="sliderHeightSize" value="%"
                    id="per-hx"><span>{{ \App\Util::translate('%') }}</span></label>
            <label for="vw-hx"><input type="radio" name="sliderHeightSize" value="vh"
                    id="vw-hx"><span>{{ \App\Util::translate('vh') }}</span></label>
        </div>
    </div>

    <div class="content-composer">
        <label for="sliderMaxHeight">
            {{ \App\Util::translate('Slider Max Height') }}
        </label>
        <div class="inputs">
            <input type="number" placeholder="100" id="sliderMaxHeight" class="input">
        </div>
        <div class="generation-z">
            <label><input type="radio" name="sliderMaxHeightSize"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="sliderMaxHeightSize"
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
            <label><input type="radio" name="sliderMaxHeightSize"
                    value="vh"><span>{{ \App\Util::translate('vh') }}</span></label>
        </div>
    </div>

    <div class="content-composer">
        <label for="headerColor">
            {{ \App\Util::translate('Header Color') }}
        </label>
        <div class="inputs">
            <input type="text" id="headerColorCode" placeholder="#ff0000, red"
                class="input color-twig" relation="headerColor">
        </div>
        <div class="generation-z">
            <input type="color" id="headerColor" value="#ff0000" class="input color-twig"
                relation="headerColorCode">
        </div>
    </div>

    <div class="content-composer">
        <label for="textColor">
            {{ \App\Util::translate('Text Color') }}
        </label>
        <div class="inputs">
            <input type="text" id="textColorCode" placeholder="#ff0000, red" class="input color-twig"
                relation="textColor">
        </div>
        <div class="generation-z">
            <input type="color" id="textColor" value="#ff0000" class="input color-twig"
                relation="textColorCode">
        </div>
    </div>
    <div class="content-composer">
        <label for="sliderBorderRadius">
            {{ \App\Util::translate('Border Radius') }}
        </label>
        <div class="inputs">
            <input type="number" placeholder="5" id="sliderBorderRadius" class="input">
        </div>

        <div class="generation-z">
            <label><input type="radio" name="sliderBorderRadiusSize"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="sliderBorderRadiusSize"
                    value="%"><span>{{ \App\Util::translate('%') }}</span></label>
        </div>

    </div>

    <div class="content-composer">
        <label for="sliderBoxShadow">
            {{ \App\Util::translate('Box Shadow') }}
        </label>
        <div class="inputs flex">
            <input type="number" placeholder="2" id="sliderBoxShadow" class="input">
        </div>

        <div class="generation-z">
            <div class="inputs">
                <input type="color" placeholder="#eeeeee" id="sliderBoxShadowColor" class="input">
            </div>
            <label><input type="radio" name="sliderBoxShadowSize"
                    value="px"><span>{{ \App\Util::translate('px') }}</span></label>
            <label><input type="radio" name="sliderBoxShadowSize"
                    value="pc"><span>{{ \App\Util::translate('pc') }}</span></label>

        </div>

    </div>
</div>

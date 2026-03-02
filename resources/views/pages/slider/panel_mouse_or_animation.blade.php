<div class="mouse_or_animation settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('default')"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Mouse Or Animation') }}</h2>
    </div>
    <form action="javascript:void(0)" onSubmit="updateVgs()">
        <div class="content-composer">
            <label for="mouseDragEnabled">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Enable Mouse Drag') }}
            </label>
            <div class="inputs width100">
                <select id="mouseDragEnabled" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="mouseDragCursor">
                <img src="{{ asset('public/img/dynamic/Slider_Width .png') }}">
                {{ \App\Util::translate('Mouse Drag Cursor Style') }}
            </label>
            <div class="inputs width100">
                <select id="mouseDragCursor" class="input">
                    <option value="grabbing">{{ \App\Util::translate('Grabbing') }}</option>
                    <option value="default">{{ \App\Util::translate('Default') }}</option>
                    <option value="pointer">{{ \App\Util::translate('Pointer') }}</option>
                    <option value="move">{{ \App\Util::translate('Move') }}</option>
                    <option value="text">{{ \App\Util::translate('Text') }}</option>
                    <option value="wait">{{ \App\Util::translate('Wait') }}</option>
                    <option value="crosshair">{{ \App\Util::translate('Crosshair') }}</option>
                    <option value="not-allowed">{{ \App\Util::translate('Not Allowed') }}</option>
                    <option value="help">{{ \App\Util::translate('Help') }}</option>
                    <option value="zoom-in">{{ \App\Util::translate('Zoom In') }}</option>
                    <option value="zoom-out">{{ \App\Util::translate('Zoom Out') }}</option>
                    <option value="grab">{{ \App\Util::translate('Grab') }}</option>
                    <option value="alias">{{ \App\Util::translate('Alias') }}</option>
                    <option value="copy">{{ \App\Util::translate('Copy') }}</option>
                    <option value="no-drop">{{ \App\Util::translate('No Drop') }}</option>
                    <option value="all-scroll">{{ \App\Util::translate('All Scroll') }}</option>
                    <option value="cell">{{ \App\Util::translate('Cell') }}</option>
                    <option value="context-menu">{{ \App\Util::translate('Context Menu') }}</option>
                    <option value="col-resize">{{ \App\Util::translate('Column Resize') }}</option>
                    <option value="row-resize">{{ \App\Util::translate('Row Resize') }}</option>
                    <option value="vertical-text">{{ \App\Util::translate('Vertical Text') }}</option>
                    <option value="ew-resize">{{ \App\Util::translate('East-West Resize') }}</option>
                    <option value="ns-resize">{{ \App\Util::translate('North-South Resize') }}</option>
                    <option value="nesw-resize">{{ \App\Util::translate('North-East South-West Resize') }}</option>
                    <option value="nwse-resize">{{ \App\Util::translate('North-West South-East Resize') }}</option>
                </select>
            </div>
        </div>

        <div class="content-composer">
            <label for="stopSlideOnHover">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Stop Slide On Hover') }}
            </label>
            <div class="inputs width100">
                <select id="stopSlideOnHover" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="autoSlide">
                {{ \App\Util::translate('Auto Slide') }}
            </label>
            <div class="inputs width100">
                <select id="autoSlide" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>

        <div class="content-composer">
            <label for="sliderLoop">
                {{ \App\Util::translate('Slider Loop') }}
            </label>
            <div class="inputs width100">
                <select id="sliderLoop" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>

        <div class="content-composer">
            <label for="autoSlideTime">
                {{ \App\Util::translate('Auto Slide Time') }}
            </label>
            <div class="inputs width100">
                <select id="autoSlideTime" class="input">
                    <!-- Start from 1 second to 5 minutes -->
                    <option value="1000">1s</option>
                    <option value="2000">2s</option>
                    <option value="3000">3s</option>
                    <option value="4000">4s</option>
                    <option value="5000" selected>5s</option>
                    <!-- Additional options for longer durations -->
                    <option value="10000">10s</option>
                    <option value="15000">15s</option>
                    <option value="30000">30s</option>
                    <option value="60000">1min</option>
                    <option value="120000">2min</option>
                    <option value="180000">3min</option>
                    <option value="240000">4min</option>
                    <option value="300000">5min</option>
                </select>
            </div>
        </div>

        <div class="content-composer">
            <label for="animationTime">
                {{ \App\Util::translate('Animation Time') }}
            </label>
            <div class="inputs width100">
                <select id="animationTime" class="input">
                    <!-- Start from 50 milliseconds to 10 seconds -->
                    <option value="50">50ms</option>
                    <option value="100">100ms</option>
                    <option value="200">200ms</option>
                    <option value="300">300ms</option>
                    <option value="500" selected>500ms</option>
                    <option value="1000">1s</option>
                    <option value="2000">2s</option>
                    <option value="3000">3s</option>
                    <option value="5000">5s</option>
                    <option value="10000">10s</option>
                </select>
            </div>
        </div>

        <div class="content-composer">
            <label for="animationType">
                {{ \App\Util::translate('Animation Type') }}
            </label>
            <div class="inputs width100">
                <select id="animationType" class="input">
                    <option value="slide">{{ \App\Util::translate('Slide') }}</option>
                    <option value="fade">{{ \App\Util::translate('Fade') }}</option>
                    <option value="zoom">{{ \App\Util::translate('Zoom') }}</option>
                    <option value="flip">{{ \App\Util::translate('Flip') }}</option>
                    <option value="bounce">{{ \App\Util::translate('Bounce') }}</option>
                    <option value="rotate">{{ \App\Util::translate('Rotate') }}</option>
                    <option value="scale">{{ \App\Util::translate('Scale') }}</option>
                    <option value="blur">{{ \App\Util::translate('Blur') }}</option>
                    <option value="slide-up">{{ \App\Util::translate('Slide Up') }}</option>
                    <option value="slide-down">{{ \App\Util::translate('Slide Down') }}</option>
                </select>
            </div>
        </div>

    </form>
</div>

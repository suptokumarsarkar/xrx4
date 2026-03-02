<div class="prev_next_buttons settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('default')"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Prev Next Buttons') }}</h2>
    </div>
    <form action="javascript:void(0)" onSubmit="updateVgs()">
        <div class="content-composer">
            <label for="prevNextEnabled">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Enable Prev Next') }}
            </label>
            <div class="inputs width100">
                <select id="prevNextEnabled" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="prevNextStyle">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Prev Next Style') }}
            </label>
            <div class="inputs width100">
                <select id="prevNextStyle" class="input">
                    <option value="text">{{ \App\Util::translate('Text') }}</option>
                    <option value="icon">{{ \App\Util::translate('Icon') }}</option>
                    <option value="icon_w_b">{{ \App\Util::translate('Icon Without Background') }}</option>
                    <option value="text_w_b">{{ \App\Util::translate('Text Without Background') }}</option>
                    <option value="text_f_s_h">{{ \App\Util::translate('Text Full Screen Hover') }}</option>
                    <option value="icon_f_s_h">{{ \App\Util::translate('Icon Full Screen Hover') }}</option>
                    <option value="icon_text">{{ \App\Util::translate('Icon & Text') }}</option>
                    <option value="icon_text_h">{{ \App\Util::translate('Icon & Text Hover') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="Sl_Prev_Next_LeftText">
                {{ \App\Util::translate('Previous Button Text') }}
            </label>
            <div class="inputs width100">
                <input type="text" id="Sl_Prev_Next_LeftText" class="input" value="Previous">
            </div>
        </div>

        <div class="content-composer">
            <label for="Sl_Prev_Next_RightText">
                {{ \App\Util::translate('Next Button Text') }}
            </label>
            <div class="inputs width100">
                <input type="text" id="Sl_Prev_Next_RightText" class="input" value="Next">
            </div>
        </div>

        <div class="content-composer">
            <label for="Sl_Prev_Next_LeftIcon">
                {{ \App\Util::translate('Previous Button Icon') }}
            </label>
            <div class="inputs width100">
        <textarea id="Sl_Prev_Next_LeftIcon" class="input" rows="3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </textarea>
            </div>
        </div>

        <div class="content-composer">
            <label for="Sl_Prev_Next_RightIcon">
                {{ \App\Util::translate('Next Button Icon') }}
            </label>
            <div class="inputs width100">
        <textarea id="Sl_Prev_Next_RightIcon" class="input" rows="3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </textarea>
            </div>
        </div>

        <div class="composer tips">
            <h2>{{ \App\Util::translate('Tips') }}</h2>
            <p>{{ \App\Util::translate('You can edit the styles directly from the code. Select Your Theme and Continue;') }}</p>
        </div>
    </form>
</div>
@push('b_scripts')
    <script></script>
@endpush

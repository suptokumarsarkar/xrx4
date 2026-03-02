<div class="pagination settings" style="display: none">
    <div class="panel_head flex space">
        <button id="back" onclick="openMenu('default')"><i class="fa fa-chevron-left"></i></button>
        <h2 class="panel_title">{{ \App\Util::translate('Pagination') }}</h2>
    </div>
    <form action="javascript:void(0)" onSubmit="updateVgs()">
        <div class="content-composer">
            <label for="paginationEnabled">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Enable Pagination') }}
            </label>
            <div class="inputs">
                <select id="paginationEnabled" class="input">
                    <option value="true">{{ \App\Util::translate('Yes') }}</option>
                    <option value="false">{{ \App\Util::translate('No') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="paginationStyle">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Prev Next Style') }}
            </label>
            <div class="inputs">
                <select id="paginationStyle" class="input">
                    <option value="number">{{ \App\Util::translate('Number') }}</option>
                    <option value="dots">{{ \App\Util::translate('Dots') }}</option>
                    <option value="squire_dots">{{ \App\Util::translate('Squire Dots') }}</option>
                    <option value="titles">{{ \App\Util::translate('Titles') }}</option>
                    <option value="titles_flex">{{ \App\Util::translate('Titles Flex') }}</option>
                </select>
            </div>
        </div>
        <div class="content-composer">
            <label for="paginationOutlet">
                <img
                    src="{{ asset('public/img/dynamic/Slider_Width .png') }}">{{ \App\Util::translate('Pagination Outlet') }}
            </label>
            <div class="inputs">
                <select id="paginationOutlet" class="input">
                    <option value="outset">{{ \App\Util::translate('Outset') }}</option>
                    <option value="inset">{{ \App\Util::translate('Inset') }}</option>
                </select>
            </div>
        </div>
    </form>
</div>
@push('b_scripts')
    <script></script>
@endpush

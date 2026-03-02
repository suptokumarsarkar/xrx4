<div class="default settings">
    <div class="panel_head flex">
        <h2 class="panel_title">{{ \App\Util::translate('Dynamic Slider') }}</h2>
    </div>
    <button><img
            src="{{ asset('public/img/dynamic/Quick_Templates.png') }}" onclick="openThemeSelection()">{{ \App\Util::translate('Quick Templates') }}</button>
    <button onclick="openMenu('theme_settings')"><img
            src="{{ asset('public/img/dynamic/Tsetting.png') }}">{{ \App\Util::translate('Theme Settings') }}</button>

    <button onclick="openMenu('items_or_images')"><img
            src="{{ asset('public/img/dynamic/items_image.png') }}">{{ \App\Util::translate('Items or Images') }}</button>
    <button onclick="openMenu('prev_next_buttons')"><img
            src="{{ asset('public/img/dynamic/prenext_button.png') }}">{{ \App\Util::translate('Prev Next Buttons') }}</button>
    <button onclick="openMenu('pagination')"><img
            src="{{ asset('public/img/dynamic/pagination_button.png') }}">{{ \App\Util::translate('Pagination') }}</button>
    <button onclick="openMenu('mouse_or_animation')"><img
            src="{{ asset('public/img/dynamic/mouse_drag.png') }}">{{ \App\Util::translate('Mouse or Animations') }}</button>
    <button onclick="openDocumentations()"><img
            src="{{ asset('public/img/dynamic/responsive.png') }}">{{ \App\Util::translate('Documentation') }}</button>
</div>

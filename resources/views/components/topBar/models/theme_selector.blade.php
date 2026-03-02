<div class="active_lang theme">
    @if (session('theme') == 'dark')
    <div class="dropdown dark-view" style="display: none"><button class="no-style"><i class="theme fa fa-moon-o"></i> {{ \App\Util::translate("Dark") }}</button></div>
    <div class="dropdown light-view"><button class="no-style"><i class="theme fa fa-adjust"></i> {{ \App\Util::translate("Light") }}</button></div>
    @else
    <div class="dropdown dark-view"><button class="no-style"><i class="theme fa fa-moon-o"></i> {{ \App\Util::translate("Dark") }}</button></div>
    <div class="dropdown light-view" style="display: none"><button class="no-style"><i class="theme fa fa-adjust"></i> {{ \App\Util::translate("Light") }}</button></div>
    @endif
</div>
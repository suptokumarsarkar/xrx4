<div class="active_lang">
    @if (session('lang'))
    <div class="dropdown" attachment="languages_dropdown"><button class="no-style default-lang"><i class="lang">{{ \App\Util::getFlagIcon(session("lang")) }}</i> {{ \App\Util::getLangName(session("lang")) }}</button></div>
    @else
    <div class="dropdown" attachment="languages_dropdown"><button class="no-style default-lang"><i class="lang">{{ \App\Util::getFlagIcon("en") }}</i> English</button></div>
    @endif
    <div class="languages_dropdown dropdown_shadow">
        <button data="en"><i class="lang">{{ \App\Util::getFlagIcon("en") }}</i> English</button>
        <button data="bn"><i class="lang">{{ \App\Util::getFlagIcon("bn") }}</i> Bangla</button>
        <button data="nl"><i class="lang">{{ \App\Util::getFlagIcon("nl") }}</i> Dutch</button>
        <button data="el"><i class="lang">{{ \App\Util::getFlagIcon("el") }}</i> Greek</button>
        <button data="fr"><i class="lang">{{ \App\Util::getFlagIcon("fr") }}</i> France</button>
        <button data="hi"><i class="lang">{{ \App\Util::getFlagIcon("hi") }}</i> Hindi</button>
    </div>
</div>
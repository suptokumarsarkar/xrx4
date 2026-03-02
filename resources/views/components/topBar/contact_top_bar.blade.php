<div class="top_bar_1">
    <div class="container_2">
        <div class="flex space align-center">
            <div class="quick_connect flex">
                <a class="flex align-center" href=""><i class="fa fa-phone-square"></i> <p> +88 01941556671 <br> <span class="tip">{{ \App\Util::translate("WhatsApp") }}</span> </p></a>
                <a class="flex align-center" href="mailto:personal.supto@gmail.com"><i class="fa fa-envelope"></i> <p>personal.supto@gmail.com <br> <span class="tip">{{ \App\Util::translate("Email") }}</span></p></a>
            </div>
            <div class="short_links">
                <nav class="link ">
                    <a href="" class="hid">{{ \App\Util::translate("privacy_policy") }}</a>
                    <a href="">{{ \App\Util::translate("offers") }}</a>
                    <a href="">{{ \App\Util::translate("login/register") }}</a>
                    <a href="" class="active">{{ \App\Util::translate("support") }}</a>
                </nav>
            </div>
            <div class="languages flex align-center">
                @include('components.topBar.models.theme_selector')
                @include('components.topBar.models.language_selector')
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset("resources/css/addons/top_bar/top_bar_1/style.css?") }}{{ \App\Util::getVersion() }}">
@endpush

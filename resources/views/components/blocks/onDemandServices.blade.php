<div class="on_demand">
    <div class="container flex space">
        <div class="demand_texts">
            <div class="sticky">
            <div class="ms">
                <h2>{{ \App\Util::translate('On-Demand Services') }}</h2>
                <p>{{ \App\Util::translate('22-on-demand-texts') }}</p>
                <a href="{{ route('services') }}"
                    class="btn btn-primary">{{ \App\Util::translate('Explore Our Services') }}</a>
            </div>
            <div class=" mw">
                <div class="narote pos a1">{{ \App\Util::translate('Firebase Push Notifications Suddently Stopped Working.') }}</div>
                <div class="narote pos a2">{{ \App\Util::translate('Google Streetview is crashing the app while no data found.') }}</div>
                <div class="narote pos a3">{{ \App\Util::translate('My Store need to be updated to detect customer needs.') }}</div>
                <div class="narote pos a3">{{ \App\Util::translate('My Promotion management software is poor, need core updates.') }}</div>
                <div class="image">
                    <img src="{{ asset("public/img/e-techshop.png?s") }}" alt="Athanasios Zervoudakis Photo">
                    <h2>- Athanasios Zervoudakis Photo</h2>
                    <p>- GPScom, e-Techshop, Cs-Cart</p>
                </div>
            </div>
            </div>
        </div>
        <div class="demand_items">
            <div class="items flex">
                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/marketplace_order.png') }}" alt="">
                    <h3>{{ \App\Util::translate('I want to rebuild my old marketplace') }}</h3>
                    <p>{{ \App\Util::translate('Update language version, latest theme and functions with customized backend') }}
                    </p>
                </a>
                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/ai_service.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Advanced Updates Needed, I have no idea.') }}</h3>
                    <p>{{ \App\Util::translate('Our expert team are here to discuss the matter and come to a solution with 22software\'s advanced extenstions') }}
                    </p>
                </a>
                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/error.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Having Load issues, Bad User Experiences') }}</h3>
                    <p>{{ \App\Util::translate('We have solved 2k+ cache and server issues, pretty and fast loading codes') }}
                    </p>
                </a>
                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/brands/applaunch.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Quick App Launch, Need Personalized Updates') }}</h3>
                    <p>{{ \App\Util::translate('No worries, we are here to guide you until you are 100% live and freely working') }}
                    </p>
                </a>

                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/saas.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Want to Apply Saas theme to my website') }}</h3>
                    <p>{{ \App\Util::translate('We are providing worlds largest dynamic no-code website functionality.') }}
                    </p>
                </a>

                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/a_service.png') }}" alt="">
                    <h3>{{ \App\Util::translate('I need personal secure app, non ecommerce') }}</h3>
                    <p>{{ \App\Util::translate('With various functionality we are providing fastest personalized app on custom theme.') }}
                    </p>
                </a>

                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/seo.png') }}" alt="">
                    <h3>{{ \App\Util::translate('I want to start my SEO project and marketting') }}</h3>
                    <p>{{ \App\Util::translate('Just drop a message and start now. You are close to fire up the world.') }}
                    </p>
                </a>

                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/commerce1.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Want a big Market From Scratch') }}</h3>
                    <p>{{ \App\Util::translate('What about figma? Let\'s get a design today? Our developers will share details on technologies.') }}
                    </p>
                </a>

                <a class="d-i" href="#">
                    <img src="{{ asset('public/img/automation.png') }}" alt="">
                    <h3>{{ \App\Util::translate('Need my website to dynamically detect customer choices and store') }}
                    </h3>
                    <p>{{ \App\Util::translate('That\'s why we are waiting for, our customaized AI will handle it for you. Try now.') }}
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>

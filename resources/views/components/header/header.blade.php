@push('styles')
    <style>
        .line:before {
            background: url("{{ asset('public/img/check.png') }}") 0 0 / 100% 100%;
        }
    </style>
@endpush
<div class="header_1 sticky">
    <div class="container_2">
        <div class="flex align-center">
            <div class="logo-content flex align-center">
                <button class="ico_bar">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="logo flex align-center" href="{{url("/")}}">
                    <img src="{{ asset('public/img/22-logo.png') }}" alt="22Softwares Logo">
                    <h2>Softwares</h2>
                </a>
            </div>
            <div class="main_nav">
                <nav id="main_nav" class="flex space">
                    <ul class="mid">
                        @includeIf('components.common.back', ['class' => 'mid', 'title' => \App\Util::translate("Menu")])
                        <li class="dmc"><a href="{{ route('services') }}" title="Services"
                                class="drop-out">{{ \App\Util::translate('Services') }} <i
                                    class="fa fa-chevron-down"></i></a>
                            <div class="dropdown-v">
                                <div class="dropdown-layer"></div>
                                <div class="dropdown-content">
                                    @includeIf('components.common.back', ['class' => 'dropdown-v', 'title' => 'Services'])

                                    <div class="container animate-top">
                                        <div class="flex">
                                            <div id="services_menu">
                                                <h2 class="bar">{{ \App\Util::translate('Popular Services') }}:</h2>
                                                <ul>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Slider.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Dynamic Slider') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Email.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Email Templates') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Open-cart.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Open-cart') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Cs-Cart.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Cs-Cart') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/e_commarce.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('eCommarce') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/marketplace.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Full Market Place') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img class="invert" src="{{ asset('public/img/ai_market.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('AI Active Market Place') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/ai_service.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('AI Services') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/adon_extransion.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Addons / Extensions') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/devops.svg') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Cloud & DevOps') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/blockchain.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Block Chain Or Cripto') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/apk.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Android / IOS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/Shipping-Gateway.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Shipping Gateway') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/Payment-Gateway.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Payment Gateway') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/2Way-Connectors.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('2 Way Connectors') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/API Development.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('API Development') }}</span>
                                                        </a></li>

                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/seo.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('SEO') }}</span>
                                                        </a></li>

                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/figma.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Figma Design') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/custom.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Custom') }}</span>
                                                        </a></li>
                                                </ul>
                                                <div class="better_idea">
                                                    <div class="flex space align-center">
                                                        <div class="texts">
                                                            <h3>{{ \App\Util::translate('Have Better Thoughts?') }}
                                                            </h3>
                                                            <p>{{ \App\Util::translate('thought_full_fill') }}</p>
                                                        </div>
                                                        <div class="buttons">
                                                            <a href=""
                                                                class="start_a_project">{{ \App\Util::translate('Share Thoughts') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about_services">
                                                <h2 class="bar">{{ \App\Util::translate('Why Our Services') }}?</h2>
                                                <p>{{ \App\Util::translate('why_services_texts') }}</p>
                                                <div class="why_services_block_line">
                                                    <div class="line">
                                                        {{ \App\Util::translate('Fast And Responsive Communication') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Dedicated and Personalized Project Manager') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Personalized Development Group') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Development to Marketting Stage Support') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Next Generation Design Architecture') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Saas Model Development Technology') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Separate Developer For Customazied Task with Same Manager') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Rank top With SEO Services') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dmc"><a href="{{ route('technologies') }}" title="Frameworks"
                                class="drop-out">{{ \App\Util::translate('Frameworks') }} <i
                                    class="fa fa-chevron-down"></i></a>
                            <div class="dropdown-v">
                                <div class="dropdown-layer"></div>
                                <div class="dropdown-content">
                                    @includeIf('components.common.back', ['class' => 'dropdown-v', 'title' => 'Frameworks'])

                                    <div class="container animate-top">
                                        <div class="flex">
                                            <div id="services_menu">
                                                <h2 class="bar">{{ \App\Util::translate('Popular Frameworks') }}:
                                                </h2>
                                                <ul>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/laravel.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Laravel CRM') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/reactjs.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('ReactJs Apps') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/vuejs.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('VueJs Apps') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/AngularJS.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('AngularJs Apps') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Flutter.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Flutter') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Ionic.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Ionic') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Symphony.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Symphony') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/codeigniter-icon.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Codeigniter') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Django.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Django') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Flask.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Flask') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/ASP-net.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('ASP.net') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/ExpressJS.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('ExpressJS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/vanala JS.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('vanala JS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Jquery Apps.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Jquery Apps') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/custom.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Custom') }}</span>
                                                        </a></li>
                                                </ul>
                                                <div class="better_idea">
                                                    <div class="flex space align-center">
                                                        <div class="texts">
                                                            <h3>{{ \App\Util::translate('No Framework Support?') }}
                                                            </h3>
                                                            <p>{{ \App\Util::translate('no_framework_texts') }}</p>
                                                        </div>
                                                        <div class="buttons">
                                                            <a href=""
                                                                class="start_a_project">{{ \App\Util::translate('Quick Contact') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about_services">
                                                <h2 class="bar width-80">
                                                    {{ \App\Util::translate('Why to select technology?') }}</h2>
                                                <p>{!! \App\Util::translate('why_technologies_texts') !!}</p>
                                                <div class="why_services_block_line">
                                                    <div class="line">
                                                        {{ \App\Util::translate('Easy Routing and security.') }}</div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Fast Caching for Fast Loading.') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Fast Development Structure') }}</div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Well documented and easy to learn') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Developer friendly and easy to handle') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Ready softwares to handle big stuffs') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('OAuth Management And Secure Payment Technologies') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('All in One Seo Facality with Custom 22Software Supports') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ route('dynamic_slider') }}" title="Dynamic Slider"
                                class="new_release">{{ \App\Util::translate('Dynamic Slider') }}</a></li>
                        <li class="dmc"><a href="{{ route('learn') }}" title="Learn"
                                class="drop-out">{{ \App\Util::translate('Learn') }} <i
                                    class="fa fa-chevron-down"></i></a>
                            <div class="dropdown-v">
                                <div class="dropdown-layer"></div>
                                <div class="dropdown-content">
                                    @includeIf('components.common.back', ['class' => 'dropdown-v', 'title' => 'Learn'])
                                    <div class="container animate-top">
                                        <div class="flex">
                                            <div id="services_menu">
                                                <h2 class="bar">{{ \App\Util::translate('Programming Languages') }}:
                                                </h2>
                                                <ul>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/c.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('C') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/c++.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('C++') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/cc.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('C#') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/java.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Java') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Python.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Python') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Dart.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Dart') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/PHP.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('PHP') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/JavaScript.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('JavaScript') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/SQL.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('SQL') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/R.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('R') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/TypeScript.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('TypeScript') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/HTML.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('HTML') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Css.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Css') }}</span>
                                                        </a></li>
                                                </ul>
                                                <h2 class="bar">{{ \App\Util::translate('Frameworks and Technologies') }}:
                                                </h2>
                                                <ul>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/laravel.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Laravel') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/reactjs.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('ReactJS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/vuejs.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('VueJS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/AngularJS.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('AngularJS') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Flutter.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Flutter') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Ionic.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Ionic') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Symphony.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Symphony') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img
                                                                    src="{{ asset('public/img/codeigniter-icon.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Codeigniter') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Django.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Django') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Flask.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Flask') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Cs-Cart.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Cs-Cart') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/API Development.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Api and Webhooks') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Software-Architecture.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Software Architecture') }}</span>
                                                        </a></li>
                                                    <li><a href="">
                                                            <div class="d-image">
                                                                <img src="{{ asset('public/img/Libraries.png') }}">
                                                            </div>
                                                            <span>{{ \App\Util::translate('Libraries') }}</span>
                                                        </a></li>
                                                </ul>
                                                <div class="better_idea">
                                                    <div class="flex space align-center">
                                                        <div class="texts">
                                                            <h3>{{ \App\Util::translate('Want to join 22Software?') }}
                                                            </h3>
                                                            <p>{{ \App\Util::translate('22software_carrier_text') }}</p>
                                                        </div>
                                                        <div class="buttons">
                                                            <a href=""
                                                                class="start_a_project">{{ \App\Util::translate('Apply Now') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about_services">
                                                <h2 class="bar width-80">
                                                    {{ \App\Util::translate('Why to learn with 22Software?') }}</h2>
                                                <p>{!! \App\Util::translate('22software_learn_questions_text') !!}</p>
                                                <div class="why_services_block_line">
                                                    <div class="line">
                                                        {{ \App\Util::translate('Basic Learning and Advanced Practise Technology.') }}</div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Keyword Research and foundation for basic thinkings') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Complete structures of basic needs and uses guide') }}</div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Well structured for all languages to make same and quick learning style') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Problem solving with AI supports and Noted Guidelines') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('Open source, Userfriendly interfaces') }}
                                                    </div>
                                                    <div class="line">
                                                        {{ \App\Util::translate('No costs') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                title="Contact">{{ \App\Util::translate('Contact') }}</a></li>
                                @includeIf('components.common.bottom')

                    </ul>
                    <ul>
                        <li><a href="{{ route('store') }}" title="Visit Store"
                                class="visit_store">{{ \App\Util::translate('Visit Store') }}</a></li>
                        <li><a href="{{ route('start_a_project') }}" title="Start a Project"
                                class="start_a_project">{{ \App\Util::translate('Start a Project') }}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

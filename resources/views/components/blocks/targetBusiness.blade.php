<div class="target_business" style="background-image:url({{ asset("public/img/pages/inapp-bp.png") }}) ">
    <div class="wrapper">
        <div class="container">
            <div class="flex">
                <div class="image">
                    <div class="image_effect">
                        <img src="{{ asset("public/img/pages/SaaS Dashboard.png") }}" alt="In App Screenshots">
                    </div>
                </div>
                <div class="texts">
                    <h2>{{ \App\Util::translate("We target business Opportunities") }}</h2>
                    <p>{{ \App\Util::translate("Once we identify the target sector, we develop websites designed to naturally attract users. We accomplish this by creating top-notch content, running promotions, and providing an excellent user experience. Each website is integrated with our proprietary operations system, ensuring efficient management and continuous improvement.") }}</p>
                    <div class="details">
                        <div class="sum">
                            <div class="questions">
                                <span>{{ \App\Util::translate('A+ Great Content Design') }}</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="ans">
                                {!! \App\Util::translate(
                                    'Our A+ Great Content Design ensures your website captivates and retains users. We create visually stunning graphics, images, and videos that immediately draw attention, using vibrant colors, modern typography, and appealing layouts for a cohesive look. Our skilled copywriters craft compelling and persuasive content tailored to your audience, highlighting your brand’s unique value. By blending engaging visuals with powerful copy, we deliver a seamless user experience that drives engagement and conversions. Every element is designed to resonate with your audience, making your website a go-to destination for information and interaction.',
                                ) !!}
                            </div>
                        </div>
                        <div class="sum">
                            <div class="questions">
                                <span>{{ \App\Util::translate('Secure Backend And API') }}</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="ans">
                                {!! \App\Util::translate(
                                    'Security is our top priority. Our <b>secure backend</b> and <b>API infrastructure</b> protect your data and provide a seamless user experience. We implement advanced <b>security measures</b> like encryption, authentication, and authorization to guard against threats. Our robust backend architecture ensures reliability and scalability, with load balancing and caching for optimal performance. Our APIs enable smooth integration with various services, following best practices for compatibility and efficiency. Continuous monitoring allows us to detect and respond to security incidents promptly, ensuring your website remains secure and operational at all times.',
                                ) !!}
                            </div>
                        </div>
    
                        <div class="sum">
                            <div class="questions">
                                <span>{{ \App\Util::translate('MVC Model Design and Multi-Channel Connection') }}</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="ans">
                                {!! \App\Util::translate(
                                    "Our development approach uses the <b>MVC (Model-View-Controller)</b> model to ensure applications are scalable and maintainable.<br>
    This architecture promotes <b>enhanced maintainability</b>, <b>scalability</b>, and <b>improved testing</b>.<br>
    We also facilitate <b>multi-channel connections</b> to improve user engagement.<br>
    This includes <b>web and mobile integration</b>, <b>social media connectivity</b>, and <b>API integration</b>.",
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="" class="btn btn-primary">{{  \App\Util::translate("Get a business Deal") }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
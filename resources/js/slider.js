(function ($) {
    $.fn.sliderPlugin = function (options) {
        // Default settings
        var settings = $.extend({
            pagination: true,
            navigation: true,
            mouseDrag: true,
            dragCursor: 'grabbing', // Custom cursor during drag
            autoSlide: false, // Auto slide option
            loop: false, // Looping option
            autoSlideTime: 1000, // Auto slide time interval
            animation: 'slide', // Animation type: slide, fade, zoom, flip, bounce, rotate, scale, blur, slide-up, slide-down
            animationTime: 1000,
            navigationStyle: 'text',
            leftText: "Previous",
            RightText: "Next",
            LeftIcon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <polyline points="15 18 9 12 15 6"/> </svg>`,
            RightIcon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <polyline points="9 18 15 12 9 6"/></svg>`,
            paginationStyle: 'number',
            stopSlideOnHover: false,
            paginationOutlet: 'outset'
        }, options);
        var $this, $slides, $slide, slideCount, currentIndex, autoSlideInterval, isDragging, startX, currentX, $pagination;

        function initialize() {
            $this = $(this);
            $slides = $this.find('.slides');
            $slide = $this.find('.slide');
            slideCount = $slide.length;
            currentIndex = 0;
            isDragging = false;
            startX = 0;
            currentX = 0;

            // Make content non-selectable
            $this.css('-webkit-user-select', 'none');
            $this.css('-moz-user-select', 'none');
            $this.css('-ms-user-select', 'none');
            $this.css('user-select', 'none');

            // Initially, only display the active slide
            $slide.hide();
            $slide.eq(currentIndex).show();

            // Create pagination
            if (settings.pagination) {
                $pagination = $this.find('.pagination');
                $pagination.empty();

                var paginationStyle = settings.paginationStyle;

                for (var i = 0; i < slideCount; i++) {
                    var content;

                    // Determine content based on the selected pagination style
                    switch (paginationStyle) {
                        case 'number':
                            content = (i + 1);
                            break;
                        case 'dots':
                            content = '<span class="dot"></span>';
                            break;
                        case 'squire_dots':
                            content = '<span class="squire-dot"></span>';
                            break;
                        case 'titles':
                            content = $slide.eq(i).attr("sliderName"); // Using class as title content
                            break;
                        case 'titles_flex':
                            content = '<div class="title-flex">' + $slide.eq(i).attr("sliderName") + '</div>'; // Full width title
                            break;
                        default:
                            content = (i + 1);
                    }

                    // Append pagination item with determined content
                    $pagination.append('<span data-index="' + i + '">' + content + '</span>');
                }

                // Apply active class to the first pagination item
                $pagination.find('span').first().addClass('active');

                // Apply styles based on the selected pagination style
                switch (paginationStyle) {
                    case 'number':
                        $pagination.removeClass('inset_hover');
                        $pagination.removeAttr("style");
                        $pagination.css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'margin': '5px 0px'
                        });
                        $pagination.find('span').css({
                            'cursor': 'pointer',
                            'padding': '5px 10px',
                            'border': '1px solid #ddd',
                            'margin': '0 2px',
                            'display': 'inline-block',
                            'user-select': 'none'
                        });
                        break;
                    case 'dots':
                        $pagination.removeAttr("style");
                        $pagination.addClass('inset_hover');
                        $pagination.css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'margin': '5px 0px'
                        });
                        $pagination.find('.dot').css({
                            'display': 'inline-block',
                            'width': '20px',
                            'height': '20px',
                            'border-radius': '50%',
                            'background-color': '#ddd',
                            'margin': '10px 5px',
                            'cursor': 'pointer',
                            'user-select': 'none'
                        });
                        break;
                    case 'squire_dots':

                        $pagination.removeAttr("style");
                        $pagination.addClass('inset_hover');
                        $pagination.css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'margin': '5px 0px'
                        });
                        $pagination.find('.squire-dot').css({
                            'display': 'inline-block',
                            'width': '20px',
                            'height': '20px',
                            'border-radius': '2px',
                            'background-color': '#ddd',
                            'margin': '10px 5px',
                            'cursor': 'pointer',
                            'user-select': 'none'
                        });
                        break;
                    case 'titles':
                        $pagination.removeAttr("style");
                        $pagination.removeClass('inset_hover');
                        $pagination.css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'margin': '5px 0px'
                        });
                        $pagination.find('span').css({
                            'cursor': 'pointer',
                            'padding': '5px 10px',
                            'border': '1px solid #ddd',
                            'margin': '0 2px',
                            'display': 'inline-block',
                            'font-weight': 'bold',
                            'user-select': 'none'
                        });
                        break;
                    case 'titles_flex':
                        $pagination.removeAttr("style");
                        $pagination.removeClass('inset_hover');
                        $pagination.css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'margin': '0px 0px'
                        });
                        $pagination.find('span[data-index]').css({
                            'width': 100/slideCount +'%',
                            'padding': '10px 3px',
                            'text-align': 'center',
                            'background-color': '#eee',
                            'cursor': 'pointer',
                            'user-select': 'none',
                            'color': "#555"
                        });
                        break;
                }

                // Handle paginationOutlet (inset/outset)
                if (settings.paginationOutlet === 'inset') {
                    var paginationHeight = $pagination.innerHeight();
                    $pagination.css({
                        'marginTop': -paginationHeight + 'px',
                        'position': 'absolute',
                        'width': '100%'
                    });
                }
                // Apply dark mode styles
                if ($("body").hasClass('dark') && !$pagination.hasClass("inset_hover")) {
                    $pagination.find('span').css({
                        'color': '#ddd',
                        'background': '#333'
                    });
                }
            } else {
                $this.find('.pagination').html("");
            }


            if(settings.navigation == false){
                $(".prev22, .next22").css("display","none");
            }else{
                $('.prev22, .next22').removeAttr("style");
                $(".prev22, .next22").css("display","block");
                // Apply styles to .prev22 elements
                if(settings.navigationStyle == 'text') {
                    $('.prev22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'left': '10px'});/* Apply styles to .next22 elements */$('.next22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'right': '10px'});
                    $(".prev22").html(settings.leftText);
                    $(".next22").html(settings.RightText);
                }
                if(settings.navigationStyle == 'text_w_b') {
                    $('.prev22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': 'transparent', 'border': '1px solid transparent', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'left': '10px'});/* Apply styles to .next22 elements */$('.next22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': 'transparent', 'border': '1px solid transparent', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'right': '10px'});
                    $(".prev22").html(settings.leftText);
                    $(".next22").html(settings.RightText);
                }
                if(settings.navigationStyle == 'icon'){
                    $('.prev22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'left': '10px'});/* Apply styles to .next22 elements */$('.next22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'right': '10px'});

                    $(".prev22").html(settings.LeftIcon);
                    $(".next22").html(settings.RightIcon);
                }
                if(settings.navigationStyle == 'icon_w_b'){
                    $('.prev22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': 'transparent', 'border': '1px solid transparent', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'left': '10px'});/* Apply styles to .next22 elements */$('.next22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': 'transparent', 'border': '1px solid transparent', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'right': '10px'});

                    $(".prev22").html(settings.LeftIcon);
                    $(".next22").html(settings.RightIcon);
                }
                if(settings.navigationStyle == 'icon_f_s_h'){
                    $('.prev22, .next22').css({
                        'display': 'block',
                        'position': 'absolute',
                        'top': '0%',
                        'transform': 'translateY(0)',
                        'background-color': 'rgba(200, 200, 200, 0.17)',
                        'padding': '0 16px',
                        'cursor': 'pointer',
                        'user-select': 'none',
                        'height': '91%',
                        'border': 'none'
                    });

                    $('.prev22').css('left', '0px');
                    $('.next22').css('right', '0px');

                    // Adding hover effect
                    $('.prev22, .next22').hover(
                        function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.37)');
                        }, function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.17)');
                        }
                    );

                    $(".prev22").html(settings.LeftIcon);
                    $(".next22").html(settings.RightIcon);
                }
                if(settings.navigationStyle == 'text_f_s_h'){
                    $('.prev22, .next22').css({
                        'display': 'block',
                        'position': 'absolute',
                        'top': '0%',
                        'transform': 'translateY(0)',
                        'background-color': 'rgba(200, 200, 200, 0.17)',
                        'padding': '0 16px',
                        'cursor': 'pointer',
                        'user-select': 'none',
                        'height': '91%',
                        'border': 'none'
                    });

                    $('.prev22').css('left', '0px');
                    $('.next22').css('right', '0px');

                    // Adding hover effect
                    $('.prev22, .next22').hover(
                        function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.37)');
                        }, function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.17)');
                        }
                    );

                    $(".prev22").html(settings.leftText);
                    $(".next22").html(settings.RightText);
                }
                if(settings.navigationStyle == 'icon_text_h'){
                    $('.prev22, .next22').css({
                        'display': 'block',
                        'position': 'absolute',
                        'top': '0%',
                        'transform': 'translateY(0)',
                        'background-color': 'rgba(200, 200, 200, 0.17)',
                        'padding': '0 16px',
                        'cursor': 'pointer',
                        'user-select': 'none',
                        'height': '91%',
                        'border': 'none'
                    });

                    $('.prev22').css('left', '0px');
                    $('.next22').css('right', '0px');

                    // Adding hover effect
                    $('.prev22, .next22').hover(
                        function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.37)');
                        }, function() {
                            $(this).css('background-color', 'rgba(200, 200, 200, 0.17)');
                        }
                    );

                    $(".prev22").html(settings.LeftIcon + " " + settings.leftText);
                    $(".next22").html(settings.RightText + " " +settings.RightIcon);
                    $(".prev22, .next22").find("svg").css("margin","-7px");
                }
                if(settings.navigationStyle == 'icon_text'){
                    $('.prev22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'left': '10px'});/* Apply styles to .next22 elements */$('.next22').css({'position': 'absolute', 'top': '50%', 'transform': 'translateY(-50%)', 'background-color': '#fff', 'border': '1px solid #ddd', 'padding': '10px', 'cursor': 'pointer', 'user-select': 'none', 'right': '10px'});

                    $(".prev22").html(settings.LeftIcon + " " + settings.leftText);
                    $(".next22").html(settings.RightText + " " +settings.RightIcon);
                    $(".prev22, .next22").find("svg").css("margin","-7px");
                }
            }

            // Update slide position
            goToSlide(currentIndex);

            // Previous button
            if (settings.navigation) {
                $this.find('.prev22').off('click').on('click', function () {
                    goToSlide(currentIndex - 1);
                    startAutoSlide();
                });

                // Next button
                $this.find('.next22').off('click').on('click', function () {
                    goToSlide(currentIndex + 1);
                    startAutoSlide();
                });
            }

            // Pagination click
            if (settings.pagination) {
                $this.find('.pagination span').off('click').on('click', function () {
                    var index = $(this).data('index');
                    goToSlide(index);
                    startAutoSlide();
                });
            }

            // Mouse drag functionality
            if (settings.mouseDrag) {
                let startY, currentY;
                const MIN_DRAG_THRESHOLD = 10; // Minimum pixel threshold for dragging

                $slides.off('mousedown touchstart').on('mousedown touchstart', function (event) {
                    event.preventDefault(); // Prevent default behavior
                    isDragging = true;
                    startX = event.type === 'mousedown' ? event.pageX : event.originalEvent.touches[0].pageX;
                    startY = event.type === 'mousedown' ? event.pageY : event.originalEvent.touches[0].pageY;
                    currentX = startX;
                    currentY = startY;
                    $slide.show(); // Show all slides during dragging
                    $slides.css('cursor', settings.dragCursor);
                    $slides.css('transition', 'none');
                    if (settings.animation !== 'slide') {
                        $slides.find(".slide").css('display', 'block');
                    }
                    stopAutoSlide();
                });

                $(document).off('mousemove touchmove').on('mousemove touchmove', function (event) {
                    if (isDragging) {
                        event.preventDefault(); // Prevent scrolling on touch devices
                        var x = event.type === 'mousemove' ? event.pageX : event.originalEvent.touches[0].pageX;
                        var y = event.type === 'mousemove' ? event.pageY : event.originalEvent.touches[0].pageY;
                        var deltaX = x - startX;
                        var deltaY = y - startY;

                        // Check if the drag is more horizontal than vertical
                        if (Math.abs(deltaX) > Math.abs(deltaY)) {
                            $slides.css('transform', `translateX(${-currentIndex * 100 + deltaX / $this.width() * 100}%)`);
                        }
                    }
                    if (settings.stopSlideOnHover && settings.autoSlide) {
                        stopAutoSlide();
                    }
                });

                $(document).off('mouseup touchend').on('mouseup touchend', function (event) {
                    if (isDragging) {
                        var endX = event.type === 'mouseup' ? event.pageX : event.originalEvent.changedTouches[0].pageX;
                        var deltaX = endX - startX;
                        $slides.css('cursor', 'default');
                        $slides.css('transition', 'transform 0.3s ease-out');

                        if (settings.animation !== 'slide') {
                            $slide.css('display', 'none').eq(currentIndex).css('display', 'block');
                            $slides.css('transform', 'translateX(0%)');
                        }

                        if (Math.abs(deltaX) > MIN_DRAG_THRESHOLD) {
                            if (deltaX < 0 && currentIndex < slideCount - 1) {
                                goToSlide(currentIndex + 1, 0);
                            } else if (deltaX > 0 && currentIndex > 0) {
                                goToSlide(currentIndex - 1, 0);
                            } else {
                                goToSlide(currentIndex, 0);
                            }
                        } else {
                            goToSlide(currentIndex, 0);
                        }

                        isDragging = false;
                        startAutoSlide();
                    }
                });

                $slides.off('mouseleave').on('mouseleave', function (event) {
                    if (isDragging) {
                        isDragging = false;
                        goToSlide(currentIndex, 0);
                    }
                    if (settings.stopSlideOnHover && settings.autoSlide) {
                        startAutoSlide();
                    }
                });
            }

            // Initialize auto slide
            startAutoSlide();

        }

        function applyAnimation(index, active, animationType, noAnimate = 1) {
            var $currentSlide = $slide.eq(active);
            var $nextSlide = $slide.eq(index);
            // Reset styles for all slides
            $slide.css('opacity', '');
            $slide.css('transform', '');
            $slide.css('filter', '');
            var duration = settings.animationTime; // Use animationTime setting

            if (!noAnimate && settings.animation != 'slide') {
                $slides.css('transition', 'transform 0s');

                $slides.find(".slide").css('display', 'block');
                $slides.css('transition', 'transform  0.5s ease-in-out');
                $slides.css('transform', 'translateX(' + (-index * 100) + '%)');

                return;
            }
            if (settings.animation != 'slide') {
                $slides.css('transition', 'transform 0s');
            }
            let durationS = duration / 1000;
            switch (animationType) {
                case 'fade':
                    $slides.css('transform', 'translateX(0%)');
                    $slides.find(".slide").fadeOut(duration);
                    $nextSlide.fadeIn(duration * 2);
                    break;
                case 'zoom':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'scale(0.7)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(duration / 2);
                        $nextSlide.fadeIn(0);
                        // $nextSlide.css('transform', 'scale(.4)');

                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'scale(1)');
                    }, duration);
                    break;
                case 'flip':

                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'rotateY(90deg)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(duration / 2);
                        $nextSlide.fadeIn(0);

                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'rotateY(0)');
                    }, duration);

                    break;
                case 'bounce':


                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'translateY(50%)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(duration / 2);
                        $nextSlide.fadeIn(0);

                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'translateY(-20%)');
                    }, duration);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'translateY(0)');
                    }, duration * 1.5);

                    break;
                case 'rotate':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'rotate(60deg)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(duration / 2);
                        $nextSlide.fadeIn(0);

                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'rotate(0deg)');
                    }, duration);
                    break;
                case 'scale':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'scale(1.2)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(0);
                        $nextSlide.fadeIn(0);
                        // $nextSlide.css('transform', 'scale(.4)');

                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'scale(1)');
                    }, duration);
                    break;
                case 'blur':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'filter ' + durationS + 's');
                    $nextSlide.css('filter', 'blur(4px)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(0);
                        $nextSlide.fadeIn(0);
                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('filter', 'blur(0px)');
                    }, duration);
                    break;
                case 'slide-up':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").slideUp(duration);
                    $nextSlide.slideDown(duration * 2);
                    break;
                case 'slide-down':
                    $slides.css('transform', 'translateX(0%)')
                    $slides.find(".slide").css('transition', 'transform ' + durationS + 's');
                    $nextSlide.css('transform', 'translateY(-100%)');
                    setTimeout(() => {
                        $slides.find(".slide").fadeOut(0);
                        $nextSlide.fadeIn(0);
                    }, duration / 2);
                    setTimeout(() => {
                        $nextSlide.css('transform', 'translateY(0%)');
                    }, duration);
                    break;
                default: // 'slide'
                    $nextSlide.fadeIn(duration);
                    $slides.css('transition', `transform ${settings.animationTime/1000}s`);
                    $slides.css('transform', 'translateX(' + (-index * 100) + '%)');
                    break;
            }
        }

        function goToSlide(index, noAnimate) {
            let active = currentIndex;
            if (settings.loop) {
                if (index < 0) {
                    currentIndex = slideCount - 1;
                } else if (index >= slideCount) {
                    currentIndex = 0;
                } else {
                    currentIndex = index;
                }
            } else {
                currentIndex = Math.max(0, Math.min(index, slideCount - 1));
            }

            applyAnimation(currentIndex, active, settings.animation, noAnimate);

            if (settings.pagination) {
                $pagination.find('span').removeClass('active');
                $pagination.find('span[data-index='+currentIndex+']').addClass('active');
            }
        }

        function startAutoSlide() {
            if (settings.autoSlide) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = setInterval(function () {
                    goToSlide(currentIndex + 1);
                }, settings.autoSlideTime);
            }
        }
        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        function destroy() {
            clearInterval(autoSlideInterval);
            $this.find('.prev').off('click');
            $this.find('.next').off('click');
            $this.find('.pagination span').off('click');
            $slides.off('mousedown touchstart');
            $(document).off('mousemove touchmove');
            $(document).off('mouseup touchend');
        }

        function recreate() {
            destroy();
            initialize.call($this);
        }

        // Initialize the slider plugin
        initialize.call(this);

        // Return methods for external control
        return {
            goToSlide: goToSlide,
            startAutoSlide: startAutoSlide,
            destroy: destroy,
            recreate: recreate
        };
    };
}(jQuery));

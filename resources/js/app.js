$(document).ready(function(){
    let base_url = $("meta[name=base-url]").attr("content") + "/";
    let csrf_token = $("meta[name=csrf-token]").attr("content");

    $(".dropdown").click(function(){
        $("." + $(this).attr("attachment")).slideToggle(200);
    });
    $(window).click(function(event){
        let currentElement = event.target;
        while (currentElement) {
            if (currentElement.classList && currentElement.classList.contains("active_lang")) {
                return;            }
            currentElement = currentElement.parentElement;
        }
        $(".dropdown_shadow").slideUp("fast");
    });
    $(".languages_dropdown button").click(function(){
        $(".default-lang").html($(this).html());
        $(".dropdown_shadow").fadeOut("fast");
        let l = base_url + 'lang/' + $(this).attr('data');
        $.ajax({
            url: l,
            type: 'POST',
            data: '_token='+csrf_token,
            success:function(){
                location.reload();
            }
        });
    });
    $(".dark-view").click(function(){
        let l = base_url + 'theme/dark';
        $.ajax({
            url: l,
            type: 'POST',
            data: '_token='+csrf_token,
            success:function(){
                $("body").addClass("dark");
                $(".dark-view").css("display", "none");
                $(".light-view").css("display", "block");
            }
        });
    });
    $(".light-view").click(function(){
        let l = base_url + 'theme/light';
        $.ajax({
            url: l,
            type: 'POST',
            data: '_token='+csrf_token,
            success:function(){
                $("body").removeClass("dark");
                $(".dark-view").css("display", "block");
                $(".light-view").css("display", "none");
            }
        });
    });

    $(window).click(function(event){
        let currentElement = event.target;
        while (currentElement) {
            if (currentElement.classList && currentElement.classList.contains("dmc")) {
                return;
            }
            currentElement = currentElement.parentElement;
        }
        $(".dropdown-v.show").fadeOut("slow");
        $(".dropdown-v").removeClass("show");
        $(".drop-out.opened").removeClass("opened");

    });
    $(".dropdown-layer").click(function(){
        $(".dropdown-v.show").fadeOut("slow");
        $(".dropdown-v").removeClass("show");
        $(".drop-out.opened").removeClass("opened");
    });
    $(".ico_bar").click(function(){
        $(".mid").show(50);
    });
    $(window).resize(function(){
        if($(window).innerWidth() > 1210){
            resetResponsive();
        }
    });
    $(".drop-out").click(function(event){
        event.preventDefault();
        let p = $(this).parent();
        let d = $(p).find(".dropdown-v");
        if($(d).hasClass("show")){
            $(".dropdown-v.show").fadeOut("slow");
            $(".dropdown-v").removeClass("show");
            $(".drop-out.opened").removeClass("opened");
            $(d).fadeOut(200);
            $(d).removeClass("show");
            $(this).removeClass("opened");
        }else{
            $(".dropdown-v.show").fadeOut("slow");
            $(".dropdown-v").removeClass("show");
            $(".drop-out.opened").removeClass("opened");
            $(d).slideToggle(0);
            $(d).addClass("show");
            $(this).addClass("opened");
        }
    });
    function resetResponsive(){
        $(".mid").removeAttr("style");
    }

});


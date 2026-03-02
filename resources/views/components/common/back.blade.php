<div class="back_v sticky" data-for="{{ $class }}">
    <div class="container flex align-items @if($class != 'dropdown-v') space @endif">
        @if($class == 'dropdown-v')
            <button class="back-p rms" title="{{ \App\Util::translate("Back") }}"><i class="fa fa-arrow-left"></i></button>
        @endif
        @if($class == 'dropdown-v')
        <h2 class="title-v">{{ \App\Util::translate($title) }}</h2>
        @else
        <div class="logo flex align-center">
            <img src="{{ asset('public/img/22-logo.png') }}" alt="22Softwares Logo">
            <h2>Softwares</h2>
        </div>
        @endif
        <button class="back-p bms" title="{{ \App\Util::translate("Back") }}"><i class="fa fa-close"></i></button>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            

            @if($class == 'dropdown-v')
            $(".back-p.bms").click(function(){
                $(".{{ $class }}").hide(50);
            });
            $(".back-p.rms").click(function(event){
                $(".{{ $class }}").hide(50);
                $(".{{ $class }}").removeClass("show");
                $(".drop-out").removeClass("opened");

                event.preventDefault();
            });
            @else
            $(".back-p.bms").click(function(){
                $(".{{ $class }}").hide(50);
            });
            @endif
        });

        </script> 
@endpush